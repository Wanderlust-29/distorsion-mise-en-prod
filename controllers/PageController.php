<?php
    class PageController
    {
        public function __construct() {

        }

        public function home() : array {
            $route  = "home";
            $postManager = new PostManager();
            $posts = $postManager->getAllPosts(1);
            return $posts;
        }

        public function categoryShow() : array {
            
            $categories = new CategoryManager();
            $categories = $categories->getAllCategories();

            return $categories;
 
        }

        public function categoryCreate() : void {
            if(isset($_POST['message'])) {
                $post = new Post($_POST['message'], DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')), 1);
                $postManager = new PostManager();
                $postManager->getCreatePost($post);
                header("Location: index.php");
            } else {
                header("Location: index.php");
            }
            
        }

        public function channelShow() : array {
            $channels = new ChannelManager();
            $channels = $channels->getAllChannels();

            return $channels;
        }

        public function channelCreate() : void {
            if(isset($_POST['message'])) {
                $post = new Post($_POST['message'], DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')), 1);
                $postManager = new PostManager();
                $postManager->getCreatePost($post);
                header("Location: index.php");
            } else {
                header("Location: index.php");
            }
            
        }

        public function postCreate() : void {
            if(isset($_POST['message'])) {
                $post = new Post($_POST['message'], DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')), 1);
                $postManager = new PostManager();
                $postManager->getCreatePost($post);
                header("Location: index.php");
            } else {
                header("Location: index.php");
            }
            
        }

        public function about() : string {
            $route  = "espace";
            return $route;

        }

        public function notFound() : void {
            $route  = "404";
            require "templates/layout.phtml";
        }
    }