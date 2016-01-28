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

class oge_clients extends oge_clients_crud
{

	function oge_clients($bdd,$params='')
    {
        parent::oge_clients($bdd,$params);
    }
    
    function get($id,$field='id_oge_client')
    {
        return parent::get($id,$field);
    }
    
    function update($cs='')
    {
        parent::update($cs);
    }
    
    function delete($id,$field='id_oge_client')
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
		$sql = 'SELECT * FROM `oge_clients`'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));

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
			
		$sql='SELECT count(*) FROM `oge_clients` '.$where;

		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	}
	
	function exist($id,$field='id_oge_client')
	{
		$sql = 'SELECT * FROM `oge_clients` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		return ($this->bdd->fetch_array($result,0,0)>0);
	}
        
        
        
        
        
        
        function selectDistinctSociete($where='',$order='',$start='',$nb='')
	{
		if($where != '')
			$where = ' WHERE '.$where;
		if($order != '')
			$order = ' ORDER BY '.$order;
		//$sql = 'SELECT DISTINCT `id_oge_client`, `nom_societe` FROM `oge_clients`'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));
                $sql = 'SELECT * FROM `oge_clients` GROUP BY `nom_societe` '.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));
                
		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	} 
        
        
        
        
        
    
    function search($params, $start='',$nb='', $ContactsOrder='') {
        $select .= "FROM oge_clients oc ";
        if($ContactsOrder=='DESC')
        {
            $select .= "LEFT OUTER JOIN (SELECT id_oge_client, MAX(added) AS latest FROM oge_clients_contacts
                GROUP BY id_oge_client) as occon ON (oc.id_oge_client = occon.id_oge_client )
                LEFT OUTER JOIN oge_clients_contacts occ ON occ.id_oge_client = oc.id_oge_client
                LEFT OUTER JOIN contacts c ON occ.id_contact = c.id_contact
                AND occ.added = occon.latest ";
        }
        else
        {
            $select .= "LEFT JOIN oge_clients_contacts occ ON (oc.id_oge_client = occ.id_oge_client ) ";
        }
        //$select .= "LEFT JOIN contacts c ON (occ.id_contact = c.id_contact ) ";
        
        $and = "";
        $fields = "SELECT oc.id_oge_client, oc.num_oge_client, oc.typologie, oc.type, oc.nom, oc.prenom, oc.nom_societe, oc.activite, oc.id_sector, ";
        $fields .= "oc.capital, oc.etranger, oc.id_forme, oc.siret, oc.lieu_rcs, oc.num_rcs, oc.num_tva, oc.adresse, oc.ville, oc.tel_standard, oc.provenance, ";
        $fields .= "oc.code_postal, oc.id_pays, oc.site_internet, oc.status as status, oc.id_user, oc.added, oc.updated, ";
        $fields .= "occ.id_oge_clients_contact, occ.id_oge_client as id_client, occ.id_contact as idcontact, occ.status as occstatus, occ.added as ad, occ.updated as up ";
        $fields .= ", c.id_contact, c.nom_contact, c.prenom_contact, c.fonction, c.tel_fixe, c.tel_port, c.linkedin, c.email, c.status as cstatus, c.added as add_con, c.updated as up_con, c.id_user as id_us_con  ";

        if(isset($params['nom_societe'])) {
            $and .=" WHERE nom_societe LIKE '%".$params['nom_societe']."%'";
        }
        if(isset($params['num_oge_client'])) {
            if($and == "") {
                $and .=" WHERE num_oge_client LIKE '%".$params['num_oge_client']."%'";
            } else {
                $and .=" AND num_oge_client LIKE '%".$params['num_oge_client']."%'";
            }  
        }
        if(isset($params['date_crea'])) {
            if($and == "") {
                $and .=" WHERE oc.added >='".$params['date_crea']."'";
            } else {
                $and .=" AND oc.added >='".$params['date_crea']."'";
            }           
        }
        if(isset($params['id_sector'])){
            if($and == ""){
                $and .=" WHERE id_sector LIKE '".$params['id_sector']."'";
            }else{
                $and .=" AND id_sector LIKE '".$params['id_sector']."'";
            }            
        }
        if(isset($params['num_rcs'])) {
            if($and == "") {
                $and .=" WHERE num_rcs LIKE '".$params['num_rcs']."'";
            } else {
                $and .=" AND num_rcs LIKE '".$params['num_rcs']."'";
            }            
        }
        if(isset($params['typologie'])) {
            if($and == "") {
                $and .=" WHERE typologie LIKE '".$params['typologie']."'";
            } else {
                $and .=" AND typologie LIKE '".$params['typologie']."'";
            }
        }
        if(isset($params['type'])) {
            if($and == "") {
                $and .=" WHERE type LIKE '".$params['type']."'";
            } else {
                $and .=" AND type LIKE '".$params['type']."'";
            }
        }
        if(isset($params['date_le'])) {
            if($and == "") {
                $and .=" WHERE oc.added <='".$params['date_le']."'";
            } else {
                $and .=" AND oc.added <='".$params['date_le']."'";
            }            
        }
        
        
        if(isset($params['mail'])) {
            if($and == "") {
                $and .=" WHERE c.email LIKE '%".$params['mail']."%'";
            } else {
                $and .=" AND c.email LIKE '%".$params['mail']."%'"; 
            }            
        }
        
        if(isset($params['nom_contact'])) {
            if($and == "") {
                $and .=" WHERE c.nom_contact LIKE '%".$params['nom_contact']."%'";
            } else {
                $and .=" AND c.nom_contact LIKE '%".$params['nom_contact']."%'"; 
            }            
        }
        
        if(isset($params['prenom_contact'])) {
            if($and == "") {
                $and .=" WHERE c.prenom_contact LIKE '%".$params['prenom_contact']."%'";
            } else {
                $and .=" AND c.prenom_contact LIKE '%".$params['prenom_contact']."%'"; 
            }            
        }
        
        
        if(isset($params['status'])) {
            if($and == "") {
                $and .=" WHERE oc.status LIKE '".$params['status']."'";
            } else {
                $and .=" AND oc.status LIKE '".$params['status']."'";
            }            
        }
        if($and == "") {
            $and .=" GROUP BY oc.id_oge_client ";
        } else {
            $and .=" GROUP BY oc.id_oge_client ";
        }
        $query = $fields.$select.$and;
        
        $result['query'] = $this->executeQuery($query, $start, $nb);
        $result['count'] = $this->counterQuery($query);
        
        return $result;
    }
    
   function executeQuery( $query, $start='', $nb='') {
        
        $sql = $query.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));
        $resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
           $result[] = $record;
		}
        return $result; 
   }
   
   function counterQuery($query) {
        $sql = "SELECT count(*) FROM (".$query.") as count" ;
        $result = $this->bdd->query($sql);
        return (int)($this->bdd->result($result,0,0)); 
   }
   
   
   
   function rechercherQuery($nom){
        $sql = "SELECT * FROM oge_clients WHERE status=1";
        $nom != "" ? $sql .= " AND (nom LIKE '%".$nom."%' OR prenom LIKE '%".$nom."%' OR nom_societe LIKE '%".$nom."%')" : $sql .= " ";
        $resultat = $this->bdd->query($sql);
        $result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
           $result[] = $record;
		}
        return $result; 
   }
   
   
   
   
   
    function findByEtudeclient($id)
    {
            $sql = 'SELECT * FROM `oge_clients` oc ';
            $sql .= ' INNER JOIN `etudes` e ON (oc.id_oge_client = e.id_oge_client) ';
            $sql .= ' WHERE oc.id_oge_client = '.$id;

            $resultat = $this->bdd->query($sql);
            $result = array();
            while($record = $this->bdd->fetch_assoc($resultat))
            {
                    $result[] = $record;
            }
            return $result;
    }
   
   
   
   
}