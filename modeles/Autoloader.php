<?php 
class Autoloader
{
	public static function register()
	{
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}
	public static function autoload($class_name)
	{
		if(file_exists("modeles/".$class_name.".php"))
		{
			require("modeles/".$class_name.".php");
		}
		else if(file_exists("controleurs/".$class_name.".php"))
		{
			require("controleurs/".$class_name.".php");
		}
	}
}
?>