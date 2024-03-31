<<<<<<< HEAD
<?php  
    @session_start();
    include_once 'admin/function/dbConnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopScorer - Your Learning Mate</title>
    <?php include('theme/header_css.php');?>

    
</head>
<body >
<div class="wrapper">
  <?php include('theme/header.php'); ?>
  <div class="content">
    <div class="container">
      <div class="row">
        <?php 
            $cid=$_REQUEST['cid'];
            $sql2 = "SELECT * FROM courses WHERE course_id='".$cid."'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2)>0){
                while($row2 = mysqli_fetch_assoc($result2)) {
        ?>

        <div class="col-6">
            <h1><?php echo $row2['course_name'];?></h1>
            <div class="list-group" style="text-align: left;">
                <p><?php echo $row2['course_description'];?></p>
            </div>

        </div>
        <div class="col-2"></div>
        <div class="col-2" style="padding: 20px;">
            <div class="main" >
                 <h3 style="font-weight: bold;border-radius: 10px;">Course Details</h3>
                <div class="list-group" style="text-align: left;">
                    <label style="color: seagreen;">Start Date: <span style="color: darkseagreen;"><?php echo $row2['start_date'];?></span></label>
                </div>
                <div class="list-group" style="text-align: left;">
                    <label style="color: seagreen;">End Date: <span style="color: darkseagreen;"><?php echo $row2['end_date'];?></span></label>
                </div>
                <div class="list-group" >
                    <a class="btn" href="student/login.php?applyId=<?php echo $row2['course_id'];?>" style="margin:5px;padding: 10px; background-color: #216A97;color: whitesmoke;font-weight: bold;border-radius: 10px;">
                       APPLY NOW
                    </a>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    <?php }}?>
      </div>
    </div>

    
  </div>
  <?php include('theme/footer.php');?>
</div>
  <?php include('theme/footer_js.php');?>
</body>
</html>

=======
<?php  
    @session_start();
    include_once 'admin/function/dbConnection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopScorer - Your Learning Mate</title>
    <?php include('theme/header_css.php');?>

    
</head>
<body >
<div class="wrapper">
  <?php include('theme/header.php'); ?>
  <div class="content">
    <div class="container">
      <div class="row">
        <?php 
            $cid=$_REQUEST['cid'];
            $sql2 = "SELECT * FROM courses WHERE course_id='".$cid."'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2)>0){
                while($row2 = mysqli_fetch_assoc($result2)) {
        ?>

        <div class="col-6">
            <h1><?php echo $row2['course_name'];?></h1>
            <div class="list-group" style="text-align: left;">
                <p><?php echo $row2['course_description'];?></p>
            </div>

        </div>
        <div class="col-2"></div>
        <div class="col-2" style="padding: 20px;">
            <div class="main" >
                 <h3 style="font-weight: bold;border-radius: 10px;">Course Details</h3>
                <div class="list-group" style="text-align: left;">
                    <label style="color: seagreen;">Start Date: <span style="color: darkseagreen;"><?php echo $row2['start_date'];?></span></label>
                </div>
                <div class="list-group" style="text-align: left;">
                    <label style="color: seagreen;">End Date: <span style="color: darkseagreen;"><?php echo $row2['end_date'];?></span></label>
                </div>
                <div class="list-group" >
                    <a class="btn" href="student/login.php?applyId=<?php echo $row2['course_id'];?>" style="margin:5px;padding: 10px; background-color: #216A97;color: whitesmoke;font-weight: bold;border-radius: 10px;">
                       APPLY NOW
                    </a>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    <?php }}?>
      </div>
    </div>

    
  </div>
  <?php include('theme/footer.php');?>
</div>
  <?php include('theme/footer_js.php');?>
</body>
</html>

>>>>>>> dca3ad7e5005466afc739c01ee917dab6bfcdb2b
