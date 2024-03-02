<?php

namespace App\Repository;

use App\Entity\Metrage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Metrage>
 *
 * @method Metrage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Metrage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Metrage[]    findAll()
 * @method Metrage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetrageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Metrage::class);
    }

//    /**
//     * @return Metrage[] Returns an array of Metrage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Metrage
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
