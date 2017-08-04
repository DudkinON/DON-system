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
                    <?php if (isset($article)&&is_array($article)):?>
                        <table class="table-bordered table-striped table">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Description </td>
                            </tr>
                                <tr>
                                    <td><?=$article['id']?></td>
                                    <td><img src="<?=$article['image']?>" alt="" style="max-width: 150px;max-height: 100px"/></td>
                                    <td><?=$article['name']?></td>
                                    <td><?=$article['description']?></td>
                                </tr>
                            </tbody>
                        </table>
                        <p>Do you want to delete item: id - [<?=$article['id']?>], title: <?=$article['name']?>?</p>
                        <hr/>
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
                    <?php else:?>
                        <p>The article does not exist</p>
                    <?php endif;?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>
