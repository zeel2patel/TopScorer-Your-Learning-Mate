<?php
   require_once "faculty_session.php";
   $status=1;
   $FacultyId=$_SESSION['user_id'];
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
  <head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div id="wrapper">
      <?php include('theme/header.php');?>
      <?php include('theme/sidebar.php');?>
        <div class="content-wrapper" style="padding-bottom: 50px;">
          <section class="content" >
            <div class="row" >
              <div class="col-md-12">
                <div class="card card-info" >
                  <div class="card-header">
                    <h3 class="card-title">Grade :: Submit</h3>
                  </div>
                  <div class="card-body">
                    <form id="gradeForm" name="gradeForm" method="post">
                      <input type="hidden" id="grade_page" name="grade_page"  value="grade">
                      <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
                      <input type="hidden" id="inputEnrollmentsId" name="inputEnrollmentsId" class="form-control">
                      <div class="row" >
                        <div class="col-md-4">
                          <label for="inputStudent">Student<span>*</span></label>
                          <select id="inputStudent" name="inputStudent" class="form-control">
                            <option disabled value="0" selected style="font-weight: bold;">Select Student</option>
                            <?php 
                              $sql2 = "SELECT u.*,e.id as enrollID FROM subject as s,enrollments as e,users as u WHERE u.status='".$status."' and s.course_id=e.course_id and s.faculty_id='".$FacultyId."' and e.stud_id=u.id GROUP BY s.course_id";
                              $result2 = mysqli_query($conn, $sql2);
                              if (mysqli_num_rows($result2)>0){
                                while($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                              <option value="<?php echo $row2['id'];?>" data-eid="<?php echo $row2['enrollID'];?>"><?php echo $row2['name'];?></option> 
                            <?php }}?>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="inputAssignments">Assignments<span>*</span></label>
                            <select id="inputAssignments" name="inputAssignments" class="form-control">
                              <option disabled value="0" selected style="font-weight: bold;">Select Assignments</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="inputAssignmentsGrade">Assignments Grade<span class="warning">*</span></label>
                          <input type="number" min="0" max="20"  id="inputAssignmentsGrade" name="inputAssignmentsGrade" class="form-control" >
                        </div>
                        <div class="col-md-1">
                          <input type="submit" name="submit" class="btn btn-success submitBtn " value="SUBMIT"/>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" >
              <div class="col-md-12">
                <div class="card card-info" >
                  <div class="card-header">
                    <h3 class="card-title">Grade :: View</h3>
                  </div>
                  <div class="card-body">
                      <div class="row" >
                        <div class="col-md-4">
                          <label for="inputStudentView">Student<span>*</span></label>
                          <select id="inputStudentView" name="inputStudentView" class="form-control">
                            <option disabled value="0" selected style="font-weight: bold;">Select Student</option>
                            <?php 
                              $sql02 = "SELECT u.*,e.id as enrollID FROM subject as s,enrollments as e,users as u WHERE u.status='".$status."' and s.course_id=e.course_id and s.faculty_id='".$FacultyId."' and e.stud_id=u.id GROUP BY s.course_id";
                              $result02 = mysqli_query($conn, $sql02);
                              if (mysqli_num_rows($result02)>0){
                                while($row02 = mysqli_fetch_assoc($result02)) {
                            ?>
                              <option value="<?php echo $row02['id'];?>" data-eid="<?php echo $row02['enrollID'];?>"><?php echo $row02['name'];?></option> 
                            <?php }}?>
                          </select>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="inputCourse">Course<span>*</span></label>
                            <select id="inputCourse" name="inputCourse" class="form-control">
                              <option disabled value="0" selected style="font-weight: bold;">Select Course</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" >
              <div class="col-md-12" id="gradeDetails">
                
              </div>
            </div>
          </section>
        </div>
      <?php include('theme/footer.php');?>
    </div>
  <?php include('theme/footer_js.php');?>
  <script src="../admin/function/js/function.js"></script>
  <script type="text/javascript">
    $(function() {
      $('#inputStudent').change(function(){
        var mSID=jQuery(this).val();
        var mEID=$(this).find(':selected').attr('data-eid');
        $('#inputEnrollmentsId').val(mEID);
        var mGetAssignments='get_assignments_data';
        $.ajax({url:"../admin/function/getProfile_fun.php?mSID="+mSID+"&get_assignments_data_page="+mGetAssignments,cache:false,success:function(result){
            $("#inputAssignments").html(result);
        }});
      });
      $('#inputStudentView').change(function(){
        var mSID=jQuery(this).val();
        var mEID=$(this).find(':selected').attr('data-eid');
        var mGetStdCourse='get_std_course_data';
        $.ajax({url:"../admin/function/getProfile_fun.php?mSID="+mSID+"&mEID="+mEID+"&get_std_course_data_page="+mGetStdCourse,cache:false,success:function(result){
            $("#inputCourse").html(result);
        }});
      });

      $('#inputCourse').change(function(){
        var mCID=jQuery(this).val();
        var mEID=$(this).find(':selected').attr('data-eid');
        var mSID=$(this).find(':selected').attr('data-sid');
        var mGetGradeDetails='get_grade_details_data';
        $.ajax({url:"../admin/function/getProfile_fun.php?mCID="+mCID+"&mEID="+mEID+"&mSID="+mSID+"&get_grade_details_data_page="+mGetGradeDetails,cache:false,success:function(result){
            $("#gradeDetails").html(result);
        }});
      });
    });
  </script>
  
</body>
</html>