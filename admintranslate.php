<?php
$mistake = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $passcode = $_POST['passcode'];
    if ($passcode == 123456789) {
        header("location: adminmain.php");
        exit; // Added exit to stop script execution after redirection
    } else {
        $mistake=1;
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Management System</h1>
        <form action="" method="POST">
            <label for="passcode">Enter the passcode:</label>
            <input type="password" id="passcode" name="passcode" required>
            <div style="color:red;">
                <?php
                if($mistake==1){
                    echo "Sorry the passcode is not correct ";
                }
                ?>
            </div>
            <br>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>