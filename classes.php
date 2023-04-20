<?php
session_start();
include('database.php');
include('a_sidebar.php');
if (isset($_POST['submit'])) {
  $classname = $_POST['class_name'];
  $dept = $_POST['dept'];
  $add = "insert into class(class_name,department) values('" . $classname . "','" . $dept . "')";
  $ins = mysqli_query($dbConn, $add);
  if ($ins) {
    header('location:classes.php');
    echo "<script>alert('Deleted Successfully.');</script>";
  } else {
    echo "<script>alert('Not Deleted. Retry!');</script>";
  }
}

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RVSian</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Classes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!--  -->
    <div class="content">
      <div class="card text-center  ">
        <div class="card-header">
          <?php
          $sql = "select * from class;";
          $result = mysqli_query($dbConn, $sql);
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $count = "SELECT COUNT(*) FROM `students` where class_id=" . $row['class_id'];
              $no_of_students = mysqli_fetch_array(mysqli_query($dbConn, $count)); ?>
              <div class="row">
                <div class="col-md-3">
                  <div class="card card-primary collapsed-card">
                    <div class="card-header">
                      <h3 class="card-title">
                        <?php echo $row['class_name'] ?>
                      </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: none;">
                      <b>Department: </b>
                      <?php echo $row['department'] ?><br>
                      <b>Number of Students: </b>
                      <?php echo $no_of_students[0]; ?>
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
              </div>
              <?php
            }
          }

          ?>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <br>
      <div class="text-center">
        <div class="dropdown show">
          <a class="btn btn-secondary dropdown-toggle col-8" href="#" role="button" id="dropdownMenuLink"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Add Class
          </a>
          <form class="dropdown-menu p-4 col-8" method="POST">
            <div class="form-group">
              <label for="exampleDropdownFormEmail2">Class Name</label>
              <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Class_name"
                name="class_name">
            </div>
            <div class="form-group">
              <label for="exampleDropdownFormPassword2">Department</label>
              <input type="text" class="form-control" id="exampleDropdownFormPassword2" name="dept">
            </div>
            <div style="text-align:center;">
              <button type="submit" name="submit" class="btn btn-primary col-4">Add</button>

            </div>
          </form>
          <!-- <button type="submit" name="add" class="btn btn-primary col-8"><a href="add_class.php" class='text-light'
                                    style="text-decoration:none;">Add Class</a></button> -->
          <!-- /.row -->
          <!-- Main row -->
        </div>
      </div>
      <?php
      include('footer.php');
      ?>
</body>