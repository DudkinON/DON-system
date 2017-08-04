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
            <?php if (isset($articles)&&is_array($articles)):?>
            <h2 class="title text-center"><?=$language['last_articles'];?></h2>
            <!-- Navigation page start-->
            <?=$pagination->get();?>
            <!-- Navigation page end-->
            <?php foreach ($articles as $article):?>
            <div class="single-blog-post">
                <h3><?=$article['name'];?></h3>
                <div class="post-meta">
                    <ul>
                        <li><i class="fa fa-calendar"></i><?=$article['date'];?></li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <a href="/blog/<?=$article['id'];?>">
                        <img src="<?=$article['image'];?>" alt="">
                    </a>
                    <p><?=$article['description'];?></p>
                    <a  class="btn btn-primary" href="/blog/<?=$article['id'];?>"><?=$language['read'];?></a>
                </div>
            </div>
            <hr/>
            <?php endforeach;?>
          <br/>
            <!-- Navigation page start-->
            <?=$pagination->get();?>
            <!-- Navigation page end-->
            <?php else:?>
            <P>Articles does not exist</P>
            <?php endif;?>
        </div>
    </div>
    </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/footer.php'); ?>
</body>
</html>
