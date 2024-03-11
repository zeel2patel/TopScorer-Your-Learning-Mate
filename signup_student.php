<?php
session_start();
include('Admin/includes/db_connect.php');

$errors = [];

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $recovery = $_POST['account_recovery'];

    if (empty($username)) {
        $errors[] = "<p style='color: red; text-align: center;'>Please enter a username.</p>";
    } elseif (empty($password)) {
        $errors[] = "<p style='color: red; text-align: center;'>Please enter a password.</p>";
    } elseif (empty($email)) {
        $errors[] = "<p style='color: red; text-align: center;'>Please enter an email.</p>";
    } else {
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $email = htmlspecialchars($email);
        $recovery = htmlspecialchars($recovery);
        $user_type = "Student";


        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($dbc, $query);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            $errors[] = "<p style='color: red; text-align: center;'>Username already exists. Please choose a different one.</p>";
        } else {
            $hashed_password = md5($password);

            $insert_query = "INSERT INTO Users (username, password, user_type, email, account_recovery_info) 
                             VALUES (?, ?, ?, ?, ?)";
            $insert_stmt = mysqli_prepare($dbc, $insert_query);

            mysqli_stmt_bind_param($insert_stmt, "sssss", $username, $hashed_password, $user_type, $email, $recovery);

            if (mysqli_stmt_execute($insert_stmt)) {
                header("location: login_student.php");
                exit();
            } else {
                $errors[] = "<p style='color: red; text-align: center;'>Registration failed. Please try again later.</p>";
            }

            mysqli_stmt_close($insert_stmt);
        }

        mysqli_stmt_close($check_stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #333333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #dddddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #ffffff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <form method="POST">
        <h2>Student Registration</h2>
        <?php
        foreach ($errors as $error) {
            echo $error;
        }
        ?>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="account_recovery">Account Recovery Info:</label>
        <input type="text" id="account_recovery" name="account_recovery">

        <input type="submit" name="register">

        <a href="login_student.php">login</a>
    </form>
</body>

</html>