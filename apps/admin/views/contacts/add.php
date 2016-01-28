<script>
function isNumberKey(evt){
    //console.log(evt);
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    //console.log(charCode);
    return !(charCode > 47 && charCode < 58);
}
    
    
    function isDifNumberKey(evt) {
        //console.log(evt);
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        //console.log(charCode);
        return (charCode > 47 && charCode < 58);
    }
</script>

<div id="forms">    
    <div id="formentre"> 
        <div class="form-entreprise form-error">
            <form action="#" method="post" id="all-contacts">
                <section class="panel">
                    <header class="title-panel cf">
                        <h1><span><strong>Société</strong></span></h1>
                    </header>
                    <div>
                        <p class="error-msg display-none form-responses">Le champ sélectionné n’est pas valide. Veuillez le corriger</p>
                    </div>
                    
                    <div class="content cf">
                        <div class="columna-form">
                            <div class="row-form cf other1">
                                <label>Nom</label>
                                <input type="text" name="nom" class="field" value="" onkeypress="return isNumberKey(event);" />
                            </div>
                            <div class="row-form cf other2">
                                <label>Prénom</label>
                                <input type="text" name="prenom" class="field" value="" onkeypress="return isNumberKey(event);" />
                            </div>
                            <div class="row-form cf other1">
                                <label>Fonction</label>
                                <input type="text" name="fonction" class="field" value="" />
                            </div>
                            <div class="row-form cf other2">
                                <label>Linkedin</label>
                                <input type="text" name="linkedin" class="field" value="" />
                            </div>
                            <div class="row-form cf other1">
                                <label>Tel 1</label>
                                <input type="text" name="tel_fixe" class="field" value="" onkeypress="return isDifNumberKey(event);" minlength="10" maxlength="13"  />
                            </div>
                            <div class="row-form cf other2">
                                <label>Tel 2</label>
                                <input type="text" name="tel_port" class="field" value="" onkeypress="return isDifNumberKey(event);" minlength="10" maxlength="13"  />
                            </div>
                            <div class="row-form cf other1">
                                <label>Email</label>
                                <input type="text" name="email" class="field" value="" />
                            </div>
                            
                            <!-- Societe oge-client-contact -->
                            <div class="row-form cf other2 select-custom">
                                <label>Société</label>
                                <select name="societe" class="select-replace" id="societe" >
                                    <option value=""  > &nbsp </option>
                                    <?php
                                    foreach($this->oge_client_distinct as $a){ 
                                        if($a['nom_societe'] != ''){ ?>
                                            <option selected value="<?= $a['id_oge_client'] ?>" ><?= $a['nom_societe'] ?></option> 
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <!-- FIN -->
                        </div>
                    </div>
                </section>
                <input type="submit" class="button" value="créer le contact" />
            </form>
        </div>
    </div>
</div>