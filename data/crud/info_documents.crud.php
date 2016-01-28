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
class info_documents_crud
{
	
	public $id_info_document;
	public $id_document;
	public $sessionIdCdp;
	public $etudes_id_etudes;
	public $etudes_id_oge_client;
	public $etudes_id_contact;
	public $etudes_num_convention;
	public $etudes_nom_interne;
	public $etudes_descriptif;
	public $etudes_budget_fsi;
	public $etudes_je;
	public $etudes_budget_hfs;
	public $etudes_frais_previsio;
	public $etudes_date_debut;
	public $etudes_date_fin;
	public $etudes_note_de_frais;
	public $contacts_nom_contact;
	public $contacts_prenom_contact;
	public $contacts_fonction;
	public $contacts_tel_fixe;
	public $contacts_tel_port;
	public $contacts_linkedin;
	public $contacts_email;
	public $ogeClient_num_oge_client;
	public $ogeClient_typologie;
	public $ogeClient_type;
	public $ogeClient_nom;
	public $ogeClient_prenom;
	public $ogeClient_nom_societe;
	public $ogeClient_activite;
	public $ogeClient_id_sector;
	public $ogeClient_capital;
	public $ogeClient_etranger;
	public $ogeClient_id_forme;
	public $ogeClient_siret;
	public $ogeClient_lieu_rcs;
	public $ogeClient_num_rcs;
	public $ogeClient_num_tva;
	public $ogeClient_adresse;
	public $ogeClient_ville;
	public $ogeClient_tel_standard;
	public $ogeClient_provenance;
	public $ogeClient_code_postal;
	public $ogeClient_id_pays;
	public $ogeClient_site_internet;
	public $cdms_nom;
	public $cdms_prenom;
	public $cdms_telephone;
	public $cdms_email;
	public $cdms_banner;
	public $cdms_date_naissance;
	public $cdms_adresse;
	public $cdms_ville;
	public $cdms_code_postal;
	public $cdms_motorise;
	public $cdms_num_ss;
	public $cdms_provenance;
	public $cdms_langues;
	public $cdms_cursus;
	public $cdms_annee;
	public $cdms_details;
	public $cdms_role;
	public $session_id_cdm;
	public $cdps_nom;
	public $cdps_prenom;
	public $cdps_telephone;
	public $cdps_annee;
	public $cdps_nom_interne;
	public $cdps_email;
	public $cdps_adresse;
	public $cdps_ville;
	public $cdps_code_postal;
	public $cdps_num_ss;
	public $cdps_details;
	public $cdps_role;
	public $session_id_cdp;
	public $fait_leDate;
	public $Setting1Document;
	public $Setting2Document;
	public $Setting3Document;
	public $Setting4Document;
	public $Setting5Document;
	public $Setting6Document;
	public $Setting7Document;
	public $Setting1eachtimeDocument;
	public $SettingCompagnyName;
	public $Setting9_Document;
	public $Setting10_Document;
	public $Setting12_Document;
	public $convention_settings1;
	public $convention_settings2;
	public $convention_settings3;
	public $convention_settings4;
	public $convention_settings5;
	public $convention_settings6;
	public $convention_settings7;
	public $attestation_fin_mission_settings1;
	public $facture_settings1;
	public $facture_settings2;
	public $facture_settings3;
	public $facture_settings4;
	public $facture_settings5;
	public $facture_settings6;
	public $facture_settings7;
	public $montantTva;
	public $totalTtcFacture;
	public $facturefrais_settings1;
	public $facturefrais_settings2;
	public $facturefrais_settings3;
	public $facturefrais_settings4;
	public $facturefrais_settings5;
	public $facturefrais_settings6;
	public $facturefrais_settings7;
	public $facturefrais_settings8;
	public $facturefrais_settings9;
	public $facturefrais_settings10;
	public $facturefrais_settings11;
	public $hortTaxeTotal;
	public $tvaTotal;
	public $ttcTotal;
	public $accordConfidentialite_settings1;
	public $avenant_settings1;
	public $avenant_settings2;
	public $choixCdpNom;
	public $choixCdpPrenom;
	public $ChoixCdpId;
	public $added;
	public $uptated;

	
	function info_documents($bdd,$params='')
	{
		$this->bdd = $bdd;
		if($params=='')
			$params = array();
		$this->params = $params;
		$this->id_info_document = '';
		$this->id_document = '';
		$this->sessionIdCdp = '';
		$this->etudes_id_etudes = '';
		$this->etudes_id_oge_client = '';
		$this->etudes_id_contact = '';
		$this->etudes_num_convention = '';
		$this->etudes_nom_interne = '';
		$this->etudes_descriptif = '';
		$this->etudes_budget_fsi = '';
		$this->etudes_je = '';
		$this->etudes_budget_hfs = '';
		$this->etudes_frais_previsio = '';
		$this->etudes_date_debut = '';
		$this->etudes_date_fin = '';
		$this->etudes_note_de_frais = '';
		$this->contacts_nom_contact = '';
		$this->contacts_prenom_contact = '';
		$this->contacts_fonction = '';
		$this->contacts_tel_fixe = '';
		$this->contacts_tel_port = '';
		$this->contacts_linkedin = '';
		$this->contacts_email = '';
		$this->ogeClient_num_oge_client = '';
		$this->ogeClient_typologie = '';
		$this->ogeClient_type = '';
		$this->ogeClient_nom = '';
		$this->ogeClient_prenom = '';
		$this->ogeClient_nom_societe = '';
		$this->ogeClient_activite = '';
		$this->ogeClient_id_sector = '';
		$this->ogeClient_capital = '';
		$this->ogeClient_etranger = '';
		$this->ogeClient_id_forme = '';
		$this->ogeClient_siret = '';
		$this->ogeClient_lieu_rcs = '';
		$this->ogeClient_num_rcs = '';
		$this->ogeClient_num_tva = '';
		$this->ogeClient_adresse = '';
		$this->ogeClient_ville = '';
		$this->ogeClient_tel_standard = '';
		$this->ogeClient_provenance = '';
		$this->ogeClient_code_postal = '';
		$this->ogeClient_id_pays = '';
		$this->ogeClient_site_internet = '';
		$this->cdms_nom = '';
		$this->cdms_prenom = '';
		$this->cdms_telephone = '';
		$this->cdms_email = '';
		$this->cdms_banner = '';
		$this->cdms_date_naissance = '';
		$this->cdms_adresse = '';
		$this->cdms_ville = '';
		$this->cdms_code_postal = '';
		$this->cdms_motorise = '';
		$this->cdms_num_ss = '';
		$this->cdms_provenance = '';
		$this->cdms_langues = '';
		$this->cdms_cursus = '';
		$this->cdms_annee = '';
		$this->cdms_details = '';
		$this->cdms_role = '';
		$this->session_id_cdm = '';
		$this->cdps_nom = '';
		$this->cdps_prenom = '';
		$this->cdps_telephone = '';
		$this->cdps_annee = '';
		$this->cdps_nom_interne = '';
		$this->cdps_email = '';
		$this->cdps_adresse = '';
		$this->cdps_ville = '';
		$this->cdps_code_postal = '';
		$this->cdps_num_ss = '';
		$this->cdps_details = '';
		$this->cdps_role = '';
		$this->session_id_cdp = '';
		$this->fait_leDate = '';
		$this->Setting1Document = '';
		$this->Setting2Document = '';
		$this->Setting3Document = '';
		$this->Setting4Document = '';
		$this->Setting5Document = '';
		$this->Setting6Document = '';
		$this->Setting7Document = '';
		$this->Setting1eachtimeDocument = '';
		$this->SettingCompagnyName = '';
		$this->Setting9_Document = '';
		$this->Setting10_Document = '';
		$this->Setting12_Document = '';
		$this->convention_settings1 = '';
		$this->convention_settings2 = '';
		$this->convention_settings3 = '';
		$this->convention_settings4 = '';
		$this->convention_settings5 = '';
		$this->convention_settings6 = '';
		$this->convention_settings7 = '';
		$this->attestation_fin_mission_settings1 = '';
		$this->facture_settings1 = '';
		$this->facture_settings2 = '';
		$this->facture_settings3 = '';
		$this->facture_settings4 = '';
		$this->facture_settings5 = '';
		$this->facture_settings6 = '';
		$this->facture_settings7 = '';
		$this->montantTva = '';
		$this->totalTtcFacture = '';
		$this->facturefrais_settings1 = '';
		$this->facturefrais_settings2 = '';
		$this->facturefrais_settings3 = '';
		$this->facturefrais_settings4 = '';
		$this->facturefrais_settings5 = '';
		$this->facturefrais_settings6 = '';
		$this->facturefrais_settings7 = '';
		$this->facturefrais_settings8 = '';
		$this->facturefrais_settings9 = '';
		$this->facturefrais_settings10 = '';
		$this->facturefrais_settings11 = '';
		$this->hortTaxeTotal = '';
		$this->tvaTotal = '';
		$this->ttcTotal = '';
		$this->accordConfidentialite_settings1 = '';
		$this->avenant_settings1 = '';
		$this->avenant_settings2 = '';
		$this->choixCdpNom = '';
		$this->choixCdpPrenom = '';
		$this->ChoixCdpId = '';
		$this->added = '';
		$this->uptated = '';

	}
	
	function get($id,$field='id_info_document')
	{
		$sql = 'SELECT * FROM  `info_documents` WHERE '.$field.'="'.$id.'"';
		$result = $this->bdd->query($sql);
		
		if($this->bdd->num_rows()==1)
		{
			$record = $this->bdd->fetch_array($result);
		
				$this->id_info_document = $record['id_info_document'];
			$this->id_document = $record['id_document'];
			$this->sessionIdCdp = $record['sessionIdCdp'];
			$this->etudes_id_etudes = $record['etudes_id_etudes'];
			$this->etudes_id_oge_client = $record['etudes_id_oge_client'];
			$this->etudes_id_contact = $record['etudes_id_contact'];
			$this->etudes_num_convention = $record['etudes_num_convention'];
			$this->etudes_nom_interne = $record['etudes_nom_interne'];
			$this->etudes_descriptif = $record['etudes_descriptif'];
			$this->etudes_budget_fsi = $record['etudes_budget_fsi'];
			$this->etudes_je = $record['etudes_je'];
			$this->etudes_budget_hfs = $record['etudes_budget_hfs'];
			$this->etudes_frais_previsio = $record['etudes_frais_previsio'];
			$this->etudes_date_debut = $record['etudes_date_debut'];
			$this->etudes_date_fin = $record['etudes_date_fin'];
			$this->etudes_note_de_frais = $record['etudes_note_de_frais'];
			$this->contacts_nom_contact = $record['contacts_nom_contact'];
			$this->contacts_prenom_contact = $record['contacts_prenom_contact'];
			$this->contacts_fonction = $record['contacts_fonction'];
			$this->contacts_tel_fixe = $record['contacts_tel_fixe'];
			$this->contacts_tel_port = $record['contacts_tel_port'];
			$this->contacts_linkedin = $record['contacts_linkedin'];
			$this->contacts_email = $record['contacts_email'];
			$this->ogeClient_num_oge_client = $record['ogeClient_num_oge_client'];
			$this->ogeClient_typologie = $record['ogeClient_typologie'];
			$this->ogeClient_type = $record['ogeClient_type'];
			$this->ogeClient_nom = $record['ogeClient_nom'];
			$this->ogeClient_prenom = $record['ogeClient_prenom'];
			$this->ogeClient_nom_societe = $record['ogeClient_nom_societe'];
			$this->ogeClient_activite = $record['ogeClient_activite'];
			$this->ogeClient_id_sector = $record['ogeClient_id_sector'];
			$this->ogeClient_capital = $record['ogeClient_capital'];
			$this->ogeClient_etranger = $record['ogeClient_etranger'];
			$this->ogeClient_id_forme = $record['ogeClient_id_forme'];
			$this->ogeClient_siret = $record['ogeClient_siret'];
			$this->ogeClient_lieu_rcs = $record['ogeClient_lieu_rcs'];
			$this->ogeClient_num_rcs = $record['ogeClient_num_rcs'];
			$this->ogeClient_num_tva = $record['ogeClient_num_tva'];
			$this->ogeClient_adresse = $record['ogeClient_adresse'];
			$this->ogeClient_ville = $record['ogeClient_ville'];
			$this->ogeClient_tel_standard = $record['ogeClient_tel_standard'];
			$this->ogeClient_provenance = $record['ogeClient_provenance'];
			$this->ogeClient_code_postal = $record['ogeClient_code_postal'];
			$this->ogeClient_id_pays = $record['ogeClient_id_pays'];
			$this->ogeClient_site_internet = $record['ogeClient_site_internet'];
			$this->cdms_nom = $record['cdms_nom'];
			$this->cdms_prenom = $record['cdms_prenom'];
			$this->cdms_telephone = $record['cdms_telephone'];
			$this->cdms_email = $record['cdms_email'];
			$this->cdms_banner = $record['cdms_banner'];
			$this->cdms_date_naissance = $record['cdms_date_naissance'];
			$this->cdms_adresse = $record['cdms_adresse'];
			$this->cdms_ville = $record['cdms_ville'];
			$this->cdms_code_postal = $record['cdms_code_postal'];
			$this->cdms_motorise = $record['cdms_motorise'];
			$this->cdms_num_ss = $record['cdms_num_ss'];
			$this->cdms_provenance = $record['cdms_provenance'];
			$this->cdms_langues = $record['cdms_langues'];
			$this->cdms_cursus = $record['cdms_cursus'];
			$this->cdms_annee = $record['cdms_annee'];
			$this->cdms_details = $record['cdms_details'];
			$this->cdms_role = $record['cdms_role'];
			$this->session_id_cdm = $record['session_id_cdm'];
			$this->cdps_nom = $record['cdps_nom'];
			$this->cdps_prenom = $record['cdps_prenom'];
			$this->cdps_telephone = $record['cdps_telephone'];
			$this->cdps_annee = $record['cdps_annee'];
			$this->cdps_nom_interne = $record['cdps_nom_interne'];
			$this->cdps_email = $record['cdps_email'];
			$this->cdps_adresse = $record['cdps_adresse'];
			$this->cdps_ville = $record['cdps_ville'];
			$this->cdps_code_postal = $record['cdps_code_postal'];
			$this->cdps_num_ss = $record['cdps_num_ss'];
			$this->cdps_details = $record['cdps_details'];
			$this->cdps_role = $record['cdps_role'];
			$this->session_id_cdp = $record['session_id_cdp'];
			$this->fait_leDate = $record['fait_leDate'];
			$this->Setting1Document = $record['Setting1Document'];
			$this->Setting2Document = $record['Setting2Document'];
			$this->Setting3Document = $record['Setting3Document'];
			$this->Setting4Document = $record['Setting4Document'];
			$this->Setting5Document = $record['Setting5Document'];
			$this->Setting6Document = $record['Setting6Document'];
			$this->Setting7Document = $record['Setting7Document'];
			$this->Setting1eachtimeDocument = $record['Setting1eachtimeDocument'];
			$this->SettingCompagnyName = $record['SettingCompagnyName'];
			$this->Setting9_Document = $record['Setting9_Document'];
			$this->Setting10_Document = $record['Setting10_Document'];
			$this->Setting12_Document = $record['Setting12_Document'];
			$this->convention_settings1 = $record['convention_settings1'];
			$this->convention_settings2 = $record['convention_settings2'];
			$this->convention_settings3 = $record['convention_settings3'];
			$this->convention_settings4 = $record['convention_settings4'];
			$this->convention_settings5 = $record['convention_settings5'];
			$this->convention_settings6 = $record['convention_settings6'];
			$this->convention_settings7 = $record['convention_settings7'];
			$this->attestation_fin_mission_settings1 = $record['attestation_fin_mission_settings1'];
			$this->facture_settings1 = $record['facture_settings1'];
			$this->facture_settings2 = $record['facture_settings2'];
			$this->facture_settings3 = $record['facture_settings3'];
			$this->facture_settings4 = $record['facture_settings4'];
			$this->facture_settings5 = $record['facture_settings5'];
			$this->facture_settings6 = $record['facture_settings6'];
			$this->facture_settings7 = $record['facture_settings7'];
			$this->montantTva = $record['montantTva'];
			$this->totalTtcFacture = $record['totalTtcFacture'];
			$this->facturefrais_settings1 = $record['facturefrais_settings1'];
			$this->facturefrais_settings2 = $record['facturefrais_settings2'];
			$this->facturefrais_settings3 = $record['facturefrais_settings3'];
			$this->facturefrais_settings4 = $record['facturefrais_settings4'];
			$this->facturefrais_settings5 = $record['facturefrais_settings5'];
			$this->facturefrais_settings6 = $record['facturefrais_settings6'];
			$this->facturefrais_settings7 = $record['facturefrais_settings7'];
			$this->facturefrais_settings8 = $record['facturefrais_settings8'];
			$this->facturefrais_settings9 = $record['facturefrais_settings9'];
			$this->facturefrais_settings10 = $record['facturefrais_settings10'];
			$this->facturefrais_settings11 = $record['facturefrais_settings11'];
			$this->hortTaxeTotal = $record['hortTaxeTotal'];
			$this->tvaTotal = $record['tvaTotal'];
			$this->ttcTotal = $record['ttcTotal'];
			$this->accordConfidentialite_settings1 = $record['accordConfidentialite_settings1'];
			$this->avenant_settings1 = $record['avenant_settings1'];
			$this->avenant_settings2 = $record['avenant_settings2'];
			$this->choixCdpNom = $record['choixCdpNom'];
			$this->choixCdpPrenom = $record['choixCdpPrenom'];
			$this->ChoixCdpId = $record['ChoixCdpId'];
			$this->added = $record['added'];
			$this->uptated = $record['uptated'];

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
		$this->id_info_document = $this->bdd->escape_string($this->id_info_document);
		$this->id_document = $this->bdd->escape_string($this->id_document);
		$this->sessionIdCdp = $this->bdd->escape_string($this->sessionIdCdp);
		$this->etudes_id_etudes = $this->bdd->escape_string($this->etudes_id_etudes);
		$this->etudes_id_oge_client = $this->bdd->escape_string($this->etudes_id_oge_client);
		$this->etudes_id_contact = $this->bdd->escape_string($this->etudes_id_contact);
		$this->etudes_num_convention = $this->bdd->escape_string($this->etudes_num_convention);
		$this->etudes_nom_interne = $this->bdd->escape_string($this->etudes_nom_interne);
		$this->etudes_descriptif = $this->bdd->escape_string($this->etudes_descriptif);
		$this->etudes_budget_fsi = $this->bdd->escape_string($this->etudes_budget_fsi);
		$this->etudes_je = $this->bdd->escape_string($this->etudes_je);
		$this->etudes_budget_hfs = $this->bdd->escape_string($this->etudes_budget_hfs);
		$this->etudes_frais_previsio = $this->bdd->escape_string($this->etudes_frais_previsio);
		$this->etudes_date_debut = $this->bdd->escape_string($this->etudes_date_debut);
		$this->etudes_date_fin = $this->bdd->escape_string($this->etudes_date_fin);
		$this->etudes_note_de_frais = $this->bdd->escape_string($this->etudes_note_de_frais);
		$this->contacts_nom_contact = $this->bdd->escape_string($this->contacts_nom_contact);
		$this->contacts_prenom_contact = $this->bdd->escape_string($this->contacts_prenom_contact);
		$this->contacts_fonction = $this->bdd->escape_string($this->contacts_fonction);
		$this->contacts_tel_fixe = $this->bdd->escape_string($this->contacts_tel_fixe);
		$this->contacts_tel_port = $this->bdd->escape_string($this->contacts_tel_port);
		$this->contacts_linkedin = $this->bdd->escape_string($this->contacts_linkedin);
		$this->contacts_email = $this->bdd->escape_string($this->contacts_email);
		$this->ogeClient_num_oge_client = $this->bdd->escape_string($this->ogeClient_num_oge_client);
		$this->ogeClient_typologie = $this->bdd->escape_string($this->ogeClient_typologie);
		$this->ogeClient_type = $this->bdd->escape_string($this->ogeClient_type);
		$this->ogeClient_nom = $this->bdd->escape_string($this->ogeClient_nom);
		$this->ogeClient_prenom = $this->bdd->escape_string($this->ogeClient_prenom);
		$this->ogeClient_nom_societe = $this->bdd->escape_string($this->ogeClient_nom_societe);
		$this->ogeClient_activite = $this->bdd->escape_string($this->ogeClient_activite);
		$this->ogeClient_id_sector = $this->bdd->escape_string($this->ogeClient_id_sector);
		$this->ogeClient_capital = $this->bdd->escape_string($this->ogeClient_capital);
		$this->ogeClient_etranger = $this->bdd->escape_string($this->ogeClient_etranger);
		$this->ogeClient_id_forme = $this->bdd->escape_string($this->ogeClient_id_forme);
		$this->ogeClient_siret = $this->bdd->escape_string($this->ogeClient_siret);
		$this->ogeClient_lieu_rcs = $this->bdd->escape_string($this->ogeClient_lieu_rcs);
		$this->ogeClient_num_rcs = $this->bdd->escape_string($this->ogeClient_num_rcs);
		$this->ogeClient_num_tva = $this->bdd->escape_string($this->ogeClient_num_tva);
		$this->ogeClient_adresse = $this->bdd->escape_string($this->ogeClient_adresse);
		$this->ogeClient_ville = $this->bdd->escape_string($this->ogeClient_ville);
		$this->ogeClient_tel_standard = $this->bdd->escape_string($this->ogeClient_tel_standard);
		$this->ogeClient_provenance = $this->bdd->escape_string($this->ogeClient_provenance);
		$this->ogeClient_code_postal = $this->bdd->escape_string($this->ogeClient_code_postal);
		$this->ogeClient_id_pays = $this->bdd->escape_string($this->ogeClient_id_pays);
		$this->ogeClient_site_internet = $this->bdd->escape_string($this->ogeClient_site_internet);
		$this->cdms_nom = $this->bdd->escape_string($this->cdms_nom);
		$this->cdms_prenom = $this->bdd->escape_string($this->cdms_prenom);
		$this->cdms_telephone = $this->bdd->escape_string($this->cdms_telephone);
		$this->cdms_email = $this->bdd->escape_string($this->cdms_email);
		$this->cdms_banner = $this->bdd->escape_string($this->cdms_banner);
		$this->cdms_date_naissance = $this->bdd->escape_string($this->cdms_date_naissance);
		$this->cdms_adresse = $this->bdd->escape_string($this->cdms_adresse);
		$this->cdms_ville = $this->bdd->escape_string($this->cdms_ville);
		$this->cdms_code_postal = $this->bdd->escape_string($this->cdms_code_postal);
		$this->cdms_motorise = $this->bdd->escape_string($this->cdms_motorise);
		$this->cdms_num_ss = $this->bdd->escape_string($this->cdms_num_ss);
		$this->cdms_provenance = $this->bdd->escape_string($this->cdms_provenance);
		$this->cdms_langues = $this->bdd->escape_string($this->cdms_langues);
		$this->cdms_cursus = $this->bdd->escape_string($this->cdms_cursus);
		$this->cdms_annee = $this->bdd->escape_string($this->cdms_annee);
		$this->cdms_details = $this->bdd->escape_string($this->cdms_details);
		$this->cdms_role = $this->bdd->escape_string($this->cdms_role);
		$this->session_id_cdm = $this->bdd->escape_string($this->session_id_cdm);
		$this->cdps_nom = $this->bdd->escape_string($this->cdps_nom);
		$this->cdps_prenom = $this->bdd->escape_string($this->cdps_prenom);
		$this->cdps_telephone = $this->bdd->escape_string($this->cdps_telephone);
		$this->cdps_annee = $this->bdd->escape_string($this->cdps_annee);
		$this->cdps_nom_interne = $this->bdd->escape_string($this->cdps_nom_interne);
		$this->cdps_email = $this->bdd->escape_string($this->cdps_email);
		$this->cdps_adresse = $this->bdd->escape_string($this->cdps_adresse);
		$this->cdps_ville = $this->bdd->escape_string($this->cdps_ville);
		$this->cdps_code_postal = $this->bdd->escape_string($this->cdps_code_postal);
		$this->cdps_num_ss = $this->bdd->escape_string($this->cdps_num_ss);
		$this->cdps_details = $this->bdd->escape_string($this->cdps_details);
		$this->cdps_role = $this->bdd->escape_string($this->cdps_role);
		$this->session_id_cdp = $this->bdd->escape_string($this->session_id_cdp);
		$this->fait_leDate = $this->bdd->escape_string($this->fait_leDate);
		$this->Setting1Document = $this->bdd->escape_string($this->Setting1Document);
		$this->Setting2Document = $this->bdd->escape_string($this->Setting2Document);
		$this->Setting3Document = $this->bdd->escape_string($this->Setting3Document);
		$this->Setting4Document = $this->bdd->escape_string($this->Setting4Document);
		$this->Setting5Document = $this->bdd->escape_string($this->Setting5Document);
		$this->Setting6Document = $this->bdd->escape_string($this->Setting6Document);
		$this->Setting7Document = $this->bdd->escape_string($this->Setting7Document);
		$this->Setting1eachtimeDocument = $this->bdd->escape_string($this->Setting1eachtimeDocument);
		$this->SettingCompagnyName = $this->bdd->escape_string($this->SettingCompagnyName);
		$this->Setting9_Document = $this->bdd->escape_string($this->Setting9_Document);
		$this->Setting10_Document = $this->bdd->escape_string($this->Setting10_Document);
		$this->Setting12_Document = $this->bdd->escape_string($this->Setting12_Document);
		$this->convention_settings1 = $this->bdd->escape_string($this->convention_settings1);
		$this->convention_settings2 = $this->bdd->escape_string($this->convention_settings2);
		$this->convention_settings3 = $this->bdd->escape_string($this->convention_settings3);
		$this->convention_settings4 = $this->bdd->escape_string($this->convention_settings4);
		$this->convention_settings5 = $this->bdd->escape_string($this->convention_settings5);
		$this->convention_settings6 = $this->bdd->escape_string($this->convention_settings6);
		$this->convention_settings7 = $this->bdd->escape_string($this->convention_settings7);
		$this->attestation_fin_mission_settings1 = $this->bdd->escape_string($this->attestation_fin_mission_settings1);
		$this->facture_settings1 = $this->bdd->escape_string($this->facture_settings1);
		$this->facture_settings2 = $this->bdd->escape_string($this->facture_settings2);
		$this->facture_settings3 = $this->bdd->escape_string($this->facture_settings3);
		$this->facture_settings4 = $this->bdd->escape_string($this->facture_settings4);
		$this->facture_settings5 = $this->bdd->escape_string($this->facture_settings5);
		$this->facture_settings6 = $this->bdd->escape_string($this->facture_settings6);
		$this->facture_settings7 = $this->bdd->escape_string($this->facture_settings7);
		$this->montantTva = $this->bdd->escape_string($this->montantTva);
		$this->totalTtcFacture = $this->bdd->escape_string($this->totalTtcFacture);
		$this->facturefrais_settings1 = $this->bdd->escape_string($this->facturefrais_settings1);
		$this->facturefrais_settings2 = $this->bdd->escape_string($this->facturefrais_settings2);
		$this->facturefrais_settings3 = $this->bdd->escape_string($this->facturefrais_settings3);
		$this->facturefrais_settings4 = $this->bdd->escape_string($this->facturefrais_settings4);
		$this->facturefrais_settings5 = $this->bdd->escape_string($this->facturefrais_settings5);
		$this->facturefrais_settings6 = $this->bdd->escape_string($this->facturefrais_settings6);
		$this->facturefrais_settings7 = $this->bdd->escape_string($this->facturefrais_settings7);
		$this->facturefrais_settings8 = $this->bdd->escape_string($this->facturefrais_settings8);
		$this->facturefrais_settings9 = $this->bdd->escape_string($this->facturefrais_settings9);
		$this->facturefrais_settings10 = $this->bdd->escape_string($this->facturefrais_settings10);
		$this->facturefrais_settings11 = $this->bdd->escape_string($this->facturefrais_settings11);
		$this->hortTaxeTotal = $this->bdd->escape_string($this->hortTaxeTotal);
		$this->tvaTotal = $this->bdd->escape_string($this->tvaTotal);
		$this->ttcTotal = $this->bdd->escape_string($this->ttcTotal);
		$this->accordConfidentialite_settings1 = $this->bdd->escape_string($this->accordConfidentialite_settings1);
		$this->avenant_settings1 = $this->bdd->escape_string($this->avenant_settings1);
		$this->avenant_settings2 = $this->bdd->escape_string($this->avenant_settings2);
		$this->choixCdpNom = $this->bdd->escape_string($this->choixCdpNom);
		$this->choixCdpPrenom = $this->bdd->escape_string($this->choixCdpPrenom);
		$this->ChoixCdpId = $this->bdd->escape_string($this->ChoixCdpId);
		$this->added = $this->bdd->escape_string($this->added);
		$this->uptated = $this->bdd->escape_string($this->uptated);

		
		$sql = 'UPDATE `info_documents` SET `id_document`="'.$this->id_document.'",`sessionIdCdp`="'.$this->sessionIdCdp.'",`etudes_id_etudes`="'.$this->etudes_id_etudes.'",`etudes_id_oge_client`="'.$this->etudes_id_oge_client.'",`etudes_id_contact`="'.$this->etudes_id_contact.'",`etudes_num_convention`="'.$this->etudes_num_convention.'",`etudes_nom_interne`="'.$this->etudes_nom_interne.'",`etudes_descriptif`="'.$this->etudes_descriptif.'",`etudes_budget_fsi`="'.$this->etudes_budget_fsi.'",`etudes_je`="'.$this->etudes_je.'",`etudes_budget_hfs`="'.$this->etudes_budget_hfs.'",`etudes_frais_previsio`="'.$this->etudes_frais_previsio.'",`etudes_date_debut`="'.$this->etudes_date_debut.'",`etudes_date_fin`="'.$this->etudes_date_fin.'",`etudes_note_de_frais`="'.$this->etudes_note_de_frais.'",`contacts_nom_contact`="'.$this->contacts_nom_contact.'",`contacts_prenom_contact`="'.$this->contacts_prenom_contact.'",`contacts_fonction`="'.$this->contacts_fonction.'",`contacts_tel_fixe`="'.$this->contacts_tel_fixe.'",`contacts_tel_port`="'.$this->contacts_tel_port.'",`contacts_linkedin`="'.$this->contacts_linkedin.'",`contacts_email`="'.$this->contacts_email.'",`ogeClient_num_oge_client`="'.$this->ogeClient_num_oge_client.'",`ogeClient_typologie`="'.$this->ogeClient_typologie.'",`ogeClient_type`="'.$this->ogeClient_type.'",`ogeClient_nom`="'.$this->ogeClient_nom.'",`ogeClient_prenom`="'.$this->ogeClient_prenom.'",`ogeClient_nom_societe`="'.$this->ogeClient_nom_societe.'",`ogeClient_activite`="'.$this->ogeClient_activite.'",`ogeClient_id_sector`="'.$this->ogeClient_id_sector.'",`ogeClient_capital`="'.$this->ogeClient_capital.'",`ogeClient_etranger`="'.$this->ogeClient_etranger.'",`ogeClient_id_forme`="'.$this->ogeClient_id_forme.'",`ogeClient_siret`="'.$this->ogeClient_siret.'",`ogeClient_lieu_rcs`="'.$this->ogeClient_lieu_rcs.'",`ogeClient_num_rcs`="'.$this->ogeClient_num_rcs.'",`ogeClient_num_tva`="'.$this->ogeClient_num_tva.'",`ogeClient_adresse`="'.$this->ogeClient_adresse.'",`ogeClient_ville`="'.$this->ogeClient_ville.'",`ogeClient_tel_standard`="'.$this->ogeClient_tel_standard.'",`ogeClient_provenance`="'.$this->ogeClient_provenance.'",`ogeClient_code_postal`="'.$this->ogeClient_code_postal.'",`ogeClient_id_pays`="'.$this->ogeClient_id_pays.'",`ogeClient_site_internet`="'.$this->ogeClient_site_internet.'",`cdms_nom`="'.$this->cdms_nom.'",`cdms_prenom`="'.$this->cdms_prenom.'",`cdms_telephone`="'.$this->cdms_telephone.'",`cdms_email`="'.$this->cdms_email.'",`cdms_banner`="'.$this->cdms_banner.'",`cdms_date_naissance`="'.$this->cdms_date_naissance.'",`cdms_adresse`="'.$this->cdms_adresse.'",`cdms_ville`="'.$this->cdms_ville.'",`cdms_code_postal`="'.$this->cdms_code_postal.'",`cdms_motorise`="'.$this->cdms_motorise.'",`cdms_num_ss`="'.$this->cdms_num_ss.'",`cdms_provenance`="'.$this->cdms_provenance.'",`cdms_langues`="'.$this->cdms_langues.'",`cdms_cursus`="'.$this->cdms_cursus.'",`cdms_annee`="'.$this->cdms_annee.'",`cdms_details`="'.$this->cdms_details.'",`cdms_role`="'.$this->cdms_role.'",`session_id_cdm`="'.$this->session_id_cdm.'",`cdps_nom`="'.$this->cdps_nom.'",`cdps_prenom`="'.$this->cdps_prenom.'",`cdps_telephone`="'.$this->cdps_telephone.'",`cdps_annee`="'.$this->cdps_annee.'",`cdps_nom_interne`="'.$this->cdps_nom_interne.'",`cdps_email`="'.$this->cdps_email.'",`cdps_adresse`="'.$this->cdps_adresse.'",`cdps_ville`="'.$this->cdps_ville.'",`cdps_code_postal`="'.$this->cdps_code_postal.'",`cdps_num_ss`="'.$this->cdps_num_ss.'",`cdps_details`="'.$this->cdps_details.'",`cdps_role`="'.$this->cdps_role.'",`session_id_cdp`="'.$this->session_id_cdp.'",`fait_leDate`="'.$this->fait_leDate.'",`Setting1Document`="'.$this->Setting1Document.'",`Setting2Document`="'.$this->Setting2Document.'",`Setting3Document`="'.$this->Setting3Document.'",`Setting4Document`="'.$this->Setting4Document.'",`Setting5Document`="'.$this->Setting5Document.'",`Setting6Document`="'.$this->Setting6Document.'",`Setting7Document`="'.$this->Setting7Document.'",`Setting1eachtimeDocument`="'.$this->Setting1eachtimeDocument.'",`SettingCompagnyName`="'.$this->SettingCompagnyName.'",`Setting9_Document`="'.$this->Setting9_Document.'",`Setting10_Document`="'.$this->Setting10_Document.'",`Setting12_Document`="'.$this->Setting12_Document.'",`convention_settings1`="'.$this->convention_settings1.'",`convention_settings2`="'.$this->convention_settings2.'",`convention_settings3`="'.$this->convention_settings3.'",`convention_settings4`="'.$this->convention_settings4.'",`convention_settings5`="'.$this->convention_settings5.'",`convention_settings6`="'.$this->convention_settings6.'",`convention_settings7`="'.$this->convention_settings7.'",`attestation_fin_mission_settings1`="'.$this->attestation_fin_mission_settings1.'",`facture_settings1`="'.$this->facture_settings1.'",`facture_settings2`="'.$this->facture_settings2.'",`facture_settings3`="'.$this->facture_settings3.'",`facture_settings4`="'.$this->facture_settings4.'",`facture_settings5`="'.$this->facture_settings5.'",`facture_settings6`="'.$this->facture_settings6.'",`facture_settings7`="'.$this->facture_settings7.'",`montantTva`="'.$this->montantTva.'",`totalTtcFacture`="'.$this->totalTtcFacture.'",`facturefrais_settings1`="'.$this->facturefrais_settings1.'",`facturefrais_settings2`="'.$this->facturefrais_settings2.'",`facturefrais_settings3`="'.$this->facturefrais_settings3.'",`facturefrais_settings4`="'.$this->facturefrais_settings4.'",`facturefrais_settings5`="'.$this->facturefrais_settings5.'",`facturefrais_settings6`="'.$this->facturefrais_settings6.'",`facturefrais_settings7`="'.$this->facturefrais_settings7.'",`facturefrais_settings8`="'.$this->facturefrais_settings8.'",`facturefrais_settings9`="'.$this->facturefrais_settings9.'",`facturefrais_settings10`="'.$this->facturefrais_settings10.'",`facturefrais_settings11`="'.$this->facturefrais_settings11.'",`hortTaxeTotal`="'.$this->hortTaxeTotal.'",`tvaTotal`="'.$this->tvaTotal.'",`ttcTotal`="'.$this->ttcTotal.'",`accordConfidentialite_settings1`="'.$this->accordConfidentialite_settings1.'",`avenant_settings1`="'.$this->avenant_settings1.'",`avenant_settings2`="'.$this->avenant_settings2.'",`choixCdpNom`="'.$this->choixCdpNom.'",`choixCdpPrenom`="'.$this->choixCdpPrenom.'",`ChoixCdpId`="'.$this->ChoixCdpId.'",`added`="'.$this->added.'",`uptated`="'.$this->uptated.'" WHERE id_info_document="'.$this->id_info_document.'"';
		$this->bdd->query($sql);
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_info_document,'id_info_document');
	}
	
	function delete($id,$field='id_info_document')
	{
		if($id=='')
			$id = $this->id_info_document;
		$sql = 'DELETE FROM `info_documents` WHERE '.$field.'="'.$id.'"';
		$this->bdd->query($sql);
	}
	
	function create($cs='')
	{
		$this->id_info_document = $this->bdd->escape_string($this->id_info_document);
		$this->id_document = $this->bdd->escape_string($this->id_document);
		$this->sessionIdCdp = $this->bdd->escape_string($this->sessionIdCdp);
		$this->etudes_id_etudes = $this->bdd->escape_string($this->etudes_id_etudes);
		$this->etudes_id_oge_client = $this->bdd->escape_string($this->etudes_id_oge_client);
		$this->etudes_id_contact = $this->bdd->escape_string($this->etudes_id_contact);
		$this->etudes_num_convention = $this->bdd->escape_string($this->etudes_num_convention);
		$this->etudes_nom_interne = $this->bdd->escape_string($this->etudes_nom_interne);
		$this->etudes_descriptif = $this->bdd->escape_string($this->etudes_descriptif);
		$this->etudes_budget_fsi = $this->bdd->escape_string($this->etudes_budget_fsi);
		$this->etudes_je = $this->bdd->escape_string($this->etudes_je);
		$this->etudes_budget_hfs = $this->bdd->escape_string($this->etudes_budget_hfs);
		$this->etudes_frais_previsio = $this->bdd->escape_string($this->etudes_frais_previsio);
		$this->etudes_date_debut = $this->bdd->escape_string($this->etudes_date_debut);
		$this->etudes_date_fin = $this->bdd->escape_string($this->etudes_date_fin);
		$this->etudes_note_de_frais = $this->bdd->escape_string($this->etudes_note_de_frais);
		$this->contacts_nom_contact = $this->bdd->escape_string($this->contacts_nom_contact);
		$this->contacts_prenom_contact = $this->bdd->escape_string($this->contacts_prenom_contact);
		$this->contacts_fonction = $this->bdd->escape_string($this->contacts_fonction);
		$this->contacts_tel_fixe = $this->bdd->escape_string($this->contacts_tel_fixe);
		$this->contacts_tel_port = $this->bdd->escape_string($this->contacts_tel_port);
		$this->contacts_linkedin = $this->bdd->escape_string($this->contacts_linkedin);
		$this->contacts_email = $this->bdd->escape_string($this->contacts_email);
		$this->ogeClient_num_oge_client = $this->bdd->escape_string($this->ogeClient_num_oge_client);
		$this->ogeClient_typologie = $this->bdd->escape_string($this->ogeClient_typologie);
		$this->ogeClient_type = $this->bdd->escape_string($this->ogeClient_type);
		$this->ogeClient_nom = $this->bdd->escape_string($this->ogeClient_nom);
		$this->ogeClient_prenom = $this->bdd->escape_string($this->ogeClient_prenom);
		$this->ogeClient_nom_societe = $this->bdd->escape_string($this->ogeClient_nom_societe);
		$this->ogeClient_activite = $this->bdd->escape_string($this->ogeClient_activite);
		$this->ogeClient_id_sector = $this->bdd->escape_string($this->ogeClient_id_sector);
		$this->ogeClient_capital = $this->bdd->escape_string($this->ogeClient_capital);
		$this->ogeClient_etranger = $this->bdd->escape_string($this->ogeClient_etranger);
		$this->ogeClient_id_forme = $this->bdd->escape_string($this->ogeClient_id_forme);
		$this->ogeClient_siret = $this->bdd->escape_string($this->ogeClient_siret);
		$this->ogeClient_lieu_rcs = $this->bdd->escape_string($this->ogeClient_lieu_rcs);
		$this->ogeClient_num_rcs = $this->bdd->escape_string($this->ogeClient_num_rcs);
		$this->ogeClient_num_tva = $this->bdd->escape_string($this->ogeClient_num_tva);
		$this->ogeClient_adresse = $this->bdd->escape_string($this->ogeClient_adresse);
		$this->ogeClient_ville = $this->bdd->escape_string($this->ogeClient_ville);
		$this->ogeClient_tel_standard = $this->bdd->escape_string($this->ogeClient_tel_standard);
		$this->ogeClient_provenance = $this->bdd->escape_string($this->ogeClient_provenance);
		$this->ogeClient_code_postal = $this->bdd->escape_string($this->ogeClient_code_postal);
		$this->ogeClient_id_pays = $this->bdd->escape_string($this->ogeClient_id_pays);
		$this->ogeClient_site_internet = $this->bdd->escape_string($this->ogeClient_site_internet);
		$this->cdms_nom = $this->bdd->escape_string($this->cdms_nom);
		$this->cdms_prenom = $this->bdd->escape_string($this->cdms_prenom);
		$this->cdms_telephone = $this->bdd->escape_string($this->cdms_telephone);
		$this->cdms_email = $this->bdd->escape_string($this->cdms_email);
		$this->cdms_banner = $this->bdd->escape_string($this->cdms_banner);
		$this->cdms_date_naissance = $this->bdd->escape_string($this->cdms_date_naissance);
		$this->cdms_adresse = $this->bdd->escape_string($this->cdms_adresse);
		$this->cdms_ville = $this->bdd->escape_string($this->cdms_ville);
		$this->cdms_code_postal = $this->bdd->escape_string($this->cdms_code_postal);
		$this->cdms_motorise = $this->bdd->escape_string($this->cdms_motorise);
		$this->cdms_num_ss = $this->bdd->escape_string($this->cdms_num_ss);
		$this->cdms_provenance = $this->bdd->escape_string($this->cdms_provenance);
		$this->cdms_langues = $this->bdd->escape_string($this->cdms_langues);
		$this->cdms_cursus = $this->bdd->escape_string($this->cdms_cursus);
		$this->cdms_annee = $this->bdd->escape_string($this->cdms_annee);
		$this->cdms_details = $this->bdd->escape_string($this->cdms_details);
		$this->cdms_role = $this->bdd->escape_string($this->cdms_role);
		$this->session_id_cdm = $this->bdd->escape_string($this->session_id_cdm);
		$this->cdps_nom = $this->bdd->escape_string($this->cdps_nom);
		$this->cdps_prenom = $this->bdd->escape_string($this->cdps_prenom);
		$this->cdps_telephone = $this->bdd->escape_string($this->cdps_telephone);
		$this->cdps_annee = $this->bdd->escape_string($this->cdps_annee);
		$this->cdps_nom_interne = $this->bdd->escape_string($this->cdps_nom_interne);
		$this->cdps_email = $this->bdd->escape_string($this->cdps_email);
		$this->cdps_adresse = $this->bdd->escape_string($this->cdps_adresse);
		$this->cdps_ville = $this->bdd->escape_string($this->cdps_ville);
		$this->cdps_code_postal = $this->bdd->escape_string($this->cdps_code_postal);
		$this->cdps_num_ss = $this->bdd->escape_string($this->cdps_num_ss);
		$this->cdps_details = $this->bdd->escape_string($this->cdps_details);
		$this->cdps_role = $this->bdd->escape_string($this->cdps_role);
		$this->session_id_cdp = $this->bdd->escape_string($this->session_id_cdp);
		$this->fait_leDate = $this->bdd->escape_string($this->fait_leDate);
		$this->Setting1Document = $this->bdd->escape_string($this->Setting1Document);
		$this->Setting2Document = $this->bdd->escape_string($this->Setting2Document);
		$this->Setting3Document = $this->bdd->escape_string($this->Setting3Document);
		$this->Setting4Document = $this->bdd->escape_string($this->Setting4Document);
		$this->Setting5Document = $this->bdd->escape_string($this->Setting5Document);
		$this->Setting6Document = $this->bdd->escape_string($this->Setting6Document);
		$this->Setting7Document = $this->bdd->escape_string($this->Setting7Document);
		$this->Setting1eachtimeDocument = $this->bdd->escape_string($this->Setting1eachtimeDocument);
		$this->SettingCompagnyName = $this->bdd->escape_string($this->SettingCompagnyName);
		$this->Setting9_Document = $this->bdd->escape_string($this->Setting9_Document);
		$this->Setting10_Document = $this->bdd->escape_string($this->Setting10_Document);
		$this->Setting12_Document = $this->bdd->escape_string($this->Setting12_Document);
		$this->convention_settings1 = $this->bdd->escape_string($this->convention_settings1);
		$this->convention_settings2 = $this->bdd->escape_string($this->convention_settings2);
		$this->convention_settings3 = $this->bdd->escape_string($this->convention_settings3);
		$this->convention_settings4 = $this->bdd->escape_string($this->convention_settings4);
		$this->convention_settings5 = $this->bdd->escape_string($this->convention_settings5);
		$this->convention_settings6 = $this->bdd->escape_string($this->convention_settings6);
		$this->convention_settings7 = $this->bdd->escape_string($this->convention_settings7);
		$this->attestation_fin_mission_settings1 = $this->bdd->escape_string($this->attestation_fin_mission_settings1);
		$this->facture_settings1 = $this->bdd->escape_string($this->facture_settings1);
		$this->facture_settings2 = $this->bdd->escape_string($this->facture_settings2);
		$this->facture_settings3 = $this->bdd->escape_string($this->facture_settings3);
		$this->facture_settings4 = $this->bdd->escape_string($this->facture_settings4);
		$this->facture_settings5 = $this->bdd->escape_string($this->facture_settings5);
		$this->facture_settings6 = $this->bdd->escape_string($this->facture_settings6);
		$this->facture_settings7 = $this->bdd->escape_string($this->facture_settings7);
		$this->montantTva = $this->bdd->escape_string($this->montantTva);
		$this->totalTtcFacture = $this->bdd->escape_string($this->totalTtcFacture);
		$this->facturefrais_settings1 = $this->bdd->escape_string($this->facturefrais_settings1);
		$this->facturefrais_settings2 = $this->bdd->escape_string($this->facturefrais_settings2);
		$this->facturefrais_settings3 = $this->bdd->escape_string($this->facturefrais_settings3);
		$this->facturefrais_settings4 = $this->bdd->escape_string($this->facturefrais_settings4);
		$this->facturefrais_settings5 = $this->bdd->escape_string($this->facturefrais_settings5);
		$this->facturefrais_settings6 = $this->bdd->escape_string($this->facturefrais_settings6);
		$this->facturefrais_settings7 = $this->bdd->escape_string($this->facturefrais_settings7);
		$this->facturefrais_settings8 = $this->bdd->escape_string($this->facturefrais_settings8);
		$this->facturefrais_settings9 = $this->bdd->escape_string($this->facturefrais_settings9);
		$this->facturefrais_settings10 = $this->bdd->escape_string($this->facturefrais_settings10);
		$this->facturefrais_settings11 = $this->bdd->escape_string($this->facturefrais_settings11);
		$this->hortTaxeTotal = $this->bdd->escape_string($this->hortTaxeTotal);
		$this->tvaTotal = $this->bdd->escape_string($this->tvaTotal);
		$this->ttcTotal = $this->bdd->escape_string($this->ttcTotal);
		$this->accordConfidentialite_settings1 = $this->bdd->escape_string($this->accordConfidentialite_settings1);
		$this->avenant_settings1 = $this->bdd->escape_string($this->avenant_settings1);
		$this->avenant_settings2 = $this->bdd->escape_string($this->avenant_settings2);
		$this->choixCdpNom = $this->bdd->escape_string($this->choixCdpNom);
		$this->choixCdpPrenom = $this->bdd->escape_string($this->choixCdpPrenom);
		$this->ChoixCdpId = $this->bdd->escape_string($this->ChoixCdpId);
		$this->added = $this->bdd->escape_string($this->added);
		$this->uptated = $this->bdd->escape_string($this->uptated);

		
		$sql = 'INSERT INTO `info_documents`(`id_document`,`sessionIdCdp`,`etudes_id_etudes`,`etudes_id_oge_client`,`etudes_id_contact`,`etudes_num_convention`,`etudes_nom_interne`,`etudes_descriptif`,`etudes_budget_fsi`,`etudes_je`,`etudes_budget_hfs`,`etudes_frais_previsio`,`etudes_date_debut`,`etudes_date_fin`,`etudes_note_de_frais`,`contacts_nom_contact`,`contacts_prenom_contact`,`contacts_fonction`,`contacts_tel_fixe`,`contacts_tel_port`,`contacts_linkedin`,`contacts_email`,`ogeClient_num_oge_client`,`ogeClient_typologie`,`ogeClient_type`,`ogeClient_nom`,`ogeClient_prenom`,`ogeClient_nom_societe`,`ogeClient_activite`,`ogeClient_id_sector`,`ogeClient_capital`,`ogeClient_etranger`,`ogeClient_id_forme`,`ogeClient_siret`,`ogeClient_lieu_rcs`,`ogeClient_num_rcs`,`ogeClient_num_tva`,`ogeClient_adresse`,`ogeClient_ville`,`ogeClient_tel_standard`,`ogeClient_provenance`,`ogeClient_code_postal`,`ogeClient_id_pays`,`ogeClient_site_internet`,`cdms_nom`,`cdms_prenom`,`cdms_telephone`,`cdms_email`,`cdms_banner`,`cdms_date_naissance`,`cdms_adresse`,`cdms_ville`,`cdms_code_postal`,`cdms_motorise`,`cdms_num_ss`,`cdms_provenance`,`cdms_langues`,`cdms_cursus`,`cdms_annee`,`cdms_details`,`cdms_role`,`session_id_cdm`,`cdps_nom`,`cdps_prenom`,`cdps_telephone`,`cdps_annee`,`cdps_nom_interne`,`cdps_email`,`cdps_adresse`,`cdps_ville`,`cdps_code_postal`,`cdps_num_ss`,`cdps_details`,`cdps_role`,`session_id_cdp`,`fait_leDate`,`Setting1Document`,`Setting2Document`,`Setting3Document`,`Setting4Document`,`Setting5Document`,`Setting6Document`,`Setting7Document`,`Setting1eachtimeDocument`,`SettingCompagnyName`,`Setting9_Document`,`Setting10_Document`,`Setting12_Document`,`convention_settings1`,`convention_settings2`,`convention_settings3`,`convention_settings4`,`convention_settings5`,`convention_settings6`,`convention_settings7`,`attestation_fin_mission_settings1`,`facture_settings1`,`facture_settings2`,`facture_settings3`,`facture_settings4`,`facture_settings5`,`facture_settings6`,`facture_settings7`,`montantTva`,`totalTtcFacture`,`facturefrais_settings1`,`facturefrais_settings2`,`facturefrais_settings3`,`facturefrais_settings4`,`facturefrais_settings5`,`facturefrais_settings6`,`facturefrais_settings7`,`facturefrais_settings8`,`facturefrais_settings9`,`facturefrais_settings10`,`facturefrais_settings11`,`hortTaxeTotal`,`tvaTotal`,`ttcTotal`,`accordConfidentialite_settings1`,`avenant_settings1`,`avenant_settings2`,`choixCdpNom`,`choixCdpPrenom`,`ChoixCdpId`,`added`,`uptated`) VALUES("'.$this->id_document.'","'.$this->sessionIdCdp.'","'.$this->etudes_id_etudes.'","'.$this->etudes_id_oge_client.'","'.$this->etudes_id_contact.'","'.$this->etudes_num_convention.'","'.$this->etudes_nom_interne.'","'.$this->etudes_descriptif.'","'.$this->etudes_budget_fsi.'","'.$this->etudes_je.'","'.$this->etudes_budget_hfs.'","'.$this->etudes_frais_previsio.'","'.$this->etudes_date_debut.'","'.$this->etudes_date_fin.'","'.$this->etudes_note_de_frais.'","'.$this->contacts_nom_contact.'","'.$this->contacts_prenom_contact.'","'.$this->contacts_fonction.'","'.$this->contacts_tel_fixe.'","'.$this->contacts_tel_port.'","'.$this->contacts_linkedin.'","'.$this->contacts_email.'","'.$this->ogeClient_num_oge_client.'","'.$this->ogeClient_typologie.'","'.$this->ogeClient_type.'","'.$this->ogeClient_nom.'","'.$this->ogeClient_prenom.'","'.$this->ogeClient_nom_societe.'","'.$this->ogeClient_activite.'","'.$this->ogeClient_id_sector.'","'.$this->ogeClient_capital.'","'.$this->ogeClient_etranger.'","'.$this->ogeClient_id_forme.'","'.$this->ogeClient_siret.'","'.$this->ogeClient_lieu_rcs.'","'.$this->ogeClient_num_rcs.'","'.$this->ogeClient_num_tva.'","'.$this->ogeClient_adresse.'","'.$this->ogeClient_ville.'","'.$this->ogeClient_tel_standard.'","'.$this->ogeClient_provenance.'","'.$this->ogeClient_code_postal.'","'.$this->ogeClient_id_pays.'","'.$this->ogeClient_site_internet.'","'.$this->cdms_nom.'","'.$this->cdms_prenom.'","'.$this->cdms_telephone.'","'.$this->cdms_email.'","'.$this->cdms_banner.'","'.$this->cdms_date_naissance.'","'.$this->cdms_adresse.'","'.$this->cdms_ville.'","'.$this->cdms_code_postal.'","'.$this->cdms_motorise.'","'.$this->cdms_num_ss.'","'.$this->cdms_provenance.'","'.$this->cdms_langues.'","'.$this->cdms_cursus.'","'.$this->cdms_annee.'","'.$this->cdms_details.'","'.$this->cdms_role.'","'.$this->session_id_cdm.'","'.$this->cdps_nom.'","'.$this->cdps_prenom.'","'.$this->cdps_telephone.'","'.$this->cdps_annee.'","'.$this->cdps_nom_interne.'","'.$this->cdps_email.'","'.$this->cdps_adresse.'","'.$this->cdps_ville.'","'.$this->cdps_code_postal.'","'.$this->cdps_num_ss.'","'.$this->cdps_details.'","'.$this->cdps_role.'","'.$this->session_id_cdp.'","'.$this->fait_leDate.'","'.$this->Setting1Document.'","'.$this->Setting2Document.'","'.$this->Setting3Document.'","'.$this->Setting4Document.'","'.$this->Setting5Document.'","'.$this->Setting6Document.'","'.$this->Setting7Document.'","'.$this->Setting1eachtimeDocument.'","'.$this->SettingCompagnyName.'","'.$this->Setting9_Document.'","'.$this->Setting10_Document.'","'.$this->Setting12_Document.'","'.$this->convention_settings1.'","'.$this->convention_settings2.'","'.$this->convention_settings3.'","'.$this->convention_settings4.'","'.$this->convention_settings5.'","'.$this->convention_settings6.'","'.$this->convention_settings7.'","'.$this->attestation_fin_mission_settings1.'","'.$this->facture_settings1.'","'.$this->facture_settings2.'","'.$this->facture_settings3.'","'.$this->facture_settings4.'","'.$this->facture_settings5.'","'.$this->facture_settings6.'","'.$this->facture_settings7.'","'.$this->montantTva.'","'.$this->totalTtcFacture.'","'.$this->facturefrais_settings1.'","'.$this->facturefrais_settings2.'","'.$this->facturefrais_settings3.'","'.$this->facturefrais_settings4.'","'.$this->facturefrais_settings5.'","'.$this->facturefrais_settings6.'","'.$this->facturefrais_settings7.'","'.$this->facturefrais_settings8.'","'.$this->facturefrais_settings9.'","'.$this->facturefrais_settings10.'","'.$this->facturefrais_settings11.'","'.$this->hortTaxeTotal.'","'.$this->tvaTotal.'","'.$this->ttcTotal.'","'.$this->accordConfidentialite_settings1.'","'.$this->avenant_settings1.'","'.$this->avenant_settings2.'","'.$this->choixCdpNom.'","'.$this->choixCdpPrenom.'","'.$this->ChoixCdpId.'",NOW(),"'.$this->uptated.'")';
		$this->bdd->query($sql);
		
		$this->id_info_document = $this->bdd->insert_id();
		
		if($cs=='')
		{
	
		}
		else
		{
		
		}
		
		$this->get($this->id_info_document,'id_info_document');
		
		return $this->id_info_document;
	}
	
	function unsetData()
	{
		$this->id_info_document = '';
		$this->id_document = '';
		$this->sessionIdCdp = '';
		$this->etudes_id_etudes = '';
		$this->etudes_id_oge_client = '';
		$this->etudes_id_contact = '';
		$this->etudes_num_convention = '';
		$this->etudes_nom_interne = '';
		$this->etudes_descriptif = '';
		$this->etudes_budget_fsi = '';
		$this->etudes_je = '';
		$this->etudes_budget_hfs = '';
		$this->etudes_frais_previsio = '';
		$this->etudes_date_debut = '';
		$this->etudes_date_fin = '';
		$this->etudes_note_de_frais = '';
		$this->contacts_nom_contact = '';
		$this->contacts_prenom_contact = '';
		$this->contacts_fonction = '';
		$this->contacts_tel_fixe = '';
		$this->contacts_tel_port = '';
		$this->contacts_linkedin = '';
		$this->contacts_email = '';
		$this->ogeClient_num_oge_client = '';
		$this->ogeClient_typologie = '';
		$this->ogeClient_type = '';
		$this->ogeClient_nom = '';
		$this->ogeClient_prenom = '';
		$this->ogeClient_nom_societe = '';
		$this->ogeClient_activite = '';
		$this->ogeClient_id_sector = '';
		$this->ogeClient_capital = '';
		$this->ogeClient_etranger = '';
		$this->ogeClient_id_forme = '';
		$this->ogeClient_siret = '';
		$this->ogeClient_lieu_rcs = '';
		$this->ogeClient_num_rcs = '';
		$this->ogeClient_num_tva = '';
		$this->ogeClient_adresse = '';
		$this->ogeClient_ville = '';
		$this->ogeClient_tel_standard = '';
		$this->ogeClient_provenance = '';
		$this->ogeClient_code_postal = '';
		$this->ogeClient_id_pays = '';
		$this->ogeClient_site_internet = '';
		$this->cdms_nom = '';
		$this->cdms_prenom = '';
		$this->cdms_telephone = '';
		$this->cdms_email = '';
		$this->cdms_banner = '';
		$this->cdms_date_naissance = '';
		$this->cdms_adresse = '';
		$this->cdms_ville = '';
		$this->cdms_code_postal = '';
		$this->cdms_motorise = '';
		$this->cdms_num_ss = '';
		$this->cdms_provenance = '';
		$this->cdms_langues = '';
		$this->cdms_cursus = '';
		$this->cdms_annee = '';
		$this->cdms_details = '';
		$this->cdms_role = '';
		$this->session_id_cdm = '';
		$this->cdps_nom = '';
		$this->cdps_prenom = '';
		$this->cdps_telephone = '';
		$this->cdps_annee = '';
		$this->cdps_nom_interne = '';
		$this->cdps_email = '';
		$this->cdps_adresse = '';
		$this->cdps_ville = '';
		$this->cdps_code_postal = '';
		$this->cdps_num_ss = '';
		$this->cdps_details = '';
		$this->cdps_role = '';
		$this->session_id_cdp = '';
		$this->fait_leDate = '';
		$this->Setting1Document = '';
		$this->Setting2Document = '';
		$this->Setting3Document = '';
		$this->Setting4Document = '';
		$this->Setting5Document = '';
		$this->Setting6Document = '';
		$this->Setting7Document = '';
		$this->Setting1eachtimeDocument = '';
		$this->SettingCompagnyName = '';
		$this->Setting9_Document = '';
		$this->Setting10_Document = '';
		$this->Setting12_Document = '';
		$this->convention_settings1 = '';
		$this->convention_settings2 = '';
		$this->convention_settings3 = '';
		$this->convention_settings4 = '';
		$this->convention_settings5 = '';
		$this->convention_settings6 = '';
		$this->convention_settings7 = '';
		$this->attestation_fin_mission_settings1 = '';
		$this->facture_settings1 = '';
		$this->facture_settings2 = '';
		$this->facture_settings3 = '';
		$this->facture_settings4 = '';
		$this->facture_settings5 = '';
		$this->facture_settings6 = '';
		$this->facture_settings7 = '';
		$this->montantTva = '';
		$this->totalTtcFacture = '';
		$this->facturefrais_settings1 = '';
		$this->facturefrais_settings2 = '';
		$this->facturefrais_settings3 = '';
		$this->facturefrais_settings4 = '';
		$this->facturefrais_settings5 = '';
		$this->facturefrais_settings6 = '';
		$this->facturefrais_settings7 = '';
		$this->facturefrais_settings8 = '';
		$this->facturefrais_settings9 = '';
		$this->facturefrais_settings10 = '';
		$this->facturefrais_settings11 = '';
		$this->hortTaxeTotal = '';
		$this->tvaTotal = '';
		$this->ttcTotal = '';
		$this->accordConfidentialite_settings1 = '';
		$this->avenant_settings1 = '';
		$this->avenant_settings2 = '';
		$this->choixCdpNom = '';
		$this->choixCdpPrenom = '';
		$this->ChoixCdpId = '';
		$this->added = '';
		$this->uptated = '';

	}
}