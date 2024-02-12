<?php
include('Extra/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopScorer - Courses</title>
</head>
<body>

  <div class="home-div"></div>
   <div class="w-100 in-ad-ap">
  <div class="row m-auto text-center">
  <div class="col-md-4">
    <a href="user/login.php" class="btn btn-primary btn-lg btn-block">
        <h3>Student Portal</h3>
    </a>
</div>
<div class="col-md-4">
    <a href="faculty_portal.php" class="btn btn-success btn-lg btn-block">
        <h3>Faculty Portal</h3>
    </a>
</div>
<div class="col-md-4">
    <a href="admin/login.php" class="btn btn-danger btn-lg btn-block">
        <h3>Admin Portal</h3>
    </a>
</div>

  </div>
  </div>

    <section>
        <h2>Available Courses</h2>
        <div class="course-list">
            <div class="course">
                <h3>Course Title 1</h3>
                <p>Description of Course 1</p>
                <a href="apply.php?course_id=1" class="apply-button">Apply</a>
                <a href="course_details.php?course_id=1" class="details-button">View Details</a>
            </div>
            <div class="course">
                <h3>Course Title 2</h3>
                <p>Description of Course 2</p>
                <a href="apply.php?course_id=2" class="apply-button">Apply</a>
                <a href="course_details.php?course_id=2" class="details-button">View Details</a>
            </div>
        </div>
    </section>

</body>
</html>

<?php
include('Extra/footer.php');
?>
