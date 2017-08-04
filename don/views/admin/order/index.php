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

                    <h2 class="title text-center">Admin panel - Orders</h2>
                    <a href="/admin/order/create/" class="btn btn-default">Create order</a>
                    <br>
                    <hr>
                    <?php if (isset($ordersList) && is_array($ordersList)):?>
                    <table class="table-bordered table-striped table" style="text-align: center">
                        <tbody>
                        <tr>
                            <td width="15px">uid</td>
                            <td>User name</td>
                            <td>User phone</td>
                            <td>Order date</td>
                            <td>Status</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        <?php foreach ($ordersList as $order):?>
                        <tr>
                            <td width="15px"><?=$order['user_id'];?></td>
                            <td><?=$order['user_name'];?></td>
                            <td><?=$order['user_phone'];?></td>
                            <!--<td>
                                <?=$order['user_country'];?>,
                                <?=$order['user_state'];?>,
                                <?=$order['user_city'];?>,
                                <?=$order['user_street'];?>,
                                <?=$order['user_house'];?>/<?=$order['user_apartment'];?>
                            </td>
                            -->
                            <td><?=$order['date'];?></td>
                            <td>
                                <?php if ($order['status'] == 1){echo '<b style="color: red">ordered</b>';}
                                elseif ($order['status'] == 2){echo '<b style="color: dodgerblue">in process</b>';}
                                elseif ($order['status'] == 3){echo '<b style="color: green">delivered</b>';}
                                ?>
                            </td>
                            <td style="text-align: center"><a href="/admin/order/view/<?=$order['id']?>" class="btn btn-default">view</a></td>
                            <td><a href="/admin/order/delete/<?=$order['id']?>"><i class="fa fa-times"></i></a></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php else:?>
                    Orders does not exist.
                    <?php endif;?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>
