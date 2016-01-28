<script>
function isNumberKey(evt){
    //console.log(evt);
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    //console.log(charCode);
    return !(charCode > 47 && charCode < 58);
    
}
</script>

<div id="forms">    
    <div id="formentre"> 
        <div class="form-entreprise form-error">
            <form action="#" method="post" id="all-contacts">
                <section class="panel">
                    <header class="title-panel cf">
                        <h1><span><strong>Edit Contact</strong></span></h1>
                    </header>
                    <div>
                        <p class="error-msg display-none form-responses">Le champ sélectionné n’est pas valide. Veuillez le corriger</p>
                    </div>
                    
                    <div class="content cf">
                        <div class="column-form">
                            <div class="row-form cf">
                                <label>Nom</label>
                                <input type="text" name="nom" class="field" value="<?= $this->contact->nom_contact ?>" onkeypress="return isNumberKey(event);" />
                            </div>
                            <div class="row-form cf">
                                <label>Fonction</label>
                                <input type="text" name="fonction" class="field" value="<?= $this->contact->fonction?>" />
                            </div>
                            <div class="row-form cf">
                                <label>Tel 1 </label>
                                <input type="text" name="tel_fixe" class="field" value="<?= $this->contact->tel_fixe?>" />
                            </div>
                            <div class="row-form cf">
                                <label>Email</label>
                                <input type="text" name="email" class="field" value="<?= $this->contact->email?>" />
                            </div>
                        </div>

                        <div class="column-form">
                            <div class="row-form cf">
                                <label>Prénom</label>
                                <input type="text" name="prenom" class="field" value="<?= $this->contact->prenom_contact?>" onkeypress="return isNumberKey(event);" />
                            </div>
                            <div class="row-form cf">
                                <label>Tel 2</label>
                                <input type="text" name="tel_port" class="field" value="<?= $this->contact->tel_port?>" />
                            </div>
                            <div class="row-form cf">
                                <label>Linkedin</label>
                                <input type="text" name="linkedin" class="field" value="<?= $this->contact->linkedin?>" />
                            </div>
                            
                            
                            <!-- Societe oge-client-contact -->
                            <div class="row-form cf other2 select-custom">
                                <label>Société</label>
                                <select name="societe" class="select-replace" id="societe" >
                                    <!--option value=""  > &nbsp </option-->
                                    <?php
                                        foreach($this->oge_clients_contacts as $societe){ ?>
                                            <option selected value="<?= $societe['id_oge_client'] ?>" ><?= $societe['nom_societe'] ?></option> 
                                    <?php } ?>
                                    <?php foreach($this->oge_client_distinct as $a){ 
                                            if($a['nom_societe'] != ''){ ?>
                                                <option value="<?= $a['id_oge_client'] ?>" ><?= $a['nom_societe'] ?></option> 
                                          <?php }
                                        }?>
                                </select>
                            </div>
                            <!-- FIN -->
                            
                            
                            <input type="hidden" name="id" value="<?= $this->contact->id_contact ?>" />
                        </div>
                    </div>
                </section>
                <input type="submit" class="button" value="Edit le contact" />
            </form>
        </div>
    </div>
</div>
