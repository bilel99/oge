<div id="forms">    
    <div id="formentre"> 
        <div class="form-entreprise form-error">
            <form action="#" method="post" id="all-memos">
                <input type="hidden" name="id_controller" value="<?= $this->params[0] ?>" />
                <input type="hidden" name="id" value="<?= $this->params[1] ?>" />
                <input type="hidden" name="target" id="target-con" value="<?= $this->menu_admin ?>">
                <section class="panel">
                    <header class="title-panel cf">
                        <h1><span><strong>Mémo</strong></span></h1>
                    </header>
                    <div>
                        <p class="error-msg display-none form-responses">Le champ sélectionné n’est pas valide. Veuillez le corriger</p>
                    </div>
                    <div class="content cf">
                        <div class="columna-form">
                            <div class="row-form cf other1">
                                <label>Description</label>
                                <textarea name="description" class="field" style="width: 400px; height: 55px"/><?= $this->memo->description?></textarea>
                            </div>
                        </div>
                    </div>
                </section>
                <?php if($this->memo->id_memo){?>
                    <input type="submit" class="button" value="Modifier le memo" />
                <?php }else{?>
                    <input type="submit" class="button" value="créer le memo" />
                <?php }?>     
            </form>
        </div>
    </div>
</div>
