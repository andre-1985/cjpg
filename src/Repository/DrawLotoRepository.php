<?php

namespace App\Repository;

use App\Entity\DrawLoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DrawLoto>
 *
 * @method DrawLoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method DrawLoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method DrawLoto[]    findAll()
 * @method DrawLoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DrawLotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DrawLoto::class);
    }

    public function save(DrawLoto $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DrawLoto $entity, bool $flush = false): void
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
            ->orWhere('u.luckyNumber IN (:userSelection2)')
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

    public function findDrawsByUserLuckyNumbersSelection(array $userSelection)
    {
        $query = $this->createQueryBuilder('u')
            ->setParameter('userSelection', $userSelection)
            ->where('u.luckyNumber IN (:userSelection)')
            ->getQuery()
        ;

        return $query->getResult();
    }

//    /**
//     * @return DrawLoto[] Returns an array of DrawLoto objects
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

//    public function findOneBySomeField($value): ?DrawLoto
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
