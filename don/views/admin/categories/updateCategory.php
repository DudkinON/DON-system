<!--/**
 * Copyright by Oleg Dudkin.
 * Project: zaat.16mb.com
 * File name: updateProduct.php
 * Date: 11/16/2016
 * Time: 5:56 PM
 */-->

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
                    <h2 class="title text-center">Admin panel - Category - Update</h2>
                    <hr/>
                    <div class="form-one">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <p>Category name</p>
                            <input type="text" name="name" placeholder="" value="<?=$category['name'];?>">
                            <p>Sort order</p>
                            <input type="text" name="sort" placeholder="" value="<?=$category['sort_order'];?>">

                            <p>Status</p>
                            <select name="status">
                                <option value="1" <?php if ($category['status'] == 1) echo 'selected="selected"';?>>Show</option>
                                <option value="0" <?php if ($category['status'] == 0) echo 'selected="selected"';?>>Hide</option>
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
