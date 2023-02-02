<?php include("include/header.php") ?>
<?php include("include/sidebar.php") ?>

           
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin/dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Add category </li>
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
                <h3 class="card-title">Add Category <small></small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="category_action.php" method="post" enctype='multipart/form-data' id="form">
                 <div class="card-body">
                  <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" name="category_name" class="form-control" id="category_name" >
                      <span id="category_error" style="display:none;color:red">Please enter category name</span>
                  </div>
                  <div class="form-group">
                    <label for="">Category Tags</label>
                    <input type="text" name="category_tags" class="form-control" id="category_tags" >
                      <span id="tags_error" style="display:none;color:red">Please enter category tags</span>
                  </div>
                   <div class="form-group">
                    <label for="">Category Image</label>
                    <input type="file" name="file" class="form-control" id="file" >
                      <span id="file_error" style="display:none;color:red">Please select a image</span>
                  </div>
                   <div class="form-group">
                    <label for="">Feature Image</label>
                    <select class="form-control" name="feature_image" id="feature_image" >
                 
                  <option value="">Select Status</option>
                 <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                         </select>
                 
                      <span id="feature_error" style="display:none;color:red">Please select feature image</span>
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
    function validate(){
    var category_name = $('#category_name').val();
    var category_tags= $('#category_tags').val();
    var file =$('#file').val();
     var feature_image=$('#feature_image').val();
   if(category_name == ''){
   $('#category_name').focus();
   $('#category_error').show();
   $('#category_error').fadeOut(5000);
   
   }else if(category_tags == ''){
   $('#category_tags').focus();
   $('#tags_error').show();
   $('#tags_error').fadeOut(5000);
   }else if(file == ''){
    $('#file').focus();
    $('#file_error').show();
    $('#file_error').fadeOut(5000);
   }else if(feature_image == ''){
       $('#feature_image').focus();
       $('#feature_error').show();
       $('#feature_error').fadeOut(5000);
   }
   else{
   $('#form').submit();
   }
        
    }
    
    
</script>

