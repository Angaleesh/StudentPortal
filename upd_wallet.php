<?php
include("database.php");    

if(isset($_GET['updid'])){
    $sql="update wallet_req set sts=1";
    $s1=mysqli_query($dbConn,"select s_id,amount from wallet_req where r_id=".$_GET['updid']);
    $a1=mysqli_fetch_array($s1);
    $s2=mysqli_query($dbConn,"select amount from wallet where s_id=".$a1[0]);
    // echo $s2;
    $a2=mysqli_fetch_array($s2);
    $amount=$a1[1]+$a2[0];
    $sql1=mysqli_query($dbConn,"update wallet set amount=".$amount." where s_id=".$a1[0]);
    $result=mysqli_query($dbConn,$sql);
    if($result){
        header ('location:req_wallet.php');
       
    }
}
else{
    $sql="update wallet_req set sts=-1";
    $result=mysqli_query($dbConn,$sql);
    if($result){
        header ('location:req_wallet.php');
       
    }
}


?>