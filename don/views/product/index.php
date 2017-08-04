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
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="/server/image/<?=$products['image']?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <img src="/template/<?=TEMPLATE;?>/images/home/new.jpg" class="newarrival" alt="" />
                                        <h2><?=$products['name']?></h2>
                                        <?php if (isset($errors) && is_array($errors)): ?>
                                            <ul>
                                                <?php foreach ($errors as $error): ?>
                                                    <li> - <?php echo $error; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                        <p>Product code: <?=$products['code']?></p>
                                        <span>
                                            <span>US $<?php echo $products['price']; ?></span>
                                            <a href="#" data-id="<?php echo $products['id']; ?>"
                                               class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Add
                                            </a>
                                        </span>
                                        <p><b>Availability: </b><?=$products['availability']?></p>
                                        <p><b>Condition: </b><?php
                                            if($products['is_new']) {
                                                echo 'old-'.($products['availability']-$products['is_new']).'new-'.$products['is_new'];
                                            } else {
                                                echo 'old-'.$products['availability'];
                                            }
                                            ?></p>
                                        <p><b>Producer: </b> <?=$products['brand']?></p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <br>
                                    <hr>
                                    <h5>Product description</h5>
                                    <br>
                                    <?=$products['description']?>
                                </div>
                            </div>
                        </div><!--/product-details-->

                    </div>
                </div>
            </div>
        </section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/footer.php');?>
</body>
</html>
