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
// 
// ************* //
// ENVIRONNEMENT //
// ************* //
$config['env'] = (filter_input(INPUT_SERVER, 'REDIRECT_APPENV') != '' ? filter_input(INPUT_SERVER, 'REDIRECT_APPENV') : filter_input(INPUT_SERVER, 'APPENV'));
$config['cms'] = 'iZinoa'; //(iZinoa ou iZicom)
//
// ********************************** //
// CONFIGURATION DE LA DB ET DU DEBUG //
// ********************************** //
// CREATION DES TABLEAUX DE CONFIG DE LA DB
$config['bdd_config']['dev'] = array();
$config['bdd_option']['dev'] = array();
///////////////////////////////////////////
$config['bdd_config']['demo'] = array();
$config['bdd_option']['demo'] = array();
///////////////////////////////////////////
$config['bdd_config']['prod'] = array();
$config['bdd_option']['prod'] = array();

// POPULATION DES TABLEAUX DE CONFIG DE LA DB	
$config['bdd_config']['dev']['HOST'] = 'localhost';
$config['bdd_config']['dev']['USER'] = 'root';
$config['bdd_config']['dev']['PASSWORD'] = '';   // Code Serveur Equinoa: g5rtohavd5kiz2dm!!!
$config['bdd_config']['dev']['BDD'] = 'oge';
$config['bdd_config']['dev']['NOM'] = 'oge-dev';

// Affiche les erreurs des requetes dans la fenetre de debug
$config['bdd_option']['dev']['DISPLAY_ERREUR'] = true;
// Affiche tout plein de choses dans la fenetre de debug
$config['bdd_option']['dev']['DEBUG_DISPLAY'] = false;
// Connexion automatique � l'instanciation de l'objet BDD (par d�faut)
$config['bdd_option']['dev']['AUTO_CONNECT'] = true;
// Fait p�ter les boites mails si les requetes sont trop lentes
$config['bdd_option']['dev']['BDD_PANIC'] = false;
$config['bdd_option']['dev']['BDD_PANIC_SEUIL'] = 10; //en seconde
$config['bdd_option']['dev']['BDD_PANIC_MAIL'] = '';

//////////////////////////////////////////////	

$config['bdd_config']['demo']['HOST'] = 'localhost';
$config['bdd_config']['demo']['USER'] = 'oge';
$config['bdd_config']['demo']['PASSWORD'] = 'KzXvhCYvCw43V9Zq';
$config['bdd_config']['demo']['BDD'] = 'oge';
$config['bdd_config']['demo']['NOM'] = 'oge-demo';

// Affiche les erreurs des requetes dans la fenetre de debug
$config['bdd_option']['demo']['DISPLAY_ERREUR'] = false;
// Affiche tout plein de choses dans la fenetre de debug
$config['bdd_option']['demo']['DEBUG_DISPLAY'] = false;
// Connexion automatique � l'instanciation de l'objet BDD (par d�faut)
$config['bdd_option']['demo']['AUTO_CONNECT'] = true;
// Fait p�ter les boites mails si les requetes sont trop lentes
$config['bdd_option']['demo']['BDD_PANIC'] = false;
$config['bdd_option']['demo']['BDD_PANIC_SEUIL'] = 10; //en seconde
$config['bdd_option']['demo']['BDD_PANIC_MAIL'] = '';

//////////////////////////////////////////////

$config['bdd_config']['prod']['HOST'] = '';
$config['bdd_config']['prod']['USER'] = '';
$config['bdd_config']['prod']['PASSWORD'] = '';
$config['bdd_config']['prod']['BDD'] = '';
$config['bdd_config']['prod']['NOM'] = '';

// Affiche les erreurs des requetes dans la fenetre de debug
$config['bdd_option']['prod']['DISPLAY_ERREUR'] = false;
// Affiche tout plein de choses dans la fenetre de debug
$config['bdd_option']['prod']['DEBUG_DISPLAY'] = false;
// Connexion automatique � l'instanciation de l'objet BDD (par d�faut)
$config['bdd_option']['prod']['AUTO_CONNECT'] = true;
// Fait p�ter les boites mails si les requetes sont trop lentes
$config['bdd_option']['prod']['BDD_PANIC'] = false;
$config['bdd_option']['prod']['BDD_PANIC_SEUIL'] = 10; //en seconde
$config['bdd_option']['prod']['BDD_PANIC_MAIL'] = '';

// ************************* //
// VARIABLES D'ENVIRONNEMENT //
// ************************* //	
//APPLICATION DEFAULT (http://monappli.dev.equinoa.net)
$config['url']['dev']['default'] = 'http://localhost/oge';
$config['url']['demo']['default'] = 'http://oge.equinoa.net';
$config['url']['prod']['default'] = '';
//APPLICATION ADMIN (http://monappli.admin.dev.equinoa.net)
$config['url']['dev']['admin'] = 'http://localhost/oge.admin';
$config['url']['demo']['admin'] = 'http://admin.oge.equinoa.net';
$config['url']['prod']['admin'] = '';
//URL STATIC (http://monappli.static.dev.equinoa.net)
//Contenu statique : JS / CSS / IMAGES...
$config['static_url']['dev'] = 'http://localhost/oge';
$config['static_url']['demo'] = 'http://oge.equinoa.net';
$config['static_url']['prod'] = '';

//PATH (/home/web/monappli/dev/)
//Chemin de l'environnement d'hebergement
$config['path']['dev'] = dirname(dirname(getcwd())).'/';
$config['path']['demo'] = dirname(dirname(getcwd())).'/';
$config['path']['prod'] = '';
//PATH USER (/home/web/monappli/dev/public/static/var/)
//Chemin des fichiers utilisateurs (uploades par exemple)
$config['user_path']['dev'] = dirname(dirname(getcwd())).'/public/default/var/';
$config['user_path']['demo'] = dirname(dirname(getcwd())).'/public/default/var/';
$config['user_path']['prod'] = '';

// ************** //
// ERROR HANDLING //
// ************** //
// Mail destinataire des erreurs critiques (vide si pas d'envoi par mail, vaguement conseille)
$config['AdminMail']['dev'] = '';
$config['AdminMail']['demo'] = '';
$config['AdminMail']['prod'] = '';
// Mode de logging des erreurs (DB / FILE / RIEN)
// Can be ; file (777 on /log), db (errors table)
$config['DebugMode']['dev'] = '';
$config['DebugMode']['demo'] = '';
$config['DebugMode']['prod'] = '';

// **************** //
// GESTION DE L'URL //
// **************** //
// Mode de gestion des parametres (literal = nom et valeur du parametre dans l'URL, ex. : id_18, default = valeur uniquement, ex. 18)
$config['params']['mode'] = 'literal';
// Separateur pour le mode literal
$config['params']['separator'] = '___';
// Utilisation de la table de routage
$config['params']['routage'] = false;

// ******************* //
// GESTION DES LANGUES //
// ******************* //
// Activation des langues
$config['multilanguage']['enabled'] = false;
// Mode de gestion des langues (default : literal = langue dans l'URL, seule config possible a date)
$config['multilanguage']['mode'] = 'literal';
// Liste des langues autorisees, la premiere est la langue par defaut (array('en'=>'Anglais','fr'=>'Francais') par exemple)
$config['multilanguage']['allowed_languages'] = array('fr' => 'Francais');
//liste des langues par defaut pour un domaine, ex:array('aspartam.dev.equinoa.net'=>'fr')
$config['multilanguage']['domain_default_languages'] = array();

// ************************ //
// POSITIONNEMENT DES BLOCS //
// ************************ //
// Si true, inclusion des vues : HEAD / VUE COURANTE / HEADER / FOOTER
// Si false, inclusion des vues : HEAD / HEADER / VUE COURANTE / FOOTER
$config['params']['seo_optimize'] = false;

// ***** //
// CACHE //
// ***** //
// Activation du cache (on demand)
$config['cache']['dev'] = false;
$config['cache']['demo'] = false;
$config['cache']['prod'] = false;
// Dur�e du cache (en minutes)
$config['cacheDuration']['dev'] = 10;
$config['cacheDuration']['demo'] = 1440;
$config['cacheDuration']['prod'] = 1440;

// ****************** //
// LISTE DES IP ADMIN //
// ****************** //

$config['ip_admin']['dev'] = array('78.225.42.28', '93.26.42.99');
$config['ip_admin']['demo'] = array('78.225.42.28', '93.26.42.99');
$config['ip_admin']['prod'] = array();

// ****************************** //
// GESTION DU SUPER ADMIN EQUINOA //
// ****************************** //

$config['superAdmin'] = false;

// ************** //
// ERROR HANDLER  //
// ************** //
// allow : on active le error handler ? 
// file : chemin vers le fichier de log
// allow_display : on affichage les erreurs ? 0:non, 1:oui
// allow_log : on log les erreurs ? 0:non, 1:oui
// report : les erreurs qui nous interessent : par defaut, tout sauf les notices
//////////////////////////////////////////////  
$config['error_handler']['dev']['activate'] = true;
$config['error_handler']['dev']['file'] = $config['path']['dev'] . 'log/error-dev.txt';
$config['error_handler']['dev']['allow_display'] = '1';
$config['error_handler']['dev']['allow_log'] = '1';
$config['error_handler']['dev']['report'] = E_ERROR | E_WARNING | E_PARSE;

//////////////////////////////////////////////  
$config['error_handler']['demo']['activate'] = true;
$config['error_handler']['demo']['file'] = $config['path']['demo'] . 'log/error-demo.txt';
$config['error_handler']['demo']['allow_display'] = '0';
$config['error_handler']['demo']['allow_log'] = '1';
$config['error_handler']['demo']['report'] = E_ERROR | E_WARNING | E_PARSE;

//////////////////////////////////////////////  
$config['error_handler']['prod']['activate'] = true;
$config['error_handler']['prod']['file'] = $config['path']['prod'] . 'log/error-prod.txt';
$config['error_handler']['prod']['allow_display'] = '0';
$config['error_handler']['prod']['allow_log'] = '1';
$config['error_handler']['prod']['report'] = E_ERROR | E_WARNING | E_PARSE;
