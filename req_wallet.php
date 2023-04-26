<?php
session_start();
include('database.php');
include('a_sidebar.php');

if (isset($_POST['add'])) {
    $s_name = $_POST['s_name'];
    $f_name = $_POST['f_name'];
    $password = $_POST['password'];
    $year = $_POST['year'];
    $class_id=$_POST['class_id'];
    $r="select class_name from class;";
    $r1=mysqli_query($dbConn, $r);
    $str=mysqli_fetch_array($r1);
    $stream = $str[0];
    $reg_id = $_POST['reg_id'];
    $dob = $_POST['dob'];
    // echo $utype;

    $query = "insert into `students`(s_name,f_name,password,year,stream,reg_id,dob,class_id) values ('$s_name','$f_name','$password',$year,'$stream','$reg_id','$dob',$class_id)";
    $upd = mysqli_query($dbConn, $query);
    if ($upd) {
        header('location:student.php');
        // echo "inserted";
    } else {
        echo "Not inserted";
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
                        <h1 class="m-0">Wallet Request</h1>
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

        <body class="content-wrapper">
                <hr>
                <div class="container col-12  my-5">
                    <table class="table table-hover table-stripped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Wallet ID</th>
                                <th scope="col">Regiter ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Wallet Amount</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select * from wallet_req where sts=0;";
                            $result = mysqli_query($dbConn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) { 
                                    $req=mysqli_query($dbConn,"select reg_id,s_name from students where s_id=".$row['s_id']);
                                    $rr=mysqli_fetch_array($req);
                                    $req1=mysqli_query($dbConn,"select amount from wallet where s_id=".$row['s_id']);
                                    $rrr=mysqli_fetch_array($req1);
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $row['r_id'] ?>
                                        </th>
                                        <td>
                                            <?php echo $rr['reg_id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $rr['s_name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $rrr['amount'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['amount'] ?>
                                        </td>
                                        <td>
                                            <button type="submit" name="update" class="btn btn-success"><a class='text-light'
                                                    style="text-decoration:none;"
                                                    href="upd_wallet.php?updid=<?php echo $row['r_id'] ?>">Accept</a></button>
                                            <button type="submit" name="delete" class="btn btn-danger"><a class='text-light'
                                                    style="text-decoration:none;"
                                                    href="upd_wallet.php?rejid=<?php echo $row['r_id'] ?>">Reject</a></button>

                                        </td>
                                        <?php
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                    <hr>
                    <!-- <button type="submit" name="add" class="btn btn-primary"><a href="add_student.php" class='text-light'
                                    style="text-decoration:none;">Add User</a></button> -->


                </div>
        </body>

        <!-- /.row -->
        <!-- Main row -->
        <?php
        include('footer.php');
        ?>
</body>