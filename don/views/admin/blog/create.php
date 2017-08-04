<!DOCTYPE html>
<script type="text/javascript">
    var langTitle = 'Перетащите фото, или клик';
    var langLoaded = 'Загруженно';
    var langError = 'Ошибка загрузки';
    var fileErr = 'Файл не поддерживается';
</script>
<html lang="en">
<head>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/header.php');?>
    <script src="/template/<?=TEMPLATE;?>/js/up.js"></script>
    <script src="/template/<?=TEMPLATE;?>/js/u.js"></script>
    <link href="/template/<?=TEMPLATE;?>/css/u.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/body.php');?>
<section>
    <div class="container" style="min-height: 810px;">
        <div class="row">
            <?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/sidebar.php');?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?=$language['admin_panel'];?> - <?=$language['articles'];?> - <?=$language['create'];?></h2>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="login-form">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input name="title" type="text" placeholder="<?=$language['title'];?>">
                            <textarea name="description" cols="20" rows="10" placeholder="<?=$language['description'];?>" style="height: 90px;"></textarea>
                            <br><br>
                            <textarea name="text" cols="30" rows="10" placeholder="<?=$language['full_text'];?>"></textarea>
                            <br><br>
                            <div class="upload-div" id="upload-div">
                                <span class="title-inside" id="choose-photo"><?=$language['сhoose_photo'];?></span>
                                <input type="file" name="img" class="upload-img" onchange="getName(this.value);">
                            </div>
                            <input type="text" placeholder="<?=$language['author'];?>" name="author">
                            <?php if (isset($categories)):?>
                                <select name="category_id" title="">
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>">
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            <?php else:?>
                                <b><?=$language['categories_empty']?></b>
                            <?php endif;?>
                            <button type="submit" name="submit"><?=$language['create'];?></button>
                        </form>
                    </div>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>