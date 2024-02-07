<?php

class ChannelManager extends AbstractManager
{
    
    public function __construct()
    {

        parent::__construct();

    }

    public function getAllChannels() : ? array
    {
        

        $query = $this->db->prepare('SELECT *  FROM channels');
        $query->execute();
        $channels = $query->fetchAll(PDO::FETCH_ASSOC);

        $listchannel = [];

        foreach ($channels as $channel) {
            
            $list = new Channel($channel['channel_name'],$channel['id_category']);
            $list->setId($channel['id']);
            $listchannel[] = $list;
        }
        return $listchannel;

    }

    public function findOne(int $id_category) : ? array
    {
        
            $query = $this->db->prepare('SELECT * FROM channels WHERE id = :id_category');
            $parameters = [
                'id_category' => $id_category
                ];
            
                $query->execute($parameters);
                $channels = $query->fetchAll(PDO::FETCH_ASSOC);
                return $channels ;
    

    }

    public function create(string $channelName, int $idCategory) : void
    {       
       /* Lors du INSERT à ne pas mettre les colonne entre double quote ou quote simple.
        Ne pas mettre les valeurs du VALUE entre backquote*/
        $query = $this->db->prepare("INSERT INTO channels (channel_name, id_category) VALUES (:channel_name, :idCategory)");
        $parameters = [
            'channel_name' => $channelName,
            'idCategory' => $idCategory,
            ];
        $query->execute($parameters);
    }

    public function update() : void
    {
        if(isset($_POST))
        {
       
           $channelname = $_POST['channel_name'];

       
       
           
          /* Lors du INSERT à ne pas mettre les colonne entre double quote ou quote simple.
           N pas mettre les valeurs du VALUE entre backquote*/
           $query = $this->db->prepare("UPDATE channels SET channel_name = :channel_name");
           $parameters = [
               'channel_name' => $channelname
               ];
           $query->execute($parameters);

           header("Location: index.php?route=chat");
           die();
       
        }

    }

    public function delete() : void
    {
        if(isset($_POST["channel_name"]))
        {
            $channelname = $_POST['channel_name'];

            $query = $this->db->prepare('DELETE FROM channels WHERE channel_name = :channel_name');
            $parameters = [
                'channel_name' => $channelname
            ];
            $query->execute($parameters);
            $delchannel = $query->fetch(PDO::FETCH_ASSOC);

            header("Location: index.php?route=chat");
            die();
        }

    }

    private function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}

?>
