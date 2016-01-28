<?php

class protectedController extends bootstrap
{
	var $Command;
	
	function protectedController(&$command,$config,$app)
	{
		parent::__construct($command,$config,$app);
		
		$this->autoFireHeader = false;
		$this->autoFireHead = false;
		$this->autoFireView = false;
		$this->autoFireFooter = false;
		$this->autoFireDebug = false;
		
		$this->catchAll = true;
	}

	function _templates()
	{
		if(file_exists($this->path.'protected/templates/'.$this->params[0]))
		{
			$url = ($this->path.'protected/templates/'.$this->params[0]);
			
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($url).'";');
			@readfile($url);
			die();		
		}
		else
		{
			header('location:'.$this->lurl);
			die;
		}
	}
}