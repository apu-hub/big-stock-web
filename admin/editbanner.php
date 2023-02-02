<?php include("include/header.php") ?>
<?php include("include/sidebar.php") ?>
<?php

$id = Utils::cleaner($_GET['id'] ?? 0);

if (!$id) {
    Utils::htmlRedirect('showbanner.php');
}

$table = "banner_info";
$where = "WHERE id = '" . $id . "'";
$image = $obj->getSingle($table, $where);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update Banner </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Update Banner </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <?php include("include/alert.php") ?>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <!-- <div class="card-header">
              <h3 class="card-title">Update Banner<small></small></h3>
            </div> -->
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="banner_update.php" method="post" enctype='multipart/form-data' id="form">
                            <input type="hidden" name="id" id="id" value="<?= $image['id'] ?>">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $image['name']; ?>">
                                    <span id="name_error" style="display:none;color:red">Please enter banner name</span>
                                </div>

                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" id="file" name="file">
                                    <span id="file_error" style="display:none;color:red">Please select a image</span>
                                    <img src="upload/banner/<?= $image['image_name']; ?>" width="60" height="60">
                                </div>

                                <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                        <!--  <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>-->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="validate()" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <script>
                        function validate() {
                            var image_name = $('#name').val();
                            var file = $('#file').val();

                            if (image_name == '') {
                                $('#image_name').focus();
                                $('#name_error').show();
                                $('#name_error').fadeOut(5000);

                            }  else {
                                $('#form').submit();
                            }

                        }
                    </script>
                    <?php include("include/footer.php") ?>