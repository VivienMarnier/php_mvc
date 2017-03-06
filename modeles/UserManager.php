<?php
//classe passerelle entre les objets user et la BD // 
class UserManager extends DatabaseManager
{
	//fonction qui récupère les informations d'un utilisateur en fonction de son id et retourne un objet user
	public function getUser($user_id)
	{
		$prepared = $this->db->prepare('SELECT `user_id`,`user_name`,`user_mail`,`user_id_role`,`user_active` FROM `user` WHERE `user_id` = :user_id');
		if($prepared->execute(array('user_id' => $user_id)))
		{
			$row = $prepared->fetch();
			$count = $prepared->rowCount();
			if($count > 0)
			{
				$user = new User($row);
				return $user;
			}
			else
			{
				throw new Exception('L\'utilisateur '.$user_id. ' n\'existe pas.');
			}
		}
	}
	//fonction qui retourne un tableau de tous les objets utilisateurs 
	public function getUsers()
	{
		$users = array();
		$req = $prepared = $this->db->prepare('SELECT `user_id`,`user_name`,`user_mail`,`user_id_role`,`user_active` FROM `user`');
		if($req->execute())
		{	
			$result = $req->fetchAll();
			foreach($result as $row_datas)
			{
				$user = new User($row_datas);
				
				$users[] = $user;
			}
		}
		return $users;
	}
	//fonction qui enregistre les informations de l'objet user en BD
	public function addUser($user)
	{
		$prepared = $this->db->prepare('INSERT INTO `user` (`user_name`,`user_mail`,`user_password`) VALUES(?,?,?)');
		$isDone = $prepared->execute(array($user->getUser_name(),$user->getUser_mail(),$user->getUser_password()));
		return $isDone;
	}
	//fonction qui met à jour les informations de l'objet user en BD
	public function updateUser($user)
	{
		$prepared = $this->db->prepare('UPDATE `user` SET `user_name`= :user_name,`user_mail`= :user_mail WHERE `user_id` = :user_id');
		$prepared->bindValue(':user_name',$user->getUser_name());
		$prepared->bindValue(':user_mail',$user->getUser_mail());
		$prepared->bindValue(':user_id',$personnage->getUser_id());
		$isDone = $prepared->execute();
		return $isDone;
	}
	//fonction qui désactive le compte utilisateur de l'objet user en BD
	public function deleteUser($user)
	{
		$prepared = $this->db->prepare('UPDATE `user` SET `user_active`= 0 WHERE `user_id` = :id');
		$isDone = $prepared->execute(array($user->getUser_id()));
		return $isDone;
	}
}

?>