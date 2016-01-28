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
class memos_crud
{
	
	public $id_memo;
	public $description;
	public $id;
	public $target;
	public $status;
	public $role;
	public $added;
	public $updated;

	
	function memos($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_memo = '';
		$this->description = '';
		$this->id = '';
		$this->target = '';
		$this->status = '';
		$this->role = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_memo')
	{
		$sql = 'SELECT * FROM  `memos` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_memo = $record['id_memo'];
			$this->description = $record['description'];
			$this->id = $record['id'];
			$this->target = $record['target'];
			$this->status = $record['status'];
			$this->role = $record['role'];
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
		$this->id_memo = $this->bdd->escape_string($this->id_memo);
		$this->description = $this->bdd->escape_string($this->description);
		$this->id = $this->bdd->escape_string($this->id);
		$this->target = $this->bdd->escape_string($this->target);
		$this->status = $this->bdd->escape_string($this->status);
		$this->role = $this->bdd->escape_string($this->role);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `memos` SET `description`="'.$this->description.'",`id`="'.$this->id.'",`target`="'.$this->target.'",`status`="'.$this->status.'",`role`="'.$this->role.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_memo="'.$this->id_memo.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_memo,'id_memo');
	}
	
	function delete($id,$field='id_memo')
	{
		if($id=='')
			$id = $this->id_memo;
		$sql = 'DELETE FROM `memos` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_memo = $this->bdd->escape_string($this->id_memo);
		$this->description = $this->bdd->escape_string($this->description);
		$this->id = $this->bdd->escape_string($this->id);
		$this->target = $this->bdd->escape_string($this->target);
		$this->status = $this->bdd->escape_string($this->status);
		$this->role = $this->bdd->escape_string($this->role);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `memos`(`description`,`id`,`target`,`status`,`role`,`added`,`updated`) VALUES("'.$this->description.'","'.$this->id.'","'.$this->target.'","'.$this->status.'","'.$this->role.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_memo = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_memo,'id_memo');
		
		return $this->id_memo;
	}
	
	function unsetData()
	{
		$this->id_memo = '';
		$this->description = '';
		$this->id = '';
		$this->target = '';
		$this->status = '';
		$this->role = '';
		$this->added = '';
		$this->updated = '';

	}
}