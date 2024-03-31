<<<<<<< HEAD
<?php
   require_once "faculty_session.php";
   $facultyId= $_SESSION['user_id'];
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
                <div class="small-box bg-success">
                   <?php 
                    if($conn) {
                        $sql2 = "SELECT count(id) as totalAnnouncements FROM announcements WHERE faculty_id='".$facultyId."'";
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2)>0){
                            while($row2 = mysqli_fetch_assoc($result2)) {
                    ?>
                  <div class="inner">
                    <h3><?php echo $row2['totalAnnouncements'];?><sup style="font-size: 20px"></sup></h3>
                    <p>Total Announcements</p>
                  </div>
                  <?php } } }?>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="announcement.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <?php 
                    if($conn) {
                        $sql3 = "SELECT count(c.course_id) as totalcourses FROM courses as c,subject as s WHERE s.faculty_id='".$facultyId."' and s.course_id=c.course_id";
                        $result3 = mysqli_query($conn, $sql3);
                        if (mysqli_num_rows($result3)>0){
                            while($row3 = mysqli_fetch_assoc($result3)) {
                    ?>
                  <div class="inner">
                    <h3><?php echo $row3['totalcourses'];?><sup style="font-size: 20px"></sup></h3>
                    <p>Courses Allocated</p>
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
                      $status=1;
                       $sql4 = "SELECT count(a.id) as totalAssignments FROM assignments as a, subject as s WHERE s.sub_id=a.sub_id and s.faculty_id='".$facultyId."' and a.status='".$status."'";
                        $result4 = mysqli_query($conn, $sql4);
                        if (mysqli_num_rows($result4)>0){
                            while($row4 = mysqli_fetch_assoc($result4)) {
                    ?>
                  <div class="inner">
                    <h3><?php echo $row4['totalAssignments'];?><sup style="font-size: 20px"></sup></h3>
                    <p>Total Assignments</p>
                  </div>
                  <?php } } }?>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="assignments.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <?php 
                    if($conn) {
                        $sql1 = "SELECT count(e.id) as enroll FROM enrollments as e, courses as c,subject as s WHERE s.faculty_id='".$facultyId."' and s.course_id=c.course_id and c.course_id=e.course_id";

                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1)>0){
                            while($row = mysqli_fetch_assoc($result1)) {
                    ?>
                  <div class="inner">
                    <h3><?php echo $row['enroll'];?></h3>
                    <p>Total Subject</p>
                  </div>
                <?php } } }?>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
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
=======
<?php
  session_start();

  if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    //header('location: login.php');
    //exit;
  }
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title>VikeshPatelOfficial</title>
 
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
                include_once 'function/dbConfig.php';
                if($conn) {
                    $sql1 = "SELECT count(pid) as totalUser FROM inquiry";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1)>0){
                        while($row = mysqli_fetch_assoc($result1)) {
                ?>
              <div class="inner">
                <h3><?php echo $row['totalUser'];?></h3>
                <p>New Orders</p>
              </div>
            <?php } } }?>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="inquire.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
               
               <?php 
                if($conn) {
                    $sql1 = "SELECT count(pid) as totalUser FROM inquiry";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1)>0){
                        while($row = mysqli_fetch_assoc($result1)) {
                ?>
              <div class="inner">
                <h3><?php echo $row['totalUser'];?><sup style="font-size: 20px"></sup></h3>
                <p>Success</p>
              </div>
              <?php } } }?>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php 
                if($conn) {
                    $sql1 = "SELECT count(id) as totalcourses FROM courses";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1)>0){
                        while($row = mysqli_fetch_assoc($result1)) {
                ?>
              <div class="inner">
                <h3><?php echo $row['totalcourses'];?><sup style="font-size: 20px"></sup></h3>
                <p>Courses Provided</p>
              </div>
              <?php } } }?>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="plan_detail.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php 
                if($conn) {
                    $sql1 = "SELECT count(id) as totalServices FROM services";
                    $result1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($result1)>0){
                        while($row = mysqli_fetch_assoc($result1)) {
                ?>
              <div class="inner">
                <h3><?php echo $row['totalServices'];?><sup style="font-size: 20px"></sup></h3>
                <p>Services Provided</p>
              </div>
              <?php } } }?>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="services.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
            
          <div class="row" style="margin-bottom: 50px;">
            <section class="col-lg-7 connectedSortable">
              <div id="pagination" >
                <div class="card">
                  <?php
                    include_once 'function/dbConfig.php';
                        $per_page = 4;
                        if (isset($_GET['page'])) {
                          $page = $_GET['page'] - 1;
                          $offset = $page * $per_page;
                        }
                        else {
                          $page = 0;
                          $offset = 0;
                        } 
                        $sql = "SELECT count(pid) FROM inquiry ORDER by pid ASC";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                         $total_images = $row[0];

                        if ($total_images > $per_page) {
                          $pages_total = ceil($total_images / $per_page);
                          $page_up = $page + 2;
                          $page_down = $page;
                          $display ='';
                        }else {
                          $pages = 1;
                          $pages_total = 1;
                          $display = ' class="display-none"';
                        } 
                    $i = 1;
                    echo '
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="ion ion-clipboard mr-1"></i>
                       <span class="text">INQUIRY LIST</span>
                      </h3>
                      <div class="card-tools">';
                      echo '<div id="pageNav"'.$display.'>';
                        if ($page) {
                          echo '<a href="index.php"><button><<</button></a>';
                          echo '<a href="index.php?page='.$page_down.'"><button><</button></a>';
                        } 

                        for ($i=1;$i<=$pages_total;$i++) {
                          if(($i==$page+1)) {
                            echo '<a href="index.php?page='.$i.'"><button class="active">'.$i.'</button></a>';
                          }
                          if(($i!=$page+1)&&($i<=$page+3)&&($i>=$page-1)) {
                            echo '<a href="index.php?page='.$i.'"><button>'.$i.'</button></a>'; }
                          } 

                          if (($page + 1) != $pages_total) {
                            echo '<a href="index.php?page='.$page_up.'"><button>></button></a>';
                            echo '<a href="index.php?page='.$pages_total.'"><button>>></button></a>';
                          }
                          echo "</div>";
                        
                      echo '</div>
                    </div>';
              echo '<div class="card-body">';
              echo '<ul class="todo-list" data-widget="todo-list">';
                        $result = mysqli_query($conn, "SELECT * FROM inquiry ORDER by pid ASC LIMIT $offset, $per_page");
                        while($row = mysqli_fetch_array($result)) {
                              echo '<li><span class="text">';
                              echo $row['fname'].' '.$row['mname'].' '.$row['lname'];
                              echo '</span>
                              <div class="tools">
                      <a href="inquire.php" >
                        <i class="fas fa-eye" ></i>
                      </a>
                      <i class="fas fa-trash-o"></i>
                    </div>
                    </li>';
                        }  
               echo '</ul>';    
              echo '<div class="clearfix"></div>';
              echo'</div>
                  <div class="card-footer clearfix">
                  </div>';
                   ?>
                </div>
              </div>
            </section>
          </div>
        </section>
      </div>
		<?php include('theme/footer.php');?>
	</div>
	<?php include('theme/footer_js.php');?>
</body>
</html>
>>>>>>> dca3ad7e5005466afc739c01ee917dab6bfcdb2b
