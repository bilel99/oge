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
class oge_clients_contacts_crud
{
	
	public $id_oge_clients_contact;
	public $id_oge_client;
	public $id_contact;
	public $status;
	public $added;
	public $updated;

	
	function oge_clients_contacts($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_oge_clients_contact = '';
		$this->id_oge_client = '';
		$this->id_contact = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_oge_clients_contact')
	{
		$sql = 'SELECT * FROM  `oge_clients_contacts` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_oge_clients_contact = $record['id_oge_clients_contact'];
			$this->id_oge_client = $record['id_oge_client'];
			$this->id_contact = $record['id_contact'];
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
		$this->id_oge_clients_contact = $this->bdd->escape_string($this->id_oge_clients_contact);
		$this->id_oge_client = $this->bdd->escape_string($this->id_oge_client);
		$this->id_contact = $this->bdd->escape_string($this->id_contact);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `oge_clients_contacts` SET `id_oge_client`="'.$this->id_oge_client.'",`id_contact`="'.$this->id_contact.'",`status`="'.$this->status.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_oge_clients_contact="'.$this->id_oge_clients_contact.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_oge_clients_contact,'id_oge_clients_contact');
	}
	
	function delete($id,$field='id_oge_clients_contact')
	{
		if($id=='')
			$id = $this->id_oge_clients_contact;
		$sql = 'DELETE FROM `oge_clients_contacts` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_oge_clients_contact = $this->bdd->escape_string($this->id_oge_clients_contact);
		$this->id_oge_client = $this->bdd->escape_string($this->id_oge_client);
		$this->id_contact = $this->bdd->escape_string($this->id_contact);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `oge_clients_contacts`(`id_oge_client`,`id_contact`,`status`,`added`,`updated`) VALUES("'.$this->id_oge_client.'","'.$this->id_contact.'","'.$this->status.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_oge_clients_contact = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_oge_clients_contact,'id_oge_clients_contact');
		
		return $this->id_oge_clients_contact;
	}
	
	function unsetData()
	{
		$this->id_oge_clients_contact = '';
		$this->id_oge_client = '';
		$this->id_contact = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';

	}
}