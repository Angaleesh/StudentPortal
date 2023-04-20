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
                        <h1 class="m-0">Dashboard</h1>
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
        <div class="content">
            <div class="row">
                <?php
                $qry = "select class_id from students where s_id=" . $_SESSION["member_id"];
                $r = mysqli_query($dbConn, $qry);
                $r1 = mysqli_fetch_array($r);
                $sql = "select * from students where class_id=" . $r1[0];
                $result = mysqli_query($dbConn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="card card-primary card-outline col-2">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?php echo $row["s_name"]?></h3>

                                <p class="text-muted text-center"><?php echo $row["reg_id"]?></p>



                                <a href="dashboard.php?updid=<?php echo $row["s_id"]?>" class="btn btn-primary btn-block"><b>View</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        &nbsp; 
                    <?php  }
                } ?>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <?php
        include('footer.php');
        ?>
</body>