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
        <div class="col-1"></div>
        <div class="col-6">
          <div class="main">
            <h1>Choosing what to study</h1>
              <div class="list-group" style="text-align: left;">
                <ul>
                  <?php 
                      $sql2 = "SELECT * FROM courses";
                      $result2 = mysqli_query($conn, $sql2);
                      if (mysqli_num_rows($result2)>0){
                        while($row2 = mysqli_fetch_assoc($result2)) {
                  ?>
                    <li><a href="course_details.php?cid=<?php echo $row2['course_id'];?>" class="list-group-item list-group-item-action"><i class="fas fa-angle-right"></i> <?php echo $row2['course_name'];?></a></li>
                  <?php }} ?>
                </ul>

              </div>
          </div>
        </div>
        <div class="col-3">
          <div class="main" >
             <h3 style="font-weight: bold;border-radius: 10px;">Student Login</h3>
            <div class="list-group" >
                <a class="btn" href="student/login.php" style="margin:5px;padding: 10px; background-color: #216A97;color: whitesmoke;font-weight: bold;border-radius: 10px;">
                   LOGIN NOW
                </a>
            </div>
        </div>
        <div class="col-2"></div>
        </div>
      </div>
    </div>

    
  </div>
  <?php include('theme/footer.php');?>
</div>
  <?php include('theme/footer_js.php');?>
</body>
</html>

