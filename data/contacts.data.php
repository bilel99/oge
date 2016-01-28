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

class contacts extends contacts_crud
{

	function contacts($bdd,$params='')
    {
        parent::contacts($bdd,$params);
    }
    
    function get($id,$field='id_contact')
    {
        return parent::get($id,$field);
    }
    
    function update($cs='')
    {
        parent::update($cs);
    }
    
    function delete($id,$field='id_contact')
    {
    	parent::delete($id,$field);
    }
    
    function create($cs='')
    {
        $id = parent::create($cs);
        return $id;
    }
	
	function select($where='',$order='',$start='',$nb='')
	{
		if($where != '')
			$where = ' WHERE '.$where;
		if($order != '')
			$order = ' ORDER BY '.$order;
		$sql = 'SELECT * FROM `contacts`'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));
		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	} 
	
	function counter($where='')
	{
		if($where != '')
			$where = ' WHERE '.$where;
			
		$sql='SELECT count(*) FROM `contacts` '.$where;

		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	}
	
	function exist($id,$field='id_contact')
	{
		$sql = 'SELECT * FROM `contacts` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		return ($this->bdd->fetch_array($result,0,0)>0);
	}
    
    function search($params, $start='',$nb=''){
        
        $select .= "FROM contacts c ";
        $select .= "LEFT JOIN oge_clients_contacts occ ON (c.id_contact = occ.id_contact) ";
        $select .= "LEFT JOIN oge_clients oc ON (occ.id_oge_client = oc.id_oge_client) ";
        
        $and = "";
        $fields = " oc.id_oge_client, oc.num_oge_client, oc.typologie, oc.nom, oc.prenom, oc.nom_societe, oc.activite, oc.id_sector, ";
        $fields .= "oc.capital, oc.etranger, oc.id_forme, oc.siret, oc.lieu_rcs, oc.num_rcs, oc.num_tva, oc.adresse, oc.ville, oc.tel_standard, oc.provenance, ";
        $fields .= "oc.code_postal, oc.id_pays, oc.site_internet, oc.status as ocstatus, oc.id_user, oc.added, oc.updated, ";
        $fields .= "occ.id_oge_clients_contact, occ.id_oge_client as id_client, occ.id_contact as idcontact, occ.status as occstatus, occ.added as ad, occ.updated as up ";
        $fields .= ", c.id_contact, c.nom_contact, c.prenom_contact, c.fonction, c.tel_fixe, c.tel_port, c.linkedin, c.email, c.status as cstatus, c.added as add_con, c.updated as up_con, c.id_user as id_us_con  ";

        if(isset($params['nom_societe'])){
            $and .=" WHERE oc.nom_societe LIKE '%".$params['nom_societe']."%'";
        }
        if(isset($params['nom_contact'])){
            if($and == ""){
                $and .=" WHERE c.nom_contact LIKE '%".$params['nom_contact']."%'";
            }else{
                $and .=" AND c.nom_contact LIKE '%".$params['nom_contact']."%'";
            }            
        }
        if(isset($params['id_oge_client'])){
            if($and == ""){
                $and .=" WHERE occ.id_oge_client = " . $params['id_oge_client'];
            }else{
                $and .=" AND occ.id_oge_client = " . $params['id_oge_client'];
            }            
        }
        if(isset($params['not_id_oge_client'])){
            if($and == ""){
                $and .=' WHERE ((occ.id_oge_client != ' . $params['not_id_oge_client'] . ' AND occ.status=1) OR (occ.id_oge_client = ' . $params['not_id_oge_client'] . ' AND occ.status=0) OR (occ.id_oge_client IS NULL))';
            }else{
                $and .=' AND ((occ.id_oge_client != ' . $params['not_id_oge_client'] . ' AND occ.status=1) OR (occ.id_oge_client = ' . $params['not_id_oge_client'] . ' AND occ.status=0) OR (occ.id_oge_client IS NULL))';
            }            
        }
        
        if(isset($params['prenom_contact'])){
            if($and == ""){
                $and .=" WHERE c.prenom_contact LIKE '%".$params['prenom_contact']."%'";
            }else{
                $and .=" AND c.prenom_contact LIKE '%".$params['prenom_contact']."%'";
            }            
        }
        if(isset($params['fonction'])){
            if($and == ""){
                $and .=" WHERE c.fonction LIKE '".$params['fonction']."'";
            }else{
                $and .=" AND c.fonction LIKE '".$params['fonction']."'";
            }            
        }
        if(isset($params['email'])){
            if($and == ""){
                $and .=" WHERE c.email LIKE '".$params['email']."'";
            }else{
                $and .=" AND c.email LIKE '".$params['email']."'"; 
            }            
        }
        
        if(!isset($params['not_oge_clients_status'])){
            if($and == "") {
                $and .= " WHERE ";
            } else {
                $and .=" AND ";
            }
            $and .=" oc.status = 1 ";
        }
        
        if(!isset($params['not_oge_clients_contact_status'])){
            if($and == "") {
                $and .= " WHERE ";
            } else {
                $and .=" AND ";
            }
            $and .=" occ.status = 1 ";
        }
        
        if(!isset($params['not_contacts_status'])){
            if($and == "") {
                $and .= " WHERE ";
            } else {
                $and .=" AND ";
            }
            $and .=" c.status = 1 ";
        }
        
        $and .=" GROUP BY c.id_contact";
        $query = $select.$and;
        
        $result['query'] = $this->executeQuery($fields, $query, $start, $nb);
        $result['count'] = $this->counterQuery($query);
        
        return $result;
    }
    
    function executeQuery($fields, $query, $start='', $nb=''){
        
        $sql = "SELECT ".$fields." ".$query. ($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));
        $resultat = $this->bdd->query($sql);
		$result = array();                
		while($record = $this->bdd->fetch_array($resultat))        
		{                    
           $result[] = $record;
		}
        return $result; 
   }
   
   function counterQuery($query){
        $sql = 'SELECT count(*) FROM (SELECT c.id_contact ' . $query . ') AS t';
		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
   }
   function rechercherQuery($nom){
        $sql = "SELECT * FROM contacts WHERE nom_contact LIKE '".$nom."%' and status=1";
	$resultat = $this->bdd->query($sql);
        $result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
           $result[] = $record;
		}
        return $result; 
   }
}