<?php
    class PageController
    {
        public function __construct() {

        }

        /***************** Category **********************/
        public function categoryShow() : array {
            
            $categories = new CategoryManager();
            $categories = $categories->getAllCategories();
            return $categories;
        }

        public function categoryForm() : string {
            $route  = "category-form";
            return $route;
        }

        public function categoryCreate() : void {
            if(isset($_POST['category'])) {
                $categoryManager = new CategoryManager();
                $categoryManager->createCategory($_POST['category']);
                header("Location: index.php");
            } else {
                header("Location: index.php");
            }  
        }

        /***************** Channel **********************/
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

        /***************** Post **********************/
        public function home() : array {
            $postManager = new PostManager();
            $posts = $postManager->getAllPosts(1);
            return $posts;
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

        /***************** Other **********************/
        public function about() : string {
            $route  = "espace";
            return $route;
        }

        public function notFound() : string {
            $route  = "404";
            return $route;
        }
    }