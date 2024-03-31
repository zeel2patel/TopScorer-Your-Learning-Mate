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
                    $status=1;
                    $sql1 = "SELECT e.*,c.*,s.*,sem.* FROM enrollments as e, courses as c, subject as s,semesters as sem WHERE  e.stud_id='".$studID."' and e.course_id=c.course_id and s.course_id=c.course_id and c.semester_id=sem.semester_id  ORDER BY e.id DESC";
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
                          <th scope="col">Subject Name</th>
                          <th scope="col">Course Name</th>
                          <th scope="col">Semester Name</th>
                          <th scope="col">Course Start Date</th>
                          <th scope="col">Course End Date</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          while($row = mysqli_fetch_assoc($result1)) {
                            $inumber++;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $inumber;?></th>
                          <td><?php echo substr_replace($row['sub_name'], "...", 30);?></td>
                          <td><?php echo substr_replace($row['course_name'], "...", 30);?></td>
                          <td><?php echo substr_replace($row['semester_name'], "...", 30);?></td>
                          <td><?php echo $row['start_date'];?></td>
                          <td><?php echo $row['end_date'];?></td>
                          
                          <td class="project-actions text-right" >
                            <a class="btn btn-primary btn-sm modalLink" href="#myModal" style="margin:5px;" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']; ?>" data-sub_name="<?php echo $row['sub_name']; ?>" data-sub_description="<?php echo $row['sub_description']; ?>" data-sub_img="<?php echo $row['sub_img']; ?>" data-course_name="<?php echo $row['course_name']; ?>" data-course_description="<?php echo $row['course_description']; ?>" data-start_date="<?php echo $row['start_date']; ?>" data-end_date="<?php echo $row['end_date']; ?>" data-semester_name="<?php echo $row['semester_name']; ?>"  >
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
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