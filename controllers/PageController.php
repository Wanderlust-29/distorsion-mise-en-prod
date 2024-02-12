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
        public function channelShow() :  array {
            $channels = new ChannelManager();
            $channels = $channels->getAllChannels();
        
            return $channels;
        }

        public function channelForm() : string {
            $route  = "channel-form";
            return $route;
        }

        public function channelCreate() : void {
            if(isset($_POST['channel'])) {
                $channelManager = new ChannelManager();
                $channelManager->create($_POST['channel'], $_GET['id']);
                header("Location: index.php");
            } else {
                header("Location: index.php");
            }
            
        }

        /***************** Post **********************/
        public function channel() : array {
            $postManager = new PostManager();
            $posts = $postManager->getAllPosts($_GET['id']);
            return $posts;
        }

        public function postCreate() : void {
            if(isset($_POST['message'])) {
                $post = new Post($_POST['message'], DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')), $_GET['id']);
                $postManager = new PostManager();
                $postManager->createPost($post);
                header("Location: index.php?route=channel&id=".$_GET['id']);
            } else {
                header("Location: index.php".$_GET['id']);
            }   
        }

        /***************** Other **********************/
        public function home() : array {
            //liste des channels
            $channels = new ChannelManager();
            $channels = $channels->getAllChannels();
            //on affiche les posts du dernier channels
            $lastChannel = end($channels);
            $idLastChannel = $lastChannel->getId();
            $postManager = new PostManager();
            $posts = $postManager->getAllPosts($idLastChannel);
            return $posts;
        }

        public function about() : string {
            $route  = "about";
            return $route;
        }

        public function notFound() : string {
            $route  = "404";
            return $route;
        }
    }