<!DOCTYPE html>
<?php $language = Language::getLanguage();?>
<html lang="<?=$language['lang'];?>">
<head>
    <?php require_once(ROOT . '/template/' . TEMPLATE . '/head.php'); ?>
</head>
<body>
<?php require_once(ROOT . '/template/' . TEMPLATE . '/header.php'); ?>
<section>
    <div class="container" style="min-height: 810px">
        <?php require_once(ROOT . '/template/' . TEMPLATE . '/profileSidebar.php'); ?>
        <div class="col-sm-9 padding-right">
            <h2 class="title text-center"><?= $language['user_profile']; ?></h2>
            <?php if ($user['role'] == 'admin') {
                echo '<span style=" float: right"><a href="/admin/" class="btn btn-primary" style="margin-top: 0px;">'
                    . $language['admin_panel'] . '</a></span>' . '<h4>' . $language['hello'] . ' ' . $user['name']
                    . ' | <b style="color: limegreen;">online</b></h4>';
                    } else {echo $user['name'] . ' | user';}?>
            <hr>
            <h4 style="color: #FE980F;"><?= $language['main_data']; ?></h4>
            <hr>
            <p style=" float: right"><b><a href="/profile/edit"><?= $language['edit']; ?></a></b></p>
            <div class="div-margin-top">
                <div class="div-block-title"><b><?= $language['full_name']; ?>: </b></div><?= $user['name'] ?></div>
            <div class="div-margin-top">
                <div class="div-block-title"><b><?= $language['email']; ?>: </b></div> <?= $user['email'] ?></div>
            <div class="div-margin-top">
                <div class="div-block-title"><b><?= $language['status']; ?>: </b></div> <?= $user['role'] ?></div>

            <hr>
            <h4 style="color: #FE980F;"><?= $language['bring_address']; ?></h4>
            <hr>
            <p style=" float: right"><b><a href="/profile/address/edit"><?= $language['edit']; ?></a></b></p>
            <div class="div-margin-top">
                <div class="div-block-title"><b><?= $language['phone_number']; ?>:</b></div>
                <span><?php if (is_array($address)) echo $address['phone_number']; else echo $language['none'] ?></span>
            </div>
            <div class="div-margin-top">
                <div class="div-block-title"><b><?= $language['zip_code']; ?>:</b></div>
                <span><?php if (is_array($address)) echo $address['zip_code']; else echo $language['none'] ?></span>
            </div>
            <?php if (USE_COUNTRY === true): ?>
                <div class="div-margin-top">
                    <div class="div-block-title"><b><?= $language['country']; ?>:</b></div>
                    <span><?php if (is_array($address)) echo $address['country']; else echo $language['none'] ?></span>
                </div>
            <?php endif; ?>
            <div class="div-margin-top">
                <div class="div-block-title"><b><?= $language['state']; ?>:</b></div>
                <span><?php if (is_array($address)) echo $address['state']; else echo $language['none'] ?></span></div>
            <div class="div-margin-top">
                <div class="div-block-title"><b><?= $language['city']; ?>:</b></div>
                <span><?php if (is_array($address)) echo $address['city']; else echo $language['none'] ?></span></div>
            <div class="div-margin-top">
                <div class="div-block-title"><b><?= $language['street']; ?>:</b></div>
                <span><?php if (is_array($address)) echo $address['street']; else echo $language['none'] ?></span></div>
            <div class="div-margin-top">
                <div class="div-block-title"><b><?= $language['house_number']; ?>:</b></div>
                <span><?php if (is_array($address)) echo $address['house_number']; else echo $language['none'] ?></span>
            </div>
            <div class="div-margin-top">
                <div class="div-block-title"><b><?= $language['apartment_number']; ?>:</b></div>
                <span><?php if (is_array($address) && $address['apartment_number'] != null) echo $address['apartment_number']; else echo $language['none'] ?></span>
            </div>
            <br/><br/>
        </div>
    </div>
    </div>
</section>
<?php require_once(ROOT . '/template/' . TEMPLATE . '/footer.php'); ?>
</body>
</html>
