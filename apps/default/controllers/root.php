<?php

class rootController extends bootstrap
{
	var $Command;
	
	function rootController(&$command,$config,$app)
	{
		parent::__construct($command,$config,$app);
		
		$this->catchAll = true;
	}
	
	function _default()
	{
		// Appel de la page home
		$this->setView('../root/home');
	}


	public function _contact(){
		// Appel de la page contact
		$this->setView('../root/contact');
	}

}