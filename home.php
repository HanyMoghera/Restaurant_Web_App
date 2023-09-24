<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Food Haven - Restaurant</title>
    <style>
        /* Basic CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        
        .header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff6347;
            color: #fff;
            text-decoration: none;
            margin: 10px;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #ff4500;
        }

        /* Positioning the buttons */
        .login-button {
            float: left;
        }

        .signup-button {
            float: right;
        }

        .user-info-button {
            clear: both;
        }

        /* Restaurant-specific styles */
        .menu {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .menu-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        /* Additional styles for known buttons and elements can be added here */
    </style>
</head>
<body>
    <header class="header">
        <h1>The Food Haven</h1>
        <p>Delight in Our Culinary Creations</p>
        <!-- Navigation Bar -->
<div class="navbar">
    <a href="#home" class="button">Home</a>
    <a href="#menu" class="button">Menu</a>
    <a href="#contact" class="button">Contact Us</a>
    <!-- <a href="login.php" class="button ">Login</a>
    <a href="sign_up.php" class="button ">Sign Up</a> -->
    <a href="admintranslate.php" class="button ">Mangement System</a>
    <a href="sign_up.php" class="button ">Sign Up </a>
    <a href="log_out.php" class="button ">log out </a>

    
</div>
        
    </header>
    <div class="container">
        <section class="menu">
            <h2>Menu</h2>
            <div class="menu-item">
                <h3>Appetizers</h3>
                <p>Explore our delicious range of appetizers.</p>
            </div>
            <div class="menu-item">
                <h3>Main Courses</h3>
                <p>Savor the flavors of our main course dishes.</p>
            </div>
            <div class="menu-item">
                <h3>Desserts</h3>
                <p>Indulge in our mouthwatering desserts.</p>
            </div>
        </section>
        
        <!-- Other sections of your restaurant homepage can go here, like About Us, Contact, Reviews, etc. -->
    </div>
</body>
</html>