<?php

namespace App\Repository;

use App\Entity\DrawEuromillions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DrawEuromillions>
 *
 * @method DrawEuromillions|null find($id, $lockMode = null, $lockVersion = null)
 * @method DrawEuromillions|null findOneBy(array $criteria, array $orderBy = null)
 * @method DrawEuromillions[]    findAll()
 * @method DrawEuromillions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DrawEuromillionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DrawEuromillions::class);
    }

    public function save(DrawEuromillions $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DrawEuromillions $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findDrawsByUserSelection(array $userSelection1, array $userSelection2)
    {
        $query = $this->createQueryBuilder('u')
            ->setParameters(
                array(
                    'userSelection1'=>$userSelection1,
                    'userSelection2'=>$userSelection2,
                )
            )
            ->where('u.ball1 IN (:userSelection1)')
            ->orWhere('u.ball2 IN (:userSelection1)')
            ->orWhere('u.ball3 IN (:userSelection1)')
            ->orWhere('u.ball4 IN (:userSelection1)')
            ->orWhere('u.ball5 IN (:userSelection1)')
            ->orWhere('u.star1 IN (:userSelection2)')
            ->orWhere('u.star2 IN (:userSelection2)')
            ->getQuery()
        ;

        return $query->getResult();
    }

    public function findDrawsByUserBallsSelection(array $userSelection)
    {
        $query = $this->createQueryBuilder('u')
            ->setParameters(
                array(
                    'userSelection'=>$userSelection
                )
            )
            ->where('u.ball1 IN (:userSelection)')
            ->orWhere('u.ball2 IN (:userSelection)')
            ->orWhere('u.ball3 IN (:userSelection)')
            ->orWhere('u.ball4 IN (:userSelection)')
            ->orWhere('u.ball5 IN (:userSelection)')
            ->getQuery()
        ;

        return $query->getResult();
    }

    public function findDrawsByUserStarsSelection(array $userSelection)
    {
        $query = $this->createQueryBuilder('u')
            ->setParameters(
                array(
                    'userSelection'=>$userSelection
                )
            )
            ->where('u.star1 IN (:userSelection)')
            ->orWhere('u.star2 IN (:userSelection)')
            ->getQuery()
        ;

        return $query->getResult();
    }

    public function findByQuery($query): array
    {
        return $this->createQueryBuilder('de')
            ->andWhere('de.drawDate LIKE :query')
            ->setParameter('query', $query)
            ->orderBy('de.drawDate', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
//    /**
//     * @return DrawEuromillions[] Returns an array of DrawEuromillions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DrawEuromillions
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
