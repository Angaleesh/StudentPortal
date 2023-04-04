<?php
session_start();
include('database.php');

if (isset($_POST['submit'])) {
  $table_name;
  if ($_POST['User_type'] == 1) {
    $qry = "select * from students where reg_id='" . $_POST['usr_name'] . "'";
    $table_name = "students";
  } else {
    $qry = "select * from admin where u_name='" . $_POST['usr_name'] . "'";
    
  }
  
  if (!isset($_COOKIE["member_login"])) {
    $qry .= " and password='" . $_POST['usr_pwd'] . "'";
  }
  $result = mysqli_query($dbConn, $qry);
  $user = mysqli_fetch_array($result);
  if ($user) {
    if ($table_name == "students") {
      $_SESSION["member_id"] = $user["s_id"];
      $_SESSION["member_user"] = $user["s_name"];
    } else {
      $_SESSION["member_id"] = $user["admin_id"];
      $_SESSION["member_user"] = $user["u_name"];
    }

    if (!empty($_POST["remember"])) {
      setcookie("member_login", $_POST["usr_name"], time() + (10 * 365 * 24 * 60 * 60));
      setcookie("member_login", $_POST["usr_pwd"], time() + (10 * 365 * 24 * 60 * 60));
    } else {
      if (isset($_COOKIE["member_login"])) {
        setcookie("member_login", "");
      }
    }
    if ($table_name == "students") {
      header('location:dashboard.php');
    } else {
      header('location:a_dashboard.php');
    }

  } else {
    $message = "Invalid Login";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="index.php" class="h1"><b>RVSian</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="index.php" method="post">
          <div class="input-group mb-3">
            <select class="form-control" name="User_type">
              <option value="1">Student</option>
              <option value="2">Admin</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="usr_name" placeholder="Username" value="<?php if (isset($_COOKIE["member_login"])) {
              echo $_COOKIE["member_login"];
            } ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="usr_pwd" placeholder="Password" value="<?php if (isset($_COOKIE["member_login"])) {
              echo $_COOKIE["member_login"];
            } ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember" id="remember" <?php if (isset($_COOKIE["member_login"])) { ?> checked <?php } ?>>
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links

      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p> -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>