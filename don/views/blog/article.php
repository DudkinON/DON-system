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
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center"><?=$language['blog'];?></h2>
                    <div class="single-blog-post">
                        <h3><?=$article['name'];?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i><?=$article['date'];?></li>
                            </ul>
                        </div>
                        <a href="">
                            <img src="<?=$article['image'];?>" alt="">
                        </a>
                        <hr/>
                        <p><?=$article['full_text'];?></p>
                        <p style="text-transform: capitalize;"><?=$language['author'];?>: <b style="text-transform: lowercase;"><?=$author;?></b></p>
                        <hr/>
                        <div class="pager-area">
                            <div class="pager pull-right">
                                <a href="/blog/" class="btn btn-default"><?=$language['back_to_blog'];?></a>
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/footer.php'); ?>
</body>
</html>