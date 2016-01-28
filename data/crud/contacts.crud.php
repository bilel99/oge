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
class contacts_crud
{
	
	public $id_contact;
	public $nom_contact;
	public $prenom_contact;
	public $fonction;
	public $tel_fixe;
	public $tel_port;
	public $linkedin;
	public $email;
	public $status;
	public $added;
	public $updated;
	public $id_user;

	
	function contacts($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_contact = '';
		$this->nom_contact = '';
		$this->prenom_contact = '';
		$this->fonction = '';
		$this->tel_fixe = '';
		$this->tel_port = '';
		$this->linkedin = '';
		$this->email = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';
		$this->id_user = '';

	}
	
	function get($id,$field='id_contact')
	{
		$sql = 'SELECT * FROM  `contacts` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_contact = $record['id_contact'];
			$this->nom_contact = $record['nom_contact'];
			$this->prenom_contact = $record['prenom_contact'];
			$this->fonction = $record['fonction'];
			$this->tel_fixe = $record['tel_fixe'];
			$this->tel_port = $record['tel_port'];
			$this->linkedin = $record['linkedin'];
			$this->email = $record['email'];
			$this->status = $record['status'];
			$this->added = $record['added'];
			$this->updated = $record['updated'];
			$this->id_user = $record['id_user'];

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
		$this->id_contact = $this->bdd->escape_string($this->id_contact);
		$this->nom_contact = $this->bdd->escape_string($this->nom_contact);
		$this->prenom_contact = $this->bdd->escape_string($this->prenom_contact);
		$this->fonction = $this->bdd->escape_string($this->fonction);
		$this->tel_fixe = $this->bdd->escape_string($this->tel_fixe);
		$this->tel_port = $this->bdd->escape_string($this->tel_port);
		$this->linkedin = $this->bdd->escape_string($this->linkedin);
		$this->email = $this->bdd->escape_string($this->email);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);
		$this->id_user = $this->bdd->escape_string($this->id_user);

		
		$sql = 'UPDATE `contacts` SET `nom_contact`="'.$this->nom_contact.'",`prenom_contact`="'.$this->prenom_contact.'",`fonction`="'.$this->fonction.'",`tel_fixe`="'.$this->tel_fixe.'",`tel_port`="'.$this->tel_port.'",`linkedin`="'.$this->linkedin.'",`email`="'.$this->email.'",`status`="'.$this->status.'",`added`="'.$this->added.'",`updated`=NOW(),`id_user`="'.$this->id_user.'" WHERE id_contact="'.$this->id_contact.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_contact,'id_contact');
	}
	
	function delete($id,$field='id_contact')
	{
		if($id=='')
			$id = $this->id_contact;
		$sql = 'DELETE FROM `contacts` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_contact = $this->bdd->escape_string($this->id_contact);
		$this->nom_contact = $this->bdd->escape_string($this->nom_contact);
		$this->prenom_contact = $this->bdd->escape_string($this->prenom_contact);
		$this->fonction = $this->bdd->escape_string($this->fonction);
		$this->tel_fixe = $this->bdd->escape_string($this->tel_fixe);
		$this->tel_port = $this->bdd->escape_string($this->tel_port);
		$this->linkedin = $this->bdd->escape_string($this->linkedin);
		$this->email = $this->bdd->escape_string($this->email);
		$this->status = $this->bdd->escape_string($this->status);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);
		$this->id_user = $this->bdd->escape_string($this->id_user);

		
		$sql = 'INSERT INTO `contacts`(`nom_contact`,`prenom_contact`,`fonction`,`tel_fixe`,`tel_port`,`linkedin`,`email`,`status`,`added`,`updated`,`id_user`) VALUES("'.$this->nom_contact.'","'.$this->prenom_contact.'","'.$this->fonction.'","'.$this->tel_fixe.'","'.$this->tel_port.'","'.$this->linkedin.'","'.$this->email.'","'.$this->status.'",NOW(),NOW(),"'.$this->id_user.'")';
		$this->bdd->query($sql);
		
		$this->id_contact = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_contact,'id_contact');
		
		return $this->id_contact;
	}
	
	function unsetData()
	{
		$this->id_contact = '';
		$this->nom_contact = '';
		$this->prenom_contact = '';
		$this->fonction = '';
		$this->tel_fixe = '';
		$this->tel_port = '';
		$this->linkedin = '';
		$this->email = '';
		$this->status = '';
		$this->added = '';
		$this->updated = '';
		$this->id_user = '';

	}
}