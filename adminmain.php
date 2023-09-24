<?php
    include 'connection.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        .container {
            margin: 50px;
        }

        .adduser {
            margin-bottom: 20px;
        }

        .adduser a input[type="button"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .tab {
            width: 100%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #ddd;
        }

        .table td button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .table td button a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="adduser">
            <a href="adminuser.php"><input type="button" name="adduser" value="Add User"></a>
        </div>
        <div class="tab">
            <table class="table">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Birth date</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `sign_up`";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $username = $row['username'];
                                $password = $row['password'];
                                $email = $row['email'];
                                $gender = $row['gender'];
                                $birthdate = $row['birthdate'];

                                echo '
                                <tr>
                                    <td>'.$username.'</td>
                                    <td>'.$password.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$gender.'</td>
                                    <td>'.$birthdate.'</td>
                                    <td>
                                        <button><a href="update.php?name='.$username.'">Update</a></button>
                                        <button><a href="delete.php?name='.$username.'">Delete</a></button>
                                    </td>
                                </tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>