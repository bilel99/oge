<script>
    function isDifNumberKey(evt) {
        //console.log(evt);
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        //console.log(charCode);
        return (charCode > 47 && charCode < 58);
    }
    
    
</script>



<?php
$smokeyMsgs = array(
    "resetpass" => array("title" => "Envoie mail", "msg" => "Un mail a été envoyé au président"),
    "edituser" => array("title" => "Mise à jour utilisateur", "msg" => "Mise à jour éffectuer avec succès")
);
?>

<div class="wrapper">
    
    <div class="freeow freeow-top-right">
        <?php
        if (isset($_SESSION['smokey'])) { ?>
            <div class="smokey" style="opacity: 1; ">
                <div class="background">
                    <div class="info-msg">
                        <h2><?php echo $smokeyMsgs[$_SESSION['smokey']]['title']; ?></h2>
                        <p><?php echo $smokeyMsgs[$_SESSION['smokey']]['msg']; ?></p>
                    </div>
                </div>
                <span class="icon"></span>
                <span class="close"></span>
            </div>
            <?php unset($_SESSION['smokey']); ?>
        <?php
        } ?>
    </div>
    
    <section class="panel">
        <div id="formrechercher">
            <form action="" method="get" id="edit_utilisateurs">                
                <div class="content cf">
                    <div class='columna-form'>
                        <div class="row-form cf other1">
                            <label>Nom</label>
                            <input type='text' name="id_user" id="id-user" value="<?= $this->users->id_user==''?$this->cdps[0]['id_cdp']:$this->users->id_user ?>" style='display:none'>
                            <input type="text" name="nom" class="field" value="<?= $this->users->firstname==''?$this->cdps[0]['nom']:$this->users->firstname ?>" />
                        </div>
                        <div class="row-form cf other2">
                            <label>Prénom</label>
                            <input type="text" name="prenom" class="field" value="<?= $this->users->name==''?$this->cdps[0]['prenom']:$this->users->name ?>" />
                        </div>
                        <div class="row-form cf other1">
                            <label>phone </label>
                            <input type="text" name="phone" class="field" value="<?= $this->users->phone==''?$this->cdps[0]['telephone']:$this->users->phone ?>" onkeypress="return isDifNumberKey(event);" minlength="10" maxlength="13"  />
                        </div>
                        <div class="row-form cf other2">
                            <label>mobile</label>
                            <input type="text" name="mobile" class="field" value="<?= $this->users->mobile==''?$this->cdps[0]['mobile']:$this->users->mobile ?>" />
                        </div>
                        <div class="row-form cf other1">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="field" value="<?= $this->users->email==''?$this->cdps[0]['email']:$this->users->email ?>"/>
                        </div>
                        
                        <?php if(isset($_SESSION['user']['id_cdp'])){ ?>
                            <div class="row-form cf other2">
                                <!-- Bouton envoie mail au président lui demandant un nouveau pass -->
                                <input type="submit" class="button" name="newPassword" value="Changer son mot-de-passe"/>
                            </div>
                        <?php } ?>
                        
                        <div class="row-form cf other2">
                            <label>&nbsp;</label>
                            <label class="label-comodin">&nbsp;</label>
                        </div>                        
                    </div>                                                            
                </div>
                <div>
                    <p class="error-msg display-none form-responses">Le champ sélectionné n’est pas valide. Veuillez le corriger</p>
                </div><!-- /.form-error -->
                <div>
                    <label>&nbsp;</label>
                    <!-- Vérifier si ses un president -->
                    
                    <?php if(isset($_SESSION['user'])){?>
                        <input type="submit" class="button" value="Modifier le Profil"/>                        
                    <?php }else{?>
                        <input type="submit" class="button" value="Créer le Profil"/>
                    <?php }?>
                    <input type='text' name="id_user" id="id-user" value="<?= $this->users->id_user==''?$this->cdps[0]['id_cdp']:$this->users->id_user ?>" style='display:none'>
                    
                    <?php           
                    foreach ($this->cdps as $row){
                        if($row['role'] == 'president'){ ?>
                            <input type='text' name="id_president" id="id-president" value="<?= $row['email'] ?>" style='display:none'>
                        <?php }
                    } ?>
                    
                </div>                         
            </form>
        </div>
    </section>
</div>

