<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class APIController extends AbstractController
{
    /**
     * @Route("/api/get_articles", name="api_call")
     */
    public function index(HttpClientInterface $httpClient): Response
    {
        $response = $httpClient->request('GET', 'http://medouaz-blog.herokuapp.com/api/posts');

        $articles = $response->getContent();

        $articles = $response->toArray();

        return $this->render('blog/api_Articles.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/api/posts", name="api_send",  methods={"GET"})
     */
    public function sendPosts(ArticleEntityRepository $articleEntityRepository): JsonResponse
    {
        $articles = $articleEntityRepository->findBy(array(), array('id' => 'DESC'), 5);

        $jsonArticles = [];

        foreach ($articles as $article) {
            $jsonArticles[] = [
                'id' => $article->getId(),
                'title' => $article->getTitle(),
                'urlAlias' => $article->getUrlAlias(),
                'intro' => $article->getIntro(),
                'content' => $article->getContent(),
                'published' => $article->getPublished(),
            ];
        }

        return new JsonResponse($jsonArticles, Response::HTTP_OK);
    }
}
