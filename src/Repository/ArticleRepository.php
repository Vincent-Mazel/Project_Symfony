<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    
    public function findFirstArticles($nbArticles) {
        return $this->getEntityManager()
            ->createQuery('
                SELECT TOP :nbArticles * 
                FROM ARTICLE
            ')
            ->setParameter('nbArticles', $nbArticles)    
            ->getResult();
    }


    public function findArticleByID($id) {
        return $this->getEntityManager()
            ->createQuery('
                SELECT * 
                FROM ARTICLE 
                WHERE ID > :id
            ')
            ->setParameter('id', $id)    
            ->getResult();
    }
}
