<?php

namespace App\Repository;

use App\Entity\Categories;
use App\Entity\Depenses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Depenses|null find($id, $lockMode = null, $lockVersion = null)
 * @method Depenses|null findOneBy(array $criteria, array $orderBy = null)
 * @method Depenses[]    findAll()
 * @method Depenses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepensesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Depenses::class);
    }

    /**
    * @return Depenses[] Returns an array of Depenses objects
    *
    */
    public function findAllWithCategories()
    {
        return $this->createQueryBuilder('d')
            ->join('d.category', 'c')
            ->addSelect('c')
            //->orderBy('d.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findHomeAllWithCategories()
    {
        return $this->createQueryBuilder('d')
            ->join('d.category', 'c')
            ->addSelect('c')
            ->orderBy('d.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Depenses
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
