<?php
require "config/autoload.php";
$categoryManager = new CategoryManager();
$categoryByID = $categoryManager->getCategoryById(2);


$newCategory = $categoryManager->createCategory('Cinema');
var_dump($categoryManager->getAllCategories());
?>