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
class cdps_crud
{
	
	public $id_cdp;
	public $nom;
	public $prenom;
	public $telephone;
	public $annee;
	public $nom_interne;
	public $email;
	public $mdp;
	public $adresse;
	public $ville;
	public $code_postal;
	public $num_ss;
	public $details;
	public $role;
	public $status;
	public $archive;
	public $dashboard;
	public $added;
	public $updated;
	public $id_tree;
	public $last_login;

	
	function cdps($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_cdp = '';
		$this->nom = '';
		$this->prenom = '';
		$this->telephone = '';
		$this->annee = '';
		$this->nom_interne = '';
		$this->email = '';
		$this->mdp = '';
		$this->adresse = '';
		$this->ville = '';
		$this->code_postal = '';
		$this->num_ss = '';
		$this->details = '';
		$this->role = '';
		$this->status = '';
		$this->archive = '';
		$this->dashboard = '';
		$this->added = '';
		$this->updated = '';
		$this->id_tree = '';
		$this->last_login = '';

	}
	
	function get($id,$field='id_cdp')
	{
		$sql = 'SELECT * FROM  `cdps` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_cdp = $record['id_cdp'];
			$this->nom = $record['nom'];
			$this->prenom = $record['prenom'];
			$this->telephone = $record['telephone'];
			$this->annee = $record['annee'];
			$this->nom_interne = $record['nom_interne'];
			$this->email = $record['email'];
			$this->mdp = $record['mdp'];
			$this->adresse = $record['adresse'];
			$this->ville = $record['ville'];
			$this->code_postal = $record['code_postal'];
			$this->num_ss = $record['num_ss'];
			$this->details = $record['details'];
			$this->role = $record['role'];
			$this->status = $record['status'];
			$this->archive = $record['archive'];
			$this->dashboard = $record['dashboard'];
			$this->added = $record['added'];
			$this->updated = $record['updated'];
			$this->id_tree = $record['id_tree'];
			$this->last_login = $record['last_login'];

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
		$this->id_cdp = $this->bdd->escape_string($this->id_cdp);
		$this->nom = $this->bdd->escape_string($this->nom);
		$this->prenom = $this->bdd->escape_string($this->prenom);
		$this->telephone = $this->bdd->escape_string($this->telephone);
		$this->annee = $this->bdd->escape_string($this->annee);
		$this->nom_interne = $this->bdd->escape_string($this->nom_interne);
		$this->email = $this->bdd->escape_string($this->email);
		$this->mdp = $this->bdd->escape_string($this->mdp);
		$this->adresse = $this->bdd->escape_string($this->adresse);
		$this->ville = $this->bdd->escape_string($this->ville);
		$this->code_postal = $this->bdd->escape_string($this->code_postal);
		$this->num_ss = $this->bdd->escape_string($this->num_ss);
		$this->details = $this->bdd->escape_string($this->details);
		$this->role = $this->bdd->escape_string($this->role);
		$this->status = $this->bdd->escape_string($this->status);
		$this->archive = $this->bdd->escape_string($this->archive);
		$this->dashboard = $this->bdd->escape_string($this->dashboard);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);
		$this->id_tree = $this->bdd->escape_string($this->id_tree);
		$this->last_login = $this->bdd->escape_string($this->last_login);

		
		$sql = 'UPDATE `cdps` SET `nom`="'.$this->nom.'",`prenom`="'.$this->prenom.'",`telephone`="'.$this->telephone.'",`annee`="'.$this->annee.'",`nom_interne`="'.$this->nom_interne.'",`email`="'.$this->email.'",`mdp`="'.$this->mdp.'",`adresse`="'.$this->adresse.'",`ville`="'.$this->ville.'",`code_postal`="'.$this->code_postal.'",`num_ss`="'.$this->num_ss.'",`details`="'.$this->details.'",`role`="'.$this->role.'",`status`="'.$this->status.'",`archive`="'.$this->archive.'",`dashboard`="'.$this->dashboard.'",`added`="'.$this->added.'",`updated`=NOW(),`id_tree`="'.$this->id_tree.'",`last_login`="'.$this->last_login.'" WHERE id_cdp="'.$this->id_cdp.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_cdp,'id_cdp');
	}
	
	function delete($id,$field='id_cdp')
	{
		if($id=='')
			$id = $this->id_cdp;
		$sql = 'DELETE FROM `cdps` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_cdp = $this->bdd->escape_string($this->id_cdp);
		$this->nom = $this->bdd->escape_string($this->nom);
		$this->prenom = $this->bdd->escape_string($this->prenom);
		$this->telephone = $this->bdd->escape_string($this->telephone);
		$this->annee = $this->bdd->escape_string($this->annee);
		$this->nom_interne = $this->bdd->escape_string($this->nom_interne);
		$this->email = $this->bdd->escape_string($this->email);
		$this->mdp = $this->bdd->escape_string($this->mdp);
		$this->adresse = $this->bdd->escape_string($this->adresse);
		$this->ville = $this->bdd->escape_string($this->ville);
		$this->code_postal = $this->bdd->escape_string($this->code_postal);
		$this->num_ss = $this->bdd->escape_string($this->num_ss);
		$this->details = $this->bdd->escape_string($this->details);
		$this->role = $this->bdd->escape_string($this->role);
		$this->status = $this->bdd->escape_string($this->status);
		$this->archive = $this->bdd->escape_string($this->archive);
		$this->dashboard = $this->bdd->escape_string($this->dashboard);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);
		$this->id_tree = $this->bdd->escape_string($this->id_tree);
		$this->last_login = $this->bdd->escape_string($this->last_login);

		
		$sql = 'INSERT INTO `cdps`(`nom`,`prenom`,`telephone`,`annee`,`nom_interne`,`email`,`mdp`,`adresse`,`ville`,`code_postal`,`num_ss`,`details`,`role`,`status`,`archive`,`dashboard`,`added`,`updated`,`id_tree`,`last_login`) VALUES("'.$this->nom.'","'.$this->prenom.'","'.$this->telephone.'","'.$this->annee.'","'.$this->nom_interne.'","'.$this->email.'","'.$this->mdp.'","'.$this->adresse.'","'.$this->ville.'","'.$this->code_postal.'","'.$this->num_ss.'","'.$this->details.'","'.$this->role.'","'.$this->status.'","'.$this->archive.'","'.$this->dashboard.'",NOW(),NOW(),"'.$this->id_tree.'","'.$this->last_login.'")';
		$this->bdd->query($sql);
		
		$this->id_cdp = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_cdp,'id_cdp');
		
		return $this->id_cdp;
	}
	
	function unsetData()
	{
		$this->id_cdp = '';
		$this->nom = '';
		$this->prenom = '';
		$this->telephone = '';
		$this->annee = '';
		$this->nom_interne = '';
		$this->email = '';
		$this->mdp = '';
		$this->adresse = '';
		$this->ville = '';
		$this->code_postal = '';
		$this->num_ss = '';
		$this->details = '';
		$this->role = '';
		$this->status = '';
		$this->archive = '';
		$this->dashboard = '';
		$this->added = '';
		$this->updated = '';
		$this->id_tree = '';
		$this->last_login = '';

	}
}