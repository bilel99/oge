<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?=$this->meta_title?><?=($this->baseline_title!=''?' - '.$this->baseline_title:'')?></title>
	<meta name="description" content="<?=$this->meta_description?>" />
    <meta name="keywords" content="<?=$this->meta_keywords?>" />
    <?=($this->tree->id_tree != '' && $this->tree->indexation == 0?'<meta name="robots" content="noindex,nofollow" />':'')?>
    <link rel="shortcut icon" href="<?=$this->surl?>/images/default/favicon.png" type="image/x-icon" />
    <script type="text/javascript">
		var add_url = '<?=$this->lurl?>';
	</script>
    <script type="text/javascript" src="<?=$this->surl?>/scripts/admin/jquery/jquery-1.10.2.min.js">	</script>
    <script type="text/javascript" src="<?=$this->surl?>/scripts/admin/jquery/jquery-migrate-1.2.1.js"></script>
    <script type="text/javascript" src="<?=$this->surl?>/scripts/admin/modernizr.js"></script>
    <script type="text/javascript" src="<?=$this->surl?>/scripts/admin/datepicker/jquery-ui-1.7.2.custom.min.js">	</script>
    <script type="text/javascript" src="<?=$this->surl?>/scripts/admin/datepicker/ui.datepicker-fr.js">	</script>
    <link media="all" href="<?=$this->surl?>/styles/admin/typeDocuments/fonts.css" type="text/css" rel="stylesheet" />
    <link media="all" href="<?=$this->surl?>/styles/admin/typeDocuments/style-new-pages.css" type="text/css" rel="stylesheet" />
    <link media="all" href="<?=$this->surl?>/styles/admin/jquery-ui-1.7.2.custom.css" type="text/css" rel="stylesheet" />
</head>
<body>