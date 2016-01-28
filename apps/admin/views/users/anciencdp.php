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
    "editcdp" => array("title" => "CDP edited", "msg" => "A CDP was edited"),   
    "deletecdp" => array("title" => "CDP removed", "msg" => "A CDP was enable")
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
    
       <div class="content cf">
           <table id="table-cdps">
            <thead>
            <tr>
                <th class="header">ID OGE</th>
                <th class="header">Statut</th>
                <th class="header">Nom Prenóm</th>
                <th class="header">Email</th>
                <th class="header">Date maj</th>
                <th class="noImg header"></th>
            </tr>
            <thead>
            <tbody>
            <?php 
            foreach($this->cdps as $key => $value) { 
                if($value['archive'] == 2){ ?>
            <tr>
                <td><?= $value['id_cdp'] ?></td>
                <td><?= $value['status'] ?></td>
                <td><?= $value['nom'] ?> <?= $value['prenom'] ?></td>
                <td><?= $value['email'] ?></td>
                <?php
                $date = new DateTime($value['added']);
                $fecha = $date->format('d/m/Y'); ?>
                <td><?= $fecha ?></td>
                <td>
                    <a href="<?= $this->url ?>/users/cdp/view/<?= $value['id_cdp'] ?>">
                       <img src="<?= $this->surl ?>/images/admin/modif.png" title="Modifier" />
                    </a>
                    <a href="<?= $this->url ?>/users/cdp/edit/<?= $value['id_cdp'] ?>">
                        <img src="<?= $this->surl ?>/images/admin/edit.png" title="Modifier" />
                    </a>
                    <span href="#" onclick="actifCdp(<?= $value['id_cdp'] ?>)"  >Enable</span>
                </td>
            </tr>
            <?php
            } } ?>
            </tbody>
        </table>
    </div><!-- /.content -->
    <div id="clients_paginate">
            <?php
            if(isset($this->newParams["page"]) && $this->newParams['page'] > 1) {
                $np = $this->newParams;
                $np['page']--;?>
                <a href="<?= $this->lurl ?>/users/cdp<?= implodeParams($np) ?>" class="btn-pag" >Précédent</a>
            <?php } else { ?>
                <span class="num">Précédent</span>
            <?php } ?>
            <span class="num"><?= $this->newParams['page'] ?></span>
            <?php if($this->countCdps > ($this->newParams["page"] * $this->limit)) {
                    $np = $this->newParams;
                    $np['page']++;                    
                    ?>
            <a href="<?= $this->lurl ?>/users/cdp<?= implodeParams($np) ?>" class="btn-pag">Suivant</a>
            <?php } else { ?>
                <span class="num">Suivant</span>
            <?php } ?>
        </div>
</section>

