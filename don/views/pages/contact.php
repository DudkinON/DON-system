<!DOCTYPE html>
<?php $language = Language::getLanguage();?>
<html lang="<?=$language['lang'];?>">
<head>
    <?php require_once (ROOT.'/template/'.TEMPLATE.'/head.php');?>
</head>
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/header.php');?>
<section>
    <div class="container" style="min-height: 810p">
        <div class="row">
            <?php require_once (ROOT.'/template/'.TEMPLATE.'/sidebar.php');?>
            <div class="col-sm-9" style="min-height: 810px;">
                <h2 class="title text-center"><?=$language['contacts'];?></h2>
                <?php  if (isset($result)&&$result===true): ?>
                    <p>Your message sent!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li class="red"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="signup-form"><!--sign up form-->
                        <h2><i style="color: #999999"><?=$language['text_us'];?></i></h2>
                        <hr>
                        <form action="#" method="post">
                            <p><?=$language['email'];?>:</p>
                            <input type="email" name="userEmail" placeholder="<?=$language['email'];?>" value="<?php if (isset($userEmail))echo $userEmail;?>"/>
                            <p><?=$language['full_name'];?>:</p>
                            <input type="text" name="userName" placeholder="<?=$language['full_name'];?>" value="<?php if (isset($userName))echo $userName;?>"/>
                            <p><?=$language['subject'];?>:</p>
                            <input type="text" name="userSubject" placeholder="<?=$language['subject'];?>" value="<?php if (isset($userSubject))echo $userSubject;?>"/>
                            <p><?=$language['message'];?>:</p>
                            <textarea style="height:200px;" name="userText" placeholder="<?=$language['message'];?>"><?php if (isset($userText)) echo $userText;?></textarea>
                            <hr>
                            <input  type="submit" name="submit" class="btn btn-default" value="<?=$language['send'];?>" style="text-transform: uppercase;">
                        </form>
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
