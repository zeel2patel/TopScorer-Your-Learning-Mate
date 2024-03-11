<?php
session_start();
include('Admin/includes/db_connect.php');

if (isset($_POST['student_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $errors = [];

    if ($username == null) {
        $errors[] = "<p style='color: red; text-align: center;'>Please enter a username.</p>";
    } elseif ($password == null) {
        $errors[] = "<p style='color: red; text-align: center;'>Please enter a password.</p>";
    } else {
        $username = htmlspecialchars($username);

        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            $adminpassword = $row["password"];

            if (md5($password) == $adminpassword) {
                $_SESSION['student_username'] = $username;
                $_SESSION['user_id'] = $row['user_id'];
                header("location: courses.php");
            } else {
                $errors[] = "<p style='color: red; text-align: center;'>Username or Password is incorrect.</p>";
            }
        } else {
            $errors[] = "<p style='color: red; text-align: center;'>Username is incorrect.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
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
        <h2>Student Login</h2>
        <?php
        if (!empty($errors)) {
            foreach ($errors as $error) {
              echo $error;
            }
          }
        ?>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <input type="submit" name="student_login">
        <a href="signup_student.php">signup</a>
    </form>
</body>

</html>