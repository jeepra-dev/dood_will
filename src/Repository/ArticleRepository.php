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
            $qb->expr()->orX($qb->expr()->in('u.firstname', $haystacks)),
            $qb->expr()->orX($qb->expr()->in('u.lastname', $haystacks))
        );


        $statement = "SELECT a.content, a.territory_id, a.id, u.firstname, u.lastname, u.status, a.type 
                        FROM ".Article::class." a, ".User::class." u
                        WHERE ((
                            a.territory_id IN(
                                SELECT p.child_id FROM ".HierarchyTerritory::class." p WHERE p.parent_id = {$territoryId}
                            )
                             AND (".join(' AND ', $ors1).")
                        )
                        OR (".join(' AND ', $ors1)." AND a.territory_id = {$territoryId} )) 
                        AND (".join(' AND ', $ors).")";

        return  $this->_em->createQuery($statement)->getResult();
    }
}