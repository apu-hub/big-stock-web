<?php include("include/header.php") ?>
<?php include("include/sidebar.php") ?>
<?php

// include('function.php');
// $obj =  new Operations();
?>
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
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Show Category</li>
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Show category</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tbl" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Category Name</th>
                    <th>Category Tags</th>
                    <th>Image</th>
                    <th>Actions</th>

                  </tr>
                </thead>
                <tbody>

                  <?php
                  $i = 0;
                  $result = $obj->getAll("category_tbl");
                  foreach ($result as $results) {

                    $i++;
                  ?>

                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $results['category_name']; ?></td>
                      <td><?php echo $results['category_tags']; ?></td>
                      <td><img style="height: 40px;width: 40px" src="upload/<?php echo $results['image']; ?>"></td>
                      <td>
                        <a class="btn btn" href="editcategory.php?id=<?php echo $results['id'] ?>">
                          <i class="fas fa-edit"></i> Edit
                        </a>
                        <a class="btn btn" href="deletecategory.php?id=<?php echo $results['id'] ?>" onclick="onClickDelete(event)">
                          <i class="fas fa-trash-alt"></i> Delete
                        </a>

                      </td>
                    </tr>
                  <?php } ?>
                </tbody>

              </table>
            </div>
          </div>
        </div>


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("include/footer.php") ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#tbl').DataTable();
  });
</script>
<script>
  function onClickDelete(event) {
    var result = confirm("Want to delete?");
    if (!result) {
      event.preventDefault()
    }
  }
</script>