<?php
include('Extra/header_student.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopScorer - Your Learning Mate</title>
    <style>
        .btn {
            display: block;
            padding: 15px;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            width: 25%;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 200px;
        }

        .card h2 {
            color: #333;
        }

        .card p {
            color: #666;
        }

        .card a.cta-button {
            background-color: #333;
            color: #fff;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="row m-auto text-center flex">
        <div class="col-md-4">
            <a href="user/login_student.php" class="btn btn-primary btn-lg btn-block">
                <h3>Student Portal</h3>
            </a>
        </div>
        <div class="col-md-4">
            <a href="faculty_portal.php" class="btn btn-success btn-lg btn-block">
                <h3>Faculty Portal</h3>
            </a>
        </div>
        <div class="col-md-4">
            <a href="admin/login_student.php" class="btn btn-danger btn-lg btn-block">
                <h3>Admin Portal</h3>
            </a>
        </div>
    </div>

    <div class="row">
        <section class="card">
            <h2>About Us</h2>
            <p>
                TopScorer is a sophisticated online platform designed to revolutionize academic practices.
                We provide efficient and effective management solutions for educational establishments.
                Our goal is to transform the way education is conducted by introducing innovative and
                comprehensive tools for seamless academic operations.
            </p>
            <a href="#" class="cta-button">Get Started</a>
        </section>

        <section class="card">
            <h2>Our Mission</h2>
            <p>
                At TopScorer, our mission is to empower educators and students through cutting-edge technology.
                We strive to enhance learning experiences and foster academic success by offering adaptable solutions
                that meet the evolving needs of educational institutions worldwide.
            </p>
        </section>

        <section class="card">
            <h2>Key Features</h2>
            <ul>
                <li>Efficient Student Management</li>
                <li>Attendance Tracking</li>
                <li>Grading and Assessment</li>
                <li>Adaptable to Changing Educational Needs</li>
                <li>User-Friendly Interface</li>
            </ul>
        </section>
    </div>

</body>

</html>

<?php
include('Extra/footer_student.php');
?>