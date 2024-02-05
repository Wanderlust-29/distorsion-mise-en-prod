<?php

class PostManager extends AbstractManager {

	public function getAllPosts(int $id) : array
	{
		$query = $this->db->prepare('SELECT * FROM posts WHERE id_channel = :id');
		$parameters = [
			'id' => $id,
		];
		$query->execute($parameters);
		$postDB = $query->fetchAll(PDO::FETCH_ASSOC);
		$postsTab = [];
		foreach($postDB as $postFor) {
			$postTab = new Post($postFor['content'], DateTime::createFromFormat('Y-m-d H:i:s', $postFor["created_at"]), $postFor['id_channel']);
            $postTab->setId($postFor['id']);
			$postsTab[] = $postTab;
		}
		return $postsTab;
	}

	public function createPost(Post $post) : void
	{
		$query = $this->db->prepare('INSERT INTO posts (content, created_at, id_channel) VALUES (:content, :createdAt, :idChannel)');
		
		$parameters = [
			'content' => $post->getContent(),
			'createdAt' => date('Y-m-d H:i:s'),
			'idChannel' => $post->getIdChannel(),
		];
		$query->execute($parameters);
	}


}