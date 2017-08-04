<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/header.php');?>
</head>
<body>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/body.php');?>
<section>
    <div class="container" style="min-height: 810px;">
        <div class="row">
            <?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/sidebar.php');?>
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Admin panel - Articles</h2>
                    
                    <a href="/admin/blog/create" class="btn btn-default">Create article</a>
                    <br/>
                    <hr/>
                    <?php if (isset($articlesList)&&is_array($articlesList)):?>
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

                        <?php foreach ($articlesList as $article):?>
                            <tr>
                                <td><?=$article['id']?></td>
                                <td><img src="<?=$article['image']?>" alt="" style="max-width: 150px;max-height: 100px"/></td>
                                <td><?=$article['name']?></td>
                                <td><a href="/admin/blog/update/<?=$article['id']?>">change</a></td>
                                <td align="center"><a href="/admin/blog/delete/<?=$article['id']?>"><i class="fa fa-times"></i></a></td>
                            </tr>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                    <!-- Navigation page start-->
                    <?=$pagination->get();?>

                    <!-- Navigation page end-->
                    <?php else:?>
                        <p>Articles does not exist</p>
                    <?php endif;?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>
