<?php 
function implodeParams($params){
    $str = '';
    foreach($params as $k => $v){
        $str .= "/$k=$v";
    }
    return $str;
}

$smokeyMsgs = array(
    "add" => array("title" => "Mémo ajouté", "msg" => "Vous avez ajouté le mémo"),
    "edit" => array("title" => "Mémo édité", "msg" => "Vous avez édité le mémo"),    
    "delete"=>array("title" => "Mémo supprimé", "msg" => "Vous avez supprimé le mémo"),
    "contact_delete" => array("title" => "Contact removed", "msg" => "A contact was removed")
);

?>
<div>
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
        <header class="title-panel cf">
            <h1><span><strong>Memos</strong></span></h1>
            <button class="button button-secondary action" id="add-contact-button" id-client="<?= $this->params[0]; ?>" memo-target="<?= $this->menu_admin ; ?>" > Ajouter un memo</button>
        </header>
        <div class="content cf">
            <table id="datepicker-2" class="dataTable no-footer">
                <thead>
                    <tr role="row">
                        <th style="width: 50px;" class="sorting_asc">type de mémo</th>
                        <th class="sorting_asc">Date</th>
                        <th class="sorting_asc">Memo</th>                        
                        <th class="sorting_asc">E/T</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->memos as $memo) {
                        if($memo['status'] == 1 && $memo['target']== 'contacts' ) {
                            if($memo['role'] == 'commercial'){?>
                                <tr>
                                    <?php 
                                    $date = new DateTime($memo['added']);
                                    ?>
                                    <td style="background-color: #900000;"></td>
                                    <td><?= $date->format('d/m/Y') ?></td>
                                    <td><?= $memo['description'] ?></td>
                                    <td>
                                        <a class="action" id-memo="<?= $memo['id_memo']?>" id-client="<?= $this->params[0];?> " memo-target="<?= $memo['target']?>" memo-content="<?= $memo['description']?>">
                                            <img src="<?=$this->surl?>/images/admin/edit.png" title="Modifier" />
                                        </a>
                                        <a onclick="return confirm('Êtes vous sur de vouloir supprimer memo?')" href="<?= $this->url ?>/contacts/deletememo/<?= $this->params[0];?>/<?= $memo['id_memo']?>" data-id='<?= $memo['id_memo'] ?>' >
                                            <img src="<?=$this->surl?>/images/admin/delete.png" title="Supprimer" />
                                        </a>
                                    </td>
                                </tr>
                        <?php 
                            }
                            if($memo['role'] == 'suivi'){?>
                                <tr>
                                    <?php 
                                    $date = new DateTime($memo['added']);
                                    ?>
                                    <td style="background-color: #008000;"></td>
                                    <td><?= $date->format('d/m/Y') ?></td>
                                    <td><?= $memo['description'] ?></td>
                                    <td>
                                        <a class="action" id-memo="<?= $memo['id_memo']?>" id-client="<?= $this->params[0];?> " memo-target="<?= $memo['target']?>" memo-content="<?= $memo['description']?>">
                                            <img src="<?=$this->surl?>/images/admin/edit.png" title="Modifier" />
                                        </a>
                                        <a onclick="return confirm('Êtes vous sur de vouloir supprimer memo?')" href="<?= $this->url ?>/contacts/deletememo/<?= $this->params[0];?>/<?= $memo['id_memo']?>" data-id='<?= $memo['id_memo'] ?>' >
                                            <img src="<?=$this->surl?>/images/admin/delete.png" title="Supprimer" />
                                        </a>
                                    </td>
                                </tr>
                        <?php 
                            }
                        if($memo['role'] == 'commentaire'){?>
                                <tr>
                                    <?php 
                                    $date = new DateTime($memo['added']);
                                    ?>
                                    <td style="background-color: #0070a3;"></td>
                                    <td><?= $date->format('d/m/Y') ?></td>
                                    <td><?= $memo['description'] ?></td>
                                    <td>
                                        <a class="action" id-memo="<?= $memo['id_memo']?>" id-client="<?= $this->params[0];?> " memo-target="<?= $memo['target']?>" memo-content="<?= $memo['description']?>">
                                            <img src="<?=$this->surl?>/images/admin/edit.png" title="Modifier" />
                                        </a>
                                        <a onclick="return confirm('Êtes vous sur de vouloir supprimer memo?')" href="<?= $this->url ?>/contacts/deletememo/<?= $this->params[0];?>/<?= $memo['id_memo']?>" data-id='<?= $memo['id_memo'] ?>' >
                                            <img src="<?=$this->surl?>/images/admin/delete.png" title="Supprimer" />
                                        </a>
                                    </td>
                                </tr>
                        
                    <?php }?>
                    <?php
                            
                        }
                    }?>
                </tbody>
            </table>
            
        </div>
    </section>
    <div id="client-view-body" class="clearBoth">
        <section class="panel">
                <header class="title-panel cf">
                <h1><span><strong>RENSEIGNEMENT</strong></span></h1>                     
                </header><!-- /.title-panel -->

                <div class="content cf">
                    <div class="column-form">
                        <div class="row-form cf">
                            <label>Nom: </label>
                            <span><?= $this->contact->nom_contact ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Prénom:</label>
                            <span><?= $this->contact->prenom_contact ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Fonction:</label>
                            <span><?= $this->contact->fonction ?></span>
                        </div><!-- /.row-form -->

                        <div class="row-form cf">
                            <label>Tel fixe:</label>
                            <span><?= $this->contact->tel_fixe ?></span>
                        </div><!-- /.row-form -->                       
                    </div><!-- /.column-form -->                    
                    <div class="column-form">
                        <div class="row-form cf">
                            <label>Tel port:</label>
                            <span><?= $this->contact->tel_port ?></span>
                        </div><!-- /.row-form -->                        
                        <div class="row-form cf">
                            <label>Linkedin:</label>
                            <span><?= $this->contact->linkedin ?></span>
                        </div><!-- /.row-form -->
                        
                        <div class="row-form cf">
                            <label>Email:</label>
                            <span><?= $this->contact->email ?></span>
                        </div><!-- /.row-form -->                        
                    </div><!-- /.column-form -->                    
                </div><!-- /.content -->                               
            </section><!-- /.panel --> 
            </div> 
    <input id="target-con" type="hidden" name="id_client" value="contacts" />
</div>