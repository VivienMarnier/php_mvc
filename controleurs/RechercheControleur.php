<?php
class RechercheControleur
{
	public function indexAction()
	{
		if(isset($_GET['research']))
		{
			//récupération d'un tableau de vidéos
			$videos_manager = new VideoManager();
			$videos = $videos_manager->getVideos($_GET['research'],5);
			$nb_pages = Tools::calculate_pagination(count($videos),5);
			
			$videos = Tools::put_video_youtube_id_in_array($videos);
			//affichage de la vue
			require('vues/recherche.php');
		}
	}
}
?>