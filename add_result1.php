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
        
        <div class="content">
      <div class="card ">
<?php
    $i = 0;
    $result1=[];
    if (isset($_GET['update'])) {
        $sql = "select class_id from students where reg_id='" . $_GET['reg_id'] . "'";
        $r = mysqli_query($dbConn, $sql);
        $r1 = mysqli_fetch_array($r);
        $qry = "select sub_name from subject where class_id=" . $r1[0]." and sem_id=".$_GET['sem_id'];
        $result = mysqli_query($dbConn, $qry);
        $result1=mysqli_fetch_array($result);
        echo $result1[0];
         if ($result) {
             while ($row = mysqli_fetch_array($result)) { ?>
                 <form class=" ml-2 p-4" method="POST">
                     <div class="form-group">
                         <label for="exampleDropdownFormEmail2">
                         
                             <?php echo $row['sub_name']; ?>
                        </label>
                        <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Enter Mark"
          name="<?php echo $i; ?>">
                     </div>

                     <hr>
                     <!-- <div style="text-align:center;">
// // <button type="submit" name="update" class="btn btn-primary col-4" >Add</button>
// // </div> -->
                    
                 <?php
                 $i++;
             }
         }
            ?>
            <div style="text-align:center;">
                <button type="submit" name="submit" class="btn btn-primary col-4">Submit</button>
            </div>
            </div>
                </form>
            <?php
        }

        if (isset($_POST['submit'])) {
            $k = 0;
    
            while ($k<$i) {
                $query = "insert into result(sub_name,sem_id,reg_id,s_mark) values('" . $result1[$k] . "',".$_GET['sem_id'].",'" . $_GET['reg_id'] . "'," . $_POST[$k] . ")";
                $p = mysqli_query($dbConn, $query);
                $k++;
            if($p){
                echo "inserted";
            }
            else{
                echo $k;
              }  }
        }
   
    ?>
</div>
</div></div>
    <!-- /.row -->
    <!-- Main row -->
    <?php
    include('footer.php');
    ?>
</body>
