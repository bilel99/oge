<script>
    function isNumberKey(evt) {
        //console.log(evt);
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        //console.log(charCode);
        return (charCode > 45 && charCode < 58);

    }




</script>


<div class="wrapper">
    <section class="panel">
        <div id="formrechercher">
            <form action="" method="post" id="add_etudes">
                <header class="title-panel cf">                    
                    <h1><span><strong>Créer une étude</strong></span></h1>
                </header><!-- /.title-panelT -->
                <div class="content container cf">

                    <div class="row">
                        <div class="col-1 but" >
                            <label>Client</label>
                            <input name="client" type="text" class="field field-small" id="input-search-client" data-id="<?= $this->etudes->id_oge_client ?>" value="<?= $this->client->nom . "" . $this->client->prenom ?>"  />
                            <input type="submit" class="button btn-etudes button-secondary bot" id="search_client" value="Rechercher"/>                                                    
                            <input type="hidden" name="idclient" value="<?= $this->etudes->id_oge_client ?>" />
                        </div>
                        <div class="col-2" >&nbsp;</div>
                        <div class="col-1 but" >
                            <label >Contact</label>
                            <input name="contact" type="text" class="field field-small" id="input-search-contact" data-id="<?= $this->etudes->id_contact ?>" value="<?= $this->contact->nom_contact . "" . $this->contact->prenom_contact ?>"  />
                            <input type="submit" class="button btn-recher btn-etudes button-secondary bot-2" id="search_contact" value="Rechercher"/>                                                    
                            <input type="hidden" name="idcontact" value="<?= $this->etudes->id_contact ?>" />
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-1" >
                            <label>Nom interne</label>
                            <input type="text" name="nom_interne" class="field" value="<?= $this->etudes->nom_interne ?>" />
                        </div>

                        <div class="col-2">&nbsp;</div>
                        <div class="col-1" >
                            <label>N&deg; Convention</label>
                            <input type="text" name="num_convention" class="field" value="<?= $this->etudes->num_convention ?>" maxlength="4" minlength="4" pattern=".{4,}" />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-big" >
                            <label>Descriptif</label>                                                       
                            <textarea type="text" name="descriptif" class="field fieldaddress" style='height: 20px'value="<?= $this->etudes->descriptif ?>"><?= $this->etudes->descriptif ?></textarea>                              
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <label>Date début</label>
                            <input name="date_debut" type="text" class="field" id="date_debut" value="<?= date('Y-m-d'); ?>" /> 
                        </div>
                        <div class="col-2"></div>
                        <div class="col-1" >
                            <label>Date Fin</label>
                            <input name="date_fin" type="text" class="field" id="date_fin" value="<?php $d_in = date('Y-m-d');
                                $nue_date = strtotime('+1 day', strtotime($d_in));
                                $nue_date = date('Y-m-d', $nue_date);
                                echo $nue_date; ?>" /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1" >
                            <label>Budget FSI</label>
                            <input type="text" name="budget_fsi" id="budget_fsi" class="field" value="<?= $this->etudes->budget_fsi ?>" onkeyup="this.value=this.value.replace(/(\d+(\.\d{0,2})?).*/, '$1')" />
                            <span class="euro">&euro;</span>
                        </div>
                        <div class="col-2" >&nbsp;</div>
                        <div class="col-1" >
                            <label>Budget HFS</label>
                            <input type="text" name="budget_hfs" id="budget_hfs" class="field field-disable" value="<?= $this->etudes->budget_hfs ?>" disabled />
                            <input type="hidden" name="aux_budget_hfs" id="aux_budget_hfs" value="<?= $this->etudes->budget_hfs ?>" />
                            <input type="hidden" name="budget_param" id="budget_param" value="<?= $this->budgetHFS ?>"  />
                            <span class="euro">&euro;</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1" >
                            <label>JE</label>
                            <input type="text" name="je" class="field" value="<?= $this->etudes->je ?>" />
                        </div>
                        <div class="col-2" >&nbsp;</div>
                        <div class="col-1" >
                            <label>Frais prévisio</label>
                            <input type="text" name="frais_previsio" class="field" value="<?= $this->etudes->frais_previsio ?>" onkeypress="return isNumberKey(event);" onkeyup="this.value=this.value.replace(/(\d+(\.\d{0,2})?).*/, '$1')" />
                            <span class="euro">&euro;</span>
                        </div>
                    </div>

                </div>
                <div>
                    <p id="general-error" class="error-msg display-none form-responses">Le champ sélectionné n’est pas valide. Veuillez le corriger</p>                        
                    <p id="rechercher-error" class="error-msg display-none form-responses">Client/Contact n’est pas valide.</p>
                    <p id="general-numC" class="error-msg display-none form-responses">Veuillez saisir le format XXXX</p>
                    
                    <?php if(isset($_SESSION['num_convention_existant'])){ ?>
                    <p style="color: #e31c18;"><?= $_SESSION['num_convention_existant'] ?></p>
                    <?php } ?>
                    <?php unset($_SESSION['num_convention_existant']); ?>
                </div><!-- /.form-error -->
                <div>
                    <label>&nbsp;</label>
                    <input type="submit" class="button" value="Créer une étude"/>                        
                    <input type='hidden' name="id_etudes" id="id-cdm" value="<?= $this->etudes->id_etude ?>" >
                </div>
            </form>
        </div>
    </section>
</div>

