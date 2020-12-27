<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticleEntityRepository;

class BlogController extends AbstractController {
    /**
     * @Route("/", name="homepage")
     */
    public function index(ArticleEntityRepository $articleEntityRepository): Response {

        $firstArticles = $articleEntityRepository->findAll();
        
        return $this->render('blog/index.html.twig', [
            //'articles' => $firstArticles,
            'message' => 'Page d\'accueil'
        ]);
    }

    /**
     * @Route("/post/{id}", name="post")
     */
    public function post($id/*ArticleRepository $articleRepository*/): Response {

        //$article = $articleRepository->find($id);

        return $this->render('blog/article.html.twig', [
            //'article' => $article,
            'id' => $id
        ]);
    }
}