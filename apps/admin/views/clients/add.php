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

            <form action="#" method="post" id="entreprise">
                <input type="hidden" name="typo" value="" />
                <header class="head-form" style="width: 318px; margin: 0 auto">
                    <table>
                        <tr>
                            <th style="text-align:left">TYPOLOGIE</th>
                            <th><label class="radio" style="float:right">
                                    <input type="radio" name="typologie" value="Particulier" />
                                    Particulier</label></th>
                            <th><label class="radio" style="float:right">
                                    <input type="radio" name="typologie" value="Entreprise" id="entre" checked="checked" />
                                    Entreprise</label></th>
                        </tr>


                        <tr>
                            <th style="text-align:left">TYPE</th>
                            <th><label class="radio" >
                                    <input type="radio" name="type" value="C" checked="checked" />
                                    Client
                                </label></th>
                            <th><label class="radio" >
                                    <input type="radio" name="type" value="P" id="prospect" />
                                    Prospect
                                </label></th>
                        </tr>



                    </table>
                </header>

                <section class="panel">
                    <header class="title-panel cf">
                        <h1><span><strong>Société</strong></span></h1>
                    </header><!-- /.title-panel -->

                    <div class="content cf">
                        <div class="columna-form">
                            <div class="row-form cf other1">
                                <label>Nom Société</label>
                                <input name="societe" type="text" class="field" value="" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other2 select-custom">
                                <label>Secteur</label>
                                <select name="sector" class="select-replace" id="sector" >
                                    <option value=""  > &nbsp </option>
                                    <?php foreach($this->sector as $sector) {  ?>
                                        <option value="<?= $sector ?>" ><?= $sector ?></option>
                                    <?php } ?>
                                </select>
                            </div><!-- /.row-form -->
                            <div class="row-form cf other1">
                                <label>Etranger</label>

                                <label class="radio">
                                    <input type="radio" name="etranger" value="FR" id="fr"   />
                                    FR
                                </label>

                                <label class="radio">
                                    <input type="radio" name="etranger" value="UE" id="ue" checked="checked" />
                                    UE
                                </label>

                                <label class="radio">
                                    <input type="radio" name="etranger" value="RDM" id="rdm" />
                                    RDM
                                </label>
                            </div><!-- /.row-form -->


                            <div class="row-form cf other2 ">
                                <label>Activité</label>
                                <input name="activite" type="text" class="field" value="" />
                            </div><!-- /.row-form -->


                            <!-- div class="row-form cf other2">
                                <label>Localisation</label>

                                <label class="radio">
                                    <input type="radio" name="etranger" value="FR"  checked="checked" />
                                    FR
                                </label>

                                <label class="radio">
                                    <input type="radio" name="etranger" value="UE" />
                                    UE
                                </label>

                                <label class="radio">
                                    <input type="radio" name="etranger" value="RDM" />
                                    RDM
                                </label>
                            </div><!-- /.row-form -->

                            <div class="row-form cf other1">
                                <label>Capital</label>
                                <input name="capital" type="text" class="field" value="" />

                            </div><div style="margin-top: 70px; position: absolute; margin-left: 350px;">&euro;</div><!-- /.row-form -->
                            <div class="row-form cf other2 select-custom">
                                <label>Forme</label>
                                <select name="forme" class="select-replace" id="forme">
                                    <option value=""  > &nbsp </option>
                                    <?php foreach($this->formes as $formes) {   ?>
                                        <option value="<?= $formes ?>" ><?= $formes ?></option>
                                    <?php   } ?>

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
                                <input name="siret" type="text" class="field" value="" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other2">
                                <label>Num RCS</label>
                                <input name="numrcs" type="text" class="field" value="" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other1">
                                <label>Lieu RCS</label>
                                <input name="lieu" type="text" class="field" value="" />
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
                                    <input name="numtva" type="text" class="field" value="" />
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
                                <input name="adresse" type="text" class="field" value="" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other2">
                                <label>Code postal</label>
                                <input name="code_postal" type="text" class="field" value="<?= $this->clients->code_postal ?>" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other1">
                                <label>Ville</label>
                                <input name="ville" type="text" class="field" value="" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other2 select-custom">
                                <label>Pays</label>
                                <select name="pays" class="select-replace" id="pays" >
                                    <option value=""  > &nbsp </option>
                                    <?php foreach($this->pays as $pays) {  ?>
                                        <option value="<?= $pays['id_pays'] ?>" ><?= $pays['en'] ?></option>
                                    <?php   } ?>
                                </select>
                            </div><!-- /.row-form -->
                            <div class="row-form cf other1">
                                <label>Tel standard</label>
                                <input name="tel" type="text" class="field" value="" />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other2">
                                <label>Site Internet</label>
                                <input name="site_internet" type="text" class="field" value=""  />
                            </div><!-- /.row-form -->
                            <div class="row-form cf other1">
                                <label>Provenance</label>
                                <select name="provenance" class="select-replace" id="provenance" >
                                    <option value=""  > &nbsp </option>
                                    <?php foreach($this->provenances as $provenance) {   ?>
                                        <option value="<?= $provenance ?>" ><?= $provenance ?></option>
                                    <?php   }  ?>
                                </select>
                            </div><!-- /.row-form -->
                        </div><!-- /.column-form -->
                </section><!-- /.panel -->

                <input type="submit" class="button" value="créer le client" />
            </form>
        </div><!--/.form-entreprise -->
    </div>
    <div id="formparti"  class="display-none"  >
        <form action="#" method="post" id="particulier" >
            <header class="head-form" style="width: 318px; margin: 0 auto">
                <table>
                    <tr>
                        <th style="text-align:left">TYPOLOGIE</th>
                        <th><label class="radio" style="float:right">
                                <input type="radio" name="typologie" value="Particulier" id="parti" checked="checked"  />
                                Particulier</label></th>
                        <th><label class="radio" style="float:right">
                                <input type="radio" name="typologie" value="Entreprise" />
                                Entreprise</label></th>
                    </tr>


                    <tr>
                        <th style="text-align:left">TYPE</th>
                        <th><label class="radio" >
                                <input type="radio" name="typeparticulier" value="C" />
                                Client
                            </label></th>
                        <th><label class="radio" >
                                <input type="radio" name="typeparticulier" value="P" id="prospect" checked="checked"/>
                                Prospect
                            </label></th>
                    </tr>


                </table>
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
                            <input name="nom" type="text" class="field" value="" onkeypress="return isNumberKey(event);" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2">
                            <label>Prenom</label>
                            <input name="prenom" type="text" class="field" value="" onkeypress="return isNumberKey(event);" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other1">
                            <label>Localisation</label>

                            <label class="radio">
                                <input type="radio" name="etranger1" value="FR"  checked="checked" />
                                FR
                            </label>

                            <label class="radio">
                                <input type="radio" name="etranger1" value="UE"  />
                                UE
                            </label>

                            <label class="radio">
                                <input type="radio" name="etranger1" value="RDM" />
                                RDM
                            </label>
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2">
                            <label>&nbsp;</label>
                            <label class="label-comodin">&nbsp;</label>
                        </div>
                        <div class="row-form cf other1">
                            <label>Adresse</label>
                            <input name="adresse" type="text" class="field" value="" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2">
                            <label>Code postal</label>
                            <input name="code_postal" type="text" class="field" value="" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other1">
                            <label>Ville</label>
                            <input name="ville" type="text" class="field" value="" />
                        </div><!-- /.row-form -->
                        <div class="row-form cf other2">
                            <label>Pays</label>
                            <select name="pays" class="select-replace" id="pays2">
                                <option value=""  > &nbsp </option>
                                <?php foreach($this->pays as $pays) {        ?>
                                    <option value="<?= $pays['id_pays'] ?>" ><?= $pays['en'] ?></option>
                                <?php   } ?>
                            </select>
                        </div><!-- /.row-form -->
                        <div class="row-form cf other1">
                            <label>Tel standard</label>
                            <input name="tel" type="text" class="field" value="" />
                        </div><!-- /.row-form -->

                        <div class="row-form cf other2">
                            <label>Site Internet</label>
                            <input name="site_internet" type="text" class="field" value=""  />
                        </div><!-- /.row-form -->

                        <div class="row-form cf other1">
                            <label>Provenance</label>
                            <select name="provenance" class="select-replace" id="provenance2" >
                                <option value=""  > &nbsp </option>
                                <?php foreach($this->provenances as $provenance) {   ?>
                                    <option value="<?= $provenance ?>" ><?= $provenance ?></option>
                                <?php   }  ?>
                            </select>
                        </div><!-- /.row-form -->
                    </div><!-- /.column-form -->
                </div><!-- /.content -->
            </section><!-- /.panel -->

            <input type="submit" class="button" value="créer le client" />
        </form>
    </div>
</div>