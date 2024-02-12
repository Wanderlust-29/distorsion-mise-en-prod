<?php

class Channel
{

    private ? int $id = null; 

    public function __construct(private string $channelname, private int $idcategory){

    }

    public function getId() : int 
    {
        return $this->id;
    }

    public function setId(string $id) : void
    {
        $this->id = $id;
    }

    public function getChannelName() : string 
    {
        return $this->channelname;
    }

    public function setChannelName(string $channelname) : void
    {
        $this->channelname = $channelname;
    }

    public function getIdCategory() : int 
    {
        return $this->idcategory;
    }

    public function setIdCategory(string $idcategory) : void
    {
        $this->idcategory = $idcategory;
    }
   

}

?>