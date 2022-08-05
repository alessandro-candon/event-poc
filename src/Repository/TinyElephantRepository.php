<?php

namespace App\Repository;

use App\Entity\TinyElephant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TinyElephant>
 *
 * @method TinyElephant|null find($id, $lockMode = null, $lockVersion = null)
 * @method TinyElephant|null findOneBy(array $criteria, array $orderBy = null)
 * @method TinyElephant[]    findAll()
 * @method TinyElephant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TinyElephantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TinyElephant::class);
    }

    public function add(TinyElephant $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TinyElephant $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
