<?php
// Check if the form has been submitted (POST request).
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include the connection script to connect to the database.
    include 'connection.php';

    // Retrieve and sanitize/escape data from the form.
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];

    // Construct the SQL query to insert user data into the database.
    $sql = "INSERT INTO sign_up (username, password, email, gender, birthdate)
            VALUES ('$username', '$password', '$email', '$gender', '$birthdate')";

    // Execute the SQL query.
    $result = mysqli_query($con, $sql);

    // Check if the query was successful.
    if (!$result) {
        // If the insertion fails, display the database error and exit.
        die(mysqli_error($con));
        // Note: The following header line won't be executed after die().
        header('adminuser.php');
    } else {
        // If the insertion is successful, redirect to adminmain.php.
        header("location:adminmain.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add User</title>
  <!-- Link to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="signupstyle.css">
</head>
<body>
  <div class="container">
    <!-- Signup form -->
    <form action='' method='POST'>
      <h2>Add User Form</h2>

      <!-- Username input -->
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      
      <!-- Password input -->
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <!-- Email input -->
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" >

      <!-- Gender selection -->
      <label for="gender">Gender:</label>
      <select id="gender" name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>

      <!-- Birth Date input -->
      <label for="birthdate">Birth Date:</label>
      <input type="date" id="birthdate" name="birthdate" >

      <!-- Submit button -->
      <input type="submit" value="Add User">
    </form>
  </div>
</body>
</html>