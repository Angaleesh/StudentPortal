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
                        <h1 class="m-0">Manage Result</h1>
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
        <form class=" ml-2 p-4" method="POST">
            <div class="form-group">
                <label for="exampleDropdownFormEmail2">Register ID</label>
                <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Register ID"
                    name="reg_id">
            </div>

            <hr>
            <div style="text-align:center;">
                <button type="update" class="btn btn-primary col-4">Add</button>
            </div>
    </div>
    </form>
    <?php
    $i = 1;
    if (isset($_POST['update'])) {
        $sql = "select class_id from students where reg_id='" . $_POST['reg_id'] . "'";
        $r = mysqli_query($dbConn, $sql);
        $r1 = mysqli_fetch_array($r);
        $qry = "select sub_name from subjects where class_id=" . $r1[0];
        $result = mysqli_query($dbConn, $qry);
        if ($result) {

            while ($row = mysqli_fetch_array($result)) { ?>
                <form class=" ml-2 p-4" method="POST">
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail2">
                            <?php echo $row[0] ?>
                        </label>
                        <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Register ID"
                            name="<?php echo $i; ?>">
                    </div>

                    <hr>
                    <!-- <div style="text-align:center;">
<button type="submit" name="update" class="btn btn-primary col-4" >Add</button>
</div> -->
                    </div>
                </form>
                <?php
                $i++;
            }
            ?>
            <div style="text-align:center;">
                <button type="submit" class="btn btn-primary col-4">Submit</button>
            </div>
            <?php
        }

        if (isset($_POST['submit'])) {
            $k = 1;
            while ($sub = mysqli_fetch_array($result)) {
                $query = "insert into result(sub_name,reg_id,s_mark) values('" . $sub[0] . "','" . $_POST['reg_id'] . "'," . $_POST[$k] . ")";
                $p = mysqli_query($dbConn, $query);
                $k++;
            }
        }
    }
    ?>

    <!-- /.row -->
    <!-- Main row -->
    <?php
    include('footer.php');
    ?>
</body>