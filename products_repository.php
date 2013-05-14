<?php 

require_once 'bootstrap.php';

$rows = $entityManager->getRepository('Bug')->getOpenBugsByProduct();


foreach ($rows as $row){
    echo $row['name'] . ' has ' . $row['openBugs']  . " open bugs!\n";
}
