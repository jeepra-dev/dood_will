<?php
namespace App\Repository;

use App\Entity\User;
use Core\Repository\Repository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;

class UserRepository extends Repository
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em, new ClassMetadata(User::class));
    }
}