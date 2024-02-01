<?php
    class PageController
    {
        public function __construct() {

        }

        public function home() : void {
            $route  = "home";
            $postManager = new PostManager();
            $posts = $postManager->getAllPosts();
            require "templates/layout.phtml";
        }

        public function about() : void {
            $route  = "espace";
            require "templates/layout.phtml";
        }

        public function notFound() : void {
            $route  = "404";
            require "templates/layout.phtml";
        }
    }