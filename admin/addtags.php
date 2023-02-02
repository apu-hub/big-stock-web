<?php include("include/header.php") ?>
<?php include("include/sidebar.php") ?>
<?php

$categoryList = $obj->getAll('category_tbl');

// $tagList = $obj->getAll('tags_tbl');

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tag</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin/dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Tags </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <?php include('include/alert.php') ?>
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
              <h3 class="card-title">Tags <small></small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="tags_action.php" method="post" enctype='multipart/form-data' id="form">
              <div class="card-body">

                <div class="form-group">
                  <label for="">Category Name</label>
                  <select class="form-control select2bs4" style="width: 100%;" id="category_id" name="category_id">
                    <option value="">----Choose Category---</option>
                    <?php foreach ($categoryList as $category) { ?>
                      <option value="<?= $category['id'] ?>">
                        <?= $category['category_name'] ?>
                      </option>
                    <?php } ?>
                  </select>
                  <span id="category_error" style="display:none;color:red">Please enter category name</span>
                </div>
                <div class="form-group">
                  <label for="">Tags Name</label>
                  <input type="text" name="tags" class="form-control" id="tags">
                  <span id="tags_error" style="display:none;color:red">Please enter category tags</span>
                </div>
                <!-- <div class="form-group">
                  <label for="">Tags Image</label>
                  <input type="file" name="file" class="form-control" id="file">
                  <span id="file_error" style="display:none;color:red">Please select a image</span>
                </div> -->





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
              var category_id = $('#category_id').val();
              var tags = $('#tags').val();
              var file = $('#file').val();
              if (category_id == '') {
                $('#category_id').focus();
                $('#category_error').show();
                $('#category_error').fadeOut(5000);

              } else if (tags == '') {
                $('#tags').focus();
                $('#tags_error').show();
                $('#tags_error').fadeOut(5000);
              } else if (file == '') {
                $('#file').focus();
                $('#file_error').show();
                $('#file_error').fadeOut(5000);
              } else {
                $('#form').submit();
              }

            }
          </script>