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

                <?php  if ($result): ?>
                    <p>Registration is complete successfuly!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li class="red"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <div class="signup-form"><!--sign up form-->
                        <h2>Registration</h2>

                        <hr/>
                        <form action="#" method="post">
                            <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>"/>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
                            <input type="password" name="password" placeholder="Password" value=""/>
                            <input type="password" name="confirmpassword" placeholder="Confirm password" value=""/>
                            <hr>
                            <input type="submit" name="submit" class="btn btn-default" value="Registration" />
                        </form>
                    </div><!--/sign up form-->

                <?php endif; ?>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php require_once (ROOT.'/template/'.TEMPLATE.'/footer.php');?>
</body>
</html>