<?php
include("include/header.php");
include("include/sidebar.php");

$result = $obj->getAll("banner_info");

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Banner </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Show Banners</li>
          </ol>
          <ol class="breadcrumb float-sm-right">
            <a href="addbanner.php">
              <button type="submit" class="rounded badge-primary right" style="border:none; outline:none;">
                <i class="fas fa-plus"></i> Add New
              </button>
            </a>
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Show Banners</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tbl" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($result as $i => $results) { ?>
                    <tr>
                      <td><?= $i + 1 ?></td>
                      <td><?= $results['name'] ?></td>
                      <td><img style="height: 40px;" src="upload/banner/<?php echo $results['image_name']; ?>"></td>
                      <td>
                        <a class="btn btn" href="editbanner.php?id=<?php echo $results['id'] ?>">
                          <i class="fas fa-edit"></i> Edit
                        </a>
                        <a class="btn btn" href="deletebanner.php?id=<?php echo $results['id'] ?>" onclick="onClickDelete(event)">
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