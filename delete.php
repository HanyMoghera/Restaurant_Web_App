<?php
include "connection.php";

if(isset($_GET['name'])){
    $name=$_GET['name'];

    $sql="DELETE FROM  `sign_up`
    WHERE username='$name'";
    $result=mysqli_query($con,$sql);
    if($result){
   header("location:adminmain.php");
    }
    else{
    die(mysqli_error($con));
    }

}

?>