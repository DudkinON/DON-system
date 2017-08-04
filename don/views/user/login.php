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
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul class="red">
                        <?php foreach ($errors as $error): ?>
                            <li class="red"> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <!--sign up form-->
                <div class="signup-form">
                    <br/>
                    <br/>
                    <br/>
                    <h2><?=$language['login'];?></h2>
                    <hr/>
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="<?=$language['email'];?>" value="<?php echo $email; ?>"/>
                        <input type="password" name="password" placeholder="<?=$language['password'];?>" value="<?php echo $password; ?>"/>
                        <hr/>
                        <input type="submit" name="submit" class="btn btn-default" value="<?=$language['login'];?>"Login" />
                    </form>
                    <hr>
                    <a href="/user/registration/" class="btn btn-default" style="width: 100%"><?=$language['create_account'];?></a>
                </div>
                <!--/sign up form-->
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/footer.php');?>
</body>
</html>
