<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   <title>TopScorer - Your Learning Mate</title>
    <?php include('theme/header_css.php');?>
</head>
<body >
    <div class="wrapper">
      <?php include('theme/header.php'); ?>
        <div class="content">
            <div  class="row m-auto text-center flex">
                <div class="col-md-4">
                    <a href="course_select.php" class="btn btn-dark btn-lg btn-block">
                        <h3>Student Portal</h3>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="faculty/login.php" class="btn btn-dark btn-lg btn-block">
                        <h3>Faculty Portal</h3>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="admin/login.php" class="btn btn-dark btn-lg btn-block">
                        <h3>Admin Portal</h3>
                    </a>
                </div>
            </div>
            <div class="row m-auto flex">
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
        </div>
      <?php include('theme/footer.php');?>
    </div>
  <?php include('theme/footer_js.php');?>
</body>
</html>