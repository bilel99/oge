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
class cdms_crud
{
	
	public $id_cdm;
	public $nom;
	public $prenom;
	public $telephone;
	public $email;
	public $banner;
	public $date_naissance;
	public $adresse;
	public $ville;
	public $code_postal;
	public $motorise;
	public $num_ss;
	public $provenance;
	public $langues;
	public $competence;
	public $evaluation;
	public $cursus;
	public $annee;
	public $evaluation_competence_note;
	public $details;
	public $upload;
	public $role;
	public $status;
	public $archive;
	public $id_cdp;
	public $added;
	public $updated;

	
	function cdms($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_cdm = '';
		$this->nom = '';
		$this->prenom = '';
		$this->telephone = '';
		$this->email = '';
		$this->banner = '';
		$this->date_naissance = '';
		$this->adresse = '';
		$this->ville = '';
		$this->code_postal = '';
		$this->motorise = '';
		$this->num_ss = '';
		$this->provenance = '';
		$this->langues = '';
		$this->competence = '';
		$this->evaluation = '';
		$this->cursus = '';
		$this->annee = '';
		$this->evaluation_competence_note = '';
		$this->details = '';
		$this->upload = '';
		$this->role = '';
		$this->status = '';
		$this->archive = '';
		$this->id_cdp = '';
		$this->added = '';
		$this->updated = '';

	}
	
	function get($id,$field='id_cdm')
	{
		$sql = 'SELECT * FROM  `cdms` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_cdm = $record['id_cdm'];
			$this->nom = $record['nom'];
			$this->prenom = $record['prenom'];
			$this->telephone = $record['telephone'];
			$this->email = $record['email'];
			$this->banner = $record['banner'];
			$this->date_naissance = $record['date_naissance'];
			$this->adresse = $record['adresse'];
			$this->ville = $record['ville'];
			$this->code_postal = $record['code_postal'];
			$this->motorise = $record['motorise'];
			$this->num_ss = $record['num_ss'];
			$this->provenance = $record['provenance'];
			$this->langues = $record['langues'];
			$this->competence = $record['competence'];
			$this->evaluation = $record['evaluation'];
			$this->cursus = $record['cursus'];
			$this->annee = $record['annee'];
			$this->evaluation_competence_note = $record['evaluation_competence_note'];
			$this->details = $record['details'];
			$this->upload = $record['upload'];
			$this->role = $record['role'];
			$this->status = $record['status'];
			$this->archive = $record['archive'];
			$this->id_cdp = $record['id_cdp'];
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
		$this->id_cdm = $this->bdd->escape_string($this->id_cdm);
		$this->nom = $this->bdd->escape_string($this->nom);
		$this->prenom = $this->bdd->escape_string($this->prenom);
		$this->telephone = $this->bdd->escape_string($this->telephone);
		$this->email = $this->bdd->escape_string($this->email);
		$this->banner = $this->bdd->escape_string($this->banner);
		$this->date_naissance = $this->bdd->escape_string($this->date_naissance);
		$this->adresse = $this->bdd->escape_string($this->adresse);
		$this->ville = $this->bdd->escape_string($this->ville);
		$this->code_postal = $this->bdd->escape_string($this->code_postal);
		$this->motorise = $this->bdd->escape_string($this->motorise);
		$this->num_ss = $this->bdd->escape_string($this->num_ss);
		$this->provenance = $this->bdd->escape_string($this->provenance);
		$this->langues = $this->bdd->escape_string($this->langues);
		$this->competence = $this->bdd->escape_string($this->competence);
		$this->evaluation = $this->bdd->escape_string($this->evaluation);
		$this->cursus = $this->bdd->escape_string($this->cursus);
		$this->annee = $this->bdd->escape_string($this->annee);
		$this->evaluation_competence_note = $this->bdd->escape_string($this->evaluation_competence_note);
		$this->details = $this->bdd->escape_string($this->details);
		$this->upload = $this->bdd->escape_string($this->upload);
		$this->role = $this->bdd->escape_string($this->role);
		$this->status = $this->bdd->escape_string($this->status);
		$this->archive = $this->bdd->escape_string($this->archive);
		$this->id_cdp = $this->bdd->escape_string($this->id_cdp);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'UPDATE `cdms` SET `nom`="'.$this->nom.'",`prenom`="'.$this->prenom.'",`telephone`="'.$this->telephone.'",`email`="'.$this->email.'",`banner`="'.$this->banner.'",`date_naissance`="'.$this->date_naissance.'",`adresse`="'.$this->adresse.'",`ville`="'.$this->ville.'",`code_postal`="'.$this->code_postal.'",`motorise`="'.$this->motorise.'",`num_ss`="'.$this->num_ss.'",`provenance`="'.$this->provenance.'",`langues`="'.$this->langues.'",`competence`="'.$this->competence.'",`evaluation`="'.$this->evaluation.'",`cursus`="'.$this->cursus.'",`annee`="'.$this->annee.'",`evaluation_competence_note`="'.$this->evaluation_competence_note.'",`details`="'.$this->details.'",`upload`="'.$this->upload.'",`role`="'.$this->role.'",`status`="'.$this->status.'",`archive`="'.$this->archive.'",`id_cdp`="'.$this->id_cdp.'",`added`="'.$this->added.'",`updated`=NOW() WHERE id_cdm="'.$this->id_cdm.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_cdm,'id_cdm');
	}
	
	function delete($id,$field='id_cdm')
	{
		if($id=='')
			$id = $this->id_cdm;
		$sql = 'DELETE FROM `cdms` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_cdm = $this->bdd->escape_string($this->id_cdm);
		$this->nom = $this->bdd->escape_string($this->nom);
		$this->prenom = $this->bdd->escape_string($this->prenom);
		$this->telephone = $this->bdd->escape_string($this->telephone);
		$this->email = $this->bdd->escape_string($this->email);
		$this->banner = $this->bdd->escape_string($this->banner);
		$this->date_naissance = $this->bdd->escape_string($this->date_naissance);
		$this->adresse = $this->bdd->escape_string($this->adresse);
		$this->ville = $this->bdd->escape_string($this->ville);
		$this->code_postal = $this->bdd->escape_string($this->code_postal);
		$this->motorise = $this->bdd->escape_string($this->motorise);
		$this->num_ss = $this->bdd->escape_string($this->num_ss);
		$this->provenance = $this->bdd->escape_string($this->provenance);
		$this->langues = $this->bdd->escape_string($this->langues);
		$this->competence = $this->bdd->escape_string($this->competence);
		$this->evaluation = $this->bdd->escape_string($this->evaluation);
		$this->cursus = $this->bdd->escape_string($this->cursus);
		$this->annee = $this->bdd->escape_string($this->annee);
		$this->evaluation_competence_note = $this->bdd->escape_string($this->evaluation_competence_note);
		$this->details = $this->bdd->escape_string($this->details);
		$this->upload = $this->bdd->escape_string($this->upload);
		$this->role = $this->bdd->escape_string($this->role);
		$this->status = $this->bdd->escape_string($this->status);
		$this->archive = $this->bdd->escape_string($this->archive);
		$this->id_cdp = $this->bdd->escape_string($this->id_cdp);
		$this->added = $this->bdd->escape_string($this->added);
		$this->updated = $this->bdd->escape_string($this->updated);

		
		$sql = 'INSERT INTO `cdms`(`nom`,`prenom`,`telephone`,`email`,`banner`,`date_naissance`,`adresse`,`ville`,`code_postal`,`motorise`,`num_ss`,`provenance`,`langues`,`competence`,`evaluation`,`cursus`,`annee`,`evaluation_competence_note`,`details`,`upload`,`role`,`status`,`archive`,`id_cdp`,`added`,`updated`) VALUES("'.$this->nom.'","'.$this->prenom.'","'.$this->telephone.'","'.$this->email.'","'.$this->banner.'","'.$this->date_naissance.'","'.$this->adresse.'","'.$this->ville.'","'.$this->code_postal.'","'.$this->motorise.'","'.$this->num_ss.'","'.$this->provenance.'","'.$this->langues.'","'.$this->competence.'","'.$this->evaluation.'","'.$this->cursus.'","'.$this->annee.'","'.$this->evaluation_competence_note.'","'.$this->details.'","'.$this->upload.'","'.$this->role.'","'.$this->status.'","'.$this->archive.'","'.$this->id_cdp.'",NOW(),NOW())';
		$this->bdd->query($sql);
		
		$this->id_cdm = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_cdm,'id_cdm');
		
		return $this->id_cdm;
	}
	
	function unsetData()
	{
		$this->id_cdm = '';
		$this->nom = '';
		$this->prenom = '';
		$this->telephone = '';
		$this->email = '';
		$this->banner = '';
		$this->date_naissance = '';
		$this->adresse = '';
		$this->ville = '';
		$this->code_postal = '';
		$this->motorise = '';
		$this->num_ss = '';
		$this->provenance = '';
		$this->langues = '';
		$this->competence = '';
		$this->evaluation = '';
		$this->cursus = '';
		$this->annee = '';
		$this->evaluation_competence_note = '';
		$this->details = '';
		$this->upload = '';
		$this->role = '';
		$this->status = '';
		$this->archive = '';
		$this->id_cdp = '';
		$this->added = '';
		$this->updated = '';

	}
}