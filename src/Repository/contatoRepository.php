<?php

namespace App\Entity\Repository;

use App\Entity\contato;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method contato|null find($id, $lockMode = null, $lockVersion = null)
 * @method contato|null findOneBy(array $criteria, array $orderBy = null)
 * @method contato[] findAll()
 * @method contato[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class contatoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, contato::class);
    }
}
