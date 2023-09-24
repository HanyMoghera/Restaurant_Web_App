<?php
$hostname='localhost';
$username='root';
$password='';
$database='restaurant';

$con=mysqli_connect($hostname, $username, $password, $database);

if(!$con){
    die(mysql_error($con));
}
?>