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

class transactions extends transactions_crud
{

	function transactions($bdd,$params='')
    {
        parent::transactions($bdd,$params);
    }
    
    function get($id,$field='id_transaction')
    {
        return parent::get($id,$field);
    }
    
    function update($cs='')
    {
        parent::update($cs);
    }
    
    function delete($id,$field='id_transaction')
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
		$sql = 'SELECT * FROM `transactions`'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));

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
			
		$sql='SELECT count(*) FROM `transactions` '.$where;

		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	}
	
	function exist($id,$field='id_transaction')
	{
		$sql = 'SELECT * FROM `transactions` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		return ($this->bdd->fetch_array($result,0,0)>0);
	}
	
	//******************************************************************************************//
	//**************************************** AJOUTS ******************************************//
	//******************************************************************************************//	
	
	function getCodePays($id_pays)
	{
		$sql = 'SELECT id_langue FROM `pays` WHERE id_pays = "'.$id_pays.'"';
		$result = $this->bdd->query($sql);
		return strtoupper($this->bdd->result($result,0,0));
	}
	
	function recupCAByMonthForAYear($year)
	{
		$sql = 'SELECT SUM(montant/100) AS montant, LEFT(date_transaction,7) AS date FROM transactions WHERE status = 1 AND etat != 3 AND date_transaction LIKE "'.$year.'%" GROUP BY LEFT(date_transaction,7)';
		$req = $this->bdd->query($sql);
		$res = array();
		while($rec = $this->bdd->fetch_array($req))
        {
			$d = explode('-',$rec['date']);
            $res[$d[1]] = $rec['montant'];
        }
		return $res;
	}
	
	function recupCAByMonthForAYearType($year,$id_type=0)
	{
		$sql = 'SELECT SUM(montant/100) AS montant, LEFT(date_transaction,7) AS date FROM transactions WHERE status = 1 AND etat != 3 AND id_partenaire IN (SELECT id_partenaire FROM partenaires WHERE id_type  = "'.$id_type.'") AND date_transaction LIKE "'.$year.'%" GROUP BY LEFT(date_transaction,7)';
		$req = $this->bdd->query($sql);
		$res = array();
		while($rec = $this->bdd->fetch_array($req))
        {
			$d = explode('-',$rec['date']);
            $res[$d[1]] = $rec['montant'];
        }
		return $res;
	}
	
	function getCAcommandes($deb_jour, $deb_mois, $deb_annee, $fin_jour, $fin_mois, $fin_annee)
	{
		$deb = str_pad($deb_annee, 4, '0', STR_PAD_LEFT).'-'.str_pad($deb_mois, 2, '0', STR_PAD_LEFT).'-'.str_pad($deb_jour, 2, '0', STR_PAD_LEFT);
		$fin = str_pad($fin_annee, 4, '0', STR_PAD_LEFT).'-'.str_pad($fin_mois, 2, '0', STR_PAD_LEFT).'-'.str_pad($fin_jour, 2, '0', STR_PAD_LEFT);
		
		$sql = "SELECT SUM(montant/100) AS somme FROM transactions WHERE status = 1 AND etat != 3 AND date_transaction >= '" . $deb . " 00:00:00' AND date_transaction <= '" . $fin . " 23:59:59'";
		$result = $this->bdd->query($sql);
		$somme = $this->bdd->result($result, 0, 'somme');
		if($somme == '') $somme = 0;
		
		return $somme;
	}
	
	function getNBcommandes($deb_jour, $deb_mois, $deb_annee, $fin_jour, $fin_mois, $fin_annee)
	{
		$deb = str_pad($deb_annee, 4, '0', STR_PAD_LEFT).'-'.str_pad($deb_mois, 2, '0', STR_PAD_LEFT).'-'.str_pad($deb_jour, 2, '0', STR_PAD_LEFT);
		$fin = str_pad($fin_annee, 4, '0', STR_PAD_LEFT).'-'.str_pad($fin_mois, 2, '0', STR_PAD_LEFT).'-'.str_pad($fin_jour, 2, '0', STR_PAD_LEFT);
		
		$sql = "SELECT COUNT(*) AS nombre FROM transactions WHERE status = 1 AND etat != 3 AND date_transaction >= '" . $deb . " 00:00:00' AND date_transaction <= '" . $fin . " 23:59:59'";
		$result = $this->bdd->query($sql);
		$nombre = $this->bdd->result($result, 0, 'nombre');
		if($nombre == '') $nombre = 0;
		return $nombre;
	}
	
	function getNBabandons($deb_jour, $deb_mois, $deb_annee, $fin_jour, $fin_mois, $fin_annee)
	{
		$deb = str_pad($deb_annee, 4, '0', STR_PAD_LEFT).'-'.str_pad($deb_mois, 2, '0', STR_PAD_LEFT).'-'.str_pad($deb_jour, 2, '0', STR_PAD_LEFT);
		$fin = str_pad($fin_annee, 4, '0', STR_PAD_LEFT).'-'.str_pad($fin_mois, 2, '0', STR_PAD_LEFT).'-'.str_pad($fin_jour, 2, '0', STR_PAD_LEFT);
		
		$sql = "SELECT COUNT(*) AS nombre FROM paniers WHERE added >= '" . $deb . " 00:00:00' AND added <= '" . $fin . " 23:59:59'";
		$result = $this->bdd->query($sql);
		$nombre = $this->bdd->result($result, 0, 'nombre');
		if($nombre == '') $nombre = 0;
		return $nombre;
	}
	
	function searchCommandes($ref='',$nom='',$email='',$prenom='',$debut='',$fin='')
	{
		$where = 'WHERE 1=1 AND t.status = 1 ';
		
		if($ref != '') { $where .= 'AND t.id_transaction LIKE "%'.$ref.'%" '; }
		if($nom != '') { $where .= 'AND c.nom LIKE "%'.$nom.'%" '; }
		if($email != '') { $where .= 'AND c.email LIKE "%'.$email.'%" '; }
		if($prenom != '') { $where .= 'AND c.prenom LIKE "%'.$prenom.'%" '; }
		if($debut != '--') { $where .= 'AND t.date_transaction >= "'.$debut.' 00:00:00" '; }
		if($fin != '--') { $where .= 'AND t.date_transaction <= "'.$fin.' 23:59:59" '; }
		
		$sql = 'SELECT t.* FROM transactions t LEFT JOIN clients c ON c.id_client = t.id_client '.$where.' ORDER BY t.date_transaction DESC';
		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
        {
            $result[] = $record;
        }

        return $result;
	}
	
	function recupHitProduits($limit)
	{
		$sql = 'SELECT reference as Reference, nom as Nom, sum(quantite) as NbVentes, round(sum(`prix_ht`*quantite),2) as CAht FROM `transactions_produits` join transactions on transactions.id_transaction = transactions_produits.id_transaction where transactions.status=1 and transactions.etat < 3 group by reference order by CAht desc limit '.$limit;	
											
		$resultat = $this->bdd->query($sql);
		$result = array();
		while($record = $this->bdd->fetch_array($resultat))
        {
            $result[] = $record;
        }
        return $result;										
	}
}