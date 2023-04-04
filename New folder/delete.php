<?php
session_start();
include ('connect.php');
$id=$_GET['delid'];
$sql="delete from users where user_id=".$id;
$result=mysqli_query($con,$sql);
if($result){
    header ('location:client.php');
   
}

?>