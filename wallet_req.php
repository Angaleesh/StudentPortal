<?php
session_start();
include('database.php');
include('sidebar.php');

if (isset($_POST['submit'])) {
    $amount=$_POST['amount'];
    // echo $utype;

    $query = "insert into `wallet_req`(s_id,amount) values (".$_SESSION['member_id'].",'$amount')";
    $upd = mysqli_query($dbConn, $query);
    if ($upd) {
        header('location:wallet_req.php');
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
        <!--  -->
        <hr>
        <div class="container-fluid col-12  my-5">
        <div class="dropdown show align-center">
            <a class="btn btn-secondary dropdown-toggle col-8" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Request wallet
            </a>
            <form class="dropdown-menu p-4 col-8" method="POST">
                <div class="form-group">
                    <label for="exampleDropdownFormEmail2">Amount</label>
                    <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Enter Amount"
                        name="amount">
                </div>
                <hr>
                <div style="text-align:center;">
                    <button type="submit" name="submit" class="btn btn-primary col-4">Request</button>

                </div>
            </form>
            <!-- <button type="submit" name="add" class="btn btn-primary col-8"><a href="add_class.php" class='text-light'
                                    style="text-decoration:none;">Add Class</a></button> -->
            <!-- /.row -->
            <!-- Main row -->
        </div>

        
            <table class="table table-hover table-stripped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Wallet ID</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from wallet_req ";
                    $result = mysqli_query($dbConn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $req = mysqli_query($dbConn, "select reg_id,s_name from students where s_id=" . $row['s_id']);
                            $rr = mysqli_fetch_array($req);
                            $req1 = mysqli_query($dbConn, "select amount from wallet where s_id=" . $row['s_id']);
                            $rrr = mysqli_fetch_array($req1);
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $row['r_id'] ?>
                                </th>
                                <td>
                                    <?php echo $row['amount'] ?>
                                </td>
                                <td>
                                    <?php if ($row['sts'] == 0) {
                                        echo "<span class='badge bg-warning'>Pending</span>";
                                    } else if ($row['sts'] == 1) {
                                        echo "<span class='badge bg-success'>Success</span>";
                                    } else {
                                        echo "<span class='badge bg-danger'>Rejected</span>";
                                    } ?>

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
    </div>
</body>

<!-- /.row -->
<!-- Main row -->
<?php
include('footer.php');
?>
</body>