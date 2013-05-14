<?php 

require_once 'bootstrap.php';

$id = $argv[1];

$bug = $entityManager->find('Bug', $id);

if (null == $bug)
{
    echo "No bug found.\n";
    exit(1);
}

$bug->close();

$entityManager->flush();
