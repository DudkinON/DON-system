<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/header.php');?>
</head><!--/head-->
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/body.php');?>
<section>
    <div class="container" style="min-height: 810px">
        <div class="row">
            <?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/sidebar.php');?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Admin panel - Orders - View</h2>
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li><a href="/admin/order">order manager</a></li>
                            <li class="active">view</li>
                        </ol>
                    </div>
                    <?php if (isset($order) && is_array($order)):?>
                    <h4>Просмотр заказа #<?php echo $order['id']; ?></h4>
                    <br/>
                        <table class="table-bordered table-striped table">
                            <tbody>
                            <tr>
                                <td width="15px">uid</td>
                                <td>User name</td>
                                <td>User phone</td>
                                <td>User Address</td>
                                <td>Order date</td>
                                <td>Status</td>
                                <td style="text-align: center; max-width: 50px;">Edit</td>
                                <td>delete</td>
                            </tr>
                            <tr>
                                <td width="15px"><?=$order['user_id'];?></td>
                                <td><?=$order['user_name'];?></td>
                                <td><?=$order['user_phone'];?></td>
                                <td>
                               <?=$order['user_country'];?>,
                               <?=$order['user_state'];?>,
                               <?=$order['user_city'];?>,
                               <?=$order['user_street'];?>,
                               <?=$order['user_house'];?>/<?=$order['user_apartment'];?>
                                </td>

                                <td><?=$order['date'];?></td>
                                <td>
                                    <?php if ($order['status'] == 1){echo '<b style="color: red">ordered</b>';}
                                    elseif ($order['status'] == 2){echo '<b style="color: dodgerblue">in process</b>';}
                                    elseif ($order['status'] == 3){echo '<b style="color: green">delivered</b>';}
                                    ?>
                                </td>
                                <td><a href="/admin/order/update/<?=$order['id']?>">change</a></td>
                                <td align="center"><a href="/admin/order/delete/<?=$order['id']?>"><i class="fa fa-times"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    <?php else:?>
                        Order does not exist.
                    <?php endif;?>
                    <?php if (isset($products) && is_array($products)):?>
                    <table class="table-admin-medium table-bordered table-striped table ">
                        <tr>
                            <th>id</th>
                            <th>Article</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Amount</th>
                        </tr>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['code']; ?></td>
                                <td><?php echo $product['name']; ?></td>
                                <td>$<?php echo $product['price']; ?></td>
                                <td><?php echo $productsQuantity[$product['id']]; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php else:?>
                        Order does not exist.
                    <?php endif;?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>
