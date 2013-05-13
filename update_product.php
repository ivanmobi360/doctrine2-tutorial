<?php 

require_once 'bootstrap.php';

$id = $argv[1];
$name = $argv[2];

$product = $entityManager->find('Product', $id);

if (null == $product)
{
    echo "Product $id does not exist.\n";
    exit(1);
}

$product->setName($name);

$entityManager->flush();