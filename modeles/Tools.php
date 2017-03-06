<?php 
class Tools
{
	public static function check_param_id($id_to_check)
	{
		$id = intval($id_to_check);
		if(($id != 0) && (is_int($id)))
		{
			return $id;
		}
		else
		{
			throw new Exception('L\'identifiant est incorrect');	
		}
	}
	//fonction qui permet d'extraire l'id youtube d'une video depuis son url youtube
	public static function get_video_youtube_id($video_url)
	{
		$tab = explode("=",$video_url);
		return $tab[1];
	}
	public static function put_video_youtube_id_in_array($videos)
	{
		$videos_updated = array();
		foreach($videos as $video)
		{
			$video->SetVideo_youtube_id(self::get_video_youtube_id($video->getVideo_url()));
			$videos_updated[$video->GetVideo_id()] = $video;
		}
		return $videos_updated;
	}
	public static function calculate_pagination($nb_items,$page_size)
	{
		$nb_pages = $nb_items / $page_size;
		return ceil($nb_pages);
	}
}
?>