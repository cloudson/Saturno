<?php

namespace Gandalf\Entity;

Class Calle
{
	protected $function; 

	public function __construct($function)
	{
		if ($function instanceof \Closure) {
			$function = $function->bindTo($this);
		}
		$this->function = $function;
	}

	public function __invoke($params)
	{
		return call_user_func_array($this->function, $params);
	}

	/**
	 * **caution** This behaviour is in test
	 */ 
	protected function addParameter($name, $value)
	{
		$this->function->parameter["\${$name}"] = $value; 
	}
}