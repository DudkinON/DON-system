<!DOCTYPE html>
<?php $language = Language::getLanguage();?>
<html lang="<?=$language['lang'];?>">
<head>
    <?php require_once (ROOT.'/template/'.TEMPLATE.'/head.php');?>
</head>
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/header.php');?>
<section>
    <div class="container" style="min-height: 810px">
        <div class="row">
            <?php require_once (ROOT.'/template/'.TEMPLATE.'/sidebar.php');?>
            <div class="col-sm-9 padding-right" style="min-height: 810px;">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?=$language['about_us'];?></h2>
                    <hr>
                    <p><?=$language['about_us_text'];?></p>
                </div><!--features_items-->
            </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/footer.php'); ?>
</body>
</html>
