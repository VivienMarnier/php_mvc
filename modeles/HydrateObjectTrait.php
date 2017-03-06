<?php
trait HydrateObjectTrait
{
	public function hydrate($datas)
	{
		foreach($datas as $key => $value)
		{
			if(isset($datas[$key]))
			{
				$key = ucfirst($key);
				$functionName = "set".$key;
				if(method_exists(__class__,$functionName))
				{
					$this->$functionName($value);
				}
			}
		}
	}
}

?>				