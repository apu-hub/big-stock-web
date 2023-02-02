<?php include("include/header.php") ?>
<?php include("include/sidebar.php") ?>
<?php
// include('function.php');
// $obj =  new Operations();
$id = $_GET['id'];

$table = "tags_tbl";

$where = "WHERE id = '" . $id . "'";

$row = $obj->getSingle($table, $where);

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Update Tags </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Tags </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <?php include('include/alert.php')?>
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
              <h3 class="card-title">Update Tags<small></small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="tags_update.php" method="post" enctype='multipart/form-data' id="form">
              <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
              <input type="hidden" name="image" id="image" value="<?php echo $row['image'] ?>">


              <div class="card-body">


                <div class="form-group">
                  <label for="">Category Name</label>
                  <select class="form-control select2bs4" style="width: 100%;" id="category_id" name="category_id">
                    <option value="">----Choose Category---</option>
                    <?php
                    $rs = $obj->getAll('category_tbl');
                    foreach ($rs as $cat) {
                    ?><option <?php if ($row['category_id'] == $cat['id']) {
                                echo "selected";
                              } ?> value="<?php echo $cat['id'] ?>"><?php echo $cat['category_name'] ?></option><?php
                                                                                                              }
                                                                                                                ?>
                  </select>

                </div>
                <div class="form-group">
                  <label for="">Tags</label>
                  <input type="text" class="form-control" placeholder=" Tags" id="tags" name="tags" value="<?php echo $row['tags']; ?>">
                  <span id="tags_error" style="display:none;color:red">Please enter category tags</span>
                </div>

                <!-- <div class="form-group">
                  <label for="">Tags Image</label>
                  <input type="file" class="form-control" id="file" name="file">
                  <img src="upload/<?php echo $row['image']; ?>" width="60" height="60">
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
                <button type="submit" onclick="validate()" class="btn btn-primary" value="Update">Submit</button>
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
              var image = $('#image').val();
              if (category_id == '') {
                $('#category_id').focus();
                $('#category_error').show();
                $('#category_error').fadeOut(5000);

              } else if (tags == '') {
                $('#tags').focus();
                $('#tags_error').show();
                $('#tags_error').fadeOut(5000);
              } else if (image == '') {
                $('#image').focus();
                $('#file_error').show();
                $('#file_error').fadeOut(5000);
              } else {
                $('#form').submit();
              }

            }
          </script>