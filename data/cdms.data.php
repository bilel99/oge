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

class cdms extends cdms_crud
{

	function cdms($bdd,$params='')
    {
        parent::cdms($bdd,$params);
    }
    
    function get($id,$field='id_cdm')
    {
        return parent::get($id,$field);
    }
    
    function update($cs='')
    {
        parent::update($cs);
    }
    
    function delete($id,$field='id_cdm')
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
		$sql = 'SELECT * FROM `cdms`'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));

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
			
		$sql='SELECT count(*) FROM `cdms` '.$where;

		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	}
	
	function exist($id,$field='id_cdm')
	{
		$sql = 'SELECT * FROM `cdms` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		return ($this->bdd->fetch_array($result,0,0)>0);
	}
        
        function search($params, $limit, $offset) {
            $fields = "* from cdms";
            $and = "";
            if(isset($params['nom'])) {
                $and .=" WHERE nom LIKE '%".$params['nom']."%'";
            }
            if(isset($params['prenom'])){
                if($and == ""){
                    $and .=" WHERE prenom LIKE '%".$params['prenom']."%'";
                } else {
                    $and .=" AND prenom LIKE '%".$params['prenom']."%'";
                }
            }
            if(isset($params['banner'])){
                if($and == ""){
                    $and .=" WHERE banner LIKE '%".$params['banner']."%'";
                } else {
                    $and .=" AND banner LIKE '%".$params['banner']."%'";
                }
            }
            if(isset($params['ville'])){
                if($and == ""){
                    $and .=" WHERE ville LIKE '%".$params['ville']."%'";
                } else {
                    $and .=" AND ville LIKE '%".$params['ville']."%'";
                }
            }
            if(isset($params['provenance'])){
                if($and == ""){
                    $and .=" WHERE provenance LIKE '%".$params['provenance']."%'";
                } else {
                    $and .=" AND provenance LIKE '%".$params['provenance']."%'";
                }
            }
            
            if(isset($params['email'])){
                if($and == ""){
                    $and .=" WHERE email LIKE '%".$params['email']."%'";
                } else {
                    $and .=" AND email LIKE '%".$params['email']."%'";
                }
            }
            
            if(isset($params['id_oge'])){
                if($and == ""){
                    $and .=" WHERE id_oge LIKE '%".$params['id_oge']."%'";
                } else {
                    $and .=" AND id_oge LIKE '%".$params['id_oge']."%'";
                }
            }
            if(isset($params['cursus'])){
                if($and == ""){
                    $and .=" WHERE cursus LIKE '%".$params['cursus']."%'";
                } else {
                    $and .=" AND cursus LIKE '%".$params['cursus']."%'";
                }
            }
            if(isset($params['code_postal'])){
                if($and == ""){
                    $and .=" WHERE code_postal LIKE '%".$params['code_postal']."%'";
                } else {
                    $and .=" AND code_postal LIKE '%".$params['code_postal']."%'";
                }
            }
            if(isset($params['langues'])){                 
                $langues=explode(",",$params['langues']);  
                foreach($langues as $langue){
                    if($and == ""){
                        $and .=" WHERE langues LIKE '%".$langue."%'";
                    } else {
                        if(strpos($and,$langue)==false){
                            $and .=" AND langues LIKE '%".$langue."%'";
                        }else{
                            $and .=" OR langues LIKE '%".$langue."%'";    
                        }
                    }
                }                             
                if($and == ""){
                    $and .=" WHERE langues LIKE '%".$params['langues']."%'";
                }else{
                    $and .=" AND langues LIKE '%".$params['langues']."%'";
                }                
                
            }
            if(isset($params['competences'])){
                
                $and .=$and == ""? "WHERE competences LIKE '%".$params['competences']."%'":" AND competences LIKE '%".$params['competences']."%'";
            }
            if(isset($params['motorise'])){
                if($and == ""){
                    $and .=" WHERE motorise LIKE '%".$params['motorise']."%'";
                } else {
                    $and .=" AND motorise LIKE '%".$params['motorise']."%'";
                }
            }
            if(isset($params['annee'])){
                if($and == ""){
                    $and .=" WHERE annee LIKE '%".$params['annee']."%'";
                } else {
                    $and .=" AND annee LIKE '%".$params['annee']."%'";
                }
            }
            if(isset($params['evaluation'])){
                if($and == ""){
                    $and .=" WHERE evaluation LIKE '%".$params['evaluation']."%'";
                } else {
                    $and .=" AND evaluation LIKE '%".$params['evaluation']."%'";
                }
            }
            if(isset($params['status'])){
                if($and == ""){
                    $and .=" WHERE status LIKE '%".$params['status']."%'";
                } else {
                    $and .=" AND status LIKE '%".$params['status']."%'";
                }
            }
            $sql        = "SELECT " . $fields . " ".$and." LIMIT ".$limit." OFFSET ". $offset;            
            $queryCount = "SELECT " . $fields . " ".$and;            
            $sqlMajor['count'] = $this->counterQuery($queryCount);
            $resultat = $this->bdd->query($sql);
            $result   = array();
            while($record = $this->bdd->fetch_array($resultat)) {
                $result[] = $record;
            }
            $sqlMajor['cdms'] = $result;            
            return $sqlMajor;
        }
        
        function counterQuery($query) {
            $sql = "SELECT count(*) FROM (".$query.") as count" ;
            $result = $this->bdd->query($sql);
            return (int)($this->bdd->result($result,0,0));
        }
        
        
        
        
        /* récupérer le dernier enregistrement */
        function max_id()
	{
		$sql = 'SELECT * FROM `cdms` ORDER BY `id_cdm` DESC LIMIT 1';

		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
		{
			$result[] = $record;
		}
		return $result;
	} 
        
        
        
        
        
        
        
        
        function selectWithoutIds($ids){
            $sql = "SELECT * FROM cdms ";
            foreach($ids as $k => $id){
                if($k == 0){
                    $sql .= " WHERE archive != 2 AND id_cdm != ".$id;
                }else{
                    $sql .= " AND id_cdm != ".$id;
                }
                
            }
            $resultat = $this->bdd->query($sql);
            $result = array();
            while($record = $this->bdd->fetch_array($resultat))
            {
               $result[] = $record;
            }
            return $result; 
       }
       
       
       
       function rechercherQuery($nom){
            $sql = "SELECT * FROM cdms WHERE nom LIKE '".$nom."%' and status=1 and archive != 2";
            $resultat = $this->bdd->query($sql);
            $result = array();
                    while($record = $this->bdd->fetch_array($resultat))
                    {
               $result[] = $record;
                    }
            return $result; 
        }
   
   
}