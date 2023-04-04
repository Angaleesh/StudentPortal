<?php
session_start();
include('database.php');
include('a_sidebar.php');
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
        <!--  -->
        <?php
        $no_of_classes = mysqli_fetch_array(mysqli_query($dbConn, "SELECT COUNT(*) FROM `class`"));
        $no_of_students = mysqli_fetch_array(mysqli_query($dbConn, "SELECT COUNT(*) FROM `students`"));
        $no_of_result = mysqli_fetch_array(mysqli_query($dbConn, "SELECT COUNT(*) FROM `result`"));
        ?>

        <div class="content">
            <div class="container-fluid">
                <div class="pt-5 pr-5">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Details:</h5><hr>
                        <?php
                        echo '<p>Number of classes: ' . $no_of_classes[0] . '</p>';
                        echo '<p>Number of students: ' . $no_of_students[0] . '</p>';
                        echo '<p>Number of results: ' . $no_of_result[0] . '</p>';
                        ?>

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