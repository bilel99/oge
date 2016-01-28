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

class clients extends clients_crud
{

	function clients($bdd,$params='')
    {
        parent::clients($bdd,$params);
    }
    
    function get($id,$field='id_client')
    {
        return parent::get($id,$field);
    }
    
    function update($cs='')
    {
        parent::update($cs);
    }
    
    function delete($id,$field='id_client')
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
		$sql = 'SELECT * FROM `clients`'.$where.$order.($nb!='' && $start !=''?' LIMIT '.$start.','.$nb:($nb!=''?' LIMIT '.$nb:''));

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
			
		$sql='SELECT count(*) FROM `clients` '.$where;

		$result = $this->bdd->query($sql);
		return (int)($this->bdd->result($result,0,0));
	}
	
	function exist($id,$field='id_client')
	{
		$sql = 'SELECT * FROM `clients` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		return ($this->bdd->fetch_array($result,0,0)>0);
	}
	
	//******************************************************************************************//
	//**************************************** AJOUTS ******************************************//
	//******************************************************************************************//
	
	var $loginPage = '';
	var $connectedPage = '';
	var $userTable = 'clients';
	var $securityKey = 'clients';
	var $userMail = 'email';
	var $userPass = 'password';
	
	public function handleLogin($button,$email,$pass)
	{
		if(isset($_POST[$button]))
		{
			$client = $this->login($_POST[$email],$_POST[$pass]);
			
			if($client != false)
			{
				$_SESSION['auth'] = true;
				$_SESSION['token'] = md5(md5(mktime().$this->securityKey));
				$_SESSION['client'] = $client;		
				
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	public function handleLogout()
	{
		unset($_SESSION['auth']);
		unset($_SESSION['token']);
		unset($_SESSION['client']);
		unset($_SESSION['panier']);
		unset($_SESSION['partenaire']);
		
		header('location:http://'.$_SERVER['HTTP_HOST'].'/'.$this->params['lng'].$this->loginPage);
	}
	
	public function login($email,$pass)
	{
		$sql = 'SELECT * FROM '.$this->userTable.' WHERE '.$this->userMail.' = "'.$email.'" AND '.$this->userPass.' = "'.md5($pass).'"';
		$res = $this->bdd->query($sql);
		
		if($this->bdd->num_rows($res) == 1)
		{
			return $this->bdd->fetch_array($res);
		}
		else
		{
			return false;
		}
	}
	
	public function loginUpdate()
	{
		$sql = 'SELECT * FROM '.$this->userTable.' WHERE id_client = "'.$_SESSION['client']['id_client'].'" AND hash = "'.$_SESSION['client']['hash'].'"';
		$res = $this->bdd->query($sql);
		
		if($this->bdd->num_rows($res) == 1)
		{
			return $this->bdd->fetch_array($res);
		}
		else
		{
			return false;
		}
	}
	
	function changePassword($email,$pass)
	{
		$sql = 'UPDATE '.$this->userTable.' SET '.$this->userPass.' = "'.md5($pass).'" WHERE '.$this->userMail.' = "'.$email.'"';
		$this->bdd->query($sql);
	}
	
	function existEmail($email)
	{
		$sql = 'SELECT * FROM '.$this->userTable.' WHERE '.$this->userMail.' = "'.$email.'"';
		$res = $this->bdd->query($sql);
		
		if($this->bdd->num_rows($res) == 1)
		{
			return false;
		}
		else
		{
			return true;	
		}
	}
	
	function checkAccess()
	{
		if($_SESSION['auth'] != true)
		{
			return false;
		}
		
		if(trim($_SESSION['token']) == '')
		{
			return false;
		}
		
		$sql = 'SELECT COUNT(*) FROM '.$this->userTable.' WHERE id_client = "'.$_SESSION['client']['id_client'].'" AND password = "'.$_SESSION['client']['password'].'"';
		$res = $this->bdd->query($sql);
		
		if($this->bdd->result($res,0) != 1)
		{
			return false;
		}
		else
		{
			return true;	
		}
	}
	
	function searchClients($ref='',$nom='',$email='',$prenom='')
	{
		$where = 'WHERE 1 = 1';
		
		if($ref != '') { $where .= ' AND t.id_transaction LIKE "%'.$ref.'%"'; }
		if($nom != '') { $where .= ' AND c.nom LIKE "%'.$nom.'%"'; }
		if($email != '') { $where .= ' AND c.email LIKE "%'.$email.'%"'; }
		if($prenom != '') { $where .= ' AND c.prenom LIKE "%'.$prenom.'%"'; }
		
		$sql = 'SELECT c.* FROM clients c LEFT JOIN transactions t ON t.id_client = c.id_client '.$where.' GROUP BY c.id_client ORDER BY c.added DESC';
		$resultat = $this->bdd->query($sql);
		$result = array();
		
		while($record = $this->bdd->fetch_array($resultat))
        {
            $result[] = $record;
        }
        return $result;
	}
        
        
}