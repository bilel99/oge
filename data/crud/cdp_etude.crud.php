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
class cdp_etude_crud
{
	
	public $id_cdp_etude;
	public $id_cdp;
	public $id_etude;
	public $percentage;
	public $added;
	public $updated;

	
	function cdp_etude($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_cdp_etude = '';
		$this->id_cdp = '';
		$this->id_etude = '';
		$this->percentage = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_cdp_etude')
	{
		$sql = 'SELECT * FROM  `cdp_etude` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_cdp_etude = $record['id_cdp_etude'];
			$this->id_cdp = $record['id_cdp'];
			$this->id_etude = $record['id_etude'];
			$this->percentage = $record['percentage'];
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
		$this->id_cdp_etude = $this->bdd->escape_string($this->id_cdp_etude);
		$this->id_cdp = $this->bdd->escape_string($this->id_cdp);
		$this->id_etude = $this->bdd->escape_string($this->id_etude);
		$this->percentage = $this->bdd->escape_string($this->percentage);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `cdp_etude` SET `id_cdp`="'.$this->id_cdp.'",`id_etude`="'.$this->id_etude.'",`percentage`="'.$this->percentage.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_cdp_etude="'.$this->id_cdp_etude.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_cdp_etude,'id_cdp_etude');
	}
	
	function delete($id,$field='id_cdp_etude')
	{
		if($id=='')
			$id = $this->id_cdp_etude;
		$sql = 'DELETE FROM `cdp_etude` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_cdp_etude = $this->bdd->escape_string($this->id_cdp_etude);
		$this->id_cdp = $this->bdd->escape_string($this->id_cdp);
		$this->id_etude = $this->bdd->escape_string($this->id_etude);
		$this->percentage = $this->bdd->escape_string($this->percentage);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `cdp_etude`(`id_cdp`,`id_etude`,`percentage`,`added`,`updated`) VALUES("'.$this->id_cdp.'","'.$this->id_etude.'","'.$this->percentage.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_cdp_etude = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_cdp_etude,'id_cdp_etude');
		
		return $this->id_cdp_etude;
	}
	
	function unsetData()
	{
		$this->id_cdp_etude = '';
		$this->id_cdp = '';
		$this->id_etude = '';
		$this->percentage = '';
		$this->added = '';
		$this->updated = '';

	}
}