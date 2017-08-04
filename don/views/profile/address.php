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
        <?php require_once (ROOT.'/template/'.TEMPLATE.'/profileSidebar.php');?>
        <div class="row">
            <div class="col-sm-8 padding-right">
                <h2 class="title text-center"><?=$language['edit_address'];?></h2>
                <?php  if (isset($result) && $result == true): ?>
                    <p>Your data was changed!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li class="red"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="signup-form"><!--sign up form-->

                        <hr>
                        <form action="#" method="post">
                            <input type="text" name="phone_number" placeholder="<?=$language['phone_number'];?>" value="<?php if (is_array($userAddress)) echo $userAddress['phone_number'];?>"/>
                            <input type="text" name="zip_code" placeholder="<?=$language['zip_code'];?>" value="<?php if (is_array($userAddress)) echo $userAddress['zip_code'];?>"/>
                            <?php if (USE_COUNTRY == true):?>
                            <input type="text" name="country" placeholder="<?=$language['country'];?>" value="<?php if (is_array($userAddress)) echo $userAddress['country'];?>"/>
                            <?php endif;?>
                            <input type="text" name="state" placeholder="<?=$language['state'];?>" value="<?php if (is_array($userAddress)) echo $userAddress['state'];?>"/>
                            <input type="text" name="city" placeholder="<?=$language['city'];?>" value="<?php if (is_array($userAddress)) echo $userAddress['city'];?>"/>
                            <input type="text" name="street" placeholder="<?=$language['street'];?>" value="<?php if (is_array($userAddress)) echo $userAddress['street'];?>"/>
                            <input type="text" name="house_number" placeholder="<?=$language['house_number'];?>" value="<?php if (is_array($userAddress)) echo $userAddress['house_number'];?>"/>
                            <input type="text" name="apartment_number" placeholder="<?=$language['apartment_number'];?>" value="<?php if (is_array($userAddress)) echo $userAddress['apartment_number'];?>"/>
                            <hr>
                            <input type="submit" name="submit" class="btn btn-default" value="<?=$language['save'];?>" />
                        </form>
                        <br><br><br><br><br><br>
                    </div><!--/sign up form-->
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/footer.php');?>
</body>
</html>
