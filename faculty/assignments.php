<?php
   require_once "faculty_session.php";
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
                    <h3 class="card-title">Assignments :: Manage</h3>
                    <a href="assignments.php" class="card-title" style="float: right;font-weight: bold;"><span>+</span>Add Assignments </a>
                  </div>
                  <div class="card-body">
                    <form id="assignmentsForm" name="assignmentsForm" method="post">
                      <?php 
                        if($conn) {
                          if(isset($_REQUEST['editId'])){
                            $updateId=$_REQUEST['editId'];
                            $sql1 = "SELECT * FROM assignments WHERE id='".$updateId."'";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1)>0){
                                while($row = mysqli_fetch_assoc($result1)) {
                      ?>
                      <input type="hidden" id="assignments_page" name="assignments_page"  value="assignments">
                      <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="<?php echo $row['id'];?>">
                      <div class="form-group">
                        <label for="inputCourse">Course<span>*</span></label>
                        <select id="inputCourse" name="inputCourse" class="form-control">
                          <option disabled value="0" selected style="font-weight: bold;">Select Course</option>
                          <?php 
                            $FacultyId=$_SESSION['user_id'];
                            $sql2 = "SELECT c.* FROM courses as c, subject as s WHERE s.course_id=c.course_id and s.faculty_id='".$FacultyId."' GROUP BY s.course_id";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2)>0){
                              while($row2 = mysqli_fetch_assoc($result2)) {
                          ?>
                            <option value="<?php echo $row2['course_id '];?>" <?php if($row2['course_id ']==$row['course_id ']){echo 'selected="selected"'; echo 'style="font-weight: bold;"'; }?>><?php echo $row2['course_name'];?></option> 
                          <?php }}?>
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="inputSubject">Subject<span>*</span></label>
                          <select id="inputSubject" name="inputSubject" class="form-control">
                            <option disabled value="0" selected style="font-weight: bold;">Select Subject</option>
                            <?php 
                              $userId=$_SESSION['user_id'];
                              $sql2 = "SELECT * FROM subject WHERE faculty_id='".$userId."'";
                              $result2 = mysqli_query($conn, $sql2);
                              if (mysqli_num_rows($result2)>0){
                                while($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                            <option value="<?php echo $row2['sub_id'];?>" <?php if($row2['sub_id']==$row['sub_id']){echo 'selected="selected" style="font-weight: bold;"'; }?>><?php echo $row2['sub_name'];?></option> 
                            <?php }}?>
                            </select>
                        </div>
                       <input type="hidden" id="inputFacultyId" name="inputFacultyId" class="form-control" value="<?php echo $_SESSION['user_id'];?>">
                      <div class="form-group">
                        <label for="inputName">Name <span class="warning">*</span></label>
                        <input type="text" id="inputName" name="inputName" class="form-control" value="<?php echo $row['assignment_name'];?>">
                      </div>
                      <div class="form-group">
                        <label for="inputDueDate">Due Date <span class="warning">*</span></label>
                        <input type="date" id="inputDueDate" name="inputDueDate" class="form-control" value="<?php if($row['due_date']!="0000-00-00"){ echo date('Y-m-d', strtotime($row['due_date'])); }else{ echo date('Y-m-d');}?>">
                      </div>
                      <div class="form-group">
                        <label for="inputRubricsImage">Rubrics Document <span>*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Browse… <input type="file" id="inputRubricsImage" class="form-control" accept="application/pdf" name="inputRubricsImage" >
                                </span>
                            </span>
                            <input type="text" name="imgRubrics" class="form-control" value="<?php echo $row['rubrics'];?>" readonly >
                        </div>
                        <img id='img-uploadRubrics' src="<?php echo $row['rubrics'];?>" style="max-width: 150px; max-height: 200px;"/>
                      </div>
                      <div class="form-group">
                        <label for="inputAssignmentsImage">Assignments Document <span>*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Browse… <input type="file" id="inputAssignmentsImage" class="form-control" accept="application/pdf" name="inputAssignmentsImage" >
                                </span>
                            </span>
                            <input type="text" name="imgAssignments" class="form-control" value="<?php echo $row['assignment_folder'];?>" readonly >
                        </div>
                        <img id='img-uploadAssignments' src="<?php echo $row['assignment_folder'];?>" style="max-width: 150px; max-height: 200px;"/>
                      </div>
                      <div style="display: flex;justify-content: center;align-items: center;">
                        <input type="submit" name="submit" class="btn btn-success submitBtn " value="UPDATE"/>
                      </div>
                      <br>
                      <span class="statusMsg"></span>
                      
                      <?php 
                        }}}else{
                      ?>
                      <input type="hidden" id="assignments_page" name="assignments_page"  value="assignments">
                      <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
                      <div class="form-group">
                        <label for="inputCourse">Course<span>*</span></label>
                        <select id="inputCourse" name="inputCourse" class="form-control">
                          <option disabled value="0" selected style="font-weight: bold;">Select Course</option>
                          <?php 
                            $FacultyId=$_SESSION['user_id'];
                            $sql2 = "SELECT c.* FROM courses as c, subject as s WHERE s.course_id=c.course_id and s.faculty_id='".$FacultyId."' GROUP BY s.course_id";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2)>0){
                              while($row2 = mysqli_fetch_assoc($result2)) {
                          ?>
                            <option value="<?php echo $row2['course_id'];?>"><?php echo $row2['course_name'];?></option> 
                          <?php }}?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputSubject">Subject<span>*</span></label>
                        <select id="inputSubject" name="inputSubject" class="form-control">
                          <option disabled value="0" selected style="font-weight: bold;">Select Subject</option>
                        </select>
                      </div>
                       <input type="hidden" id="inputFacultyId" name="inputFacultyId" class="form-control" value="<?php echo $_SESSION['user_id'];?>">
                      <div class="form-group">
                        <label for="inputName">Name <span class="warning">*</span></label>
                        <input type="text" id="inputName" name="inputName" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label for="inputDueDate">Due Date <span class="warning">*</span></label>
                        <input type="date" id="inputDueDate" name="inputDueDate" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="inputRubricsImage">Rubrics Document <span>*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Browse… <input type="file" id="inputRubricsImage" class="form-control" accept="application/pdf" name="inputRubricsImage" >
                                </span>
                            </span>
                            <input type="text" name="imgRubrics" class="form-control"  readonly >
                        </div>
                        <img id='img-uploadRubrics' src="" style="max-width: 150px; max-height: 200px;"/>
                      </div>
                      <div class="form-group">
                        <label for="inputAssignmentsImage">Assignments Document <span>*</span></label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Browse… <input type="file" id="inputAssignmentsImage" class="form-control" accept="application/pdf" name="inputAssignmentsImage" >
                                </span>
                            </span>
                            <input type="text" name="imgAssignments" class="form-control"  readonly >
                        </div>
                        <img id='img-uploadAssignments' src="" style="max-width: 150px; max-height: 200px;"/>
                      </div>
                      <div style="display: flex;justify-content: center;align-items: center;">
                        <input type="submit" name="submit" class="btn btn-success submitBtn " value="SUBMIT"/>
                      </div>
                      <br>
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
                    $sql1 = "SELECT * FROM assignments";
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
                          <th scope="col">Assignments Name</th>
                          <th scope="col">Subject Name</th>
                          <th scope="col">Course Name</th>
                          <th scope="col">Status</th>
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
                            <?php if($row['status']==1){?>
                              <a class="btn btn-success btn-sm active_deactive" data-id="<?php echo $row['id'];?>" data-status="<?php echo $row['status'];?>" style="margin:5px;border-radius:10%" >
                                Active
                              </a>
                            <?php }else if($row['status']==0){?>
                              <a class="btn btn-danger btn-sm active_deactive" data-id="<?php echo $row['id'];?>" data-status="<?php echo $row['status'];?>" style="margin:5px;border-radius:10%" >
                                Deactive
                              </a>
                            <?php }?>
                          </td>
                          <td class="project-actions text-right" >
                            <a class="btn btn-primary btn-sm modalLink" href="#myModal" style="margin:5px;" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']; ?>" data-assignment_name="<?php echo $row['assignment_name']; ?>" data-subject_name="<?php echo $SubName; ?>"  data-courseName="<?php echo $CourseName; ?>" data-due_date="<?php echo $row['due_date']; ?>" data-rubrics="<?php echo $row['rubrics']; ?>" data-assignment_folder="<?php echo $row['assignment_folder']; ?>" data-create_date="<?php echo $row['create_date']; ?>" data-status="<?php echo $row['status']; ?>">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-danger btn-sm itemDelete" href="#" data-id="<?php echo $row['id'];?> " style="margin:5px;">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                            </a>
                            <a class="btn btn-info btn-sm" href="assignments.php?editId=<?php echo $row['id'];?>" style="margin:5px;">
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
                <h4 class="modal-title" id="myModalLabel">assignments Information</h4>
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
    $(function() {
      $('#inputCourse').change(function(){
        var mCID=jQuery(this).val();
        var mGetSubject='get_subject_data';
        $.ajax({url:"../admin/function/getProfile_fun.php?mCID="+mCID+"&get_subject_data_page="+mGetSubject,cache:false,success:function(result){
            $("#inputSubject").html(result);
        }});
      });
    });
  </script>
  <script>
    $('.btn-file :file').on('fileselect', function(event, label) {
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
    });
    function rubricsImageURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-uploadRubrics').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inputRubricsImage").change(function(){
            rubricsImageURL(this);
    });
    function assignmentsImageURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img-uploadAssignments').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inputAssignmentsImage").change(function(){
            assignmentsImageURL(this);
    });

    $('.modalLink').click(function(){
      var mID=$(this).attr('data-id');
      var mAssignmentName=$(this).attr('data-assignment_name');
      var mSubjectName=$(this).attr('data-subject_name');
      var mCourseName=$(this).attr('data-courseName');
      var mDueDate=$(this).attr('data-due_date');
      var mRubrics=$(this).attr('data-rubrics');
      var mSubmissionFolder=$(this).attr('data-assignment_folder');
      var mCreateDate=$(this).attr('data-create_date');
      var mStatus=$(this).attr('data-status');
      var mGetAssignment='assignment';
      $.ajax({url:"../admin/function/getProfile_fun.php?mID="+mID+"&mAssignmentName="+mAssignmentName+"&mSubjectName="+mSubjectName+"&mCourseName="+mCourseName+"&mDueDate="+mDueDate+"&mRubrics="+mRubrics+"&mSubmissionFolder="+mSubmissionFolder+"&mCreateDate="+mCreateDate+"&mStatus="+mStatus+"&get_assignment_page="+mGetAssignment,cache:false,success:function(result){
          $(".modal-body").html(result);
      }});
    });
    $('.itemDelete').click(function(){
      var mID=$(this).attr('data-id');
      if(!confirm('Are you sure you want to delete this assignment?')) return false;
       $.post('../admin/function/delete_fun.php', {'mID': mID, 'assignments_del_page': "assignments"}, function(result){
          alert(result);
          window.location = 'assignments.php';
      })
    });
    $('.active_deactive').click(function(){
      var mID=$(this).attr('data-id');
      var mStatus=$(this).attr('data-status');
      if(!confirm('Are you sure you want to activat this assignments?')) return false;
       $.post('../admin/function/activation_fun.php', {'mID': mID, 'mStatus': mStatus, 'assignments_activation_page': "assignments_activation"}, function(result){
          window.location = 'assignments.php';
      })
    });
  </script>
</body>
</html>