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
  <body class="hold-transition sidebar-mini layout-fixed">
    <div id="wrapper">
      <?php include('theme/header.php');?>
      <?php include('theme/sidebar.php');?>
        <div class="content-wrapper">
          <section class="content" >
            <div class="row" >
              <div class="col-md-12" >
                <?php 
                  if($conn) {
                    $sql1 = "SELECT a.id as assessmentId, a.*,e.*,s.* FROM assignments as a, enrollments as e,subject as s WHERE e.course_id=s.course_id and s.sub_id=a.sub_id and e.stud_id='".$studID."' ORDER BY a.id DESC";
                    $result1 = mysqli_query($conn, $sql1);
                    $inumber=0;
                    if (mysqli_num_rows($result1)>0){
                      
                ?>
                <div class="card card-info">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Assignments Name</th>
                          <th scope="col">Subject Name</th>
                          <th scope="col">Course Name</th>
                          <th scope="col">Due Date</th>
                          <th scope="col">Comment</th>
                          <th scope="col">Upload Assignments</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          while($row = mysqli_fetch_assoc($result1)) {
                              $inumber++;
                              $today = date("Y-m-d");
                              $dueDate=$row['due_date'];
                              $assessmentId=$row['assessmentId'];
                        ?>
                        <tr>
                          <th scope="row"><?php echo $inumber;?></th>
                          <td><?php echo $row['assignment_name'];?></td>
                          <td>
                            <?php 
                              $subId=$row['sub_id'];
                              $sqlSub = "SELECT sub_name FROM subject WHERE sub_id='".$subId."'";
                              $resultSub = mysqli_query($conn, $sqlSub);
                              if (mysqli_num_rows($resultSub)>0){
                                $rowSemSub = mysqli_fetch_assoc($resultSub);
                                echo $SubName= $rowSemSub['sub_name'];
                              }
                            ?>
                          </td>
                          <td>
                            <?php 
                              $subId=$row['sub_id'];
                              $sqlCourse = "SELECT course_name FROM courses as c,subject as s WHERE c.course_id =s.course_id and s.sub_id='".$subId."' ";
                              $resultCourse = mysqli_query($conn, $sqlCourse);
                              if (mysqli_num_rows($resultCourse)>0){
                                $rowCourse = mysqli_fetch_assoc($resultCourse);
                                echo $CourseName=$rowCourse['course_name'];
                              }
                            ?>
                          </td>
                          <td>
                            <?php  echo $row['due_date'];?>
                          </td>
                          <?php 
                              
                              $sqlAssess = "SELECT * FROM assignments_student WHERE stud_id='".$studID."' and assignments_id='".$assessmentId."'";
                              $resultAssess = mysqli_query($conn, $sqlAssess);
                              if (mysqli_num_rows($resultAssess)>0){
                          ?>
                          <td></td>
                          <td></td>
                          <td>
                            <a class="btn btn-success btn-sm" style="margin:5px;border-radius:10%" >
                                Assessment Submitted
                            </a>
                          </td>
                          <?php }else{ ?>
                          <form id="assignmentsSubmitForm" name="assignmentsSubmitForm" method="post">
                            <input type="hidden" id="assignments_submit_page" name="assignments_submit_page"  value="assignments_submit">
                            <input type="hidden" id="inputStudentID" name="inputStudentID" class="form-control" value="<?php echo $studID;?>">
                            <input type="hidden" id="inputAssessmentID" name="inputAssessmentID" class="form-control" value="<?php echo $assessmentId;?>">
                            <td>
                              <input type="text" <?php if ($dueDate < $today){ echo "disabled"; } ?> id="inputComment" name="inputComment" class="form-control" >
                            </td>
                            <td>
                              <div class="upload-btn-wrapper" >
                                <button class="btn btn-primary" <?php if ($dueDate < $today){ echo "disabled"; } ?>>Upload Assessment</button>
                                <input type="file" id="inputAssignments" class="form-control" name="inputAssignments"  accept="application/pdf" <?php if ($dueDate < $today){ echo "disabled"; } ?>>
                              </div>
                            </td>
                            <td class="project-actions text-right" >
                              <input type="submit" name="submit" class="btn btn-success submitBtn " value="SUBMIT" <?php if ($dueDate < $today){ echo "disabled"; } ?>/>
                            </td>
                          </form>
                          <?php } ?>
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