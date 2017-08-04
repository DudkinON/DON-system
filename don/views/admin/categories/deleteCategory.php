<!DOCTYPE html>
<html lang="en">
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/header.php');?>
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/body.php');?>
<section>
    <div class="container" style="min-height: 810px;">
        <div class="row">
            <?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/sidebar.php');?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Admin panel - Category - Delete</h2>
                    <table class="table-bordered table-striped table">
                        <tbody>
                        <tr>
                            <td width="15px">ID</td>
                            <td>Name</td>
                            <td>Sort</td>
                            <td>Status</td>
                        </tr>
                        <tr>
                            <td><?=$category['id']?></td>
                            <td><?=$category['name']?></td>
                            <td><?=$category['sort_order']?></td>
                            <td><?php if ($category['status']===0){echo 'hide';}else{echo 'show';}?></td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="center">Do you want to delete Category: id - <b>[<?=$category['id']?>]</b>, title: <b><?=$category['name']?></b>?</p>
                    <hr/>
                    <table>
                        <tr class="center">
                            <td>
                                <form method="post" style="margin-left: 200px;">
                                    <input class="btn btn-default" type="submit" name="submit" value="yes" style="min-width: 200px; margin: 5px;" />
                                </form>
                            </td>
                            <td><a class="btn btn-default"  style="min-width: 200px; margin: 5px;" href="/admin/category/">No</a></td>
                        </tr>
                    </table>
                    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>
