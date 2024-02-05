<?php
    class Post
    {
        private ?int $id = null;
        public function __construct(private string $content, private datetime $created_at, private int $idChannel) {
            
        }
        
        public function getId() : ?int {
            return $this->id;
        } 
        
        public function setId(?int $id) : void {
            $this->id = $id;
        }

        public function getIdChannel() : int {
            return $this->idChannel;
        } 
        
        public function setIdChannel(int $idChannel) : void {
            $this->idChannel = $idChannel;
        }
        
        public function getContent() : string {
            return $this->content;
        }
        
        public function setContent(string $content) : void {
            $this->content = $content;
        }
        
        public function getCreatedAt() : datetime {
            return $this->created_at;
        }
        
        public function setCreatedAt(datetime $created_at) : void {
            $this->created_at = $created_at;
        }
    }