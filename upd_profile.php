<?php
session_start();
include('database.php');
include('sidebar.php');

    $qry="select * from students where s_id=".$_SESSION["member_id"];
    $r=mysqli_query($dbConn,$qry);
    $stu=mysqli_fetch_array($r);


if (isset($_POST['update'])) {
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
    $Address = $_POST['Address'];
    $email_id = $_POST['email_id'];
    $m_number = $_POST['m_number'];
    // echo $utype;

    $query = "update `students` set class_id=".$class_id.",s_name='".$s_name."',Address='".$Address."',email_id='".$email_id."',m_number='".$m_number."',f_name='".$f_name."',password='".$password."',year='".$year."',stream='".$stream."',reg_id='".$reg_id."',dob='".$dob."' where s_id=".$_SESSION["member_id"];
    $upd = mysqli_query($dbConn, $query);
    if ($upd) {
        header('location:dashboard.php');
        // echo "inserted";
    } else {
        echo "Not inserted";
    }
}
if (isset($_FILES['uploadfile'])) {

    $filename = $_FILES["choosefile"]["name"];

    $tempname = $_FILES["choosefile"]["tmp_name"];  

        $folder = "image/".$filename;

      // connect with the database

    

        // query to insert the submitted data

        $sql = "INSERT INTO image (img_name,img_data,s_id) VALUES ('".$filename."','".$tempname."',".$_SESSION["member_id"].")";

     // function to execute above query

        mysqli_query($dbConn, $sql);       

        // Add the image to the "image" folder"

        if (move_uploaded_file($tempname, $folder)) {

            $msg = "Image uploaded successfully";

        }else{

            $msg = "Failed to upload image";

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
                        <h1 class="m-0">Manage Students</h1>
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

        <body class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Student Info</h3>
                        </div>
                      
                        <div class="card-body">
                            <form class=" ml-2 p-4" method="POST">
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail2">Student Name</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                        value="<?php echo $stu['s_name']?>" placeholder="Student Name" name="s_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail2">Register ID</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                    value="<?php echo $stu['reg_id']?>" placeholder="Register ID" name="reg_id">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail2"> Father Name</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                    value="<?php echo $stu['f_name']?>"  placeholder="Father Name" name="f_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormPassword2">Password</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                    value="<?php echo $stu['password']?>"  placeholder="Password" name="password">
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth:</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input"
                                        value="<?php echo $stu['dob']?>"  data-target="#reservationdate" name="dob" placeholder="Date" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                
                        <div class="form-group" data-select2-id="55">
                  <label>Course</label>
                  <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" name="class_id">
                            <?php
                            $sql = "select * from class;";
                            $result = mysqli_query($dbConn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $row['class_id']?>" >
                                        <?php echo $row['class_name'] ?>
                                    </option>
                                    <?php
                                }
                            }

                            ?>

                        </select></div>                               
                         <label for="exampleDropdownFormPassword2">Year</label>
                                <select class="form-select-lg mb-3 col-12" aria-label="Default select example" name="year">
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>

                                </select>
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail2">Address</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                    value="<?php echo $stu['Address']?>"  placeholder="Password" name="Address">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail2">email</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                    value="<?php echo $stu['email_id']?>"  placeholder="Password" name="email_id">
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail2">Mobile Number</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                    value="<?php echo $stu['m_number']?>"  placeholder="Password" name="m_number">
                                </div>
                                <div class="card-body">
                <div id="actions" class="row">
                  <div class="col-lg-6">
                    <div class="btn-group w-100">
                      <span class="btn btn-success col fileinput-button dz-clickable">
                        <i class="fas fa-plus"></i>
                        <span>Add files</span>
                      </span>
                      <button type="submit" class="btn btn-primary col start">
                        <i class="fas fa-upload"></i>
                        <span>Start upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning col cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancel upload</span>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center">
                    <div class="fileupload-process w-100">
                      <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress=""></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table table-striped files" id="previews">
                  
                </div>
              </div>
                                <hr>
                                <div style="text-align:center;">
                                    <button type="submit" name="update" class="btn btn-primary col-4">Update</button>
                                    <button type="submit" name="cancel" class="btn btn-danger col-4">Cancel</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </body>

        <!-- /.row -->
        <!-- Main row -->
        <?php
        include('footer.php');
        ?>
</body>