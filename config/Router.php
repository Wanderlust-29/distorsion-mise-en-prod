<?php
    class Router 
    {
        public function __construct() {

        }

        public function handleRequest(array $get, array $session) : void {
            $pageController = new PageController;
            if(isset($get['route']) && $get['route'] === "about") {
                $route = $pageController->about();
            } else if(isset($get['route']) && $get['route'] === "postMessage") {
                $pageController->postCreate();
            } else if(!isset($get['route'])) {
                $posts = $pageController->home();
                $categories = $pageController->categoryShow();
                $channels = $pageController->channelShow();
                

            }  else {
                $pageController->notFound();
            }
            require "templates/layout.phtml";
        }
    }