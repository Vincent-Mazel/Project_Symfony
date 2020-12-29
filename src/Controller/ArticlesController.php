<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\ArticleEntity;
use App\Form\ArticleEntityType;
use Symfony\Component\Validator\Constraints\DateTime;

class ArticlesController extends AbstractController
{
    /*
        Dans un monde idéal, nous aurions dû uniquement demander à l'utilisateur de renseigner le titre et le contenu de l'article, et l'url alias et 
        la date devraient être renseignés automatiquement dans le code. Cependant, nous n'avons honnêtement pas le temps de réaliser ses fonctionnalités
        car nous devrons rendre d'autres projets et réviser les partiels, mais nous sommes conscients qu'il aurait été possible d'avoir un meilleur résultat.
    */


     /**
     * @Route("/newArticle", name="newArticle")
     */
    public function createArticle(Request $request): Response
    {
        $article = new ArticleEntity();

        $form = $this->createForm(ArticleEntityType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($article);

            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('blog/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/editArticle", name="editArticle")
     */
    public function editArticle(Request $request, ArticleEntity $articleEntity): Response
    {
        $form = $this->createForm(ArticleEntityType::class, $articleEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('blog/edit.html.twig', [
            'article' => $articleEntity,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}", name="deleteArticle", methods={"DELETE"})
     */
    public function deleteArticle(Request $request, ArticleEntity $articleEntity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$articleEntity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->remove($articleEntity);

            $entityManager->flush();
        }

        return $this->redirectToRoute('homepage');
    }
}
