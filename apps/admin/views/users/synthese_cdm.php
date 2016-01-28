<div class="wrapper">
    <section class="panel">
        <div id="formrechercher">
            <header class="title-panel cf">
                <h1><span><strong>Synthese CDM</strong></span></h1>
            </header><!-- /.title-panel -->
            
            <p style="text-align: center; color: #7b0b03;">
                Vous avez bien crée le CDM suivant :
            </p>
            
            <div class="content cf">
                <div class='columna-form'>
                    <div class="row-form cf other1">
                        <label>Nom :</label>
                        <?=$this->cdms[0]['nom']?>
                    </div>
                    <div class="row-form cf other2">
                        <label>Prénom :</label>
                        <?=$this->cdms[0]['prenom']?>
                    </div>
                    <div class="row-form cf other1">
                        <label>&nbsp;</label>
                    </div>
                    <div class="row-form cf other2">
                        <label>N°OGE :</label>
                        <?=$this->cdms[0]['id_cdm']?>
                    </div>


                    <div class="row-form cf other1">                               
                        <label>Email :</label>
                        <?=$this->cdms[0]['email']?>
                    </div>

                    <div class="row-form cf other2">
                        <label>&nbsp;</label>
                    </div>
                    
                </div>
            </div>
            
            <a href="<?= $this->url ?>/users/cdm"><input type="submit" class="btn-search" value="Retour"/></a>
            
        </div>
    </section>
</div>
