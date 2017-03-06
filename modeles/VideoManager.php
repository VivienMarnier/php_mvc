<?php
//classe passerelle entre les objets video et la BD // 
class VideoManager extends DatabaseManager
{
	//fonction qui récupère les informations d'une vidéo en fonction de son id et retourne un objet video 
	public function getVideo($video_id)
	{
		$prepared = $this->db->prepare('SELECT * FROM `video` WHERE `video_id` = :video_id');
		if($prepared->execute(array(':video_id' => $video_id)))
		{
			$row = $prepared->fetch();
			$count = $prepared->rowCount();
			if($count > 0)
			{
				$video = new Video($row);
				return $video;
			}
			else
			{
				throw new Exception('La vidéo '.$user_id. ' n\'existe pas.');
			}
		}
	}
	//fonction qui récupère et renvoie les informations de toutes les vidéos en fonction d'une recherche (sur le tire) 
	//retourn un nombre limite ou non de vidéos en fonction du paramète $limit	
	public function getVideos($research = null, $limit = null)
	{
		$req = "SELECT * FROM video INNER JOIN `user` ON video.video_user_id = user.user_id";
		$tab_params = array();
		
		if($research != null)
		{
			$req .= " AND `video_title` LIKE ?";
			$tab_params[] = "%".$research."%"; 
		}
		$req .= " ORDER BY `video_date_upload` DESC";
		if($limit != null)
		{
			$req .= " LIMIT " .intval($limit);
		}
		$req = $this->db->prepare($req);
		$req->execute($tab_params);
		$videos = array();
		$result = $req->fetchAll();
		foreach($result as $row_datas)
		{
			$video = new Video($row_datas);
			$videos[] = $video;
		}
		return $videos;
	}
	//fonction qui récupère toutes les vidéos d'un user
	public function getVideosByUser($video_user_id)
	{
		$prepared = $this->db->prepare('SELECT * FROM `video` WHERE `video_user_id` = :video_user_id AND `video_active` = 1');
		if($prepared->execute(array('video_user_id' => $video_user_id)))
		{
			$result = $prepared->fetchAll();
			$videos = array();
			foreach($result as $row_datas)
			{
				$video = new Video($row_datas);
				$videos[$video->getVideo_id()] = $video;
			}
			return $videos;
		}
		else
		{
			//exception ...
		}		
	}
}

?>