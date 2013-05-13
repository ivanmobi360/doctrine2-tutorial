<?php 

require_once 'bootstrap.php';

$repo = $entityManager->getRepository('Product');
$products = $repo->findAll();

foreach ($products as $product){
    echo sprintf("-%s\n", $product->getName() );
}