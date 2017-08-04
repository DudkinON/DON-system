<!DOCTYPE html>
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
                    <h2 class="title text-center">Admin panel - Articles</h2>
                    <a href="/admin/blog/create" class="btn btn-default">Create article</a>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <br/>
                    <hr/>
                    <?php if (isset($article) && is_array($article)):?>
                    <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <?php if (isset($categories) && is_array($categories)):?>
                        <p>Category</p>
                        <select name="category_id" title="">
                            <?php if (is_array($categories)): ?>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['id']; ?>"
                                        <?php if ($article['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <?php else:?>
                        <p>List of categories is empty.</p>
                        <?php endif;?>
                        <div style="margin-top: 10px;margin-bottom: 10px">
                            <input type="text" name="name" placeholder="Title" value="<?=$article['name'];?>">
                        </div>
                        <div style="margin-top: 10px;margin-bottom: 10px">
                            <textarea name="description" placeholder="Description" style="min-height: 70px"><?=$article['description'];?></textarea>
                        </div>
                        <div style="margin-top: 10px;margin-bottom: 10px">
                            <textarea name="full_text" placeholder="Full text" style="min-height: 250px"><?=$article['full_text'];?></textarea>
                        </div>
                        <div id="photo-cover">
                            <img src="<?=$article['image'];?>" alt="" style="max-height: 100px; max-width: 160px;" id="load-img">
                            <p>The loaded photo</p>
                        </div>
                        <div class="upload-div" id="upload-div">
                            <span class="title-inside" id="choose-photo"><?=$article['image'];?></span>
                            <input type="file" name="img" class="upload-img" id="loading-photo" title="<?=$language['сhoose_photo'];?>" onchange="getName(this.value);">
                        </div>
                        <div style="margin-top: 10px;margin-bottom: 10px">
                            <input type="text" name="author" placeholder="author">
                        </div>
                        <button type="submit" name="article">update</button>
                    </form>
                        <hr>
                    </div>
                    <?php else:?>
                    <p>The article does not exist</p>
                    <?php endif;?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>
