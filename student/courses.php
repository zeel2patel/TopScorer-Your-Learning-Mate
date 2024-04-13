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
                    $sql1 = "SELECT c.*,sem.* FROM enrollments as e, courses as c,semesters as sem WHERE e.stud_id='".$studID."' and e.course_id=c.course_id and c.semester_id=sem.semester_id ORDER BY e.id  DESC";
                    $result1 = mysqli_query($conn, $sql1);
                    $inumber=0;
                    if (mysqli_num_rows($result1)>0){
                ?>
                <div class="card card-info" >
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Semester Name</th>
                          <th scope="col">Course Name</th>
                          <th scope="col">Course Start Date</th>
                          <th scope="col">Course End Date</th>
                          <th scope="col" class="text-center">Grade</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          while($row = mysqli_fetch_assoc($result1)) {
                            $inumber++;
                            $courseId=$row['course_id'];
                        ?>
                        <tr>
                          <th scope="row"><?php echo $inumber;?></th>
                          <td><?php echo substr_replace($row['semester_name'], "...", 30);?></td>
                          <td><?php echo substr_replace($row['course_name'], "...", 30);?></td>
                          <td><?php echo $row['start_date'];?></td>
                          <td><?php echo $row['end_date'];?></td>
                          
                          <td class="project-actions text-center">
                            <?php 
                                $totalAvg=0;
                                $sql002 = "SELECT SUM(g.grade) as totalGrade FROM enrollments as e,grades as g WHERE e.stud_id='".$studID."' and e.course_id='".$courseId."' and e.id=g.enrollment_id";
                                $result002 = mysqli_query($conn, $sql002);
                                if (mysqli_num_rows($result002)>0){
                                  $row002 = mysqli_fetch_assoc($result002);
                                   echo $totalAvg=$row002['totalGrade'];
                                }
                            ?>
                          </td>
                          <td class="project-actions text-center" >
                            <?php 
                                $sql2 = "SELECT e.id as enrollId,e.*,c.*,s.*,sem.* FROM enrollments as e, courses as c, subject as s,semesters as sem WHERE  e.stud_id='".$studID."' and e.course_id=c.course_id and s.course_id=c.course_id and c.semester_id=sem.semester_id GROUP BY c.course_id  ORDER BY e.id DESC";
                                $result2 = mysqli_query($conn, $sql2);
                                if (mysqli_num_rows($result2)>0){
                                  while($row01 = mysqli_fetch_assoc($result2)) {
                            ?>
                            <a class="btn btn-primary btn-sm modalLink" href="#myModal" style="margin:5px;" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row01['enrollId']; ?>" data-sub_name="<?php echo $row01['sub_name']; ?>" data-sub_description="<?php echo $row01['sub_description']; ?>" data-sub_img="<?php echo $row01['sub_img']; ?>" data-course_name="<?php echo $row01['course_name']; ?>" data-course_description="<?php echo $row01['course_description']; ?>" data-start_date="<?php echo $row01['start_date']; ?>" data-end_date="<?php echo $row01['end_date']; ?>" data-semester_name="<?php echo $row01['semester_name']; ?>"  >
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <?php 
                              if($totalAvg>=55){
                            ?>
                            <a target="__blank" href="printDiv.php?eid=<?php echo $row01['enrollId']; ?>&courseId=<?php echo $row01['course_id']; ?>" class="btn btn-default"><i class="fa fa-print"></i></a>
                            <?php } }}?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php }else{ ?>
                  <div class="card card-info" >
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <label style="color: limegreen;;">No any Course</label>
                  </div>
                </div>
                <?php } }?>
              </div>
            </div>
          </section>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Course Information</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      <?php include('theme/footer.php');?>
    </div>
  <?php include('theme/footer_js.php');?>
  <script src="../admin/function/js/function.js"></script>
  <script type="text/javascript">
    $('.modalLink').click(function(){
      var mID=$(this).attr('data-id');
      var mSubName=$(this).attr('data-sub_name');
      var mSubDescription=$(this).attr('data-sub_description');
      var mSubIMG=$(this).attr('data-sub_img');
      var mCourseName=$(this).attr('data-course_name');
      var mCourseDescription=$(this).attr('data-course_description');
      var mStartDate=$(this).attr('data-start_date');
      var mEndDate=$(this).attr('data-end_date');
      var mSemesterName=$(this).attr('data-semester_name');
      
      var mGetCourseDetails='courseDetails';
      $.ajax({url:"../admin/function/getProfile_fun.php?mID="+mID+"&mSubName="+mSubName+"&mSubDescription="+mSubDescription+"&mSubIMG="+mSubIMG+"&mCourseName="+mCourseName+"&mCourseDescription="+mCourseDescription+"&mStartDate="+mStartDate+"&mEndDate="+mEndDate+"&mSemesterName="+mSemesterName+"&get_courseDetails_page="+mGetCourseDetails,cache:false,success:function(result){
          $(".modal-body").html(result);
      }});
    });
  </script>
</body>
</html>