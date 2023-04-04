<!-- <?php
session_start();
include('database.php');
if($_SERVER['REQUEST_METHOD']=='GET'){
    $sem_id=$_GET['sem_id'];
    $qry="select * from students where s_id=".$_SESSION["member_id"];
    $r=mysqli_query($dbConn,$qry);
    $stu=mysqli_fetch_array($r);
    $sql="select * from result where sem_id=".$sem_id." and reg_id='".$stu['reg_id']."'";
    $result=mysqli_query($dbConn,$sql);
    $data=mysqli_fetch_assoc($result);
}
?> -->
<!DOCTYPE html>
<html lang="en">

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
        <div class="card text-center col-8 ">
            <div class="card-header">
                <h3><b> RVS College of Arts and Scinece <br>
                        Result</b></h3>
            </div>
            <div class="card-body">
                <h5 class="card-title">Name :<?php echo $stu['s_name']?></h5><br>
                <h5 class="card-title">Class :<?php echo $stu['stream']?></h5><br>
                <h5 class="card-title">Regiter ID :<?php echo $stu['reg_id']?></h5><br><hr>
                <table class="table table-hover table-stripped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Subject</th>
                                <th scope="col">Mark</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $row['sub_name'] ?>
                                        </th>
                                        <td>
                                            <?php echo $row['s_mark'] ?>
                                        </td>
                                        <?php
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                <div class="button">
                    <button class="btn btn-primary" onclick="window.print()">Print Result</button>
                </div>
            </div>

        </div>

    </div>
</body>

</html>