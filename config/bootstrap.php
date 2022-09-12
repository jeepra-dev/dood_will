<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = ORMSetup::createAnnotationMetadataConfiguration(array(ROOT_FOLDER."/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
$conn = ['driver' => 'mysqli',
        'host' => 'MYSQL8001.site4now.net',
        'user' => 'a8cc87_jeepra',
        'password' => 'bCPL4vW3uuWiKFc',
        'dbname' => 'db_a8cc87_jeepra'];

$entityManager = EntityManager::create($conn, $config);