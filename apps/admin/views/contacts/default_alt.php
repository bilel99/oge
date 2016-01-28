<?php

function implodeParams($params) {
    $str = '';
    foreach ($params as $k => $v) {
        $str .= "/$k=$v";
    }
    return $str;
}
?>
<div class="wrapper">
    <section class="panel">
        <div id="formrechercher">
            <form action="" method="get" id="rechercher">
                <header class="title-panel cf">
                    <h1><span><strong>Recherche contact</strong></span></h1>
                </header>
                <div class="content cf">
                    <div class="column-form">
                        <div class="row-form cf">
                            <label>Nom société</label>
                            <input type="text" name="nomSociete" class="field" value="" />
                        </div>
                        <div class="row-form cf">
                            <label>Nom</label>
                            <input type="text" name="nom" class="field" value="" />
                        </div>
                        <div class="row-form cf">
                            <label>Fonction</label>
                            <input type="text" name="fonction" class="field" value="" />
                        </div>
                        <div class="row-form cf">
                            <input type="submit" class="button" value="valider" onmousedown="captura()"/>
                        </div>
                    </div>

                    <div class="column-form">
                        <div class="row-form cf">
                            <label>Prénom</label>
                            <input type="text" name="prenom" class="field" value="" />
                        </div>
                        <div class="row-form cf">
                            <label>Email</label>
                            <input type="text" name="email" class="field" value="" />
                        </div>
                        <div class="row-form cf">
                            <label>&nbsp;</label>
                        </div>
                        <div class="row-form cf">
                            <input type="reset" class="button" value="Remise á zéro" />
                        </div>
                    </div>
                </div>
                <div class="row-form cf">
                    <label>&nbsp;</label>
                </div><!-- /.row-form -->
            </form>
        </div>

        <?php include $this->path . 'apps/' . $this->App . '/views/partials/_clientsTable.php' ?>
    </section>
</div>

