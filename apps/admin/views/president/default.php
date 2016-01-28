<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
  $(function() {
    var availableTags = [
        <?php foreach($this->ville as $v){ ?>
      "<?= $v['label'] ?>",
        <?php } ?>
    ];
    $( "#tags" ).autocomplete({
      source: availableTags,
      minLength : 3 // on indique qu'il faut taper au moins 3 caractères pour afficher l'autocomplétion
    });
  });
</script>


<?php
function implodeParams($params) {
    foreach($params as $k => $v){
        $str .= "/$k=$v";
    }
    return $str;
}
function getRechercherValues($nom, $tthis){
        $val = "";
        if(isset($tthis->newParams[$nom])) $val = $tthis->newParams[$nom];
        return $val;
} 
$smokeyMsgs = array(    
    "roleCdpTresorier" => array("title" => "CDP élu Trésorier", "msg" => "Le CDP à bien été nomé Trésorier !"),
    "retirerTresorier" => array("title" => "Rôle trésorier retirer", "msg" => "Rôle trésorier retirer avec succès !"),
    "ChangePresident" => array("title" => "Chngement président, ", "msg" => "Changement de président effectué avec succès !"),
    "add_tresorier" => array("title" => "Nouveau trésorier, ", "msg" => "Trésorier crée avec succès !"),
);
?>
  <div class="freeow freeow-top-right">
        <?php if(isset($_SESSION['smokey'])) { ?>
            <div class="smokey" style="opacity: 1; ">
                <div class="background">
                    <div class="info-msg">
                        <h2><?php echo $smokeyMsgs[$_SESSION['smokey']]['title'];?></h2>
                        <p><?php echo $smokeyMsgs[$_SESSION['smokey']]['msg'];?></p>
                    </div>
                </div>
                <span class="icon"></span>
                <span class="close"></span>
            </div>
            <?php unset($_SESSION['smokey']); ?>
        <?php } ?>
    </div>
<section class="panel">
    <form action="" method="get" id="rechercher">
        <header class="title-panel cf">
            <h1><span><strong>Rechercher</strong></span></h1>
            <div class="form-search">
                <a href="<?= $this->url ?>/users/cdp/add" class="sepair btn-search button-secondary" id="add-contact-button" > Ajouter un CDP</a>
                <a href="<?= $this->url ?>/president/add_tresorier" class="sepair btn-search button-secondary" id="add-contact-button" >Ajouter un trésorier</a>
                        
                <!-- EXPORT CDM PAIEMENT -->
                <a style="" href="<?= $this->url ?>/tresorier/exportcdmpaiement" class="btn-search button-secondary" id="button-users">Export CDM Paiement </a>
                <!-- FIN -->

                <a href="<?= $this->url ?>/users/cdp/anciencdp" class="sepair btn-search button-secondary" id="add-contact-button" > Voir ancien CDP</a>                
            </div>
            
        </header><!-- /.title-panel -->
        <div class="content cf">
            <div class='columna-form'>
                <div class="row-form cf other1">
                    <label>Nom</label>
                    <input type="text" name="nom" class="field" value="<?= getRechercherValues("nom", $this) ?>" />
                </div>
                <div class="row-form cf other2">
                    <label>Prénom</label>
                    <input type="text" name="prenom" class="field" value="<?= getRechercherValues("prenom", $this) ?>" />
                </div>
                <div class="row-form cf other1">
                    <label>Nom interne </label>
                    <input type="text" name="nom_interne" class="field" value="<?= getRechercherValues("nom_interne", $this) ?>" />
                </div>
                <div class="row-form cf other2">
                    <label>Email</label>
                    <input type="text" name="email" class="field" value="<?= getRechercherValues("email", $this) ?>" />
                </div>
                                                                             
                <div class="row-form cf other1">
                    <label>Adresse</label>
                    <input style="width: 792px;" type="text" name="adresse" class="field" value="<?= getRechercherValues("adresse", $this) ?>"/>
                </div>
                <div class="row-form cf other1">
                    <label>Ville</label>
                    <input type="text" name="ville" id="tags" class="field" value="<?= getRechercherValues("ville", $this) ?>"/>
                </div>
                <div class="row-form cf other2">
                    <label>Code postal</label>
                    <input type="text" name="code_postal" class="field" value="<?= getRechercherValues("code_postal", $this) ?>" />
                </div>                        
                <div class="row-form cf other1">
                    <label>Num SS</label>
                    <input type="text" name="num_ss" class="field" value="<?= getRechercherValues("num_ss", $this) ?>" />
                </div>                        
                
                <div class="row-form cf other2">
                    <label>&nbsp;</label>
                    <label class="label-comodin">&nbsp;</label>
                </div>
                <div class="row-form cf other1">
                    <label>&nbsp;</label>
                    <input style="margin-left: -260px; margin-top: 57px;" type="submit" class="button" value="valider"/>
                </div>
                <div class="row-form cf other2 reset">
                    <input style="margin-top: 25px;" id="reset" type="reset" class="button button-secondary" value="Remise á zéro" />
                </div>
            </div>
        </div>
    </form>
       <div class="content cf">
           <table id="table-cdps">
            <thead>
            <tr>
                <th class="header">ID OGE</th>
                <th class="header">Statut</th>
                <th class="header">Nom Prenóm</th>
                <th class="header">Email</th>
                <th class="header">Date maj</th>
                <th class="header">Rôle</th>
                <th class="noImg header">Détails</th>
            </tr>
            <thead>
            <tbody>
            <?php 
            foreach($this->cdps as $key => $value) { 
                if($value['archive'] == 1){ ?>
            <tr>
                <td><?= $value['id_cdp'] ?></td>
                <td><?= $value['status'] ?></td>
                <td><?= $value['nom'] ?> <?= $value['prenom'] ?></td>
                <td><a href="mailto:<?= $value['email'] ?>"><?= $value['email'] ?></a></td>
                <?php
                $date = new DateTime($value['added']);
                $fecha = $date->format('d/m/Y'); ?>
                <td><?= $fecha ?></td>
                <td>
                        <?php if($value['role'] == 'president'){ ?>
                            <?= $value['role'] == 'president' ? 'président' : '' ?>
                        <?php }else{ ?>
                            <?= $value['role'] == 'tresorier'?'trésorier':'cdp' ?>
                        <?php } ?>
                </td>
                <td>
                    <?php if($value['role'] == 'president'){ ?>
                    <i class="fa fa-user-secret fa-2x" title=""></i>
                        
                        <a href="<?= $this->url ?>/users/cdp/view/<?= $value['id_cdp'] ?>">
                            <img src="<?= $this->surl ?>/images/admin/modif.png" title="Voir" />
                        </a>
                        <a href="<?= $this->url ?>/users/cdp/edit/<?= $value['id_cdp'] ?>">
                            <img src="<?= $this->surl ?>/images/admin/edit.png" title="Modifier" />
                        </a>
                    <?php } ?>
                    
                    <?php if($value['role'] == 'tresorier'){ ?>
                    <span style="cursor:  pointer;" href="#" onclick="cdpChoixCdp(<?= $value['id_cdp'] ?>)"  ><i style="color: #DAA520;" class="fa fa-usd fa-2x" title="Passer CDP"></i></span>
                    <?php }else if($value['role'] == ''){ ?>
                    <span style="cursor:  pointer;" href="#" onclick="tresorierChoixCdp(<?= $value['id_cdp'] ?>)"  ><i style="" class="fa fa-user fa-2x" title="Passer trésorier"></i></span>
                    <?php } ?>
                        
                        
                    <?php if($value['role'] != 'president'){ ?>
                    <span style="cursor:  pointer;" href="#" onclick="changePresident(<?= $value['id_cdp'] ?>)"  ><i style="color: red;" class="fa fa-user-secret fa-2x" title="Passer président"></i></span>

                        <a href="<?= $this->url ?>/users/cdp/view/<?= $value['id_cdp'] ?>">
                            <img src="<?= $this->surl ?>/images/admin/modif.png" title="Voir" />
                        </a>
                        <a href="<?= $this->url ?>/users/cdp/edit/<?= $value['id_cdp'] ?>">
                            <img src="<?= $this->surl ?>/images/admin/edit.png" title="Modifier" />
                        </a>
                        
                        <span style="cursor:  pointer;" href="#" onclick="inactifCdp(<?= $value['id_cdp'] ?>)"  ><img src="<?= $this->surl ?>/images/admin/delete.png" title="Supprimer" /></span>
                        
                        
                    <?php } ?>
                </td>
            </tr>
            <?php
            } }?>
            </tbody>
        </table>
    </div><!-- /.content -->
    <div id="clients_paginate">
            <?php
            if(isset($this->newParams["page"]) && $this->newParams['page'] > 1) {
                $np = $this->newParams;
                $np['page']--;?>
                <a href="<?= $this->lurl ?>/president<?= implodeParams($np) ?>" class="btn-pag" >Précédent</a>
            <?php } else { ?>
                <span class="num">Précédent</span>
            <?php } ?>
            <span class="num"><?= $this->newParams['page'] ?></span>
            <?php if($this->countCdps > ($this->newParams["page"] * $this->limit)) {
                    $np = $this->newParams;
                    $np['page']++;                    
                    ?>
            <a href="<?= $this->lurl ?>/president<?= implodeParams($np) ?>" class="btn-pag">Suivant</a>
            <?php } else { ?>
                <span class="num">Suivant</span>
            <?php } ?>
        </div>
</section>
