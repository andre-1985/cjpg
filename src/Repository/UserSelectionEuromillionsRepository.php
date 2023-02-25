<?php

namespace App\Repository;

use App\Entity\UserSelectionEuromillions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserSelectionEuromillions>
 *
 * @method UserSelectionEuromillions|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSelectionEuromillions|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSelectionEuromillions[]    findAll()
 * @method UserSelectionEuromillions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSelectionEuromillionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserSelectionEuromillions::class);
    }

    public function save(UserSelectionEuromillions $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UserSelectionEuromillions $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return UserSelectionEuromillions[] Returns an array of UserSelectionEuromillions objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserSelectionEuromillions
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
