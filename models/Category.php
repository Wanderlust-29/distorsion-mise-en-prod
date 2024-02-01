<?php

class Category {
    private ?int $id = null;
    
    public function __construct(private string $categoryName){

    }
        
    //GETTERS
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getCategoryName() : string
    {
        return $this->categoryName;
    }

    //SETTERS
    public function setId (int $id) : void
    {
        $this->id = $id;
    }
    public function setCategoryName (string $categoryName) : void
    {
        $this->categoryName = $categoryName;
    }

}
?>
