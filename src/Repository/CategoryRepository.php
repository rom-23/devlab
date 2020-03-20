<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * @return Query
     */
    public function findAllVisibleQuery(): Query
    {
           return $this -> createQueryBuilder( 'p' )
               -> getQuery();
    }

    /**
     * @return Category[] Returns an array of Last Property objects
     */
    public function findLatest(): array
    {
        return $this -> createQueryBuilder( 'p' )
            -> setMaxResults( 4 )
            -> getQuery()
            -> getResult();
    }

}
