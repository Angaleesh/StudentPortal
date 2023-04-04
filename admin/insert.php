<?php
session_start();
include ('connect.php');
if(isset($_POST['add'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $phnNo=$_POST['phnNo'];
    $course=$_POST['course'];
    $utype=$_POST['u_type'];
    // echo $utype;
    if(isset($_POST['u_type'])){
    if ($utype=='admin'){
      $query="insert into `users`(username,password,phnNo,course,u_type) values ('$username','$password','$phnNo','$course','A')";
    }
    else{
      $query="insert into `users`(username,password,phnNo,course,u_type) values ('$username','$password','$phnNo','$course','C')";
    }
  
    $upd=mysqli_query($con,$query);
    if($upd){
        header ('location:client.php');
        // echo "inserted";
    }
    else {
        echo "Not inserted";
    }
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
   
  <div class="container col-6">
<form action="insert.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><strong>Name :</strong></label>
    <input type='text' name="username"  class="form-control" id="exampleInputEmail1" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><strong>Password :</strong></label>
    <input type='text' name="password"  class="form-control" id="exampleInputEmail1" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><strong>Phone NO :</strong></label>
    <input type="text" name="phnNo" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><strong>Course :</strong></label>
    <input type="text" name="course" class="form-control" id="exampleInputPassword1">
</div>
<label for="exampleInputEmail1" class="form-label"><strong>Usertype :</strong></label>
<div class="form-check">
  <input class="form-check-input" type="radio" value="admin" name="u_type" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Admin
  </label>
</div>
<div class="form-check">
  
  <input class="form-check-input" type="radio" value="client" name="u_type" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Client
  </label>
</div>
<br>
  <button type="submit" name="add" class="btn btn-primary" style="text-decoration:none;">Add</button>
  
</form>
</div>
  </body>
</html>

