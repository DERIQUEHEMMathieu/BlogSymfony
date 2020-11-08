<?php 
namespace App\Services;

use App\Entity\Article;

class SwearCleaner
{
    // mots interdits
    const SWEAR = [
        "lorem", 
        "dolor", 
        "provident", 
        "velit",
        "illum",
        "quod"
    ];

    public function cleanSwear(Article $article): Article
    {
        // tableau vide qui attend de recevoir le post avec les mots criptés
        $new_post = [];
        // explode pour eclaté les mots et pouvoir boucler dessus
        $words = explode(" ", $article->getContent());
        foreach($words as $word)
        {
            foreach(self::SWEAR as $swear)
            {
                if($word === $swear)
                {
                    $word = "*****";
                }
            }
            
            // insere les mots criptés dans le tableau new_post
            array_push($new_post, $word);
        }
        // imlode pour reconstruire le message
        $article->setContent(implode(" ", $new_post));

        return $article;
    }
}