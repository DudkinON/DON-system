<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +1 000 000 00 00</a></li>
                            <li><a href="../../index.php"><i class="fa fa-envelope"></i> info@elleada.pw</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="/template/<?=TEMPLATE?>/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right" style="margin-left: 5px; margin-right: 5px;">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle btn-border-false" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span style="text-transform: capitalize; color: #696763;font-size: 14px;font-family: 'Roboto', sans-serif;font-weight: 300;"><b>&#35441</b> <?=$language['language'];?></span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="/lang/en">English</a></li>
                                <li><a href="/lang/ru">Русский</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="/cart/">
                                    <i class="fa fa-shopping-cart"></i>
                                    <?=$language['cart'];?> <span id="cart-count"> <?=Cart::countItems();?> </span>
                                </a>
                            </li>
                <?php if (User::isGuest()): ?>
                <li><a href="/user/login/"><i class="fa fa-lock"></i> <?=$language['login'];?></a></li>
                <?php else:?>
                <li><a href="/profile/"><i class="fa fa-user"></i> <?=$language['profile'];?></a></li>
                <li><a href="/user/logout/"><i class="fa fa-unlock"></i> <?=$language['logout'];?></a></li>
                <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class="active"><?=$language['home'];?></a></li>
                            <li class="dropdown"><a href="#"><?=$language['shop'];?><i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/catalog/"><?=$language['catalog'];?></a></li>
                                    <li><a href="/cart/"><?=$language['cart'];?></a></li>
                                </ul>
                            </li>
                            <li><a href="/blog/"><?=$language['blog'];?></a></li>
                            <li><a href="/about/"><?=$language['about_us'];?></a></li>
                            <li><a href="/contacts/"><?=$language['contacts'];?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->