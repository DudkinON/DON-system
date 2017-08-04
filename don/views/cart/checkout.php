<!DOCTYPE html>
<?php $language = Language::getLanguage();?>
<html lang="<?=$language['lang'];?>">
<head>
    <?php require_once (ROOT.'/template/'.TEMPLATE.'/head.php');?>
</head>
<body>
<?php require_once(ROOT.'/template/'.TEMPLATE.'/header.php');?>
<section>
    <div class="container" style="min-height: 810px">
        <div class="row">
            <?php require_once (ROOT.'/template/'.TEMPLATE.'/sidebar.php');?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center"><?=$language['checkout'];?></h2>
                    <?php if ($result): ?>
                        <p><?=$language['cart_empty'];?></p>
                    <?php else: ?>
                        <p><?=$language['selected_products'];?>: <?php echo $totalQuantity; ?>, <?=$language['amount'];?>: $<?php echo $totalPrice; ?>.</p><br/>
                        <div class="col-sm-9">
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <p><?=$language['manager_contact_you'];?></p>
                            <div class="login-form">
                                <form action="#" method="post">
                                    <p><?=$language['full_name'];?></p>
                                    <input type="text" name="userName" placeholder="" value="<?php if (isset($userName)) echo $userName;?>"/>
                                    <p><?=$language['phone_number'];?></p>
                                    <input type="text" name="userPhone" placeholder="example: 15005005050" value="<?php if (isset($userPhone)) echo $userPhone;?>"/>
                                    <p><?=$language['email'];?></p>
                                    <input type="email" name="userEmail" placeholder="email@domain.com" value="<?php if (isset($userEmail)) echo $userEmail;?>"/>
                                    <?php if (USE_COUNTRY == true):?>
                                    <p style="text-transform: capitalize"><?=$language['country'];?></p>
                                    <input type="text" name="userCountry" placeholder="" value="<?php if (isset($userCountry)) echo $userCountry;?>"/>
                                    <?php endif;?>
                                    <p style="text-transform: capitalize"><?=$language['state'];?></p>
                                    <input type="text" name="userState" placeholder="" value="<?php if (isset($userState)) echo $userState;?>"/>
                                    <p style="text-transform: capitalize"><?=$language['city'];?></p>
                                    <input type="text" name="userCity" placeholder="" value="<?php if (isset($userCity)) echo $userCity;?>"/>
                                    <p style="text-transform: capitalize"><?=$language['street'];?></p>
                                    <input type="text" name="userStreet" placeholder="" value="<?php if (isset($userStreet)) echo $userStreet;?>"/>
                                    <p><?=$language['house_number'];?></p>
                                    <input type="text" name="userHouse" placeholder="" value="<?php if (isset($userHouse)) echo $userHouse;?>"/>
                                    <p><?=$language['apartment_number'];?></p>
                                    <input type="text" name="userApartment" placeholder="" value="<?php if (isset($userApartment)) echo $userApartment;?>"/>
                                    <p><?=$language['сomment_order'];?></p>
                                    <textarea style="height:200px;" name="userComment" placeholder="<?=$language['your_message'];?>"><?php if (isset($userComment)) echo $userComment;?></textarea>
                                    <br/>
                                    <br/>
                                    <input type="submit" name="submit" class="btn btn-default" style="text-transform: capitalize" value="<?=$language['checkout'];?>" />
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
</body>
</html>
