<?php 

require_once 'bootstrap.php';

$name = $argv[1];

$product = new Product();
$product->setName($name);

$entityManager->persist($product);
$entityManager->flush();

echo "Created product with ID " . $product->getId() . "\n";