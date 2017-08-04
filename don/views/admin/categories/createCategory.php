<!DOCTYPE html>
<html lang="en">
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/header.php');?>
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/body.php');?>
<section>
    <div class="container">
        <div class="row">
            <?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/sidebar.php');?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Admin panel - Products - Create</h2>
                    <hr/>
                    <div class="form-one">
                        <?php if (isset($msg) && is_array($msg)): ?>
                            <ul>
                                <?php foreach ($msg as $msg): ?>
                                    <li> - <?php echo $msg; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <br/>
                            <hr/>
                        <?php endif; ?>
                        <form action="#" method="post" enctype="multipart/form-data">
                            <p>Name category</p>
                            <input type="text" name="name" placeholder="Name of category" value="<?=$category['name'];?>">
                            <p>Sort order</p>
                            <input type="text" name="sort" placeholder="Place of category" value="<?=$category['sort'];?>">
                            <p>Status</p>
                            <select name="status">
                                <option value="1" selected="selected">Show</option>
                                <option value="0">Hide</option>
                            </select>

                            <br/><br/>

                            <input type="submit" name="submit" class="btn btn-default" value="Save">

                            <br/><br/>

                        </form>
                    </div>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>