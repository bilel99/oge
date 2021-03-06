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

class users extends users_crud {

    function users($bdd, $params = '') {
        parent::users($bdd, $params);
    }

    function get($id, $field = 'id_user') {
        return parent::get($id, $field);
    }

    function update($cs = '') {
        parent::update($cs);
    }

    function delete($id, $field = 'id_user') {
        parent::delete($id, $field);
    }

    function create($cs = '') {
        $id = parent::create($cs);
        return $id;
    }

    function select($where = '', $order = '', $start = '', $nb = '') {
        if ($where != '')
            $where = ' WHERE ' . $where;
        if ($order != '')
            $order = ' ORDER BY ' . $order;
        $sql = 'SELECT * FROM `users`' . $where . $order . ($nb != '' && $start != '' ? ' LIMIT ' . $start . ',' . $nb : ($nb != '' ? ' LIMIT ' . $nb : ''));

        $resultat = $this->bdd->query($sql);
        $result = array();
        while ($record = $this->bdd->fetch_array($resultat)) {
            $result[] = $record;
        }
        return $result;
    }

    function counter($where = '') {
        if ($where != '')
            $where = ' WHERE ' . $where;

        $sql = 'SELECT count(*) FROM `users` ' . $where;

        $result = $this->bdd->query($sql);
        return (int) ($this->bdd->result($result, 0, 0));
    }

    function exist($id, $field = 'id_user') {
        $sql = 'SELECT * FROM `users` WHERE ' . $field . '="' . $id . '"';
        $result = $this->bdd->query($sql);
        return ($this->bdd->fetch_array($result, 0, 0) > 0);
    }

    //******************************************************************************************//
    //**************************************** AJOUTS ******************************************//
    //******************************************************************************************//

    var $loginPage = 'login';
    var $connectedPage = '';
    var $userTable = 'users';
    var $securityKey = 'users';
    var $userMail = 'email';
    var $userPass = 'password';
    var $cdpsPass = 'mdp';

    public function handleLoginFront($email, $pass) {
        if ($email != '' && $pass != '') {
            $user = $this->loginFront($email, $pass);

            if ($user != false) {
                $_SESSION['user'] = $user;
            }
        }
    }

    public function loginFront($email, $pass) {
        $email = $this->bdd->escape_string($email);

        $sql = 'SELECT * FROM ' . $this->userTable . ' WHERE ' . $this->userMail . ' = "' . $email . '" AND ' . $this->userPass . ' = "' . $pass . '"';
        $res = $this->bdd->query($sql);

        if ($this->bdd->num_rows($res) == 1) {
            return $this->bdd->fetch_array($res);
        } else {
            return false;
        }
    }

    public function handleLogoutFront() {
        unset($_SESSION['user']);
    }

    public function handleLogin($button, $email, $pass) {
        $_SESSION['user'] = $_SESSION['userCdpSession'];
        if (isset($_POST[$button])) {
            $user = $this->login($_POST[$email], $_POST[$pass]);
            //var_dump($user);
            if ($user != false) {
                $_SESSION['auth'] = true;
                $_SESSION['token'] = md5(md5(mktime() . $this->securityKey));
                $_SESSION['userCdpSession'] = $user;
                

                //var_dump($_SESSION);
                // Mise à jour pour la derniere connexion du user
                $sql = 'UPDATE ' . $this->userTable . ' SET lastlogin = NOW() WHERE email = "' . $_POST[$email] . '" AND password = "' . md5($_POST[$pass]) . '"';
                $this->bdd->query($sql);

                // Mise à jour pour la derniere connexion du CDPS
                $sql2 = 'UPDATE `cdps` SET lastlogin = NOW() WHERE email = "' . $_POST[$email] . '" AND mdp = "' . md5($_POST[$pass]) . '" ';
                $this->bdd->query($sql2);

                // Renvoi sur la page apres connexion
                if (isset($_SESSION['request_url']) && $_SESSION['request_url'] != '' && $_SESSION['request_url'] != 'login') {
                    header('location:' . $_SESSION['request_url']);
                    die;
                } else {
                    header('location:' . $this->params['url'] . '/' . $this->connectedPage);
                    die;
                }
            } else {
                // Mise en session du message
                $_SESSION['msgErreur'] = 'loginError';

                header('location:' . $this->params['url'] . '/' . $this->loginPage);
                die;
            }
        }
    }

    public function handleLogout() {
        unset($_SESSION['auth']);
        unset($_SESSION['token']);
        unset($_SESSION['user']);
        unset($_SESSION['request_url']);

        header('location:' . $this->params['url'] . '/' . $this->loginPage);
    }

    public function login($email, $pass) {
        $email = $this->bdd->escape_string($email);

        //$sql = 'SELECT * FROM users AS u, cdps AS c WHERE u.email = "'.$email.'" AND u.password = "'.md5($pass).'" OR c.email = "'.$email.'" AND c.mdp = "'.md5($pass).'"  ';
        $sql = 'SELECT * FROM users WHERE email = "' . $email . '" AND password = "' . md5($pass) . '" ';
        //$sql = 'SELECT * FROM cdps WHERE email = "'.$email.'" AND mdp = "'.md5($pass).'" ';
        $sql2 = 'SELECT * FROM cdps WHERE email = "' . $email . '" AND mdp = "' . md5($pass) . '" ';

        $res = $this->bdd->query($sql);
        $res2 = $this->bdd->query($sql2);
        if ($this->bdd->num_rows($res) == 1) {
            return $this->bdd->fetch_array($res);
        } else if ($this->bdd->num_rows($res2) == 1) {
            return $this->bdd->fetch_array($res2);
        } else {
            return false;
        }
    }

    function changePassword($email, $pass) {
        $email = $this->bdd->escape_string($email);

        $sql = 'UPDATE ' . $this->userTable . ' SET ' . $this->userPass . ' = "' . md5($pass) . '" WHERE ' . $this->userMail . ' = "' . $email . '"';
        $this->bdd->query($sql);
    }

    function existEmail($email) {
        $email = $this->bdd->escape_string($email);

        $sql = 'SELECT * FROM ' . $this->userTable . ' WHERE ' . $this->userMail . ' = "' . $email . '"';
        $res = $this->bdd->query($sql);

        if ($this->bdd->num_rows($res) == 1) {
            return false;
        } else {
            return true;
        }
    }

    function checkAccess($zone = '') {
        
        if (in_array($_SERVER['REMOTE_ADDR'], $this->params['config']['ip_admin'][$this->params['config']['env']]) && $this->params['config']['superAdmin']) {
            if (!isset($_SESSION['user'])) {
                $sql = 'SELECT * FROM ' . $this->userTable . ' WHERE id_user = 1';
                $res = $this->bdd->query($sql);
                
                if ($this->bdd->num_rows($res) == 1) {
                    $_SESSION['auth'] = true;
                    $_SESSION['token'] = md5(md5(mktime() . $this->securityKey));
                    $_SESSION['user'] = $this->bdd->fetch_array($res);
                } else {
                    // Mise en session du message
                    $_SESSION['msgErreur'] = 'loginError';

                    header('location:' . $this->params['url'] . '/' . $this->loginPage);
                    die;
                }
            }
        } else {
            if ($_SESSION['auth'] != true) {
                header('location:' . $this->params['url'] . '/' . $this->loginPage);
                die;
            }

            if (trim($_SESSION['token']) == '') {
                header('location:' . $this->params['url'] . '/' . $this->loginPage);
                die;
            }

            $sql = 'SELECT COUNT(*) FROM ' . $this->userTable . ' WHERE id_user = "' . $_SESSION['user']['id_user'] . '" AND password = "' . $_SESSION['user']['password'] . '"';
            $res = $this->bdd->query($sql);


            if ($this->bdd->result($res, 0) != 1) {

                // CDPS ZONE
                $sql2 = 'SELECT COUNT(*) FROM cdps WHERE id_cdp = "' . $_SESSION['user']['id_cdp'] . '" AND mdp = "' . $_SESSION['user']['mdp'] . '"';
                $res2 = $this->bdd->query($sql2);
                if ($this->bdd->result($res2, 0) != 1) {
                //var_dump($this->bdd->result($res2, 0));
                    // Mise en session du message
                    $_SESSION['msgErreur'] = 'loginError';

                    header('location:' . $this->params['url'] . '/' . $this->loginPage);
                    die;
                } else {
                    if ($zone != '') {
                        // Recuperation de l'ID de la Zone
                        $sql = 'SELECT id_zone FROM zones WHERE slug = "' . $zone . '"';
                        $result = $this->bdd->query($sql);
                        $record = $this->bdd->fetch_array($result);
                        $id_zone = $record['id_zone'];
                        // On check si l'user a le droit a cette zone
                        $sql2 = 'SELECT * FROM cdps_zones WHERE id_cdp = ' . $_SESSION['user']['id_cdp'] . ' AND id_zone = "' . $id_zone . '"';
                        $result2 = $this->bdd->query($sql2);
                        $nb = $this->bdd->num_rows();
                        

                        if ($nb == 1) {
                            return true;
                        } else {
                            // Mise en session du message
                            $_SESSION['msgErreur'] = 'loginInterdit';
                            header('location:' . $this->params['url'] . '/' . $this->loginPage);
                            die;
                        }
                    }
                }
            } else {
                if ($zone != '') {
                    
                    // Recuperation de l'ID de la Zone
                    $sql = 'SELECT id_zone FROM zones WHERE slug = "' . $zone . '"';
                    $result = $this->bdd->query($sql);
                    $record = $this->bdd->fetch_array($result);

                    $id_zone = $record['id_zone'];

                    // On check si l'user a le droit a cette zone
                    $sql2 = 'SELECT * FROM users_zones WHERE id_user = ' . $_SESSION['user']['id_user'] . ' AND id_zone = "' . $id_zone . '"';
                    $result2 = $this->bdd->query($sql2);
                    $nb = $this->bdd->num_rows();
                    

                    if ($nb == 1) {
                        return true;
                    } else {
                        // Mise en session du message
                        $_SESSION['msgErreur'] = 'loginInterdit';

                        header('location:' . $this->params['url'] . '/' . $this->loginPage);
                        die;
                    }
                }
            }
        }
    }

}
