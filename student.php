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
                        <h1 class="m-0">Student Info</h1>
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
            <div style="text-align:center">
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle col-8" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Add Student
                    </a>
                    <form class="dropdown-menu p-4 col-8" method="POST">
                        <div class="form-group">
                            <label for="exampleDropdownFormEmail2">Student Name</label>
                            <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                placeholder="Student Name" name="s_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleDropdownFormEmail2">Register ID</label>
                            <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                placeholder="Register ID" name="reg_id">
                        </div>
                        <div class="form-group">
                            <label for="exampleDropdownFormEmail2"> Father Name</label>
                            <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                placeholder="Father Name" name="f_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleDropdownFormEmail2">Password</label>
                            <input type="text" class="form-control" id="exampleDropdownFormEmail2"
                                placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <label>Date of Birth:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="date" class="form-control datetimepicker-input"
                                    data-target="#reservationdate" name="dob"  placeholder="Date" />
                                <div class="input-group-append" data-target="#reservationdate"
                                    data-toggle="datetimepicker">
                                    
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
                        <div class="form-group" data-select2-id="55">
                  <label>Year</label>
                  <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" name="year">
          
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>

                        </select></div>
                        <hr>
                        <div style="text-align:center;">
                            <button type="submit" name="add" class="btn btn-primary col-4">Add</button>
                        </div>
                </div>
                </form>
                <hr>
                <div class="container col-12  my-5">
                    <table class="table table-hover table-stripped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Regiter ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Year</th>
                                <th scope="col">Course</th>
                                <th scope="col">Operation</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select * from students;";
                            $result = mysqli_query($dbConn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $row['reg_id'] ?>
                                        </th>
                                        <td>
                                            <?php echo $row['s_name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['year'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['stream'] ?>
                                        </td>
                                        <td>
                                            <button type="submit" name="update" class="btn btn-primary"><a class='text-light'
                                                    style="text-decoration:none;"
                                                    href="upd_student.php?updid=<?php echo $row['s_id'] ?>">Update</a></button>
                                            <button type="submit" name="delete" class="btn btn-danger"><a class='text-light'
                                                    style="text-decoration:none;"
                                                    href="delete.php?delid=<?php echo $row['s_id'] ?>">Delete</a></button>

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