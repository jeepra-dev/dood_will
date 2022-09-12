<?php
namespace App\Repository;

use App\Entity\Territory;
use App\Entity\HierarchyTerritory;
use Core\Repository\Repository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Expr\Join;

class TerritoriesRepository extends Repository
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em, new ClassMetadata(Territory::class));
    }

    public function listAllZone(string $kind): array
    {
        return $this->createQueryBuilder('m')
            ->select('m')
            ->andWhere('m.kind = :kind')
            ->setParameter('kind', $kind)
            ->getQuery()
            ->getResult(AbstractQuery::HYDRATE_OBJECT);
    }

    public function territoryChild(int $id): array
    {
        $exp = $this->_em->getExpressionBuilder()->in(
            'a.id',
            $this->_em->createQueryBuilder()
                    ->select('h.child_id')
                    ->from(HierarchyTerritory::class, 'h')
                    ->andWhere('h.parent_id = :id')
                    ->getDQL()
        );

        return      $this->createQueryBuilder('a')
                    ->select('a')
                    ->where($exp)
                    ->setParameter('id', $id)
                    ->getQuery()
                    ->getResult(AbstractQuery::HYDRATE_OBJECT);
    }
}