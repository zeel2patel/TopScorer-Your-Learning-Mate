<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopScorer - Your Learning Mate</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.jpg">
</head>

<body>
    <?php
    if (isset($_SESSION['student_username'])) {
        include('Admin/includes/db_connect.php');
        include('Extra/header_student.php');
        ?>

        

        <?php include('Extra/footer_student.php'); ?>

    </body>

    </html>
    <?php
    } else {
        header("location: logout_student.php");
    }
    ?>