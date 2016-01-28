<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<script>
// Générer password
function generer_password($password){
    var ok = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789éè';
    var pass = '';
    longueur = 14;
    for(i=0; i<longueur; i++){
        var wpos = Math.round(Math.random() * ok.length);
        pass += ok.substring(wpos, wpos+1);
    }
    document.getElementById('mdp').value = pass;
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







<div class="wrapper">
    <h1>Créer le trésorier</h1>
    <section class="panel">
        <div id="formrechercher">
            <form action="" method="get" id="add_tresorier">                
                <div class="content cf">
                    <div class='columna-form'>
                        <div class="row-form cf other1">
                            <label>Nom</label>
                            <input type="text" name="nom" class="field" value="<?= $this->cdp->nom ?>" />
                        </div>
                        <div class="row-form cf other2">
                            <label>Prénom</label>
                            <input type="text" name="prenom" class="field" value="<?= $this->cdp->prenom ?>" />
                        </div>
                        <div class="row-form cf other1">
                            <label>Nom interne </label>
                            <input type="text" name="nom_interne" class="field" value="<?= $this->cdp->nom_interne ?>" />
                        </div>
                        <div class="row-form cf other2">
                            <label>Email</label>
                            <input type="text" name="email" class="field" value="<?= $this->cdp->email ?>" />
                        </div>
                        <div class="row-form cf other2">
                            <label>MDP</label>
                            <input type="text" name="mdp" id="mdp" class="field" value="<?= $this->cdp->mdp ?>"/>
                        </div>                                                                                                  
                        <div class="row-form cf other1">                               
                            <label>Adresse</label>                                                       
                            <input style="width: 793px;" type="text" name="adresse" class="field" value="<?= $this->cdp->adresse ?>"/>                               
                        </div>
                        <div class="row-form cf other1">
                            <label>Ville</label>
                            <input type="text" name="ville" id="tags" class="field" value="<?= $this->cdp->ville ?>"/>
                        </div>
                        <div class="row-form cf other2">
                            <label>Code postal</label>
                            <input type="text" name="code_postal" class="field" value="<?= $this->cdp->code_postal ?>" />
                        </div>                        
                        <div class="row-form cf other1">
                            <label>Num SS</label>
                            <input type="text" name="num_ss" class="field" value="<?= $this->cdp->num_ss ?>" />
                        </div>
                        
                        
                        
                        <!-- role -->
                        <!--div class="row-form cf other2">
                            <label>Rôle</label>
                            <select name="role" class="select-replace" id="role" >
                                <option selected value=""  > CDP </option>
                                <option value="president" >president</option> 
                                <option value="tresorier" >tresorier</option> 
                            </select>
                        </div-->
                        
                        
                        
                                                
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
                    
                    <?php if(isset($this->cdp->id_cdp)){?>
                        <input type="submit" class="button" value="Modifier le CDP"/>                        
                    <?php }else{?>
                        <input type="submit" class="button" value="Créer le CDP"/>
                    <?php }?>
                    <input type='text' name="id_cdp" id="id-cdp" value="<?= $this->cdp->id_cdp ?>" style='display:none'>
                    <input type='text' name="role" id="role" value="tresorier" style='display:none'>
                    <input type="submit" class="button" value="Générer password" onclick="generer_password('mdp');" />
                </div>                         
            </form>
        </div>
    </section>
</div>

