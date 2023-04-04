<?php
session_start();
include ('connect.php');
if($_SERVER['REQUEST_METHOD']=='GET'){
$id=$_GET['updid'];
$sql="select * from users where user_id='".$id."'";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
if(isset($_POST['update'])){
    $username=$_POST['username'];
    $phnNo=$_POST['phnNo'];
    $course=$_POST['course'];
    $utype=$_POST['u_type'];
    if ($utype=='Admin'){
      $query="update users set user_id=".$id."username='".$username."' , phnNo='".$phnNo."' , course='".$course.", u_type='A' where user_id='".$id."';";
    }
    else{
      $query="update users set user_id=".$id."username='".$username."' , phnNo='".$phnNo."' , course='".$course.", u_type='C' where user_id='".$id."';";
    }
    $upd=mysqli_query($con,$query);
    if($upd){
        //header ('location:client.php');
        echo "updated";
    }
    else{
        echo "NOt";
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
   
  <div class="container col-6 my-5">
<form action="client.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><strong>Name :</strong></label>
    <input type='text' name="username"  class="form-control" id="exampleInputEmail1" value="<?php echo $data['username'];?>" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><strong>Password :</strong></label>
    <input type='text' name="password"  class="form-control" id="exampleInputEmail1" value="<?php echo $data['password'];?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><strong>Phone NO :</strong></label>
    <input type="text" name="phnNo" class="form-control" id="exampleInputPassword1" value="<?php echo $data['phnNo'];?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"><strong>Course :</strong></label>
    <input type="text" name="course" class="form-control" id="exampleInputPassword1" value="<?php echo $data['course'];?>">
</div>
<label for="exampleInputEmail1" class="form-label"><strong>Usertype :</strong></label>
<div class="form-check">
  <input class="form-check-input" type="radio" name="u_type" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Admin
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="u_type" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Client
  </label>
</div>
<br>
  <button type="submit" name="update" class="btn btn-primary" style="text-decoration:none;">Update</button>
</form>
</div>
  </body>
</html>