<?php
	class Bootstrap_Form extends Formulaire
	{
		private static $balise_hab = "div";
		private static $class_balise_hab = "form-group";
		
		public function __construct($action,$method,$data = array())
		{
			parent::__construct($action,$method,$data);
		}
		public function getInput($type,$name)
		{
			$label = "<label for='".$name."'>".$name."</label>";
			$functionName ='getInput'.$type;
			if(method_exists(__class__,$functionName))
			{
				$input = call_user_func_array(array($this,$functionName), array($label, $name));
				$this->render .= $input;
			}
			else
			{
				throw new Exception('Le type demandé n\'existe pas');
			}
		}
		private function getInputText($label,$name)
		{
			$input = "<input class='form-control' type='text' id='".$name."' name='".$name."' value='".$this->getValue($name)."'>";
			return $this->habillage($label.$input);
			
		}
		private function getInputPassword($label,$name)
		{
			$input = "<input class='form-control' type='password' id='".$name."' name='".$name."' value='".$this->getValue($name)."'>";
			return $this->habillage($label.$input);
		}
		private function getInputTextArea($label,$name)
		{
			$input = "<textarea class='form-control' id='".$name."' name='".$name."' rows='3'></textarea>";
			return $this->habillage($label.$input);
		}
		private function getInputEmail($label,$name)
		{
			$input = "<input class='form-control' type='email' id='".$name."' name='".$name."' value='".$this->getValue($name)."'>";
			return $this->habillage($label.$input);
		}
		private function getInputFile($label,$name)
		{
			$input = "<input class='form-control' type='file' id='".$name."' name='".$name."' value='".$this->getValue($name)."'>";
			return $this->habillage($label.$input);
		}
		public function getInputSubmit($label,$value)
		{
			$submit = "<input type='submit' class='btn btn-default' name='submit' value='".$value."'>";
			$this->render .= $submit;
		}
		protected function habillage($html)
		{
			$html = "<".self::$balise_hab." class='".self::$class_balise_hab."'>".$html."</".self::$balise_hab.">";
			return $html;
		}
	}

?>