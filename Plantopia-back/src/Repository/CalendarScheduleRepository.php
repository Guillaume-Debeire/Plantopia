<?php

namespace App\Repository;

use App\Entity\CalendarSchedule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CalendarSchedule|null find($id, $lockMode = null, $lockVersion = null)
 * @method CalendarSchedule|null findOneBy(array $criteria, array $orderBy = null)
 * @method CalendarSchedule[]    findAll()
 * @method CalendarSchedule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalendarScheduleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CalendarSchedule::class);
    }

    // /**
    //  * @return CalendarSchedule[] Returns an array of CalendarSchedule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CalendarSchedule
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
