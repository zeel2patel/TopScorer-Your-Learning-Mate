<?php
   require_once "admin_session.php";
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title>TopScorer</title>
	<?php include('theme/header_css.php'); ?>
<head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div id="wrapper">
		<?php include('theme/header.php');?>
		<?php include('theme/sidebar.php');?>
		  <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <?php 
                
                if($conn) {
                    $user_type="faculty";
                    $sql1 = "SELECT count(id) as totalUser FROM users WHERE user_type='".$user_type."'";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1)>0){
                        while($row = mysqli_fetch_assoc($result1)) {
                ?>
              <div class="inner">
                <h3><?php echo $row['totalUser'];?></h3>
                <p>Total Student</p>
              </div>
            <?php } } }?>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="faculty_view.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
               <?php 
                if($conn) {
                    $user_type1="student";
                    $sql2 = "SELECT count(id) as totalUser FROM users WHERE user_type='".$user_type1."'";
                    $result2 = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($result2)>0){
                        while($row2 = mysqli_fetch_assoc($result2)) {
                ?>
              <div class="inner">
                <h3><?php echo $row2['totalUser'];?><sup style="font-size: 20px"></sup></h3>
                <p>Total Faculty</p>
              </div>
              <?php } } }?>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="student.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php 
                if($conn) {
                    $sql3 = "SELECT count(course_id) as totalcourses FROM courses";
                    $result3 = mysqli_query($conn, $sql3);
                    if (mysqli_num_rows($result3)>0){
                        while($row3 = mysqli_fetch_assoc($result3)) {
                ?>
              <div class="inner">
                <h3><?php echo $row3['totalcourses'];?><sup style="font-size: 20px"></sup></h3>
                <p>Courses Provided</p>
              </div>
              <?php } } }?>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="courses.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php 
                if($conn) {
                    $sql4 = "SELECT count(semester_id) as totalSemesters FROM semesters";
                    $result4 = mysqli_query($conn, $sql4);
                    if (mysqli_num_rows($result4)>0){
                        while($row4 = mysqli_fetch_assoc($result4)) {
                ?>
              <div class="inner">
                <h3><?php echo $row4['totalSemesters'];?><sup style="font-size: 20px"></sup></h3>
                <p>Semesters</p>
              </div>
              <?php } } }?>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="semesters.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        </section>
      </div>
		<?php include('theme/footer.php');?>
	</div>
	<?php include('theme/footer_js.php');?>
</body>
</html>
