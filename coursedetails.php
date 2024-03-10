<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopScorer - Your Learning Mate</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.jpg">
    <style>
        .course-description-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .course-description-container h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .course-description-container p {
            color: #666;
            margin-top: 10px;
        }

        button {
            display: block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            border: none;
            margin-top: 10px;
        }

        button a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['student_username'])) {
        include('Admin/includes/db_connect.php');
        include('Extra/header_student.php');
        ?>

        <?php
        $query = "SELECT a.*, b.semester_name FROM courses a, semesters b WHERE a.semester_id = b.semester_id";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="course-description-container">
            <h2>
                <?php echo $row['course_name'] ?>
            </h2>
            <p>
                <b>
                    <?php echo $row['semester_name'] ?>
                </b>
            </p>
            <p>
                <?php echo $row['course_description'] ?>
            </p>
            <button><a href="apply.php?course_id=<?php echo $row['course_id']; ?>">Apply</a></button>

        </div>

        <?php include('Extra/footer_student.php'); ?>

    </body>

    </html>
    <?php
    } else {
        header("location: logout_student.php");
    }
    ?>