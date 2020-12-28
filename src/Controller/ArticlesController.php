<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ArticleEntity;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index(): Response
    {
        return $this->render('articles/index.html.twig', [
            'controller_name' => 'ArticlesController',
        ]);
    }


     /**
     * @Route("/newArticle", name="newArticle")
     */
    public function createArticle(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $article = new ArticleEntity();
        $article->setTitle('COVID-2020, COVID-2021 et COVID-2022 déjà prévus ?');
        $article->setUrlAlias('covid');
        $article->setIntro("Après avoir mis en place le COVID-19, nous avons eu l'occasion de discuter avec les scénaristes de l'année 2020 qui auraient déjà anticipé avec l'arrivée de nouveaux COVID pour les années à venir.");
        $article->setContent('qsdpfijqsijfqdsjflqdsjfqdskl');
        $article->setPublished(\DateTime::createFromFormat("d/m/Y","22/11/2020"));
        

        // tell Doctrine you want to (eventually) save the ArticleEntity (no queries yet)
        $entityManager->persist($article);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$article->getId());
    }


    /**
     * @Route("/editArticle", name="editArticle")
     */
    public function editArticle(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $article = new ArticleEntity();
        $article->setTitle('COVID-2020, COVID-2021 et COVID-2022 déjà prévus ?');
        $article->setUrlAlias('covid');
        $article->setIntro("Après avoir mis en place le COVID-19, nous avons eu l'occasion de discuter avec les scénaristes de l'année 2020 qui auraient déjà anticipé avec l'arrivée de nouveaux COVID pour les années à venir.");
        $article->setContent('qsdpfijqsijfqdsjflqdsjfqdskl');
        $article->setPublished(\DateTime::createFromFormat("d/m/Y","22/11/2020"));
        

        // tell Doctrine you want to (eventually) save the ArticleEntity (no queries yet)
        $entityManager->persist($article);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$article->getId());
    }


    /**
     * @Route("/deleteArticle", name="deleteArticle")
     */
    public function deleteArticle(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $article = new ArticleEntity();
        $article->setTitle('COVID-2020, COVID-2021 et COVID-2022 déjà prévus ?');
        $article->setUrlAlias('covid');
        $article->setIntro("Après avoir mis en place le COVID-19, nous avons eu l'occasion de discuter avec les scénaristes de l'année 2020 qui auraient déjà anticipé avec l'arrivée de nouveaux COVID pour les années à venir.");
        $article->setContent('qsdpfijqsijfqdsjflqdsjfqdskl');
        $article->setPublished(\DateTime::createFromFormat("d/m/Y","22/11/2020"));
        

        // tell Doctrine you want to (eventually) save the ArticleEntity (no queries yet)
        $entityManager->persist($article);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$article->getId());
    }
}
