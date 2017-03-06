<?php
class UserControleur
{	
	public function detailsAction()
	{
		if(isset($_GET['user_id']))
		{
		$id = Tools::check_param_id($_GET['user_id']);
		
		//récupération des informations de l'utilisateur
		$user_manager = new UserManager();
		$user = $user_manager->getUser($id);
		
		$videos = $user->getUser_videos();

		require('vues/details_user.php');
		}
		else
		{
			throw new Exception('Il n\'y a pas d\'identifiant pour le profil utilisateur demandé');
		}
	}
}
?>