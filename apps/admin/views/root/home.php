<?php
$smokeyMsgs = array(    
    "session_home_cdp" => array("title" => "CDP etude", "msg" => "Session confirmé"),
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


<nav class="nav-main">
    <ul>
        <?php if($_SESSION['user']['role'] == 'president' || $_SESSION['user']['id_user']){ ?>
            <li class="current"><a href="<?= $this->url ?>/users/cdp/anciencdp">Voir ancien CDP</a></li>
            <li><a href="<?= $this->url ?>/users/add_cdp">Ajouter un CDP</a></li>
        <?php } ?>
    </ul>
</nav><!-- /.nav-main -->

<section class="panel">
    <header class="title-panel cf">
        <h1><span><strong>études par CDP</strong></span></h1>
    </header><!-- /.title-panel -->

    <div class="content cf">
        <table>
            <tr>
                <th>ID</th>
                <th>Statut</th>
                <th>Nom</th>
                <th>prenom</th>
                <th>Role</th>
                <th>Nom Interne</th>
                <th>Date Début</th>
                <th>Etude</th>
                <th>détails</th>
            </tr>
            <?php if($_SESSION['user']['role'] == 'president' || $_SESSION['user']['role'] == 'tresorier' || $_SESSION['user']['id_user']){ ?>
                <?php foreach ($this->cdps as $a){
                            if($a['dashboard'] == 2) { ?>
                                <tr>
                                    <td><?= $a['id_cdp'] ?></td>
                                    <td><?= $a['status'] ?></td>
                                    <td><?= $a['nom'] ?></td>
                                    <td><?= $a['prenom'] ?></td>
                                    <td><?= $a['role'] ?></td>
                                    <td><?= $a['nom_interne'] ?></td>
                                    <td>
                                        <?php foreach($this->cdp_etude as $ce){ 
                                                if($ce['id_cdp'] == $a['id_cdp']){ ?>
                                                    <?= $ce['added'] ?><br />
                                            <?php }
                                        } ?>
                                    </td>
                                    <td>
                                        <?php foreach($this->cdp_etude as $ce){ 
                                                if($ce['id_cdp'] == $a['id_cdp']){ ?>
                                                    <a href="<?= $this->url ?>/etudes/edit/<?= $ce['id_etudes'] ?>"><?= $ce['et_nomInterne'] ?></a><br />
                                            <?php }
                                        } ?>
                                    </td>
                                    <td><?= $a['details'] ?></td>
                                </tr>
                        <?php }
                         } ?>
            <?php }else{ ?>
                        <?php foreach ($this->cdps as $a){
                            if($a['dashboard'] == 2) { 
                                if($a['id_cdp'] == $_SESSION['user']['id_cdp']){ ?>
                                    <tr>
                                        <td><?= $a['id_cdp'] ?></td>
                                        <td><?= $a['status'] ?></td>
                                        <td><?= $a['nom'] ?></td>
                                        <td><?= $a['prenom'] ?></td>
                                        <td><?= $a['role'] ?></td>
                                        <td><?= $a['nom_interne'] ?></td>
                                        <td>
                                            <?php foreach($this->cdp_etude as $ce){ 
                                                    if($ce['id_cdp'] == $a['id_cdp']){ ?>
                                                        <?= $ce['added'] ?><br />
                                                <?php }
                                            } ?>
                                        </td>
                                        <td>
                                            <?php foreach($this->cdp_etude as $ce){ 
                                                    if($ce['id_cdp'] == $a['id_cdp']){ ?>
                                                        <a href="<?= $this->url ?>/etudes/edit/<?= $ce['id_etudes'] ?>"><?= $ce['et_nomInterne'] ?></a><br />
                                                <?php }
                                            } ?>
                                        </td>
                                        <td><?= $a['details'] ?></td>
                                    </tr>
                        <?php }
                            }
                         } ?>
                                
                                
            <?php } ?>
        </table>
    </div><!-- /.content -->
</section><!-- /.panel -->

<section class="panel section-tabs">
    <header class="title-panel cf">
        
        <?php if($_SESSION['user']['role'] == 'president' || $_SESSION['user']['role'] == 'tresorier' || $_SESSION['user']['id_user']){ ?>
            <?php foreach ($this->cdps as $cdps){ 
                if($cdps['archive'] != 2) {?>
                    <button onclick="changeCdpEtude(<?= $cdps['id_cdp'] ?>)"><?= substr($cdps['nom'], 0, 1) ?> <?= $cdps['prenom'] ?></button>
            <?php 
                }
            } 
        } ?>



        <h1><span><strong>calendrier</strong></span></h1>
    </header><!-- /.title-panel -->

    <div class="content cf">
        <div class="tabs">
            <div class="tab">
                <table>
                    <tr>
                        <th>Semaine</th>
                        <?php for($i=1; $i<=52; $i++){ ?>
                        <th><span><?= $i ?></span></th>
                        <?php } ?>
                    </tr>
                    <?php if(isset($_SESSION['cdp_etude_home']['id_cdp'])){ ?>
                        
                        <?php if($_SESSION['user']['role'] == 'president' || $_SESSION['user']['role'] == 'tresorier' || $_SESSION['user']['id_user']){ ?>
                            <?php foreach($this->cdp_etude_session as $row){ $nbr = 52; ?>
                                <?php 
                                // DATE DEBUT
                                $annD = substr($row['date_debut'], 0, 4);
                                $moiD = substr($row['date_debut'], 5, 2);
                                $jouD = substr($row['date_debut'], -2);

                                // DATE FIN
                                $annF = substr($row['date_fin'], 0, 4);
                                $moiF = substr($row['date_fin'], 5, 2);
                                $jouF = substr($row['date_fin'], -2);
                                ?>

                                <?php 
                                    $semaineD = date("W", mktime(0,0,0,$moiD,$jouD,$annD)); 
                                    $semaineF = date("W", mktime(0,0,0,$moiF,$jouF,$annF)); 
                                ?>
                                <tr>
                                    <td><?= $row['nom_interne'] ?></td>
                                    <td colspan="<?=$nbr?>">
                                        <div class="year">
                                            <div class="etape" data-start="<?= $semaineD ?>" data-end="<?= $semaineF ?>"><a href="<?= $this->url ?>/etudes/edit/<?= $row['id_etudes'] ?>"><span><?= $row['nom_interne'] ?></span></a></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            
                        <?php }else{ ?>
                                <?php foreach($this->myetudealways as $row){ $nbr = 52; ?>
                                <?php 
                                // DATE DEBUT
                                $annD = substr($row['date_debut'], 0, 4);
                                $moiD = substr($row['date_debut'], 5, 2);
                                $jouD = substr($row['date_debut'], -2);

                                // DATE FIN
                                $annF = substr($row['date_fin'], 0, 4);
                                $moiF = substr($row['date_fin'], 5, 2);
                                $jouF = substr($row['date_fin'], -2);
                                ?>

                                <?php 
                                    $semaineD = date("W", mktime(0,0,0,$moiD,$jouD,$annD)); 
                                    $semaineF = date("W", mktime(0,0,0,$moiF,$jouF,$annF)); 
                                ?>
                                <tr>
                                    <td><?= $row['nom_interne'] ?></td>
                                    <td colspan="<?=$nbr?>">
                                        <div class="year">
                                            <div class="etape" data-start="<?= $semaineD ?>" data-end="<?= $semaineF ?>"><a href="<?= $this->url ?>/etudes/edit/<?= $row['id_etudes'] ?>"><span><?= $row['nom_interne'] ?></span></a></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>

                        <?php } ?>
                                
                    <?php } ?>
                </table>
            </div>
        </div><!-- /.tabs -->
    </div><!-- /.content -->
</section><!-- /.panel -->

















<section class="panel">
    <header class="title-panel cf">
        <h1><span><strong>Coordonnées</strong></span></h1>
    </header><!-- /.title-panel -->

    <div class="content cf">
        <table>
            <tr>
                <th>ID OGE</th>
                <th>statut</th>
                <th>Nom / Prénom</th>
                <th>téléphone</th>
                <th>email</th>
                <th>Date maj</th>
                <th>Année</th>
                <th>détails</th>
                <th>CA sur l’année</th>
            </tr>
            
            
            <?php foreach ($this->cdpsAll as $cdpAll){ ?>
                <tr>
                    <td><?= $cdpAll['id_cdp'] ?></td>
                    <td><?= $cdpAll['archive']==1?'':'archivé' ?></td>
                    <td><?= $cdpAll['nom'].' '.$cdpAll['prenom'] ?></td>
                    <td><?= $cdpAll['telephone'] ?></td>
                    <td><?= $cdpAll['email'] ?></td>
                    <td>
                        <?php 
                        $dateMaj = $cdpAll['updated'];
                        $formateDateMaj = date("d/m/Y", strtotime($dateMaj));
                        ?>
                        
                        <?= $formateDateMaj ?>
                    </td>
                    <td><?= substr($cdpAll['added'], 0, 4) ?></td>
                    <td>
                        <a href="<?= $this->url ?>/users/cdp/view/<?= $cdpAll['id_cdp'] ?>">
                            <img src="<?= $this->surl ?>/images/admin/modif.png" title="Voir" />
                        </a>
                    </td>
                    <td>
                        <div class="progress">
                            
                            <?php if(count($this->sum_montant) != 0){ ?>
                                <?php foreach ($this->sum_montant as $a=>$e){ 
                                    //var_dump($e['id_type_doc']);
     
                                        if($e['sessionIdCdp'] == $cdpAll['id_cdp']) {
                                            $nbr = array($e['ttcTotal']);
                                            $calcNbr = array_sum($nbr);
                                            $nombreMax = array($e['ttcTotal']);
                                            if($e['id_type_doc'] == 4){  ?>

                                                <?php
                                                $nbr = array($e['totalTtcFacture']);
                                                $calcNbr = array_sum($nbr);
                                                $nombreMax = array($e['totalTtcFacture']);

                                                ?>
                                                <p><?= $calcNbr ?></p>

                                                <?php if(max($nombreMax)){ ?>
                                                    <div class="progress-bar">
                                                        <span class="bar" data-width="100"></span>
                                                    </div><!-- /.progress-bar -->
                                                <?php }else{ ?>
                                                    <div class="progress-bar">
                                                        <span class="bar" data-width="<?= round($nombreMax * 100 / $nombreMax[0]) ?>"></span>
                                                    </div><!-- /.progress-bar -->
                                                <?php } ?>


                                            <?php }else if($e['id_type_doc'] == 5){ ?>

                                                <?php
                                                $nbr = array($e['ttcTotal']);
                                                $calcNbr = array_sum($nbr);
                                                $nombreMax = array($e['ttcTotal']);
                                                ?>
                                                <p><?= $calcNbr ?></p>

                                                <?php if(max($nombreMax)){ ?>
                                                    <div class="progress-bar">
                                                        <span class="bar" data-width="100"></span>
                                                    </div><!-- /.progress-bar -->
                                                <?php }else{ ?>
                                                    <div class="progress-bar">
                                                        <span class="bar" data-width="<?= round($nombreMax * 100 / $nombreMax[0]) ?>"></span>
                                                    </div><!-- /.progress-bar -->
                                                <?php } ?>

                                            <?php }  
                                        }else{ 
                                            if($a == 1){ ?>
                                                    
                                        <?php }
                                        }
                                    } 
                                }else{ ?>
                                        <p>Aucun document créer</p>
                                        
                                        <div class="progress-bar">
                                            <span class="bar" data-width="0"></span>
                                        </div><!-- /.progress-bar -->
                                <?php } ?>
                            
                        </div><!-- /.progress -->
                    </td>
                </tr>
            <?php } ?>
            
        </table>
    </div><!-- /.content -->
</section><!-- /.panel -->