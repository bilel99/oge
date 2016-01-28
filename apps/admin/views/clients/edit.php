<script>
    function isNumberKey(evt){
        //console.log(evt);
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        //console.log(charCode);
        return !(charCode > 47 && charCode < 58);

    }
</script>

<div id="forms">
    <div id="formentre" <?php if($this->clients->typologie != 'entreprise'){ ?> class="display-none"<?php } ?> >
        <div class="form-entreprise form-error">

            <form action="#" method="post" id="entreprise"   >
                <input type="hidden" name="typo" value="<?= $this->clients->typologie ?>" />
                <input type="hidden" name="id" value="<?= $this->clients->id_oge_client ?>" />
                <header class="head-form" style="width: 318px; margin: 0 auto">
                    <p style="float:left">Typologie</p>
                    <label class="radio" style="float:right; margin-right: 8px;">
                        <input type="radio" name="typologie" value="Entreprise" id="entre" checked="checked" />
                        Entreprise
                    </label>
                    <label class="radio" style="float: right; margin-right: 50px">
                        <input type="radio" name="typologie" value="Particulier" />
                        Particulier
                    </label>
                    <br>
                    <p style="float: left; margin: 0px -91px;">Type </p>
                    <label class="radio" style="float: right; margin-right: 8px;">
                        <input type="radio" name="type" value="C" <?php if ($this->clients->type == 'C') { ?> checked="checked" <?php } ?> />
                        Client
                    </label>
                    <label class="radio" style="float: right; margin-right: 50px">
                        <input type="radio" name="type" value="P" id="prospect" <?php if ($this->clients->type == 'P') { ?> checked="checked" <?php } ?>/>
                        Prospect
                    </label>
                </header>

                <section class="panel">
                    <header class="title-panel cf">
                        <h1><span><strong>Société</strong></span></h1>
                    </header><!-- /.title-panel -->

                    <div class="content cf">
                        <div class="columna-form">
                            <div class="row-form cf other1">
                                <label>Nom Société</label>
                                <input name="societe" type="text" class="field" value="<?= $this->clients->nom_societe ?>" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other2 select-custom">
                                <label>Secteur</label>
                                <select name="sector" class="select-replace" id="sector" >
                                    <option value=""  > &nbsp </option>
                                    <?php
                                    foreach($this->sector as $sector) {
                                        if($this->clients->id_sector == $sector){ ?>
                                            <option value="<?= $sector ?>" selected="selected"  ><?= $sector ?></option>
                                            <?php
                                        } else { ?>
                                            <option value="<?= $sector ?>" ><?= $sector ?></option>
                                            <?php
                                        }
                                    } ?>
                                </select>
                            </div><!-- /.row-form -->
                            <div class="row-form cf other1">
                                <label>Étranger</label>
                                <label class="radio">
                                    <input type="radio" name="etranger" value="FR" id="fr" <?php if($this->clients->etranger == 'FR'){ ?> checked="checked" <?php } ?> />
                                    FR
                                </label>

                                <label class="radio">
                                    <input type="radio" name="etranger" value="UE" id="ue" <?php if($this->clients->etranger == 'UE'){ ?> checked="checked" <?php } ?> />
                                    UE
                                </label>

                                <label class="radio">
                                    <input type="radio" name="etranger" value="RDM" id="rdm" <?php if($this->clients->etranger == 'RDM'){ ?> checked="checked" <?php } ?>  />
                                    RDM
                                </label>
                            </div><!-- /.row-form -->
                            <div class="row-form cf other2">
                                <label>Activité</label>
                                <input name="activite" type="text" class="field" value="<?= $this->clients->activite ?>" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other1">
                                <label>Capital</label>
                                <input name="capital" type="text" class="field" value="<?= $this->clients->capital ?>" />
                            </div><div style="margin-top: 70px; position: absolute; margin-left: 350px;">&euro;</div><!-- /.row-form -->
                            <div class="row-form cf other2 select-custom">
                                <label>Forme</label>
                                <select name="forme" class="select-replace" id="forme" >
                                    <option value=""  > &nbsp </option>
                                    <?php foreach($this->formes as $formes) {
                                        if($this->clients->id_forme == $formes){
                                            ?>
                                            <option value="<?= $formes ?>" selected="selected"  ><?= $formes ?></option>
                                        <?php   }else{   ?>
                                            <option value="<?= $formes ?>" ><?= $formes ?></option>
                                        <?php   }
                                    }
                                    ?>

                                </select>
                            </div><!-- /.row-form -->
                        </div><!-- /.column-form -->
                    </div><!-- /.content -->
                </section><!-- /.panel -->
                <div>
                    <p class="error-msg display-none form-responses">Le champ sélectionné n’est pas valide. Veuillez le corriger</p>
                </div><!-- /.form-error -->
                <section class="panel">
                    <header class="title-panel cf">
                        <h1><span><strong>administratif</strong></span></h1>

                    </header><!-- /.title-panel -->

                    <div class="content cf">
                        <div class="columna-form">
                            <div class="row-form cf other1">
                                <label>Siret</label>
                                <input name="siret" type="text" class="field" value="<?= $this->clients->siret ?>" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other2">
                                <label>Num RCS</label>
                                <input name="numrcs" type="text" class="field" value="<?= $this->clients->num_rcs ?>" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other1">
                                <label>Lieu RCS</label>
                                <input name="lieu" type="text" class="field" value="<?= $this->clients->lieu_rcs ?>" />
                            </div><!-- /.row-form -->





                            <!--div class="row-form cf other2">
                                <label>Num TVA</label>
                                <input name="numtva" type="text" class="field" value="<?= $this->clients->num_tva ?>" />
                            </div><!-- /.row-form -->












                            <div id="formSupplFr">
                                <div class="row-form cf other2">
                                    <label></label>
                                    <input name="numtva" type="hidden" class="field" value="" />
                                </div><!-- /.row-form -->
                            </div>

                            <div id="formSupplUe">
                                <div class="row-form cf other2">
                                    <label>Num TVA</label>
                                    <input name="numtva" type="text" class="field" value="<?= $this->clients->num_tva ?>" />
                                </div><!-- /.row-form -->
                            </div>

                            <div id="formSupplRdm">
                                <div class="row-form cf other2">
                                    <label></label>
                                    <input name="numtva" type="hidden" class="field" value="" />
                                </div><!-- /.row-form -->
                            </div>











                        </div><!-- /.column-form -->
                    </div><!-- /.content -->
                </section><!-- /.panel -->

                <section class="panel">
                    <header class="title-panel cf">
                        <h1><span><strong>Renseignement</strong></span></h1>
                    </header><!-- /.title-panel -->

                    <div class="content cf">
                        <div class="columna-form">
                            <div class="row-form cf other1">
                                <label>Adresse</label>
                                <input name="adresse" type="text" class="field" value="<?= $this->clients->adresse ?>" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other2">
                                <label>Code postal</label>
                                <input name="code_postal" type="text" class="field" value="<?= $this->clients->code_postal ?>" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other1">
                                <label>Ville</label>
                                <input name="ville" type="text" class="field" value="<?= $this->clients->ville ?>" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other2 select-custom">
                                <label>Pays</label>
                                <select name="pays" class="select-replace" id="pays">
                                    <option value=""  > &nbsp </option>
                                    <?php foreach($this->pays as $pays) {
                                        if($this->clients->id_pays == $pays['id_pays']){
                                            ?>
                                            <option value="<?= $pays['id_pays'] ?>" selected="selected"  ><?= $pays['en'] ?></option>
                                        <?php   }else{   ?>
                                            <option value="<?= $pays['id_pays'] ?>" ><?= $pays['en'] ?></option>
                                        <?php   }
                                    }
                                    ?>
                                </select>
                            </div><!-- /.row-form -->
                            <div class="row-form cf other1">
                                <label>Tel standard</label>
                                <input name="tel" type="text" class="field" value="<?= $this->clients->tel_standard ?>" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other2">
                                <label>Site Internet</label>
                                <input name="site_internet" type="text" class="field" value="<?= $this->clients->site_internet ?>"  />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other2 select-custom">
                                <label>Provenance</label>

                                <select name="provenance" class="select-replace" id="provenance" >
                                    <option value=""  > &nbsp </option>
                                    <?php foreach($this->provenances as $provenance) {
                                        if($this->clients->provenance == $provenance ){
                                            ?>
                                            <option value="<?= $provenance ?>" selected="selected"><?= $provenance ?></option>
                                        <?php   }else{   ?>
                                            <option value="<?= $provenance ?>" ><?= $provenance ?></option>
                                        <?php   }
                                    }
                                    ?>
                                </select>
                            </div><!-- /.row-form -->
                        </div><!-- /.column-form -->
                    </div><!-- /.content -->
                </section><!-- /.panel -->

                <input type="submit" class="button" value="modifier le client" />
            </form>
        </div><!--/.form-entreprise -->
    </div>
    <div id="formparti" <?php if($this->clients->typologie != 'particulier'){ ?> class="display-none" <?php } ?> >
        <form action="#" method="post" id="particulier" >
            <header class="head-form" style="width: 318px; margin: 0 auto">
                <p style="float:left">Typologie</p>
                <label class="radio" style="float:right; margin-right: 8px;">
                    <input type="radio" name="typologie" value="Entreprise" />
                    Entreprise
                </label>
                <label class="radio" style="float: right; margin-right: 50px">
                    <input type="radio" name="typologie" value="Particulier" id="parti" checked="checked"  />
                    Particulier
                </label>
                <br>
                <p style="float: left; margin: 0px -91px;">Type </p>
                <label class="radio" style="float: right; margin-right: 8px;">
                    <input type="radio" name="typeparticulier" value="C" <?php if($this->clients->type == 'C') {?> checked="checked" <?php } ?> />
                    Client
                </label>
                <label class="radio" style="float: right; margin-right: 50px">
                    <input type="radio" name="typeparticulier" value="P" id="prospect" <?php if($this->clients->type == 'P') { ?> checked="checked" <?php } ?>/>
                    Prospect
                </label>
            </header>
            <div>
                <p class="error-msg display-none form-responses">Le champ sélectionné n’est pas valide. Veuillez le corriger</p>
            </div><!-- /.form-error -->
            <section class="panel">
                <header class="title-panel cf">
                    <h1><span><strong>Renseignement</strong></span></h1>
                </header><!-- /.title-panel -->

                <div class="content cf">
                    <div class="columna-form">
                        <div class="row-form cf other1">
                            <label>Nom</label>
                            <input name="nom" type="text" class="field" value="<?= $this->clients->nom ?>" onkeypress="return isNumberKey(event);" />
                            <input type="hidden" name="id" value="<?= $this->clients->id_oge_client ?>" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2">
                            <label>Prenom</label>
                            <input name="prenom" type="text" class="field" value="<?= $this->clients->prenom ?>" onkeypress="return isNumberKey(event);" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other1">
                            <label>Étranger</label>

                            <label class="radio">
                                <input type="radio" name="etranger1" value="FR" <?php if($this->clients->etranger == 'FR'){ ?> checked="checked" <?php } ?> />
                                FR
                            </label>

                            <label class="radio">
                                <input type="radio" name="etranger1" value="UE" <?php if($this->clients->etranger == 'UE'){ ?> checked="checked" <?php } ?> />
                                UE
                            </label>

                            <label class="radio">
                                <input type="radio" name="etranger1" value="RDM" <?php if($this->clients->etranger == 'RDM'){ ?> checked="checked" <?php } ?>  />
                                RDM
                            </label>
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2">
                            <label>&nbsp;</label>
                            <label class="label-comodin">&nbsp;</label>
                        </div>
                        <div class="row-form cf other1">
                            <label>Adresse</label>
                            <input name="adresse" type="text" class="field" value="<?= $this->clients->adresse ?>" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2">
                            <label>Code postal</label>
                            <input name="code_postal" type="text" class="field" value="<?= $this->clients->code_postal ?>" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other1" >
                            <label>Ville</label>
                            <input name="ville" type="text" class="field" value="<?= $this->clients->ville ?>" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2 select-custom">
                            <label>Pays</label>
                            <select name="pays" class="select-replace" id="pays2" >
                                <option value=""  > &nbsp </option>
                                <?php
                                foreach($this->pays as $pays) {
                                    if($this->clients->id_pays == $pays['id_pays']) { ?>
                                        <option value="<?= $pays['id_pays'] ?>" selected="selected"  ><?= $pays['en'] ?></option>
                                        <?php
                                    } else {?>
                                        <option value="<?= $pays['id_pays'] ?>" ><?= $pays['en'] ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div><!-- /.row-form -->
                        <div class="row-form cf other1">
                            <label>Tel standard</label>
                            <input name="tel" type="text" class="field" value="<?= $this->clients->tel_standard ?>" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2">
                            <label>Site Internet</label>
                            <input name="site_internet" type="text" class="field" value="<?= $this->clients->site_internet ?>"  />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2 select-custom">
                            <label>Provenance</label>
                            <select name="provenance" class="select-replace" id="provenance2" >
                                <option value=""  > &nbsp </option>
                                <?php foreach($this->provenances as $provenance) {
                                    if($this->clients->provenance == $provenance){
                                        ?>
                                        <option value="<?= $provenance ?>" selected="selected"  ><?= $provenance ?></option>
                                        <?php
                                    } else { ?>
                                        <option value="<?= $provenance ?>" ><?= $provenance ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div><!-- /.row-form -->
                    </div><!-- /.column-form -->
                </div><!-- /.content -->
            </section><!-- /.panel -->

            <input type="submit" class="button" value="modifier le client" />
        </form>
    </div>
</div>