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
                    <h2 class="title text-center">Admin panel - Products - Update</h2>
                    <hr/>
                    <div class="form-one">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <p>Name product</p>
                            <input type="text" name="name" placeholder="" value="<?=$product['name'];?>">
                            <p>Vendor code</p>
                            <input type="text" name="code" placeholder="" value="<?=$product['code'];?>">
                            <p>Price, $</p>
                            <input type="text" name="price" placeholder="$0.00" value="<?=$product['price'];?>">
                            <p>Category</p>
                            <select name="category_id">
                                <?php if (is_array($categoriesList)): ?>
                                    <?php foreach ($categoriesList as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"
                                            <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                            <br/><br/>
                            <p>Brand</p>
                            <input type="text" name="brand" placeholder="" value="<?=$product['brand'];?>">
                            <p>Image</p>
                            <img src="<?php echo ('/server/image/'.$product['image']);?>" width="200" alt="" />
                            <input type="file" name="image" placeholder="" value="<?=$product['image'];?>">
                            <p>Description</p>
                            <textarea name="description" placeholder="Description"><?=$product['description'];?></textarea>
                            <br/><br/>
                            <p>Availability</p>
                            <select name="availability">
                                <option value="1" <?php if ($product['availability'] == 1) echo 'selected="selected"';?>>Yes</option>
                                <option value="0" <?php if ($product['availability'] == 0) echo 'selected="selected"';?>>No</option>
                            </select>
                            <br/><br/>
                            <p>Is new</p>
                            <select name="is_new">
                                <option value="1" <?php if ($product['is_new'] == 1) echo 'selected="selected"';?>>Yes</option>
                                <option value="0" <?php if ($product['is_new'] == 0) echo 'selected="selected"';?>>No</option>
                            </select>
                            <br/><br/>
                            <p>Recommended</p>
                            <select name="is_recommended">
                                <option value="1" <?php if ($product['is_recommended'] == 1) echo 'selected="selected"';?>>Yes</option>
                                <option value="0" <?php if ($product['is_recommended'] == 0) echo 'selected="selected"';?>>No</option>
                            </select>
                            <br/><br/>
                            <p>Status</p>
                            <select name="status">
                                <option value="1" <?php if ($product['status'] == 1) echo 'selected="selected"';?>>Show</option>
                                <option value="0" <?php if ($product['status'] == 0) echo 'selected="selected"';?>>Hide</option>
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
