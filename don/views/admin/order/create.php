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
                    <div class="features_items">
                        <h2 class="title text-center">Checkout</h2>
                        <?php if (isset($totalQuantity) && (isset($totalPrice))):?>
                        <p>Selected products: <?php echo $totalQuantity;?>, amount: $<?php echo $totalPrice;?>.</p><br/>
                        <?php endif;?>
                        <div class="col-sm-9">
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <div class="">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <label for="art">Art.</label>
                                        <input name="art" type="text" class="form-control" id="art" placeholder="example: 4578345" style="max-width: 150px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="text" class="form-control" id="amount" name="amount" placeholder="" value="1" style="max-width: 70px;">
                                    </div>
                                    <label>&nbsp;&nbsp; | &nbsp;&nbsp;</label>
                                    <button type="submit" class="btn btn-default" name="add" value="order" id="add" style="min-width: 70px">ADD</button>
                                </form>
                            </div>
                            <br>
                            <?php if (isset($products) && is_array($products)):?>
                            <div id="hide">
                                <div class="col-sm-9" id="orders-block" style="min-width: 600px">

                                        <table class="table-admin-medium table-bordered table-striped table ">
                                            <tr>
                                                <th>id</th>
                                                <th>Vendor code</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Amount</th>
                                                <th>Delete</th>
                                            </tr>

                                            <?php foreach ($products as $product): ?>
                                                <tr>
                                                    <td><?=$product['id'];?></td>
                                                    <td><?=$product['code'];?></td>
                                                    <td><?=$product['name'];?></td>
                                                    <td>$<?=$product['price'];?></td>
                                                    <td><?=$productsQuantity[$product['id']];?></td>
                                                    <td style="height: 55px">
                                                        <form>
                                                            <input type="text" id="del" name="delete" placeholder="" value="<?=$product['id'];?>" style="display: none;">
                                                            <i style="position: absolute; margin: 14px" class="fa fa-times"></i>
                                                            <button style="position:absolute;opacity: 0; z-index: 1;width: 50px;height: 50px;" type="submit" name="del" value="delete"></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                </div>
                            </div>
                            <?php endif;?>

                            <div class="login-form">
                                <form action="#" method="post">
                                    <p>Full name</p>
                                    <input type="text" name="userName" placeholder="" value="<?php if (isset($userName)) echo $userName;?>"/>
                                    <p>Phone number</p>
                                    <input type="text" name="userPhone" placeholder="example: 15005005050" value="<?php if (isset($userPhone)) echo $userPhone;?>"/>
                                    <p>E-mail</p>
                                    <input type="email" name="userEmail" placeholder="email@domain.com" value="<?php if (isset($userEmail)) echo $userEmail;?>"/>
                                    <p>Country</p>
                                    <input type="text" name="user_country" placeholder="" value="<?php if (isset($userCountry)) echo $userCountry;?>"/>
                                    <p>State</p>
                                    <input type="text" name="user_state" placeholder="" value="<?php if (isset($userState)) echo $userState;?>"/>
                                    <p>City</p>
                                    <input type="text" name="user_city" placeholder="" value="<?php if (isset($userCity)) echo $userCity;?>"/>
                                    <p>Street</p>
                                    <input type="text" name="user_street" placeholder="" value="<?php if (isset($userStreet)) echo $userStreet;?>"/>
                                    <p>House number</p>
                                    <input type="text" name="user_house" placeholder="" value="<?php if (isset($userHouse)) echo $userHouse;?>"/>
                                    <p>Apartment number</p>
                                    <input type="text" name="user_apartment" placeholder="" value="<?php if (isset($userApartment)) echo $userApartment;?>"/>
                                    <p>Comment to order</p>
                                    <textarea style="height:200px;" name="userComment" placeholder="Your message"><?php if (isset($userComment)) echo $userComment;?></textarea>
                                    <br/>
                                    <br/>
                                    <input type="submit" name="submit" class="btn btn-default" value="Checkout" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
<script src="/template/<?=TEMPLATE;?>/js/admin.order.js"></script>
</body>
</html>