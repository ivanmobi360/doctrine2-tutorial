<?php 

require_once 'bootstrap.php';

$theReportedId = $argv[1];
$theDefaultEngineerId = $argv[2];
$productIds = explode(",", $argv[3]);

$reporter = $entityManager->find("User", $theReportedId);
$engineer = $entityManager->find("User", $theDefaultEngineerId);

if(!$reporter || !$engineer){
	echo "No reporter and engineer found";
	exit(1);
}

$bug = new Bug();
$bug->setDescription("Something is wrong");
$bug->setCreated(new DateTime("now"));
$bug->setStatus("OPEN");

foreach ($productIds as $productId){
	$product = $entityManager->find("Product", $productId);
	$bug->assignToProduct($product);
}

$bug->setReporter($reporter);
$bug->setEngineer($engineer);

$entityManager->persist($bug);
$entityManager->flush();

echo "your new bug ID " . $bug->getId() . "\n";