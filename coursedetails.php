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
        $course_id = $_GET['course_id'];
        $query = "SELECT a.*, b.semester_name FROM courses a, semesters b WHERE a.semester_id = b.semester_id AND a.course_id = $course_id";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($result);

        if (isset($_POST['apply'])) {
            $errors = [];

            $user_id = $_SESSION['user_id'];
            $enrollment_date = date('Y-m-d');

            $chkquery = "SELECT * FROM enrollments WHERE user_id = $user_id AND course_id = $course_id";
            $chkresult = mysqli_query($dbc, $chkquery);
            $count = mysqli_num_rows($chkresult);

            if ($count > 0) {
                $errors[] = "You Already Applied For This Course. Please Select a Different Course To Apply.";
            } else {
                $apply_query = "INSERT INTO enrollments (user_id, course_id, enrollment_date) VALUES (?, ?, ?)";
                $stmt = $dbc->prepare($apply_query);
                $stmt->bind_param("iis", $user_id, $course_id, $enrollment_date);
                $stmt->execute();
                $stmt->close();

                $_SESSION['success_message'] = "Thank You For Applying For The Course. We Will Get Back To You Soon.";
                header("Location: coursedetails.php?course_id=$course_id");
                exit();
            }
        }
        ?>

        <div class="course-description-container">
            <?php
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<p style='color: red; text-align: center;'>$error</p>";
                }
            } elseif (isset($_SESSION['success_message'])) {
                echo "<p style='color: green; text-align: center;'>" . $_SESSION['success_message'] . "</p>";
                unset($_SESSION['success_message']);
            }
            ?>
            <h2><?php echo $row['course_name'] ?></h2>
            <p><b><?php echo $row['semester_name'] ?></b></p>
            <p><?php echo $row['course_description'] ?></p>
            <form method="POST">
                <button name="apply">Apply</button>
            </form>
        </div>

        <?php include('Extra/footer_student.php'); ?>

    </body>

</html>
<?php
    } else {
        header("location: logout_student.php");
    }
?>
