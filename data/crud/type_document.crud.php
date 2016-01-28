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
class type_document_crud
{
	
	public $id_type_doc;
	public $name;
	public $src;
	public $description;
	public $status;
	public $added;
	public $updated;

	
	function type_document($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_type_doc = '';
		$this->name = '';
		$this->src = '';
		$this->description = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_type_doc')
	{
		$sql = 'SELECT * FROM  `type_document` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_type_doc = $record['id_type_doc'];
			$this->name = $record['name'];
			$this->src = $record['src'];
			$this->description = $record['description'];
			$this->status = $record['status'];
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
		$this->id_type_doc = $this->bdd->escape_string($this->id_type_doc);
		$this->name = $this->bdd->escape_string($this->name);
		$this->src = $this->bdd->escape_string($this->src);
		$this->description = $this->bdd->escape_string($this->description);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `type_document` SET `name`="'.$this->name.'",`src`="'.$this->src.'",`description`="'.$this->description.'",`status`="'.$this->status.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_type_doc="'.$this->id_type_doc.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_type_doc,'id_type_doc');
	}
	
	function delete($id,$field='id_type_doc')
	{
		if($id=='')
			$id = $this->id_type_doc;
		$sql = 'DELETE FROM `type_document` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_type_doc = $this->bdd->escape_string($this->id_type_doc);
		$this->name = $this->bdd->escape_string($this->name);
		$this->src = $this->bdd->escape_string($this->src);
		$this->description = $this->bdd->escape_string($this->description);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `type_document`(`name`,`src`,`description`,`status`,`added`,`updated`) VALUES("'.$this->name.'","'.$this->src.'","'.$this->description.'","'.$this->status.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_type_doc = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_type_doc,'id_type_doc');
		
		return $this->id_type_doc;
	}
	
	function unsetData()
	{
		$this->id_type_doc = '';
		$this->name = '';
		$this->src = '';
		$this->description = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';

	}
}