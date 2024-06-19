<?php

namespace App\Repository;

use App\Entity\Block;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Block>
 */
class BlockRepository /*extends ServiceEntityRepository*/
{

    private int $index;
    private string $previousHash;
    private string $hash;
    private int $timestamp;
    private string $data;


    //    /**
    //     * @return Block[] Returns an array of Block objects
    //     */
//        public function findByExampleField($value): array
//        {
//            return $this->createQueryBuilder('b')
//                ->andWhere('b.exampleField = :val')
//                ->setParameter('val', $value)
//                ->orderBy('b.id', 'ASC')
//                ->setMaxResults(10)
//                ->getQuery()
//                ->getResult()
//            ;
//        }

    //    public function findOneBySomeField($value): ?Block
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
