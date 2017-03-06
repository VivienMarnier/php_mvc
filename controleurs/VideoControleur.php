<?php
class VideoControleur
{
	public function videoAction()
	{
		if(isset($_GET['video_id']))
		{
			$id = Tools::check_param_id($_GET['video_id']);
			//récupération d'un tableau de vidéos
			$video_manager = new VideoManager();
			$video = $video_manager->getVideo($_GET['video_id']);
			$video_author = $video->getAuthor();
			//affichage de la vue
			require('vues/vue_video.php');
		}
		else
		{
			throw new Exception('Il n\'y a pas d\'identifiant sur la vidéo demandée');
		}
	}
}
?>