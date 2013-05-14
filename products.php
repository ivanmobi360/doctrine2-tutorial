<?php 

require_once 'bootstrap.php';

$dql = "SELECT p.id, p.name, count(b.id) AS openBugs
        FROM Bug b
        JOIN b.products p
        WHERE b.status='OPEN'
        GROUP BY p.id
        ";

$rows = $entityManager->createQuery($dql)
            ->getScalarResult();


foreach ($rows as $row){
    echo $row['name'] . ' has ' . $row['openBugs']  . " open bugs!\n";
}
