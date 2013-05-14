<?php 

require_once 'bootstrap.php';

$name = $argv[1];

$user = new User();
$user->setName($name);

$entityManager->persist($user);
$entityManager->flush();

echo "Created user with ID " . $user->getId() . "\n";