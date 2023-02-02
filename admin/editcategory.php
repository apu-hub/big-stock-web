<?php include("include/header.php") ?>
<?php include("include/sidebar.php") ?>
<?php
// include('function.php');
// $obj =  new Operations();
$id = Utils::cleaner($_GET['id'] ?? 0);

$table = "category_tbl";

$where = "WHERE id = '" . $id . "'";

$row = $obj->getSingle($table, $where);

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Update Category </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Category </li>
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
              <h3 class="card-title">Update Category<small></small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="category_update.php" method="post" enctype='multipart/form-data' id="form">
              <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
              <input type="hidden" name="image" id="image" value="<?php echo $row['image'] ?>">

              <div class="card-body">


                <div class="form-group">
                  <label for="">Category Name</label>
                  <input type="text" class="form-control" placeholder="Category Name" id="category_name" name="category_name" value="<?php echo $row['category_name']; ?>">
                  <span id="category_error" style="display:none;color:red">Please enter category name</span>
                </div>
                <div class="form-group">
                  <label for="">Category Tags</label>
                  <input type="text" class="form-control" placeholder="Category Tags" id="category_tags" name="category_tags" value="<?php echo $row['category_tags']; ?>">
                  <span id="tags_error" style="display:none;color:red">Please enter category tags</span>
                </div>

                <div class="form-group">
                  <label for="">Category Image</label>
                  <input type="file" class="form-control" id="file" name="file">
                  <img src="upload/<?php echo $row['image']; ?>" width="60" height="60">
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
              var category_name = $('#category_name').val();
              var category_tags = $('#category_tags').val();
              var file = $('#file').val();
              var feature_image = $('#image').val();
              if (category_name == '') {
                $('#category_name').focus();
                $('#category_error').show();
                $('#category_error').fadeOut(5000);

              } else if (category_tags == '') {
                $('#category_tags').focus();
                $('#tags_error').show();
                $('#tags_error').fadeOut(5000);
              } else if (feature_image == '') {
                $('#image').focus();
                $('#file_error').show();
                $('#file_error').fadeOut(5000);
              } else {
                $('#form').submit();
              }

            }
          </script>