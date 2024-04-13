<?php
   require_once "student_session.php";
   $studID= $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>TopScorer</title>
    <?php include('theme/header_css.php'); ?>
    <style type="text/css">
      .upload-btn-wrapper {
          position: relative;
          overflow: hidden;
          display: inline-block;
        }

        .upload-btn-wrapper input[type=file] {
          font-size: 100px;
          position: absolute;
          left: 0;
          top: 0;
          opacity: 0;
        }
    </style>
  <head>
  <body class="hold-transition sidebar-mini layout-fixed" >
    <div id="wrapper">
      <?php include('theme/header.php');?>
      <?php include('theme/sidebar.php');?>
        <div class="content-wrapper" style="padding-bottom: 50px;">
          <section class="content" >
            <div class="row" >
              <div class="col-md-12" >
                <?php 
                  if($conn) {
                    $sql1 = "SELECT c.*,a.*,e.*,s.* FROM assignments as a, enrollments as e,subject as s,courses as c WHERE e.course_id=c.course_id and e.course_id=s.course_id and s.sub_id=a.sub_id and e.stud_id='".$studID."' GROUP BY c.course_id ORDER BY a.id DESC";
                    $result1 = mysqli_query($conn, $sql1);
                    $inumber=0;
                    if (mysqli_num_rows($result1)>0){
                ?>
                <div class="card card-info">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <table class="table table-striped projects text-center">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Course Name</th>
                          <th scope="col">Subject Name</th>
                          <th scope="col">Assignments Name</th>
                          <th scope="col">Due Date</th>
                          <th scope="col">Grade</th>
                          <th scope="col">Download</th>
                        </tr>
                      </thead>
                      <tbody >
                        <?php 
                          while($row = mysqli_fetch_assoc($result1)) {
                            $inumber++;
                            $today = date("Y-m-d");
                            $courseId=$row['course_id'];
                        ?>
                        <tr >
                          <td scope="row"><?php echo  $inumber;?></td>
                          <td scope="row"><?php echo $row['course_name'];?></td>
                            <?php 
                              $GrandAvg=0;
                              $sqlSub = "SELECT * FROM subject WHERE course_id='".$courseId."'";
                              $resultSub = mysqli_query($conn, $sqlSub);
                              if (mysqli_num_rows($resultSub)>0){
                                while($rowSemSub = mysqli_fetch_assoc($resultSub)) {
                                  $subId=$rowSemSub['sub_id'];
                            ?>
                            <tr style="border: hidden;">
                              <td></td>
                              <td></td>
                              <td scope="row"><?php echo $rowSemSub['sub_name'];?></td>
                                <?php 
                                  $totalAvg=0;
                                  $sqlAssi = "SELECT * FROM assignments WHERE sub_id='".$subId."'";
                                  $resultAssi = mysqli_query($conn, $sqlAssi);
                                  if (mysqli_num_rows($resultAssi)>0){
                                    while($rowAssi = mysqli_fetch_assoc($resultAssi)) {
                                      $assignmentId=$rowAssi['id'];
                                ?>
                                <tr >
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td scope="row"><?php echo $rowAssi['assignment_name'];?></td>
                                  <td>
                                    <?php echo $dueDate=$rowAssi['due_date'];?>
                                  </td>
                                  <td class="project-actions text-center">
                                    <?php 
                                        
                                        $sql002 = "SELECT g.grade FROM grades as g WHERE g.assignment_id='".$assignmentId."'";
                                        $result002 = mysqli_query($conn, $sql002);
                                        if (mysqli_num_rows($result002)>0){
                                          while($row002 = mysqli_fetch_assoc($result002)) {
                                            $totalAvg=$totalAvg+$row002['grade'];
                                            $GrandAvg=$GrandAvg+$row002['grade'];
                                            echo $row002['grade'];
                                          }
                                        }else{
                                          echo '--';
                                        }
                                    ?>
                                  </td>
                                  <td> 
                                    <?php if ($today <= $dueDate){?>
                                      <a class="btn btn-success btn-sm" href="<?php echo '../faculty/'.$row['assignment_folder']; ?>"  target="_blank" style="margin:5px;border-radius:10%" > Download Assessment</a>
                                    <?php }else{?>
                                      <a class="btn btn-success btn-sm"  target="_blank" style="margin:5px;border-radius:10%" > Download Assessment</a>
                                    <?php }?>
                                  </td>
                                </tr>
                                <?php } } ?>
                            </tr>
                            <tr scope="row">
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>Subject Total Grade:</td>
                              <td><?php echo $totalAvg;?></td>
                            </tr>
                            <?php } } ?>
                            <tr scope="row">
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>Grant Total Grade:</td>
                              <td><?php echo $GrandAvg;?></td>
                            </tr>
                        </tr>

                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php } } ?>
              </div>
            </div>
          </section>
        </div>
      <?php include('theme/footer.php');?>
    </div>
  <?php include('theme/footer_js.php');?>
  <script src="../admin/function/js/function.js"></script>
</body>
</html>