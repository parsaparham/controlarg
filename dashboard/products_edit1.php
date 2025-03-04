<?php
session_start();
include("lib/classDashboard.php");
include("lib/connect.php");
include("lib/jdf.php");


$object = new class_parent();
$mobile = $_SESSION['mobile'];
$sql = "select * from users where mobile=?";
$arr = array($mobile);
$res = $object->select($sql, $arr);
$per_id = $res[0]['per_id'];
if ($per_id == 3) {

    $did = $_GET['id'];

    $date = jdate('Y/n/d');


    $header = new header();
    $header->put_header();
    ?>

    <!-- BEGIN WRAPPER -->
    <div id="wrapper">


        <!-- BEGIN SIDEBAR -->
        <?php
        $sidbar = new sidbar();
        $sidbar->put_sidebar();
        ?>
        <!-- END SIDEBAR -->


        <!-- BEGIN PAGE CONTENT -->
        <div id="page-content">
            <div class="row">
                <!-- BEGIN BREADCRUMB -->
                <div class="col-md-12">
                    <div class="breadcrumb-box border shadow">
                        <ul class="breadcrumb">
                            <li><a href="dashboard.php">پیشخوان</a></li>
                        </ul>
                        <div class="breadcrumb-left">
                            <?php echo jdate('l,Y/m/d'); ?>
                            <i class="icon-calendar"></i>
                        </div><!-- /.breadcrumb-left -->
                    </div><!-- /.breadcrumb-box -->
                </div><!-- /.col-md-12 -->
                <!-- END BREADCRUMB -->

                <div class="col-md-12">


                    <?php

                    //   $adminButtons=new adminButtons();
                    //  $adminButtons->put_adminButtons();

                    $sql = "select * from products where id=?";
                    $arr = array($did);
                    $res = $object->select($sql, $arr);
                    $name = $res[0]['name'];
                    $cat_id = $res[0]['cat_id'];
                    $priority = $res[0]['priority'];
                    $active = $res[0]['active'];
                    $desc = $res[0]['description'];

                    $sql1="select * from categories where id=?";
                    $arr1=array($cat_id);
                    $res1=$object->select($sql1,$arr1);
                    $cat_name=$res1[0]['name'];

                    ?>


                    <div class="col-lg-6">
                        <div class="portlet box border shadow">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h3 class="title">
                                        <i class="icon-settings"></i>
                                        ویرایش محصول </h3>
                                </div><!-- /.portlet-title -->
                                <div class="buttons-box">
                                    <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip"
                                       title="تمام صفحه" href="#">
                                        <i class="icon-size-fullscreen"></i>
                                    </a>
                                    <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip"
                                       title="کوچک کردن" href="#">
                                        <i class="icon-arrow-up"></i>
                                    </a>
                                </div><!-- /.buttons-box -->
                            </div><!-- /.portlet-heading -->
                            <div class="portlet-body">
                                <form method="post" role="form" action="products_edit2.php" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label> نام محصول</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon-user"></i>
                                                </span>
                                                <input name="name" type="text" class="form-control"
                                                       value="<?php echo $name; ?>">
                                            </div><!-- /.input-group -->
                                        </div><!-- /.form-group -->

                                        <div class="portlet-body">
                                            <div class="form-group">
                                                <label>انتخاب دسته بندی</label>
                                                <select class="form-control select2" name="category">
                                                    <?php
                                                    $sql2="select * from categories where id!=? order by id desc";
                                                    $arr2=array($cat_id);
                                                    $res2=$object->select($sql2,$arr2);
                                                    ?><option selected><?php echo $cat_name  ?></option>
                                                   <?php foreach ($res2 as $row2){
                                                        ?>
                                                        <option><?php echo $row2['name']  ?></option>
                                                    <?php }  ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>

                                        <div class="form-group">
                                            <label>اولویت</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="icon-user"></i>
                                                </span>
                                                <input name="priority" type="number" class="form-control"
                                                       value="<?php echo $priority; ?>">
                                            </div><!-- /.input-group -->
                                        </div><!-- /.form-group -->


                                        <div class="form-group row">
                                            <label>توضیحات محصول</label>
                                            <div class="col-sm-12">
                                                <textarea name="desc" class="form-control" rows="5" placeholder="توضیحات محصول"><?php echo $desc; ?></textarea>
                                            </div>
                                        </div>


                                        <div class="form-group relative">
                                            <input type="file" class="form-control">
                                            <label>آپلود فایل</label>
                                            <div class="input-group round">
                                                <input type="file" name="fileToUpload1"
                                                       placeholder="برای آپلود کلیک کنید" >
                                                <span class="input-group-btn input-group-sm">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="icon-picture"></i>
                                                        آپلود عکس
                                                    </button>
                                                </span>
                                            </div><!-- /.input-group -->
                                            <div class="help-block"></div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group relative">
                                            <input type="file" class="form-control">
                                            <label>آپلود فایل</label>
                                            <div class="input-group round">
                                                <input type="file" name="fileToUpload2"
                                                       placeholder="برای آپلود کلیک کنید" >
                                                <span class="input-group-btn input-group-sm">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="icon-picture"></i>
                                                        آپلود عکس
                                                    </button>
                                                </span>
                                            </div><!-- /.input-group -->
                                            <div class="help-block"></div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group relative">
                                            <input type="file" class="form-control">
                                            <label>آپلود فایل</label>
                                            <div class="input-group round">
                                                <input type="file" name="fileToUpload3"
                                                       placeholder="برای آپلود کلیک کنید" >
                                                <span class="input-group-btn input-group-sm">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="icon-picture"></i>
                                                        آپلود عکس
                                                    </button>
                                                </span>
                                            </div><!-- /.input-group -->
                                            <div class="help-block"></div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group relative">
                                            <input type="file" class="form-control">
                                            <label>آپلود فایل</label>
                                            <div class="input-group round">
                                                <input type="file" name="fileToUpload4"
                                                       placeholder="برای آپلود کلیک کنید" >
                                                <span class="input-group-btn input-group-sm">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="icon-picture"></i>
                                                        آپلود عکس
                                                    </button>
                                                </span>
                                            </div><!-- /.input-group -->
                                            <div class="help-block"></div>
                                        </div><!-- /.form-group -->

                                        <div class="form-group relative">
                                            <input type="file" class="form-control">
                                            <label>آپلود فایل</label>
                                            <div class="input-group round">
                                                <input type="file" name="fileToUpload5"
                                                       placeholder="برای آپلود کلیک کنید" >
                                                <span class="input-group-btn input-group-sm">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="icon-picture"></i>
                                                        آپلود عکس
                                                    </button>
                                                </span>
                                            </div><!-- /.input-group -->
                                            <div class="help-block"></div>
                                        </div><!-- /.form-group -->


                                        <!-- Input Group  -->
                                        <div class="input-group">
                                            <label>
                                                <input name="active" value="enable"  type="radio" <?php if($active==1){ echo "checked=checked";}  ?>>
                                                فعال
                                            </label>
                                            <?php echo str_repeat('&nbsp;', 5) ?>
                                            <label>
                                                <input name="active" value="disable" type="radio" <?php if($active==0){ echo "checked=checked";}  ?>>
                                                غیرفعال
                                            </label>
                                        </div>
                                        <!-- /Input Group  -->

                                        <br/>

                                        <input type="hidden" name="id" value="<?php echo $did ?>">


                                    </div>
                                    <!-- /.form-body -->

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-info btn-round">
                                            <i class="icon-check"></i>
                                            ثبت
                                        </button>
                                        <a href="categories.php">
                                            <button type="button" class="btn btn-warning btn-round">
                                                بازگشت
                                                <i class="icon-close"></i>
                                            </button>
                                        </a>
                                    </div><!-- /.form-actions -->
                                </form>


                            </div><!-- /.portlet-body -->
                        </div><!-- /.portlet -->

                    </div><!-- /.col-lg-6 -->


                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /#page-content -->
        <!-- END PAGE CONTENT -->

    </div><!-- /#wrapper -->
    <!-- END WRAPPER -->

    <?php
    $footer = new footer();
    $footer->put_footer();
} else {
    ?>
    <script> location.assign("login.php");  </script> <?php

}
?>