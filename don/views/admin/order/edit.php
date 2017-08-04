<!DOCTYPE html>
<html lang="en">
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/header.php');?>
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/body.php');?>
<section>
<section>
    <div class="container" style="min-height: 810px">
        <div class="row">
            <?php require (ROOT.'/template/'.TEMPLATE.'/admin/sidebar.php');?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Checkout</h2>
                    <?php if (!$order): ?>
                        <p>Error</p>
                    <?php else: ?>
                    <div class="col-sm-8">
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <div class="login-form">
                                <form action="#" method="post">
                                    <p>Status</p>
                                    <select name="status" title="">
                                        <option value="1" <?php if ($order['status'] == 1) echo 'selected="selected"';?>>ordered</option>
                                        <option value="2" <?php if ($order['status'] == 2) echo 'selected="selected"';?>>executing</option>
                                        <option value="3" <?php if ($order['status'] == 3) echo 'selected="selected"';?>>delivered</option>
                                    </select>
                                    <br><br>
                                    <p>Full name</p>
                                    <input type="text" name="user_name" placeholder="<?=$order['user_name'];?>" value=""/>
                                    <p>Phone number</p>
                                    <input type="text" name="user_phone" placeholder="<?=$order['user_phone'];?>" value=""/>
                                    <p>E-mail</p>
                                    <input type="email" name="user_email" placeholder="<?=$order['user_email'];?>" value=""/>
                                    <p>Country</p>
                                    <input type="text" name="user_country" placeholder="<?=$order['user_country'];?>" value=""/>
                                    <p>State</p>
                                    <input type="text" name="user_state" placeholder="<?=$order['user_state'];?>" value=""/>
                                    <p>City</p>
                                    <input type="text" name="user_city" placeholder="<?=$order['user_city'];?>" value=""/>
                                    <p>Street</p>
                                    <input type="text" name="user_street" placeholder="<?=$order['user_street'];?>" value=""/>
                                    <p>House number</p>
                                    <input type="text" name="user_house" placeholder="<?=$order['user_house'];?>" value=""/>
                                    <p>Apartment number</p>
                                    <input type="text" name="user_apartment" placeholder="<?=$order['user_apartment'];?>" value=""/>
                                    <p>Comment to order</p>
                                    <textarea style="height:200px;" name="user_comment" placeholder="<?=$order['user_comment'];?>"></textarea>
                                    <br/>
                                    <br/>
                                    <input type="submit" name="submit" class="btn btn-default" value="UPDATE" />
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/footer.php');?>