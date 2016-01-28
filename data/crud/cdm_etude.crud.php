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
class cdm_etude_crud
{
	
	public $id_cdm_etude;
	public $id_cdm;
	public $id_etude;
	public $added;
	public $updated;

	
	function cdm_etude($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_cdm_etude = '';
		$this->id_cdm = '';
		$this->id_etude = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_cdm_etude')
	{
		$sql = 'SELECT * FROM  `cdm_etude` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_cdm_etude = $record['id_cdm_etude'];
			$this->id_cdm = $record['id_cdm'];
			$this->id_etude = $record['id_etude'];
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
		$this->id_cdm_etude = $this->bdd->escape_string($this->id_cdm_etude);
		$this->id_cdm = $this->bdd->escape_string($this->id_cdm);
		$this->id_etude = $this->bdd->escape_string($this->id_etude);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `cdm_etude` SET `id_cdm`="'.$this->id_cdm.'",`id_etude`="'.$this->id_etude.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_cdm_etude="'.$this->id_cdm_etude.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_cdm_etude,'id_cdm_etude');
	}
	
	function delete($id,$field='id_cdm_etude')
	{
		if($id=='')
			$id = $this->id_cdm_etude;
		$sql = 'DELETE FROM `cdm_etude` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_cdm_etude = $this->bdd->escape_string($this->id_cdm_etude);
		$this->id_cdm = $this->bdd->escape_string($this->id_cdm);
		$this->id_etude = $this->bdd->escape_string($this->id_etude);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `cdm_etude`(`id_cdm`,`id_etude`,`added`,`updated`) VALUES("'.$this->id_cdm.'","'.$this->id_etude.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_cdm_etude = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_cdm_etude,'id_cdm_etude');
		
		return $this->id_cdm_etude;
	}
	
	function unsetData()
	{
		$this->id_cdm_etude = '';
		$this->id_cdm = '';
		$this->id_etude = '';
		$this->added = '';
		$this->updated = '';

	}
}