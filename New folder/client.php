<?php
session_start();
include ("database.php");
include("sidebar.php")
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container col-8 my-5">
        <table class="table table-hover table-dark">
        <thead>
            <tr>
            <th scope="col">User ID</th>
            <th scope="col">Name</th>
            <th scope="col">Phone No</th>
            <th scope="col">Course</th>
            <?php
            $sql="select * from users where u_type='A';";
            $result=mysqli_query($con,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    
                    if($_SESSION['member']==$row['user_id']){
                        ?>
                        <th scope="col">Operation</th>
                        <?php
                    }
                }
            }
            ?>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql="select * from users;";
            $result=mysqli_query($con,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){?>
                    <tr>
                    <th scope="row"><?php echo $row['user_id']?></th>
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['phnNo']?></td>
                    <td><?php echo $row['course']?></td>
                    <?php
                    $query="select * from users where u_type='A';";
                    $res=mysqli_query($con,$query);
                    if($res){
                        while($op=mysqli_fetch_assoc($res)){
                            
                            if($_SESSION['member']==$op['user_id']){
                                ?>
                                <td>
                                <button type="submit" name="update" class="btn btn-primary"><a class='text-light' style="text-decoration:none;" href="update.php?updid=<?php echo $row['user_id']?>">Update</a></button>
                                <button type="submit" name="delete" class="btn btn-danger"><a class='text-light'style="text-decoration:none;" href="delete.php?delid=<?php echo $row['user_id']?>">Delete</a></button>
                                
                                </td>
                                <?php
                            }
                        }
                    }
                    
                }
            }
            ?>
        </tbody>
        </table>
        <br>
        <?php
            $sql="select * from users where u_type='A';";
            $result=mysqli_query($con,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    
                    if($_SESSION['member']==$row['user_id']){
                        ?>
                        <button type="submit" name="add" class="btn btn-primary"><a href="insert.php" class='text-light' style="text-decoration:none;">Add User</a></button>
                        <?php
                    }
                }
            }
            ?>
        <button type="submit" name="logout" class="btn btn-primary"><a href="logout.php" class='text-light' style="text-decoration:none;">LogOut</a></button>
    </div>
  </body>
</html>