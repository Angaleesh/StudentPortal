<?php
session_start();
include('database.php');
include('a_sidebar.php');
if (isset($_POST['submit'])) {
  $classname = $_POST['class_name'];
  $sem_id = $_POST['sem_id'];
  $sub_name = $_POST['sub_name'];
  $add = "insert into subject(class_id,sub_name,sem_id) values(" . $classname . ",'" . $sub_name . "'," . $sem_id . ")";
  $ins = mysqli_query($dbConn, $add);
  if ($ins) {
    echo "<script>alert('Inserted Successfully.');</script>";
  } else {
    echo "<script>alert('Not Inserted. Retry!');</script>";
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
            <h1 class="m-4">Manage Subjects</h1>
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
    <div class="container-fluid">
      <?php
      $sql = "select * from subject;";
      $result = mysqli_query($dbConn, $sql);
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $count = "SELECT * FROM `class` where class_id=" . $row['class_id'];
          $class = mysqli_fetch_assoc(mysqli_query($dbConn, $count)); ?>
          <div class="row d-flex justify-content-center">
            <div class="col-md-4">
              <div class="card card-primary collapsed-card mt-3">
                <div class="card-header">
                  <h3 class="card-title">
                    <?php echo $row['sub_name'] ?>
                  </h3>

                  <div class="card-tools mt-2">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  <b>Class: </b>
                  <?php echo $class['class_name'] ?><br>
                  <b>Department: </b>
                  <?php echo $class['department'] ?>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>

          <?php
        }
      }

      ?>
      <br>
      <div class="dropdown show d-flex justify-content-center">
        <a class="btn btn-secondary dropdown-toggle col-8" href="#" role="button" id="dropdownMenuLink"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add Subject
        </a>
        <form class="dropdown-menu p-4 col-8" method="POST">
          <div class="form-group">
            <label for="exampleDropdownFormEmail2">Subject Name</label>
            <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Subject_name"
              name="sub_name">
          </div>
          <div class="form-group" data-select2-id="55">
            <label>Course</label>
            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17"
              tabindex="-1" aria-hidden="true" name="class_name">
              <?php
              $sql = "select * from class;";
              $result = mysqli_query($dbConn, $sql);
              if ($result) {
                while ($row = mysqli_fetch_array($result)) { ?>
                  <option value=<?php echo $row['class_id']; ?>>
                    <?php echo $row['class_name']; ?>
                  </option>
                  <?php
                }
              }

              ?>
              <!-- updating in local -->
            </select>
          </div>
          <div class="form-group" data-select2-id="55">
            <label>Semester</label>
            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17"
              tabindex="-1" aria-hidden="true" name="sem_id">
              <option value="1">Semester - I</option>
              <option value="2">Semester - II</option>
              <option value="3">Semester - III</option>
              <option value="4">Semester - IV</option>
              <option value="5">Semester - V</option>
              <option value="6">Semester - VI</option>
            </select>
          </div>

          <hr>
          <div style="text-align:center;">
            <button type="submit" name="submit" class="btn btn-primary col-4">Add</button>
          </div>
        </form>
        <!-- <button type="submit" name="add" class="btn btn-primary col-8"><a href="add_class.php" class='text-light'
                                    style="text-decoration:none;">Add Class</a></button> -->
        <!-- /.row -->
        <!-- Main row -->
      </div>
</body>
<?php
include('footer.php');
?>