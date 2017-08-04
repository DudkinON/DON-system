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
                    <h2 class="title text-center">Admin panel - Products - Create</h2>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <hr/>
                    <div class="form-one">

                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Name product</p>
                        <input type="text" name="name" placeholder="" value="<?=$product['name'];?>">

                        <p>Vendor code</p>
                        <input type="text" name="code" placeholder="" value="<?=$product['code'];?>">

                        <p>Price, $</p>
                        <input type="text" name="price"     ="$0.00" value="<?=$product['price'];?>">

                        <p>Category</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <br/><br/>
                        <p>Brand</p>
                        <input type="text" name="brand" placeholder="" value="<?=$product['brand'];?>">
                        <p>Image</p>
                        <input type="file" name="image" placeholder="" value="">
                        <p>Description</p>
                        <textarea name="description" placeholder="Description"><?=$product['description'];?></textarea>
                        <br/><br/>
                        <p>Availability</p>
                        <select name="availability">
                            <option value="1" selected="selected">Yes</option>
                            <option value="0">No</option>
                        </select>
                        <br/><br/>
                        <p>Is new</p>
                        <select name="is_new">
                            <option value="1" selected="selected">Yes</option>
                            <option value="0">No</option>
                        </select>
                        <br/><br/>
                        <p>Recommended</p>
                        <select name="is_recommended">
                            <option value="1" selected="selected">Yes</option>
                            <option value="0">No</option>
                        </select>
                        <br/><br/>
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
