
<?php require_once(ROOT . '/template/' . TEMPLATE . '/header.php');?>
<section>
    <div class="container">
        <div class="row">

            <?php require_once(ROOT . '/template/' . TEMPLATE . '/sidebar.php');?>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Last products</h2>
                            <?php foreach ($lastProducts as $product):?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="/product/<?=$product['id']?>">
                                            <img src="/server/image/<?=$product['image']?>" alt="<?=$product['name']?>" />
                                                </a>
                                            <h2>$<?=$product['price']?></h2>
                                            <p><a href="/product/<?=$product['id']?>"> <?=$product['name']?></a></p>
                                            <a href="/cart/add/<?=$product['id']?>"
                                               data-id="<?=$product['id'];?>"
                                               class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>add</a>
                                        </div>
                                        <?php if ($product['is_new']): ?>
                                        <img src="/template/<?=TEMPLATE?>/images/home/new.png" class="new" alt="" />
                                    <?php endif;?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>

                        </div><!--features_items-->

                        <div class="recommended_items"><!--recommended_items-->

                            <h2 class="title text-center">Recommend</h2>
                            <div class="cycle-slideshow"
                                 data-cycle-fx=carousel
                                 data-cycle-timeout=5000
                                 data-cycle-carousel-visible=3
                                 data-cycle-carousel-fluid=100%
                                 data-cycle-slides="div.item"
                                 data-cycle-prev="#prev"
                                 data-cycle-next="#next">
                            <?php foreach ($recommend as $item):?>
                                <div class="item">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/server/image/<?=$item['image'];?>" alt="" />
                                                <h2>$<?=$item['price'];?></h2>
                                                <p><?=$item['name'];?></p>
                                                <a href="#"
                                                    data-id="<?=$item['id'];?>"
                                                    class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add</a>
                                            </div>
                                            <?php if ($item['is_new']): ?>
                                                <img src="/template/<?=TEMPLATE?>/images/home/new.png" class="new" alt="" />
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            </div>
                            <a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" id="next"  href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>

                        </div><!--/recommended_items-->
                    </div>
                </div>
            </div>
        </section>

<?php require_once(ROOT . '/template/' . TEMPLATE . '/footer.php'); ?>