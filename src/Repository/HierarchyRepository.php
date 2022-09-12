<?php

namespace App\Repository;

use App\Entity\HierarchyTerritory;
use Core\Repository\Repository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;

class HierarchyRepository extends Repository
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em, new ClassMetadata(HierarchyTerritory::class));
    }
}