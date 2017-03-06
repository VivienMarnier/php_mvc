<?php
class AccueilControleur
{
	public function indexAction()
	{
		//récupération d'un tableau de vidéos
		$video_manager = new VideoManager();
		$videos = $video_manager->getVideos(null,15);
		//affichage de la vue
		require('vues/vue_accueil.php');
	}
}
?>