<?php

namespace App\Controller;

use App\Entity\Article;
use App\Services\SwearCleaner;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        // Récupération articles
        $article_repo = $this->getDoctrine()->getRepository(Article::class);

        // findAll() methode repository
        $articles = $article_repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/article/{id}", name="article")
     */
    public function article(int $id): Response
    {
        $article_repo = $this->getDoctrine()->getRepository(Article::class);
        $article = $article_repo->find($id);

        $swear_cleaner = new SwearCleaner();
        $article = $swear_cleaner->cleanSwear($article);
        return $this->render('blog/article.html.twig', ['article' => $article]);
    }
}
