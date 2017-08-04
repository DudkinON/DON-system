<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/header.php');?>
</head><!--/head-->
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/body.php');?>
<section>
    <div class="container" style="min-height: 810px">
        <div class="row">
            <?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/sidebar.php');?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Admin panel - Categories</h2>
                    <a href="/admin/category/create" class="btn btn-default">Create category</a>
                    <br/>
                    <hr/>
                    
                    <?php if (isset($categories)):?>
                    <table class="table-bordered table-striped table">
                        <tbody>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Change </td>
                            <td align="center">Delete</td>
                        </tr>

                        <?php foreach ($categories as $categoryItem): ?>
                            <tr>
                                <td><?=$categoryItem['id']?></td>
                                <td><?=$categoryItem['name']?></td>
                                <td><a href="/admin/category/update/<?=$categoryItem['id']?>">Change title</a></td>
                                <td align="center"><a href="/admin/category/delete/<?=$categoryItem['id']?>"><i class="fa fa-times"></i></a></td>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                    <?php else:?>
                        <div class="panel-group category-products">

                        </div>
                    <?php endif;?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>