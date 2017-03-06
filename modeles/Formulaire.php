<?php
class Formulaire
{
	private static $balise_hab = "p";
	protected $data;
	protected $action;
	protected $method;
	protected $render;
	
	public function __construct($action,$method,$data = array())
	{
		$this->action = $action;
		$this->method = $method;
		$this->data = $data;
	}
	protected function getValue($key)
	{
		if(isset($this->data[$key]))
		{
			return $this->data[$key];
		}
		else
		{
			return '';
		}		
	}
	public function getInput($name)
	{
		$input = "<input type='text' id='".$name."' name='".$name."' value='".$this->getValue($name)."'>";
		return $this->habillage($input);
	}
	public function getSubmit($value)
	{
		$submit = "<input type='submit' name='submit' value='".$value."'>";
		return $this->habillage($submit);
	}
	protected function habillage($html)
	{
		$html = "<".self::$balise_hab.">".$html."</".self::$balise_hab.">";
		return $html;
	}
	public function beginForm()
	{
		$html = "<form action'".$this->action."' method='".$this->method."' enctype='multipart/form-data'>";
		$this->render .= $html;
	}
	public function endForm()
	{
		$html = "</form>";
		$this->render .= $html;
	}
	public function renderForm()
	{
		return $this->render;
	}
}
?>