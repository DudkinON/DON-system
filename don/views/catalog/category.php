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
            <div class="col-sm-9 padding-right">
                <h2 class="title text-center"><?=$language['last_products'];?></h2>
                <!-- Navigation page start-->
                <?=$pagination->get();?>
                <!-- Navigation page end-->
                <div class="features_items"><!--features_items-->
                    <?php foreach ($categoryProducts as $product):?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/server/image/<?=$product['image']?>" alt="" />
                                        <h2>$<?=$product['price']?></h2>
                                        <p><a href="/product/<?=$product['id']?>"> <?=$product['name']?></a></p>
                                        <a href="/cart/add/<?=$product['id']?>"
                                           data-id="<?=$product['id'];?>"
                                           class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><?=$language['add'];?></a>
                                    </div>
                                    <?php if ($product['is_new']): ?>
                                        <img src="/template/<?=TEMPLATE?>/images/home/new.png" class="new" alt="" />
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div><!--features_items-->
                <!-- Navigation page start-->
                <?=$pagination->get();?>
                <!-- Navigation page end-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/footer.php'); ?>
</body>
</html>
