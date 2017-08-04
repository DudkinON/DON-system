<!DOCTYPE html>
<?php $language = Language::getLanguage();?>
<html lang="<?php echo $language['lang'];?>">
<head>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/head.php');?>
</head>
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/header.php');?>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/body.php');?>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/footer.php'); ?>
</body>
</html>