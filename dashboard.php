<?php
session_start();
include('database.php');
include('sidebar.php');

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
            <h1 class="m-4">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <?php 
                            $wal=mysqli_query($dbConn,"select amount from wallet where s_id=".$_SESSION['member_id']);
                            $w=mysqli_fetch_array($wal);
                            ?>
            <li>
                <button type="button" class="btn btn-block btn-dark btn-sm"><a href="wallet_req.php"> &#8377;<?php echo $w[0] ?>.00</a></button>
                </li>&nbsp;
                <!-- <div class="modal fade show" id="modal-sm" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Small Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body…</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          /.modal-content -->
        <!-- </div>
      
      </div> -->
            
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
        $id=$_SESSION["member_id"];
    if (isset( $_GET['updid'])) {
      $id = $_GET['updid'];
      
  }

    $qry = "select * from students where s_id=" . $id;
    $result = mysqli_query($dbConn, $qry);
    $user = mysqli_fetch_assoc($result);

    ?>
    <!-- Main content -->
    <div class="container">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="uploads/<?php echo $user['s_id'];?>.jpeg"
            alt="User profile picture">
        </div>

        <h3 class="profile-username text-center">
          <?php echo $user['s_name'] ?>
        </h3>

        <p class="text-muted text-center">
          <?php echo $user['stream'] ?>
        </p>
        <div class="card-body">
          <strong><i class="fas fa-book mr-1"></i> Register Number</strong>

          <p class="text-muted">
            <?php echo $user['reg_id'] ?>
          </p>

          <hr>
        
          <strong><i class="fas fa-book mr-1"></i> Father Name</strong>

          <p class="text-muted">
            <?php echo $user['f_name'] ?>
          </p>

          <hr>

          <strong><i class="fas fa-map-marker-alt mr-1"></i> Department</strong>

          <p class="text-muted">
            <?php echo $user['dept'] ?>
          </p>

          <hr>

          <strong><i class="fas fa-pencil-alt mr-1"></i> Address</strong>

          <p class="text-muted">
            <?php echo $user['Address'] ?>
          </p>

          <hr>
          <strong><i class="fas fa-pencil-alt mr-1"></i> Date of Birth</strong>

          <p class="text-muted">
            <?php echo $user['dob'] ?>
          </p>

          <hr>
          <strong><i class="fas fa-pencil-alt mr-1"></i> Year</strong>

          <p class="text-muted">
            <?php echo $user['year'] ?>
          </p>

          <hr>
          
          

          <strong><i class="far fa-file-alt mr-1"></i> Mobile Number</strong>

          <p class="text-muted">
            <?php echo $user['m_number'] ?>
          </p>
          <hr><strong><i class="far fa-file-alt mr-1"></i>E-mail</strong>
          <p class="text-muted">
            <?php echo $user['email_id'] ?>
          </p>
        </div>
<?php 
if($id==$_SESSION["member_id"]){
?>
        <a href="upd_profile.php" class="btn btn-primary btn-block"><b>Update</b></a>
<?php }?>
      </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <?php
    include('footer.php');
    ?>
</body>