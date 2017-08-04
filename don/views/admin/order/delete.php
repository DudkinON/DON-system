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
                    <h2 class="title text-center">Admin panel - Orders - Delete</h2>
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li><a href="/admin">Order manage</a></li>
                            <li class="active">Delete order</li>
                        </ol>
                    </div>
                    <h4>Du you want to delete order № #<?=$id;?></h4>
                    <hr/>
                    <table>
                        <tr>
                            <td>
                                <form method="post">
                                    <input class="btn btn-default" type="submit" name="submit" value="Delete" style="min-width: 100px; margin: 5px;"/>
                                </form>
                            </td>
                            <td><a class="btn btn-default" href="/admin/product/" style="min-width: 100px; margin: 5px;">cancel</a></td>
                        </tr>
                    </table>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>
