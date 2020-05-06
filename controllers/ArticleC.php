<?php

require_once("Renderer.php");

class ArticleC {


        public function showAll()
        {

            $pageTitle = 'Accueil';
            Renderer::render('home', compact('pageTitle'));
        }

        public function showTop()
        {

            $pageTitle = 'Top';
            Renderer::render('top', compact('pageTitle'));
        }

        public function show()
        {


            $pageTitle = 'Nom de l\'article';
            Renderer::render('article', compact('pageTitle'));
        }

}