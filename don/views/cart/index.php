<!DOCTYPE html>
<?php $language = Language::getLanguage();?>
<html lang="<?=$language['lang'];?>">
<head>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/head.php');?>
</head>
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/header.php');?>
<section>
    <div class="container" style="min-height: 780px">
        <div class="row">
            <?php require_once (ROOT.'/template/'.TEMPLATE.'/sidebar.php');?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--product-details-->
                    <h2 class="title text-center"><?=$language['cart'];?></h2>
                    <?php if ($productsInCart && isset($products)):?>
                        <p></p>
                        <table class="table-bordered table-striped table" style="text-transform: capitalize">
                            <tr>
                                <th><?=$language['items_code'];?></th>
                                <th><?=$language['title'];?></th>
                                <th><?=$language['price'];?></th>
                                <th><?=$language['amount'];?></th>
                                <th><?=$language['delete'];?></th>
                            </tr>
                            <?php foreach ($products as $product):?>
                                <tr>
                                    <td><?=$product['code']?></td>
                                    <td><a href="/product/<?=$product['id']?>"><?=$product['name']?></a> </td>
                                    <td>$<?=$product['price']?></td>
                                    <td><?=$productsInCart[$product['id']];?></td>
                                    <td class="cart_delete" align="center"><a class="cart_quantity_delete" href="/cart/delete/<?=$product['id']?>"><i class="fa fa-times"></i> </a></td>
                                </tr>
                            <?php endforeach;?>
                            <tr style="font-weight: 600;">
                                <td colspan="2" style="text-transform: none"><?=$language['items_cart'];?> - <?=Cart::countItems();?></td>
                                <td colspan="2" style="text-align: right"><?=$language['total'];?>:</td>
                                <td>$<?php if (isset($totalPrice)) echo $totalPrice;?></td>
                            </tr>
                        </table>
                            <br>
                            <hr>
                            <a href="/cart/checkout/" style="text-transform: capitalize"><?=$language['checkout'];?></a>
                    <?php else:?>
                        <p><?=$language['cart_empty'];?>.</p>
                            <br>
                            <hr>
                            <a href="/"><?=$language['recommend'];?></a>
                    <?php endif;?>
                </div><!--/product-details-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/footer.php');?>
</body>
</html>
