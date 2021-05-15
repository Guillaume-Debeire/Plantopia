<?php

namespace App\Repository;

use App\Entity\Plant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Plant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plant[]    findAll()
 * @method Plant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plant::class);
    }

    public function findUserTest($pseudo) 
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "
            SELECT u, p
            FROM App\Entity\User u
            JOIN plant p
            WHERE u.pseudo = :pseudo
            ORDER BY u.pseudo ASC
            "
        )->setParameter(':pseudo', $pseudo);

        dump($query->getSQL());

        // $qb = $this->createQueryBuilder('g');
        // $qb->orderBy('g.name', 'DESC');
        // $qb->andWhere('g.name = :name');
        // $qb->setParameter(':name', $name);

        // $query = $qb->getQuery();


        return $query->getResult();
    }

    public function findTypebyId($id)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "SELECT t.name
            FROM App\Entity\Type t
            JOIN App\Entity\Plant p
            WITH t.id = p.type
            WHERE p.id = :id
            "
        )->setParameter(':id', $id);

        // $qb = $this->createQueryBuilder('g');
        // $qb->orderBy('g.name', 'DESC');
        // $qb->andWhere('g.name = :name');
        // $qb->setParameter(':name', $name);

        // $query = $qb->getQuery();


        return $query->getResult();
    }

    public function findSkillbyId($id)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "SELECT s.name
            FROM App\Entity\Skill s
            JOIN App\Entity\Plant p
            WITH s.id = p.skill
            WHERE p.id = :id
            "
        )->setParameter(':id', $id);

        // $qb = $this->createQueryBuilder('g');
        // $qb->orderBy('g.name', 'DESC');
        // $qb->andWhere('g.name = :name');
        // $qb->setParameter(':name', $name);

        // $query = $qb->getQuery();


        return $query->getResult();
    }

    // public function findById($id)
    // {
    //     return $this->createQueryBuilder('q')
    //         ->innerJoin('q.tags', 't')
    //         ->andWhere('t = :tag')
    //         ->andWhere('q.isBlocked = false')
    //         ->setParameter('tag', $tag)
    //         ->getQuery()
    //         ->getResult();
    // }

    /**
     * @return Plant[] Returns an array of Plant objects
     */
    
    public function findById($id)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id = :id')
            ->setParameter(':id', $id)
            ->getQuery()
            ->getResult()
        ;
    }

    
    

    // /**
    //  * @return Plant[] Returns an array of Plant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Plant
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
