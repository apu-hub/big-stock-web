<?php include("include/header.php") ?>
<?php include("include/sidebar.php") ?>
<?php
$categoryList = $obj->getAll('category_tbl');

$tagList = $obj->getAll('tags_tbl');

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Banner</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin/dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Banner </li>
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
            <div class="card-header">
              <h3 class="card-title">Banner <small></small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="banner_action.php" method="post" enctype='multipart/form-data' id="form">
              <div class="card-body">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="name" class="form-control" id="banner_name">
                  <span id="name_error" style="display:none;color:red">Please enter bannername name</span>
                </div>
                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" name="file" class="form-control" id="file">
                  <span id="file_error" style="display:none;color:red">Please select a image</span>
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
          <?php include("include/footer.php") ?>
          <script>
            function validate() {
              var image_name = $('#banner_name').val();
              var file = $('#file').val();

              if (image_name == '') {
                $('#image_name').focus();
                $('#name_error').show();
                $('#name_error').fadeOut(5000);

              } else if (file == '') {
                $('#file').focus();
                $('#file_error').show();
                $('#file_error').fadeOut(5000);
              } else {
                $('#form').submit();
              }

            }
          </script>