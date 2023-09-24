<?php
$usernamerroe="";
$passworderroe="";
if($_SERVER['REQUEST_METHOD']=="POST"){
include "connection.php";

$username=$_POST['username'];
$password=$_POST['password'];


$sql="SELECT * FROM `sign_up`
WHERE username = '$username'";

$Result=mysqli_query($con,$sql);

if($Result){
  $num=mysqli_num_rows($Result);
  if(!$num>0){
   $usernamerroe="Sorry, User name does not exist";
  }else {
    $sql="SELECT * FROM `sign_up`
    WHERE username = '$username'
    AND password='$password'";
    $Result=mysqli_query($con,$sql);
    if($Result){
       $num=mysqli_num_rows($Result);
      if(!$num>0){
        $passworderroe="Sorry, password is not correct";
     }
     session_start();
     $_SESSION['name']=$username;
     header("location:home.php");

}
}
}
else{
  die(mysqli_error($con));
}
}









?>








<!DOCTYPE html>
<html>
<head>
  <title>Login page</title>
  <style>
    /* Reset some default styles for better consistency */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Style the body */
    body {
      font-family: Arial, sans-serif;
      background-color:aquamarine;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    /* Style the login container */
    .login-container {
      background-color: #fff;
      border-radius: 5px;
      padding: 30px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      width: 350px;
      text-align: center;
    }

    /* Style the login form */
    form {
      margin-top: 20px;
    }

    /* Style form labels */
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #333;
    }

    /* Style form inputs */
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    /* Style the login button */
    input[type="submit"] {
      background-color: #007BFF;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 18px;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    /* Style the sign-up link */
    p {
      margin-top: 20px;
      font-size: 14px;
      color: #555;
    }

    a {
      text-decoration: none;
      color: #007BFF;
    }

    a:hover {
      text-decoration: underline;
    }

    /* Style the page title */
    h2 {
      font-size: 28px;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Sign In form </h2>
    <form action="#" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required>

      <div class="missint" style="color:red">
        <?php
        // Check if user name exist atch and display an error message if they don't
        if(!empty($usernamerroe)){
          echo $usernamerroe;
        }
        ?>
      </div>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      <div class="missint" style="color:red">
        <?php
        // Check if user name exist atch and display an error message if they don't
        if(!empty($passworderroe)){
          echo $usernamerroe;
        }
        ?>
      </div>

      <input type="submit" value="Log In">
    </form>
    <p>Don't have an account? <a href="sign_up.php">Sign Up</a></p>
  </div>
</body>
</html>