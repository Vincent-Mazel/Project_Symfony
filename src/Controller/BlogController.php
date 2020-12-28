<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticleEntityRepository;
use App\Entity\ArticleEntity;

class BlogController extends AbstractController {
    /**
     * @Route("/", name="homepage")
     */
    public function index(ArticleEntityRepository $articleEntityRepository): Response {

        $firstArticles = array_chunk($articleEntityRepository->findBy(array(), array('id' => 'DESC'), 10), 5);

        return $this->render('blog/index.html.twig', [
            'articles' => $firstArticles
        ]);
    }

    /**
     * @Route("/post/{url_alias}", name="post")
     */
    public function post(ArticleEntity $articleEntity): Response {

        return $this->render('blog/article.html.twig', [
            'article' => $articleEntity
        ]);
    }
}