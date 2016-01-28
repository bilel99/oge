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
	}
	
	// Traductions
	function _openTraduc()
	{
		$this->ln = $this->loadData('textes');		
		$this->ln->get($this->params[0],'id_texte');
	}
}