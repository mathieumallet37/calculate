<?php

namespace App\Repository;

use App\Entity\Cuisiniste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cuisiniste>
 *
 * @method Cuisiniste|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cuisiniste|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cuisiniste[]    findAll()
 * @method Cuisiniste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CuisinisteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cuisiniste::class);
    }

//    /**
//     * @return Cuisiniste[] Returns an array of Cuisiniste objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cuisiniste
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
