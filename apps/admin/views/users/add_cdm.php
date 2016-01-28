<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



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






<script>
    function Choix(form) {
        i = form.competences.selectedIndex;
        
        switch (i) {
                <?php foreach($this->eval as $e => $key){ 
                        if($this->eval[$e]['value']==""){}
                        $this->evalua = explode(";", $this->eval[$e]['value']); ?>
                        case <?= $e ?> :
                        var txt = <?= json_encode($this->evalua); ?>;
                        <?php $nbr = count($this->evalua); ?>
                        //console.log(txt);
                        //console.log(<?= $nbr ?>);
                        
                        for(w=0; w< <?= $nbr ?>; w++){
                            $('#evaluation option[value="<?= $e ?>"]').remove();
                            $('#evaluation').append('<option value="<?= $e ?>" ></option>');
                        }
                        
                            for (j = 0; j < <?= $nbr ?>; j++) {
                                form.evaluation.options[j].text = txt[j];
                                $('#evaluation').trigger('change'); // Permet de mettre à jour le select
                            }
                                
                        break;
                        
                <?php } ?>
            }
            
    }
    
</script>





<div class="wrapper">
    <section class="panel">
        <div id="formrechercher">
            <form action="" method="post"  enctype="multipart/form-data"  id="add_cdm">
                <header class="title-panel cf">
                    <?php $title = ($this->params[0] == 'add') ? 'Créer' : 'Modifier' ?>
                    <h1><span><strong><?= $title ?> une CDM</strong></span></h1>
                </header><!-- /.title-panel -->
                <div class="content cf">
                    <div class='columna-form'>
                        <div class="row-form cf other1">
                            <label>Nom</label>
                            <input style="margin-left: 13px;" type="text" name="nom" class="field" value="<?= $this->cdm->nom ?>"  onkeypress="return isNumberKey(event);">
                        </div>
                        <div class="row-form cf other2">
                            <label>Prénom</label>
                            <input type="text" name="prenom" class="field" value="<?= $this->cdm->prenom ?>"  onkeypress="return isNumberKey(event);">
                        </div>
                        <div class="row-form cf other1">
                            <label>Telephone</label>
                            <input style="margin-left: 13px;" type="text" name="telephone" class="field" value="<?= $this->cdm->telephone ?>" onkeypress="return isDifNumberKey(event);" minlength="10" maxlength="13"  />
                        </div>
                        <div class="row-form cf other2">
                            <label>Banner</label>
                            <input type="text" name="banner" class="field" value="<?= $this->cdm->banner ?>" />
                        </div>
                        
                        
                        
                        <!-- EVALUATION -->
                        <div class="row-form cf other2 select-custom remi2">
                            <label>Evaluation</label>
                            <select name="evaluation" class="select-replace" id="evaluation" >
                                
                                <!--option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option>
                                <option></option-->
                                
                            </select>
                        </div>
                        <!-- FIN -->


                        
                        <div class="row-form cf other1 select-mult-custom">
                            <label>Competences</label>
                            <select style="margin-left: 13px;" class="select-multi" multiple="multiple" name="competences" id="competences" onClick="Choix(this.form)" >
                                <?php
                                foreach ($this->competences as $competence) {
                                    $newcompetences = explode(",", $this->cdm->competence);
                                    if (in_array($competence, $newcompetences)) {
                                        ?>
                                        <option selected value="<?= $competence ?>" ><?= $competence ?></option> 
                                    <?php } else { ?>
                                        <option value="<?= $competence ?>" ><?= $competence ?></option> 
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        
                        



                        <div style="margin-left: 13px;" class="row-form cf other1">

                            <label>Jour</label>
                            <select style="" name="jour" class="select-replace" id="jour" >
                                <option selected value="<?= $this->j ?>" ><?= $this->j ?></option>
                                <?php
                                foreach ($this->jour as $j) {
                                    if ($this->cdm->jour == $j) { ?>
                                        <?php
                                    } else { ?>
                                        <option value="<?= $j ?>" ><?= $j ?></option>
                                        <?php
                                    } ?>
                                    <?php
                                } ?>
                            </select>
                        </div>

                        <div class="row-form cf other2">
                            <label>&nbsp</label>
                        </div>

                        <div style="margin-left: 13px;" class="row-form cf other1">
                            <label>Mois</label>
                            <select name="mois" class="select-replace" id="mois" >
                                <option selected value="<?= $this->m ?>" ><?= $this->m ?></option>
                                <?php
                                foreach ($this->mois as $m) {
                                    if ($this->cdm->mois == $m) { ?>
                                        <?php
                                    } else { ?>
                                        <option value="<?= $m ?>" ><?= $m ?></option>
                                        <?php
                                    } ?>
                                    <?php
                                } ?>
                            </select>
                        </div>

                        <div class="row-form cf other2">
                            <label>&nbsp</label>
                        </div>

                        <div style="margin-left: 13px;" class="row-form cf other1">
                            <label>Année</label>
                            <select name="ann" class="select-replace" id="ann" >
                                <option selected value="<?= $this->a ?>" ><?= $this->a ?></option>
                                <?php
                                foreach ($this->ann as $a) {
                                    if ($this->cdm->ann == $a) { ?>
                                        <?php
                                    } else { ?>
                                        <option value="<?= $a ?>" ><?= $a ?></option>
                                        <?php
                                    } ?>
                                    <?php
                                } ?>
                            </select>
                        </div>



                        <div class="row-form cf other1">
                            <label>Adresse</label>
                            <input style="margin-left: 13px; margin-top: -20px;" type="text" name="adresse" class="field fieldaddress" value="<?= $this->cdm->adresse ?>"  />
                        </div>
                        <div class="row-form cf other1">
                            <label>Ville</label>
                            <input style="margin-left: 13px;" type="text" name="ville" id="tags" class="field" value="<?= $this->cdm->ville ?>" />
                        </div>
                        <div class="row-form cf other2">
                            <label>Code postal</label>
                            <input type="text" name="code_postal" class="field" value="<?= $this->cdm->code_postal ?>" />
                        </div>
                        <div class="row-form cf other1 select-custom">
                            <label>Motorisé </label>
                            <select name="motorise" class="select-replace" id="motorise" >
                                <option value=""  > &nbsp </option>
                                <?php
                                foreach ($this->motorise as $motor) {
                                    if ($this->cdm->motorise == $motor) { ?>
                                        <option selected value="<?= $motor ?>"><?= $motor ?></option>
                                        <?php
                                    } else { ?>
                                        <option  value="<?= $motor ?>" ><?= $motor ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="row-form cf other2">
                            <label>Sécu Soc.</label>
                            <input type="text" name="num_ss" class="field" value="<?= $this->cdm->num_ss ?>"/>
                        </div>
                        <div class="row-form cf other1 alignInput">
                            <input type="text" name="provenance1" class="field" value="<?= $this->provenance[0] ?>" />
                        </div>
                        <div class="row-form cf other2 select-mult-custom">
                            <label>Langues</label>
                            <select style="margin-left: 13px;" class="select-multi" multiple="multiple" name="langues[]" id="langues" >
                                <?php
                                foreach ($this->langues as $langue) {
                                    $newlangues = explode(",", $this->cdm->langues);
                                    if (in_array($langue, $newlangues)) {
                                        ?>
                                        <option selected value="<?= $langue ?>"><?= $langue ?></option>
                                    <?php } else { ?>
                                        <option  value="<?= $langue ?>"><?= $langue ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row-form cf other1">
                            <label>Ville provenance</label>
                            <input style="margin-left: 13px;" type="text" name="provenance2" class="field" value="<?= $this->provenance[1] ?>" /><br><br>
                            <input style="margin-left: 13px;" type="text" name="provenance3" class="field" value="<?= $this->provenance[2] ?>" />
                        </div>
                        <div class="row-form cf other2 select-custom">
                            <label>Cursus</label>
                            <select name="cursus" class="select-replace" id="cursus" >
                                <option value=""  > &nbsp </option>
                                <?php
                                foreach ($this->cursus as $cursus) {
                                    if ($this->cdm->cursus == $cursus) { ?>
                                        <option selected value="<?= $cursus ?>" ><?= $cursus ?></option>
                                        <?php
                                    } else { ?>
                                        <option value="<?= $cursus ?>" ><?= $cursus ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="row-form cf other2 select-custom">
                            <label>Année</label>
                            <select name="annee" class="select-replace" id="annee" >
                                <option value=""  > &nbsp </option>
                                <?php
                                foreach ($this->annee as $annee) {
                                    if ($this->cdm->annee == $annee) { ?>
                                        <option selected value="<?= $annee ?>" ><?= $annee ?></option>
                                        <?php
                                    } else { ?>
                                        <option value="<?= $annee ?>" ><?= $annee ?></option>
                                        <?php
                                    } ?>
                                    <?php
                                } ?>
                            </select>
                        </div>
                        <div class="row-form cf other1">
                            <label>&nbsp;</label>
                        </div>
                        <div class="row-form cf other2">
                            <label>&nbsp;</label>
                            <label class="label-comodin">&nbsp;</label>
                        </div>

                        <div class="row-form cf other1">
                            <label style="">Email</label>
                            <input style="margin-left: 13px;" type="text" name="email" class="field" value="<?= $this->cdm->email ?>" />
                        </div>

                        <div class="row-form cf other2">
                            <label>&nbsp;</label>
                            <label class="label-comodin">&nbsp;</label>
                        </div>


                        <div class="row-form cf other1">
                            <label style="" id="archive-label">Upload doc</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                            <input style="margin-left: 12px; width: 256px;" class="field" name="uploadedfile"  id="uploadedfile" type="file" accept="application/pdf" /><br/>
                        </div>
                        



                    </div>
                </div>

                <div>
                    <p id="general-error" class="error-msg display-none form-responses">Le champ sélectionné n’est pas valide. Veuillez le corriger</p>
                    <p id="upload" class="error-msg display-none form-responses">fichier non valide</p>
                </div><!-- /.form-error -->
                <div>
                    <label>&nbsp;</label>
                    <?php
                    if (isset($this->cdm->id_cdm)) { ?>
                        <input type="submit" class="button" value="Modifier le CDM"/>
                        <?php
                    } else { ?>
                        <input type="submit" class="button" value="Créer le CDM"/>
                        <?php
                    } ?>
                    <input type='text' name="id_cdm" id="id-cdm" value="<?= $this->cdm->id_cdm ?>" style='display:none'>
                    <input type='text' name="id_cdp" id="id-cdp" value="<?= $_SESSION['user']['id_cdp'] ?>" style='display:none'>
                    <input type='text' name="uploadfile"  style='display:none' value="<?= $this->cdm->upload ?>">
                </div>
            </form>
        </div>
    </section>
</div>

