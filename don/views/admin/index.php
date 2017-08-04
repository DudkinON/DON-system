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
                    <h2 class="title text-center">Admin panel</h2>
                    <h4 class="">PHP info</h4>
                    <!-- /PHP info/ -->
                    <table class="table-bordered table-striped table">
                        <tbody>
                        <tr>
                            <td width="15px">N</td>
                            <td>Name</td>
                            <td>Result</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>the operating system:</td>
                            <td><?=$data['php_os'];?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>php version:</td>
                            <td><?=$data['phpversion'];?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>zend version:</td>
                            <td><?=$data['zend_version'];?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>OS processor usage:</td>
                            <td><?=$data['get_server_cpu_usage'];?></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>OS memory usage:</td>
                            <td><?=$data['get_server_memory_usage'];?></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>php memory usage:</td>
                            <td><?=$data['memory'];?></td>
                        </tr>
                        </tbody>
                    </table>
                    <h4>MySQL info</h4>
                    <!-- /MySQL info/ -->
                    <table class="table-bordered table-striped table">
                        <tbody>
                        <tr>
                            <td width="15px">N</td>
                            <td>Name</td>
                            <td>Result</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>MySQL status:</td>
                            <td><?=$data['mysql_status'];?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>MySQL version:</td>
                            <td><?=$data['mysql_version'];?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>MySQL server info:</td>
                            <td><?=$data['mysql_server_info'];?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>MySQL errors:</td>
                            <td><?=$data['mysql_error'];?></td>
                        </tr>
                        </tbody>
                        <tr>
                            <td>5</td>
                            <td>MySQL product amount:</td>
                            <td><?=$data['mysql_product_amount'];?></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>MySQL articles amount:</td>
                            <td><?=$data['mysql_articles_amount'];?></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>MySQL orders amount:</td>
                            <td><?=$data['mysql_orders_amount'];?></td>
                        </tr>
                        </tbody>
                    </table>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<?php require_once (ROOT.'/template/'.TEMPLATE.'/admin/footer.php'); ?>
</body>
</html>
