<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/header.php');?>
</head>
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/body.php');?>
<section>
    <div class="container">
        <div class="row">
            <?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/sidebar.php');?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Admin panel - Products</h2>
                    <a href="/admin/product/create/" class="btn btn-default">Create product</a>
                    <br/>
                    <hr/>
                    <!-- Navigation page start-->
                    <?=$pagination->get();?>
                    <!-- Navigation page end-->
                    <table class="table-bordered table-striped table">
                        <tbody>
                        <tr>
                            <td>ID</td>
                            <td>Image</td>
                            <td>Name</td>
                            <td>Change </td>
                            <td align="center">Delete</td>
                        </tr>

                    <?php foreach ($productList as $product):?>
                        <tr>
                            <td><?=$product['id']?></td>
                            <td><img src="/server/image/<?=$product['image']?>" width="150" height="150" alt=""/></td>
                            <td><?=$product['name']?></td>
                            <td><a href="/admin/product/update/<?=$product['id']?>">change</a></td>
                            <td align="center"><a href="/admin/product/delete/<?=$product['id']?>"><i class="fa fa-times"></i></a></td>
                        </tr>
                    <?php endforeach;?>

                        </tbody>
                    </table>
                    <!-- Navigation page start-->
                    <?=$pagination->get();?>
                    <!-- Navigation page end-->
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>
