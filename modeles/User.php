<?php
class User
{
	private $user_id;
	private $user_name;
	private $user_mail;
	private $user_password;
	private $user_active;
	private $user_id_role;
	private $user_videos = array();
	
	use HydrateObjectTrait;
	//constructeur
	public function __construct($datas = null)
	{
		if($datas != null)
		{
			$this->hydrate($datas);
		}
	}
	
	//setter
	public function setUser_id($value)
	{
		$this->user_id = $value;
	}
	public function setUser_name($value)
	{
		$this->user_name = $value;
	}
	public function setUser_mail($value)
	{
		$this->user_mail = $value;
	}
	public function setUser_active($value)
	{
		$this->user_active = $value;
	}
	public function setUser_id_role($value)
	{
		$this->user_id_role = $value;
	}
	public function setUser_password($value)
	{
		$this->user_password = md5($value);
	}
	public function setUser_videos($value)
	{
		$this->user_videos = $value;
	}

	//getter
	public function getUser_id()
	{
		return $this->user_id;
	}
	public function getUser_name()
	{
		return $this->user_name;
	}
	public function getUser_mail()
	{
		return $this->user_mail;
	}
	public function getUser_active()
	{
		return $this->user_active;
	}
	public function getUser_id_role()
	{
		return $this->user_id_role;
	}
	public function getUser_password()
	{
		return $this->user_password;
	}
	public function getUser_videos()
	{
		if(empty($this->user_videos))
		{
			if($this->getUser_id() != null)
			{
				$videos_manager = new VideoManager();
				$this->user_videos = $videos_manager->getVideosByUser($this->getUser_id());
			}
		}
		return $this->user_videos;
	}
	public function getUrl()
	{
		return 'index.php?controleur=user&action=details&user_id='.$this->getUser_id();
	}
}

?>
