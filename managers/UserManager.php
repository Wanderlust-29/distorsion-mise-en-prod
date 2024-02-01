<?php

class UserManager extends AbstractManager {

	public function getAllUsers() : array
	{
		$query = $this->db->prepare('SELECT * FROM users');
		$query->execute();
		$userDB = $query->fetchAll(PDO::FETCH_ASSOC);
		$usersTab = [];
		foreach($userDB as $userFor) {
			$userTab = new User($userFor['id'], $userFor['username'], $userFor['first_name'], $userFor['last_name'], $userFor['email']);
			$usersTab[] = $userTab;
		}
		return $usersTab;
	}

	public function getUserById(int $id) : User
	{
		$query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
		$parameters = [
			'id' => $id,
		];
		$query->execute($parameters);
		$userDB = $query->fetch(PDO::FETCH_ASSOC);
		$user = new User($userDB['id'], $userDB['username'], $userDB['first_name'], $userDB['last_name'], $userDB['email']);
		return $user;
	}

	public function createUser(User $user) : User
	{
		$query = $this->db->prepare('INSERT INTO users (username, first_name, last_name, email) VALUES (:username, :firstName, :lastName, :email)');
		$parameters = [
			'username' => $user->getUsername(),
			'firstName' => $user->getFirstName(),
			'lastName' => $user->getLastName(),
			'email' => $user->getEmail(),
		];
		$last = $query->execute($parameters);
		
		$user = new User($last->lastInsertId() , $user->getUsername(), $user->getFirstName(), $user->getLastName(), $user->getEmail());
		return $user;
	}

	public function updateUser(User $user) : User
	{
		// update the user in the database

		// return it
	}

	public function deleteUser(int $id) : array
	{
		$query = $this->db->prepare('DELETE FROM users WHERE id = :id');
		$parameters = [
			'id' => $id,
		];
		$query->execute($parameters);
		return $this->getAllUsers();
	}
}