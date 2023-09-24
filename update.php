<?php
// Include the connection.php file to establish a database connection.
include 'connection.php';

// Check if 'name' is set in the URL parameters (GET request).
if (isset($_GET['name'])) {
    $usernamekey = $_GET['name'];

    // Construct the SQL query to retrieve user data by username.
    $sql = "SELECT * FROM sign_up WHERE username='$usernamekey'";
    $result = mysqli_query($con, $sql);
    
    // Check if the query was successful.
    if ($result) {
        // Fetch user data from the result.
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $password = $row['password'];
        $email = $row['email'];
        $gender = $row['gender'];
        $birthdate = $row['birthdate'];
    } else {
        // If the query fails, display the error message and terminate the script.
        die(mysqli_error($con));
    }
} else {
    echo "Sorry, no user name set.";
}

// Check if the request method is POST (form submission).
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include the connection.php file again (shouldn't be necessary if included at the top).
    include 'connection.php';

    // Retrieve user data from the form.
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];

    // Construct the SQL query to update user data by username.
    $sql = "UPDATE sign_up SET username='$username', password='$password', email='$email', gender='$gender', birthdate='$birthdate' WHERE username='$usernamekey'";
    $result = mysqli_query($con, $sql);

    // Check if the update query was successful.
    if (!$result) {
        // If the update fails, display the error message and terminate the script.
        die(mysqli_error($con));
        // Note: The following header line won't be executed after die().
        header('adminuser.php');
    } else {
        // If the update is successful, redirect to adminmain.php.
        header("location:adminmain.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" type="text/css" href="signupstyle.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h2>Update User</h2>
            <!-- Display user data in form fields for editing. -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username ?>" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $password ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email ?>">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="male" <?php if ($gender == 'male') echo 'selected' ?>>Male</option>
                <option value="female" <?php if ($gender == 'female') echo 'selected' ?>>Female</option>
                <option value="other" <?php if ($gender == 'other') echo 'selected' ?>>Other</option>
            </select>
            <label for="birthdate">Birth Date:</label>
            <input type="date" id="birthdate" name="birthdate" value="<?php echo $birthdate ?>">
            <input type="submit" value="Update User">
        </form>
    </div>
</body>
</html>