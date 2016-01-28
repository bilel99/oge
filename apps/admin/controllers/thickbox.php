<?php 

class thickboxController extends bootstrap
{
	var $Command;
	
	function thickboxController(&$command,$config,$app)
	{
		parent::__construct($command,$config,$app);
		
		$this->catchAll = true;
		
		// On masque les Head, header et footer originaux plus le debug
		$this->autoFireHeader = false;
		$this->autoFireHead = false;
		$this->autoFireFooter = false;
		$this->autoFireDebug = false;
		
		// On place le redirect sur la home
		$_SESSION['request_url'] = $this->url;
	}
	
	function _loginError()
	{
		
	}
	
	function _loginInterdit()
	{
		
	}
	
	function _newPassword()
	{
		
	}
}