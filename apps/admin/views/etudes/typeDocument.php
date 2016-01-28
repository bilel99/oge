<script type="text/javascript">
	$(document).ready(function(){
		$.datepicker.setDefaults($.extend({showMonthAfterYear: false}, $.datepicker.regional['fr']));
		<?php
		foreach($this->lLangues as $key => $lng)
		{
		?>
			$("#datepik_<?=$key?>_1").datepicker({minDate:new Date(), showOn: 'both', buttonImage: '<?=$this->surl?>/images/admin/calendar.gif', buttonImageOnly: true,changeMonth: true,changeYear: true,yearRange: '<?=(date('Y')-10)?>:<?=(date('Y')+10)?>' });
		<?php
                }
		?>
                        
                        
                        
		<?php
		foreach($this->lLangues as $key => $lng)
		{
		?>
			$("#datepik_<?=$key?>_2").datepicker({minDate:new Date(), showOn: 'both', buttonImage: '<?=$this->surl?>/images/admin/calendar.gif', buttonImageOnly: true,changeMonth: true,changeYear: true,yearRange: '<?=(date('Y')-10)?>:<?=(date('Y')+10)?>'});
		<?php
                }
		?>
                        
                        
                        
                        
            
            
            /* Si champ Type de frais 1 non compléter alors aucun enregistement pareil sur le champ prix ht 1 identique sur les 5 autre */
            
            /*########################################
             * #    1
             * #######################################*/
            // Vider champ par rapport au select
            $("#facture-frais-setting-document-2_fr").change(function () {
              if($("#facture-frais-setting-document-2_fr").val() == ''){
                    $("#document_ht1_fr").val("");
              }
            });
            
            
            // Vider select par rapport au champ texte
            $(document).on('keyup change paste', "#document_ht1_fr", function () {
              if($("#document_ht1_fr").val() == ''){
                    $("#facture-frais-setting-document-2_fr:selected").prop("selected", false);
                    $("#facture-frais-setting-document-2_fr .default").prop("selected", true);
              }
            });
            
            
            
            
            /*########################################
             * #    2
             * #######################################*/
            // Vider champ par rapport au select
            $("#facture-frais-setting-document-3_fr").change(function () {
              if($("#facture-frais-setting-document-3_fr").val() == ''){
                    $("#document_ht2_fr").val("");
              }
            });
            
            
            // Vider select par rapport au champ texte
            $(document).on('keyup change paste', "#document_ht2_fr", function () {
              if($("#document_ht2_fr").val() == ''){
                    $("#facture-frais-setting-document-3_fr:selected").prop("selected", false);
                    $("#facture-frais-setting-document-3_fr .default").prop("selected", true);
              }
            });
            
            
            
            
            /*########################################
             * #    3
             * #######################################*/
            // Vider champ par rapport au select
            $("#facture-frais-setting-document-4_fr").change(function () {
              if($("#facture-frais-setting-document-4_fr").val() == ''){
                    $("#document_ht3_fr").val("");
              }
            });
            
            
            // Vider select par rapport au champ texte
            $(document).on('keyup change paste', "#document_ht3_fr", function () {
              if($("#document_ht3_fr").val() == ''){
                    $("#facture-frais-setting-document-4_fr:selected").prop("selected", false);
                    $("#facture-frais-setting-document-4_fr .default").prop("selected", true);
              }
            });
            
            
            
            
            /*########################################
             * #    4
             * #######################################*/
            // Vider champ par rapport au select
            $("#facture-frais-setting-document-5_fr").change(function () {
              if($("#facture-frais-setting-document-5_fr").val() == ''){
                    $("#document_ht4_fr").val("");
              }
            });
            
            
            // Vider select par rapport au champ texte
            $(document).on('keyup change paste', "#document_ht4_fr", function () {
              if($("#document_ht4_fr").val() == ''){
                    $("#facture-frais-setting-document-5_fr:selected").prop("selected", false);
                    $("#facture-frais-setting-document-5_fr .default").prop("selected", true);
              }
            });
            
            
            
            
            /*########################################
             * #    5
             * #######################################*/
            // Vider champ par rapport au select
            $("#facture-frais-setting-document-6_fr").change(function () {
              if($("#facture-frais-setting-document-6_fr").val() == ''){
                    $("#document_ht5_fr").val("");
              }
            });
            
            
            // Vider select par rapport au champ texte
            $(document).on('keyup change paste', "#document_ht5_fr", function () {
              if($("#document_ht5_fr").val() == ''){
                    $("#facture-frais-setting-document-6_fr:selected").prop("selected", false);
                    $("#facture-frais-setting-document-6_fr .default").prop("selected", true);
              }
            });
            
            /* FIN */
                        
                        
                
	});
	<?php
	if(isset($_SESSION['freeow']))
	{
	?>
		$(document).ready(function(){
			var title, message, opts, container;
			title = "<?=$_SESSION['freeow']['title']?>";
			message = "<?=$_SESSION['freeow']['message']?>";
			opts = {};
			opts.classes = ['smokey'];
			$('#freeow-tr').freeow(title, message, opts);
		});
	<?php
	}
	?>
            
            
</script>
<?php 
function implodeParams($params){
    $str = '';
    foreach($params as $k => $v){
        $str .= "/$k=$v";
    }
    return $str;
}

    function getRechercherValues($nom, $tthis){
        $val = "";
        if(isset($tthis->newParams[$nom])) $val = $tthis->newParams[$nom];
        return $val;
    }

    $smokeyMsgs = array(
        "edit_document" => array("title" => "Etude edited", "msg" => "A document was edited"),
    );

?>

<script type="text/javascript" src="<?= $this->url ?>/ckeditor/ckeditor.js"></script>
<form method="post" name="edit_document" id="edit_document" enctype="multipart/form-data" >
    <div class='content container cf'>        
        <div class="freeow freeow-top-right">
            <?php if (isset($_SESSION['smokey'])) { ?>
                <div class="smokey" style="opacity: 1; ">
                    <div class="background">
                        <div class="info-msg">
                            <h2><?php echo $smokeyMsgs[$_SESSION['smokey']]['title']; ?></h2>
                            <p><?php echo $smokeyMsgs[$_SESSION['smokey']]['msg']; ?></p>
                        </div>
                    </div>
                    <span class="icon"></span>
                    <span class="close"></span>
                </div>
                <?php unset($_SESSION['smokey']); ?>
            <?php } ?>
        </div>
<?php
if (count($this->lElements) > 0) {
    ?>
    <br />
    <h1><?= $this->typeDocument->name ?></h1>
    <table class="large thdocument">
        <?php
        foreach ($this->lElements as $element) {     
            
            if($element['id_cdp'] == $_SESSION['user']['id_user']){
                if($element['type_element']=='Texte' ||$element['type_element']=='Textearea'||$element['type_element']=='Texteditor'||$element['type_element']=='Date'||$element['type_element']=='SelectFacture'||$element['type_element']=='Date2'||$element['type_element']=='SelectFrais'||$element['type_element']=='TexteFraisPort'||$element['type_element']=='TextFactureFrais'){ 
                    $this->etudes->displayFormElement($element, 'doc_template',$this->dLanguage,$this->urls);            
                }
            }else if($element['id_cdp'] == $_SESSION['user']['id_cdp']){
                if($element['type_element']=='Texte' ||$element['type_element']=='Textearea'||$element['type_element']=='Texteditor'||$element['type_element']=='Date'||$element['type_element']=='SelectFacture'||$element['type_element']=='Date2'||$element['type_element']=='SelectFrais'||$element['type_element']=='TexteFraisPort'||$element['type_element']=='TextFactureFrais'){ 
                    $this->etudes->displayFormElement($element, 'doc_template',$this->dLanguage,$this->urls);            
                }
            }
            
        }
        
        ?>
    </table>
    <table class="large thdocument">
        <tr>
            <td colspan="2">
                <input type="hidden" name="form_edit_document" id="form_edit_documentss" value='<?= $this->doc_template->id_doc_template?>'/>
                <input onclick="document.getElementById('edit_document').action = '';document.getElementById('edit_document').target = '_self';" type="submit" value="Modifier le Document" name="send_document" id="send_document" class="button" />
            </td>
        </tr>
    </table>
    <?php
}else{
?>
    <h2>Aucun &eacute;l&eacute;ment &aacute; afficher</h2>
<?php
}
?>
</div>        
</form>