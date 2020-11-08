<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;
use Doctrine\ORM\Query\Expr\Math;

class ArticleFixtures extends Fixture {
    public function load(ObjectManager $manager) {
        for($i = 1; $i <= 20; $i ++ ) {
            $article = new Article();
            $article->setTitle("Titre de l'article $i")
                ->setContent("<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum nihil provident iusto sapiente consectetur velit veritatis officia facere. Odio distinctio ipsum ad facilis saepe illum cupiditate id officia quod exercitationem.</p>")
                ->setAuthorName("<p>Moi-même</p>")
                ->setDate(new \DateTime())
                ->setCategory("Info")
                ->setView(rand(1, 100));
        }
    }
}
