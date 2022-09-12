<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = ORMSetup::createAnnotationMetadataConfiguration(array(ROOT_FOLDER."/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
$conn = ['driver' => 'mysqli',
        'host' => 'localhost',
        'user' => 'toto',
        'password' => 'toto',
        'dbname' => 'good_will'];

$entityManager = EntityManager::create($conn, $config);