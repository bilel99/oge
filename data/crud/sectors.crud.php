<?php
// **************************************************************************************************** //
// ***************************************    ASPARTAM    ********************************************* //
// **************************************************************************************************** //
//
// Copyright (c) 2008-2011, equinoa
// Permission is hereby granted, free of charge, to any person obtaining a copy of this software and 
// associated documentation files (the "Software"), to deal in the Software without restriction, 
// including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, 
// and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, 
// subject to the following conditions:
// The above copyright notice and this permission notice shall be included in all copies 
// or substantial portions of the Software.
// The Software is provided "as is", without warranty of any kind, express or implied, including but 
// not limited to the warranties of merchantability, fitness for a particular purpose and noninfringement. 
// In no event shall the authors or copyright holders equinoa be liable for any claim, 
// damages or other liability, whether in an action of contract, tort or otherwise, arising from, 
// out of or in connection with the software or the use or other dealings in the Software.
// Except as contained in this notice, the name of equinoa shall not be used in advertising 
// or otherwise to promote the sale, use or other dealings in this Software without 
// prior written authorization from equinoa.
//
//  Version : 2.4.0
//  Date : 21/03/2011
//  Coupable : CM
//                                                                                   
// **************************************************************************************************** //
class sectors_crud
{
	
	public $id_sector;
	public $noun;
	public $added;
	public $updated;

	
	function sectors($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_sector = '';
		$this->noun = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_sector')
	{
		$sql = 'SELECT * FROM  `sectors` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_sector = $record['id_sector'];
			$this->noun = $record['noun'];
			$this->added = $record['added'];
			$this->updated = $record['updated'];

			return true;
		}
		else
		{
			$this->unsetData();
			return false;
		}
	}
	
	function update($cs='')
	{
		$this->id_sector = $this->bdd->escape_string($this->id_sector);
		$this->noun = $this->bdd->escape_string($this->noun);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `sectors` SET `noun`="'.$this->noun.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_sector="'.$this->id_sector.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_sector,'id_sector');
	}
	
	function delete($id,$field='id_sector')
	{
		if($id=='')
			$id = $this->id_sector;
		$sql = 'DELETE FROM `sectors` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_sector = $this->bdd->escape_string($this->id_sector);
		$this->noun = $this->bdd->escape_string($this->noun);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `sectors`(`noun`,`added`,`updated`) VALUES("'.$this->noun.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_sector = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_sector,'id_sector');
		
		return $this->id_sector;
	}
	
	function unsetData()
	{
		$this->id_sector = '';
		$this->noun = '';
		$this->added = '';
		$this->updated = '';

	}
}