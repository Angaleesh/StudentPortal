<?php
session_start();
include('database.php');
include('sidebar.php');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RVScian</title>

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
                        <h1 class="m-0">Claim Your Result</h1>
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
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content-wrapper pt-5">
            <div class="row">
                <!-- Main content -->
                <a class="btn btn-app bg-primary btn-lg col-4" style="height:25%;" href="result.php?sem_id=1" href="result.php?sem_id=1">

                    <i class="fas fa-graduation-cap"></i> Semester I
                </a>

                <a class="btn btn-app bg-primary col-4" style="height:25%;" href="result.php?sem_id=2" >

                    <i class="fas fa-graduation-cap"></i> Semester II
                </a>
                <a class="btn btn-app bg-primary col-4" style="height:25%;" href="result.php?sem_id=3">

                    <i class="fas fa-graduation-cap"></i>Semester III
                </a>

                <a class="btn btn-app bg-primary col-4" style="height:25%;" href="result.php?sem_id=4">

                    <i class="fas fa-graduation-cap"></i> Semester IV
                </a>

                <a class="btn btn-app bg-primary col-4" style="height:25%;" href="result.php?sem_id=5">

                    <i class="fas fa-graduation-cap"></i> Semester V
                </a>

                <a class="btn btn-app bg-primary col-4" style="height:25%;" href="result.php?sem_id=6">

                    <i class="fas fa-graduation-cap"></i>Semester VI
                </a>

                <!-- /.info-box-content -->
            </div>
        </div>


    </div>
    </div>

    <!-- /.row -->
    <!-- Main row -->
    <?php
    include('footer.php');
    ?>
</body>

<body>
    <div class="text-center">
        <div class="card-body col-12">

        </div>
    </div>
</body>

</html>