<?php
$miss = []; // Initialize an empty array to store validation errors.
$errorusername=[];
$errorpassword=[];

// Check if the form was submitted (POST request).
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include the connection script to connect to the database.
    include 'connection.php';

    // Retrieve data from the form and sanitize/escape inputs.
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];

// if you fill it with empty 
if(empty($username)){
  array_push($errorusername,"this field is required"); 
}
  elseif(!preg_match('/^[A-Za-z]+$/',$username)){
    array_push($errorusername,"You can use only letters and spaces");  
//to delete spaces from both side 
$username=trim($username);
// escape special chars
$username=htmlspecialchars($username);
// check that the user name is writen in alpha and spaces only
}


// working on the password
//speical char that can used in the pass word
$pattern = '/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/';

if(empty($password)){
array_push($errorpassword,"this field is required");
}
elseif(strlen($password) < 8){
  array_push($errorpassword,"Password must contain at 8 chars");
}
elseif(!preg_match($pattern ,$password)){
  array_push($errorpassword,"Password must contain at least one special char @,#,%,..");
}

elseif(!preg_match("#[a-z]+#" ,$password)){
  array_push($errorpassword,"Password must contain at least one lowercase char");
}

elseif(!preg_match("#[A-Z]+#" ,$password) ){
  array_push($errorpassword,"Password must contain at least one Uppercase char");
}



    // Check if the username already exists in the database.

    $sql = "SELECT * FROM sign_up WHERE username='$username';";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);

        // Check for validation errors: username already exists or passwords don't match.
        if ($num > 0 || $password != $confirm_password) {
            if ($num > 0) {
                array_push($miss, "username"); // Add "username" error to the array.
            }
            if ($password !== $confirm_password) {
                array_push($miss, "confirmpassword"); // Add "confirmpassword" error to the array.
            }
            // if there is any mistake the insertion will not be done.
        } elseif(empty($miss) && empty($errorpassword) && empty($errorusername)){
            // Hash the password before inserting it into the database.
            //$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insert user data into the database.
            $sql = "INSERT INTO sign_up (username, password, email, gender, birthdate)
            VALUES ('$username', '$password', '$email', '$gender', '$birthdate')";

            $result = mysqli_query($con, $sql);

            if (!$result) {
                die(mysqli_error($con)); // Display any database errors and exit.
                header('location:sign_up.php');
            }else{
              header("location:login.php");
            }
        }
    } else {
        die(mysqli_error($con)); // Display any database errors and exit.
        exit();
      }
    }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <!-- Link to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="signupstyle.css">
</head>
<body>
  <div class="container">
    <!-- Signup form -->
    <form action='' method='POST'>
      <h2>Sign Up Form</h2>

      <!-- Username input -->
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <div class="missint" style="color:red">
        <?php
        // Check if username exists and display an error message if it does

       if(in_array("username",$miss)){
        echo "Sorry, this username already exists".'<br>';
       }elseif(!empty($errorusername)){
        foreach($errorusername as $er){
          echo $er.'<br>';
        }
       }
        ?>
      </div>

      <!-- Password input -->
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <div class="missint" style="color:red">
        <?php
        if(!empty($errorpassword)){
        foreach($errorpassword as $er){
          echo $er.'<br>';
        }
        }
        ?>
        </div>

      <!-- Confirm Password input -->
      <label for="confirm-password">Confirm Password:</label>
      <input type="password" id="confirm-password" name="confirm-password" required>
      <div class="missint" style="color:red">
        <?php
        // Check if passwords match and display an error message if they don't
        if(in_array("confirmpassword",$miss)){
          echo "Sorry, passwords do not match.";
        }
        ?>
      </div>

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
      <input type="submit" value="Sign Up">
    </form>

    <!-- Link to Sign In page -->
    <p class="message">Already have an account? <a href="login.php">Sign In</a></p>
  </div>
</body>
</html>