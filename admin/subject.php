<?php
   require_once "admin_session.php";
   $status=1;
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
        <div class="content-wrapper">
          <section class="content" >
            <div class="row" >
              <div class="col-md-4" >
                <div class="card card-info" >
                  <div class="card-header">
                    <h3 class="card-title">subject :: Manage</h3>
                    <a href="subject.php" class="card-title" style="float: right;font-weight: bold;"><span>+</span>Add subject </a>
                  </div>
                  <div class="card-body">
                    <form id="subjectForm" name="subjectForm" method="post">
                      <?php 
                        if($conn) {
                          if(isset($_REQUEST['editId'])){
                            $updateId=$_REQUEST['editId'];
                            $sql1 = "SELECT * FROM subject WHERE sub_id='".$updateId."'";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1)>0){
                                while($row = mysqli_fetch_assoc($result1)) {
                      ?>
                      
                      <input type="hidden" id="subject_page" name="subject_page"  value="subject">
                      <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="<?php echo $row['sub_id'];?>">
                      <div class="form-group">
                        <label for="inputFaculty">Faculty Name<span>*</span></label>
                        <select id="inputFaculty" name="inputFaculty" class="form-control">
                          <option disabled value="0" selected style="font-weight: bold;">Select Faculty</option>
                          <?php 
                            $UserType="faculty";
                            $sqlUser = "SELECT * FROM users WHERE user_type='".$UserType."' and status='".$status."'";
                            $resultUser = mysqli_query($conn, $sqlUser);
                            if (mysqli_num_rows($resultUser)>0){
                              while($rowUser = mysqli_fetch_assoc($resultUser)) {
                          ?>
                          <option value="<?php echo $rowUser['id'];?>" <?php if($rowUser['id']==$row['faculty_id']){echo 'selected="selected" style="font-weight: bold;"'; }?>><?php echo $rowUser['name'];?></option> 
                          <?php }}?>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="inputCourse">Course<span>*</span></label>
                        <select id="inputCourse" name="inputCourse" class="form-control">
                          <option disabled value="0" selected style="font-weight: bold;">Select Course</option>
                          <?php 
                            $sql2 = "SELECT * FROM courses WHERE status='".$status."'";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2)>0){
                              while($row2 = mysqli_fetch_assoc($result2)) {
                          ?>
                            <option value="<?php echo $row2['course_id'];?>" <?php if($row2['course_id ']==$row['course_id ']){echo 'selected="selected"'; echo 'style="font-weight: bold;"'; }?>><?php echo $row2['course_name'];?></option> 
                          <?php }}?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputName">Name <span class="warning">*</span></label>
                        <input type="text" id="inputName" name="inputName" class="form-control" value="<?php echo $row['sub_name'];?>">
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Description <span class="warning">*</span></label>
                        <textarea id="inputDescription" name="inputDescription" class="form-control"><?php echo $row['sub_description'];?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="inputSubImage">Subject Image <span>*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Browse… <input type="file" id="inputSubImage" class="form-control" accept="image/*" name="inputSubImage" >
                                </span>
                            </span>
                            <input type="text" name="img1" class="form-control" value="<?php echo $row['sub_img'];?>" readonly >
                        </div>
                        <img id='img-upload1' src="<?php echo $row['sub_img'];?>" style="max-width: 150px; max-height: 200px;"/>
                      </div>
                      <div style="display: flex;justify-content: center;align-items: center;">
                        <input type="submit" name="submit" class="btn btn-success submitBtn " value="UPDATE"/>
                      </div>
                      <br>
                      <span class="statusMsg"></span>
                      <?php 
                        }}}else{
                      ?>
                        <input type="hidden" id="subject_page" name="subject_page"  value="subject">
                        <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
                        
                        <div class="form-group">
                          <label for="inputFaculty">Faculty Name<span>*</span></label>
                          <select id="inputFaculty" name="inputFaculty" class="form-control">
                            <option disabled value="0" selected style="font-weight: bold;">Select Faculty</option>
                           <?php 
                              $UserType="faculty";
                              $sqlUser = "SELECT * FROM users WHERE user_type='".$UserType."' and status='".$status."'";
                              $resultUser = mysqli_query($conn, $sqlUser);
                              if (mysqli_num_rows($resultUser)>0){
                                while($rowUser = mysqli_fetch_assoc($resultUser)) {
                            ?>
                            <option value="<?php echo $rowUser['id'];?>"><?php echo $rowUser['name'];?></option> 
                          <?php  }} ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="inputCourse">Course<span>*</span></label>
                          <select id="inputCourse" name="inputCourse" class="form-control">
                            <option disabled value="0" selected style="font-weight: bold;">Select Course</option>
                            <?php 
                              $sql2 = "SELECT * FROM courses WHERE status='".$status."'";
                              $result2 = mysqli_query($conn, $sql2);
                              if (mysqli_num_rows($result2)>0){
                                while($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                            <option value="<?php echo $row2['course_id'];?>"><?php echo $row2['course_name'];?></option> 
                            <?php }}?>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="inputName">Name <span class="warning">*</span></label>
                          <input type="text" id="inputName" name="inputName" class="form-control" >
                        </div>
                        <div class="form-group">
                          <label for="inputDescription">Description <span class="warning">*</span></label>
                          <textarea id="inputDescription" name="inputDescription" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="inputSubImage">Subject Image <span>*</span></label>
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-default btn-file">
                                      Browse… <input type="file" id="inputSubImage" name="inputSubImage" class="form-control" accept="image/*"  >
                                  </span>
                              </span>
                              <input type="text" name="img1" class="form-control"  readonly >
                          </div>
                          <img id='img-upload1' style="max-width: 150px; max-height: 200px;" />
                        </div>
                        <div style="display: flex;justify-content: center;align-items: center;">
                          <input type="submit" name="submit" class="btn btn-success submitBtn " value="SUBMIT"/>
                        </div>
                        <span class="statusMsg"></span>
                      <?php 
                        }}
                      ?>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-8" >
                <?php 
                  if($conn) {
                    $sql1 = "SELECT * FROM subject";
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
                          <th scope="col">Semester Name</th>
                          <th scope="col">Course Name</th>
                          <th scope="col">Faculty Name</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          while($row = mysqli_fetch_assoc($result1)) {
                            $inumber++;
                            $CourseId=$row['course_id'];
                        ?>
                        <tr>
                          <th scope="row"><?php echo $inumber;?></th>
                          <td><?php echo $row['sub_name'];?></td>
                          <td>
                            <?php 
                              $sqlSem = "SELECT semester_name FROM semesters as sem,courses as c WHERE c.semester_id=sem.semester_id and c.course_id='".$CourseId."'";
                              $resultSem = mysqli_query($conn, $sqlSem);
                              if (mysqli_num_rows($resultSem)>0){
                                  $rowSem = mysqli_fetch_assoc($resultSem);
                                  echo $semesterName= $rowSem['semester_name'];
                              }
                            ?>
                          </td>
                          <td>
                            <?php 
                              $CourseName="";
                              $sqlCourse = "SELECT course_name FROM courses WHERE course_id=$CourseId";
                              $resultCourse = mysqli_query($conn, $sqlCourse);
                              if (mysqli_num_rows($resultCourse)>0){
                                  $rowCourse = mysqli_fetch_assoc($resultCourse);
                                  echo $CourseName=$rowCourse['course_name'];
                              }
                            ?>
                          </td>
                            <td>
                            <?php 
                              $FacultyName="";
                              $FacultyId =$row['faculty_id'];
                              $sqlFaculty = "SELECT name FROM users WHERE id='".$FacultyId."'";
                              $resultFaculty = mysqli_query($conn, $sqlFaculty);
                              if (mysqli_num_rows($resultFaculty)>0){
                                  $rowFaculty = mysqli_fetch_assoc($resultFaculty);
                                  echo $FacultyName=$rowFaculty['name'];
                              }
                            ?>
                          </td>
                          <td class="project-actions text-right" >
                            <a class="btn btn-primary btn-sm modalLink" href="#myModal" style="margin:5px;" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['sub_id']; ?>" data-name="<?php echo $row['sub_name']; ?>" data-description="<?php echo $row['sub_description']; ?>" data-sub_img="<?php echo $row['sub_img']; ?>" data-semesterName="<?php echo $semesterName; ?>" data-courseName="<?php echo $CourseName; ?>" data-facultyName="<?php echo $FacultyName; ?>">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-danger btn-sm itemDelete" href="#" data-id="<?php echo $row['sub_id'];?> " style="margin:5px;">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                            </a>
                            <a class="btn btn-info btn-sm" href="subject.php?editId=<?php echo $row['sub_id'];?>" style="margin:5px;">
                              <i class="fas fa-pencil-alt">
                              </i>
                               Edit
                            </a>
                          </td>
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
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Subject Information</h4>
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
  <script src="function/js/function.js"></script>
  <script type="text/javascript">
      $(function() {
        $('#inputSemester').change(function(){
          var mID=jQuery(this).val();
          var mGetCourse='get_course_data';
          $.ajax({url:"function/getProfile_fun.php?mID="+mID+"&get_course_data_page="+mGetCourse,cache:false,success:function(result){
              $("#inputCourse").html(result);
          }});
        });
      });
  </script>
  <script>
    $('.modalLink').click(function(){
      var mID=$(this).attr('data-id');
      var mName=$(this).attr('data-name');
      var mDescription=$(this).attr('data-description');
      var mSubImg=$(this).attr('data-sub_img');
      var mSemesterName=$(this).attr('data-semesterName');
      var mCourseName=$(this).attr('data-courseName');
      var mGetsubject='subject';
      $.ajax({url:"function/getProfile_fun.php?mID="+mID+"&mName="+mName+"&mDescription="+mDescription+"&mSubImg="+mSubImg+"&mSemesterName="+mSemesterName+"&mCourseName="+mCourseName+"&get_subject_page="+mGetsubject,cache:false,success:function(result){
          $(".modal-body").html(result);
      }});
    });
    $('.itemDelete').click(function(){
      var mID=$(this).attr('data-id');
      if(!confirm('Are you sure you want to delete this subject?')) return false;
       $.post('function/delete_fun.php', {'mID': mID, 'subject_del_page': "subject"}, function(result){
          alert(result);
          window.location = 'subject.php';
      })
    });
    $('.active_deactive').click(function(){
      var mID=$(this).attr('data-id');
      var mStatus=$(this).attr('data-status');
      if(!confirm('Are you sure you want to activat this subject?')) return false;
       $.post('function/activation_fun.php', {'mID': mID, 'mStatus': mStatus, 'subject_activation_page': "subject_activation"}, function(result){
          window.location = 'subject.php';
      })
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
    });
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-upload1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inputSubImage").change(function(){
            readURL1(this);
    });
  </script>
</body>
</html>