<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/header.php');?>
</head>
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/body.php');?>
<section>
    <div class="container" style="min-height: 810px">
        <div class="row">
            <?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/sidebar.php');?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Admin panel - Products - Delete</h2>

                    <table class="table-bordered table-striped table">
                        <tbody>
                        <tr>
                            <td width="15px">ID</td>
                            <td>Image</td>
                            <td>Name</td>
                        </tr>
                        <tr>
                            <td><?=$product['id']?></td>
                            <td><img src="/server/image/<?=$product['image']?>" width="150" height="150" alt=""/></td>
                            <td><?=$product['name']?></td>
                        </tr>
                        </tbody>
                    </table>
                    <p>Do you want to delete item: id - [<?=$product['id']?>], title: <?=$product['name']?>?</p>
                    <hr/>
                    <p>Are you sure?</p>
                    <table>
                        <tr>
                            <td>
                                <form method="post">
                                    <input class="btn btn-default" type="submit" name="submit" value="yes" />
                                </form>
                            </td>
                            <td><a class="btn btn-default" href="/admin/product/">No</a></td>
                        </tr>
                    </table>
                    <br/>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>
