<?php

namespace App\Repository;

use App\Entity\Post;
use App\Entity\Categorie;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findByCategory(Categorie $category)
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.categories', 'c')
            ->andWhere('c.id = :categoryId')
            ->setParameter('categoryId',$category->getId())
            ->getQuery()
            ->getResult()
        ;
    }

    public function hydrateFindAll()
    {
        $qb   = $this->createQueryBuilder('p');

        $qb->addSelect('p','c','u')
            ->innerJoin('p.categories', 'c')
            ->innerJoin('p.author', 'u')
        ;
        $resultArray = $qb->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        return $resultArray;
    }

    public function hydratedFindOnly3Posts(int $limit = 3, $orderBy = 'DESC')
    {
        return $this->createQueryBuilder('p')
            ->addSelect('p','c','u')
            ->innerJoin('p.categories', 'c')
            ->innerJoin('p.author', 'u')
            ->setFirstResult(0)
            ->setMaxResults($limit)
            ->orderBy('p.id', $orderBy)
            ->getQuery()->getResult()
        ;
    }

    public function findAllExceptThis(Post $post)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id != :postId')
            ->setParameter('postId', $post->getId())
            ->getQuery()
            ->execute();
    }

//    /**
//     * @return Post[] Returns an array of Post objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Post
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
