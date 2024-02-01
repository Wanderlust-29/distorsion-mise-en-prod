<?php

class PostManager extends AbstractManager {

	public function getAllPosts() : array
	{
		$query = $this->db->prepare('SELECT * FROM posts');
		$query->execute();
		$postDB = $query->fetchAll(PDO::FETCH_ASSOC);
		$postsTab = [];
		foreach($postDB as $postFor) {
			$postTab = new Post($postFor['content'], DateTime::createFromFormat('Y-m-d H:i:s', $postFor["created_at"]));
            $postTab->setId($postFor['id']);
			$postsTab[] = $postTab;
		}
		return $postsTab;
	}

}