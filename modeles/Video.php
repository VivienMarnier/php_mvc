<?php
class Video
{
	private $video_id;
	private $video_url;
	private $video_title;
	private $video_date_upload;
	private $video_active;
	private $video_youtube_id;
	private $video_user_id;
	
	use HydrateObjectTrait;
	//constructeur
	public function __construct($datas = null)
	{
		if($datas != null)
		{
			$this->hydrate($datas);
		}
		if($this->getVideo_url() != null)
		{
			$this->video_youtube_id = Tools::get_video_youtube_id($this->getVideo_url());
		}
	}
	
	//setter
	public function setVideo_id($value)
	{
		$this->video_id = $value;
	}
	public function setVideo_url($value)
	{
		$this->video_url = $value;
	}
	public function setVideo_title($value)
	{
		$this->video_title = $value;
	}
	public function setVideo_date_upload($value)
	{
		$this->video_date_upload = $value;
	}
	public function setVideo_active($value)
	{
		$this->video_active = $value;
	}
	public function setVideo_youtube_id($value)
	{
		$this->video_youtube_id = $value;
	}
	public function setVideo_user_id($value)
	{
		$this->video_user_id = $value;
	}
	
	//getter
	public function getVideo_id()
	{
		return $this->video_id;
	}
	public function getVideo_url()
	{
		return $this->video_url;
	}
	public function getVideo_title()
	{
		return $this->video_title;
	}
	public function getVideo_date_upload()
	{
		return $this->video_date_upload;
	}
	public function getVideo_active()
	{
		return $this->video_active;
	}
	public function getVideo_youtube_id()
	{
		return $this->video_youtube_id;
	}
	public function getVideo_user_id()
	{
		return $this->video_user_id;
	}
	public function getLink()
	{
		return 'index.php?controleur=video&action=video&video_id='.$this->getVideo_id();
	}
	public function getThumbnailLink()
	{
		return 'http://img.youtube.com/vi/'.$this->getVideo_youtube_id().'/mqdefault.jpg';
	}
	public function getIframeLink()
	{
		return 'https://www.youtube.com/embed/'.$this->getVideo_youtube_id();
	}
	
	public function getAuthor()
	{
		$user_manager = new UserManager();
		return $user_manager->getUser($this->video_user_id);
	}
}

?>