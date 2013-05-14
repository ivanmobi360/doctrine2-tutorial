<?php 
use Doctrine\ORM\EntityRepository;

class BugRepository extends EntityRepository
{
    function getRecentBugs($number=30)
    {
        $dql = "SELECT b, e, r
                FROM Bug b
                JOIN b.engineer e
                JOIN b.reporter r
                ORDER BY b.created DESC
                ";
        
        return $this->getEntityManager()->createQuery($dql)
        ->setMaxResults($number)
        ->getResult();
        
    }
    
    function getRecentBugsArray($number=30)
    {
        $dql = "SELECT b, e, r, p
                FROM Bug b
                JOIN b.engineer e
                JOIN b.reporter r
                JOIN b.products p
                ORDER BY b.created DESC
                ";
        return $this->getEntityManager()->createQuery($dql)
        ->setMaxResults($number)
        ->getArrayResult();
    }
    
    function getUserBugs($userId, $number=15)
    {
        $dql = "SELECT b, e, r
                FROM Bug b
                JOIN b.engineer e
                JOIN b.reporter r
                WHERE b.status='OPEN'
                AND ( e.id=?1 OR r.id=?1)
                ORDER BY b.created DESC
                ";
        return $this->getEntityManager()->createQuery($dql)
                    ->setParameter(1, $userId)
                    ->setMaxResults($number)
                    ->getResult();
    }
    
    function getOpenBugsByProduct()
    {
        $dql = "SELECT p.id, p.name, count(b.id) AS openBugs
                FROM Bug b
                JOIN b.products p
                WHERE b.status='OPEN'
                GROUP BY p.id
                ";
        return $this->getEntityManager()->createQuery($dql)
                    ->getScalarResult();
    }
    
}