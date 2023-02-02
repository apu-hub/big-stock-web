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
          <h1 class="m-0 text-dark">Image</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="admin/dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Image </li>
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
              <h3 class="card-title">Image <small></small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="image_action.php" method="post" enctype='multipart/form-data' id="form">
              <div class="card-body">

                <div class="form-group">
                  <label for="">Category Name</label>
                  <select class="form-control select2bs4" style="width: 100%;" id="category_id" name="category_id" onchange="categorychange()">
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
                  <label for="">Tag Name</label>
                  <select class="form-control select2bs4" style="width: 100%;" id="tag_id" name="tag_id">
                    <option value="">----Choose Tag---</option>

                  </select>
                  <span id="tag_error" style="display:none;color:red">Please enter tag name</span>
                </div>
                <div class="form-group">
                  <label for="">Image Name</label>
                  <input type="text" name="image_name" class="form-control" id="image_name">
                  <span id="name_error" style="display:none;color:red">Please enter image name</span>
                </div>
                <div class="form-group">
                  <label for="">Image Description</label>
                  <input type="text" name="image_description" class="form-control" id="image_description">
                  <span id="description_error" style="display:none;color:red">Please enter image description</span>
                </div>
                <div class="form-group">
                  <label for="">Image Price</label>
                  <input type="text" name="image_price" class="form-control" id="image_price">
                  <span id="price_error" style="display:none;color:red">Please enter image price</span>
                </div>

                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" name="file" class="form-control" id="file">
                  <span id="file_error" style="display:none;color:red">Please select a image</span>
                </div>


                <div class="form-group">
                  <label for="">RAW file</label>
                  <input type="file" name="raw" class="form-control" id="raw">
                  <span id="raw_error" style="display:none;color:red">Please select a file</span>
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
            function categorychange() {
              var category_id = $('#category_id').val();


              $.ajax({

                url: 'getcategory.php',

                type: 'post',

                dataType: 'json',

                data: {
                  category_id: category_id
                },

                success: function(response) {

                  $('#tag_id').html(response.html);


                }

              });
            }

            function validate() {
              var category_id = $('#category_id').val();
              var tag_id = $('#tag_id').val();
              var image_name = $('#image_name').val();
              var image_description = $('#image_description').val();
              var image_price = $('#image_price').val();
              var file = $('#file').val();

              if (category_id == '') {
                $('#category_id').focus();
                $('#category_error').show();
                $('#category_error').fadeOut(5000);

              } else if (tag_id == '') {
                $('#tag_id').focus();
                $('#tag_error').show();
                $('#tag_error').fadeOut(5000);
              } else if (image_name == '') {
                $('#image_name').focus();
                $('#name_error').show();
                $('#name_error').fadeOut(5000);

              } else if (image_description == '') {
                $('#image_description').focus();
                $('#description_error').show();
                $('#description_error').fadeOut(5000);
              } else if (image_price == '') {
                $('#image_price').focus();
                $('#price_error').show();
                $('#price_error').fadeOut(5000);
              } else if (file == '') {
                $('#file').focus();
                $('#file_error').show();
                $('#file_error').fadeOut(5000);
              } else if (file == '') {
                $('#raw').focus();
                $('#raw_error').show();
                $('#raw_error').fadeOut(5000);
              } else {
                $('#form').submit();
              }

            }
          </script>