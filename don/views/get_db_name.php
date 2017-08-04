<!DOCTYPE html>
<?php $language = Language::getLanguage();?>
<html lang="<?php echo $language['lang'];?>">
<head>
    <?php require_once (ROOT.'/views/install/head.php');?>
</head>
<body>
<?php require_once (ROOT.'/views/install/header.php');?>
<?php require_once (ROOT.'/views/install/body.php');?>
<?php require_once (ROOT.'/views/install/footer.php'); ?>
</body>
</html>