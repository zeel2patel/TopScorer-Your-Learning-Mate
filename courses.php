<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopScorer - Your Learning Mate</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.jpg">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .dropdown-container {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            margin-bottom: 20px;
        }

        label {
            margin-right: 10px;
            font-weight: bold;
        }

        select {
            padding: 10px 200px;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .dropdown-container {
            margin-bottom: 20px;
        }

        .card-container {
            display: flex;
            flex-direction: column;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .card p {
            color: #666;
            margin-bottom: 10px;
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
        <div class="container">
            <div class="dropdown-container" style="display:flex; justify-content: space-evenly; align-items: center;">
                <label for="departments">Select Department:</label>
                <select id="departments" name="departments">
                    <option selected disabled>All Courses</option>
                    <?php
                    $query = "SELECT * FROM field";
                    $result = mysqli_query($dbc, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row['field_id'] ?>">
                            <?php echo $row['field_name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="card-container">
                <?php
                $coursequery = "SELECT a.*, b.semester_name FROM courses a, semesters b WHERE a.semester_id = b.semester_id";
                $courseresult = mysqli_query($dbc, $coursequery);
                while ($row = mysqli_fetch_assoc($courseresult)) {
                    ?>
                    <div class="card">
                        <h3>
                            <?php echo $row['course_name']; ?>
                        </h3>
                        <p>
                            <?php echo $row['semester_name'] ?>
                        </p>
                        <button><a href="coursedetails.php?course_id=<?php echo $row['course_id']; ?>">Learn More</a></button>
                    </div>
                <?php } ?>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#departments").on('change', function () {
                    var value = $(this).val();

                    $.ajax({
                        url: "display.php",
                        type: "POST",
                        data: 'request=' + value,
                        beforeSend: function () {
                            $(".card-container").html("<span>Working....</span>");
                        },
                        success: function (data) {
                            $(".card-container").html(data);
                        }
                    });
                });
            });
        </script>

        <?php include('Extra/footer_student.php'); ?>

    </body>

    </html>
    <?php
    } else {
        header("location: logout_student.php");
    }
    ?>