<div class="content cf">
    <div id="clients_wrapper">
        <table id="clients">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom Societe/Nom - Prenom</th>
                    <th>Num client</th>
                    <th>Secteur</th>
                    <th>Typologie</th>
                    <th>Nom Prénom</th>
                    <th>Email</th>
                    <th>Tel 1</th>
                    <th class="noImg">Détail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->clients as $client) {
                    if($client['status'] == 1) {
                    ?>
                    <tr>
                        <td><?= $client['id_oge_client'] ?></td>
                        <td><a href="<?= $this->lurl ?>/clients/view/<?= $client['id_oge_client'] ?>" target="_blank" ><?php if(empty($client['nom_societe']) == false) { echo  $client['nom_societe']; } else { echo $client['nom'].' '.$client['prenom'];  } ?></a></td>
                        <td><?= $client["num_oge_client"] ?></td>
                        <td><?= $client['id_sector'] ?></td>
                        <td><?= $client['typologie'] ?></td>
                        <td><a href="<?= $this->lurl ?>/clients/view/<?= $client['id_oge_client'] ?>" target="_blank" ><?php if(empty($client['nom_contact']) == false || empty( $client['prenom_contact']) == false ) { echo  $client['nom_contact'] . " " . $client['prenom_contact']; } else { echo "-";  } ?></a></td>
                        <td><a href="mailto:<?= $client['email'] ?>"><?= $client['email'] ?></a></td>
                        <td><?= $client['tel_fixe'] ?> <?php if ($client['tel_port'] != "") { ?> - <?php } ?> <?= $client['tel_port'] ?></td>
                        <td>
                            <a href="<?= $this->lurl ?>/clients/view/<?= $client['id_oge_client'] ?>">
                                <img src="<?=$this->surl?>/images/admin/modif.png" title="Voir" />
                            </a>
                            <a href="<?= $this->url ?>/clients/edit/<?= $client['id_oge_client'] ?>">
                                <img src="<?=$this->surl?>/images/admin/edit.png" title="Modifier" />
                            </a>
                            <?php
                            if($client['status'] == 0){
                            ?>
                            <a href="" class="delete" data-id='<?= $client['id_oge_client'] ?>' >
                                <img src="<?=$this->surl?>/images/admin/check.png" title="Active" />
                            </a>
                            <?php
                            } elseif($client['status'] == 1) {  
                            ?>
                            <span href="" onclick="deleteClient(<?= $client['id_oge_client'] ?>)" style="cursor:pointer"><img src="<?=$this->surl?>/images/admin/delete.png" title="Supprimer" /></span>
                            <?php
                            } ?>
                        </td>
                    </tr> 
                    <?php
                    }
                } ?>
            </tbody>
        </table>
        
        <div id="clients_paginate">
            <?php 
            if(isset($this->newParams["page"]) && $this->newParams['page'] > 1) {
                $np = $this->newParams;
                $np['page']--;?>
                <a href="<?= $this->lurl ?>/clients<?= implodeParams($np) ?>" class="btn-pag" >Précédent</a>
            <?php
            } else { ?>
                <span class="num">Précédent</span>
            <?php
            } ?>
            <span class="num"><?= $this->newParams['page'] ?></span>
            <?php
            if($this->countClients > ($this->newParams["page"] * $this->limit)) {
                $np = $this->newParams;
                $np['page']++; ?>
                <a href="<?= $this->lurl ?>/clients<?= implodeParams($np) ?>" class="btn-pag" >Suivant</a>
            <?php
            } else { ?>
                <span class="num">Suivant</span>
            <?php
            } ?>
        </div>
    </div>
</div>