<?php
namespace App\Repository;

use App\Entity\Article;
use App\Entity\Territory;
use App\Entity\HierarchyTerritory;
use App\Entity\User;
use Core\Repository\Repository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Expr\Join;

class ArticleRepository extends Repository
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em, new ClassMetadata(Article::class));
    }

    public function getArticlesByName(int $territoryId, array $haystacks)
    {
        $qb = $this->createQueryBuilder('a');

        $ors1 = [];
        $ors = [];
        foreach ($haystacks as $haystack) {
            //article
            $ors[] = $qb->expr()->orX(
                $qb->expr()->like('a.content', $qb->expr()->literal("%{$haystack}%")),
            );

            //user
            $ors1[] = $qb->expr()->orX(
                $qb->expr()->like('a.content', $qb->expr()->literal("%{$haystack}%")),
            );
        }

        //article
        $ors[] = $qb->expr()->andX(
            $qb->expr()->orX($qb->expr()->eq('a.territory_id', ':id')),
            $qb->expr()->orX($qb->expr()->in('u.firstname', $haystacks)),
            $qb->expr()->orX($qb->expr()->in('u.lastname', $haystacks))
        );

        //user
        $ors1[] = $qb->expr()->andX(
            $qb->expr()->orX($qb->expr()->in('u.firstname', $haystacks)),
            $qb->expr()->orX($qb->expr()->in('u.lastname', $haystacks))
        );

        return $qb->select('a.content, a.territory_id, a.id, u.firstname, u.lastname, u.status, a.type')
                   ->join(
                       User::class,
                       'u',
                       Join::WITH,
                       'u.territory_id = a.territory_id'
                   )
                    ->andWhere(
                        $this->_em->getExpressionBuilder()->in(
                        'a.territory_id',
                        $this ->_em->createQueryBuilder()
                            ->select('p.child_id')
                            ->from(Territory::class, 'm')
                            ->join(
                                HierarchyTerritory::class,
                                'p',
                                Join::WITH,
                                'p.parent_id = m.id'
                            )
                            ->andWhere('p.parent_id = :id')
                            ->getDQL()
                        )
                    )
                    ->andWhere(join(' AND ', $ors1))
                    ->orWhere(join(' AND ', $ors))
                    ->setParameter('id', $territoryId)
                    ->getQuery()
                    ->getresult();
    }
}