<?php 

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once 'vendor/autoload.php';

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . '/src'), $isDevMode);

//database configuration parameters
$conn = array(
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/db.sqlite'
        );

$entitiManager = EntityManager::create($conn, $config);