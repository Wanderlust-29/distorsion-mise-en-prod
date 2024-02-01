<?php
    class AbtractManager
    {
        protected PDO $db;
        
        public function __construct() {
            $host = "db.3wa.io";
            $port = "3306";
            $dbname = "bricerubeaux_blog_poo";
            $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
            
            $user = "bricerubeaux";
            $password = "dfcef705866daf59347bbd9795fbe016";
            $this->db = new PDO($connexionString, $user, $password);
        }
    }