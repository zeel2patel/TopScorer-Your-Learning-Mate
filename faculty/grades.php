<<<<<<< Updated upstream
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
        <div class="content-wrapper">
          <section class="content" >
            <div class="row" >
              <div class="col-md-4" >
                <div class="card card-info" >
                  <div class="card-header">
                    <h3 class="card-title">Grade :: Manage</h3>
                    <a href="grade.php" class="card-title" style="float: right;font-weight: bold;"><span>+</span>Add Grade </a>
                  </div>
                  <div class="card-body">
                    <form id="gradeForm" name="gradeForm" method="post">
                      <?php 
                        if($conn) {
                          if(isset($_REQUEST['editId'])){
                            $updateId=$_REQUEST['editId'];
                            $sql1 = "SELECT * FROM grades WHERE id='".$updateId."'";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1)>0){
                                while($row = mysqli_fetch_assoc($result1)) {
                      ?>
                     
                      <?php 
                        }}}else{
                      ?>
                      <input type="hidden" id="grade_page" name="grade_page"  value="grade">
                      <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
                      <input type="hidden" id="inputFacultyId" name="inputFacultyId" class="form-control" value="<?php echo $FacultyId;?>">
                      <div class="form-group">
                        <label for="inputStudent">Student<span>*</span></label>
                        <select id="inputStudent" name="inputStudent" class="form-control">
                          <option disabled value="0" selected style="font-weight: bold;">Select Student</option>
                          <?php 
                            $sql2 = "SELECT u.* FROM subject as s,enrollments as e,users as u WHERE u.status='".$status."' and s.course_id=e.course_id and s.faculty_id='".$FacultyId."' and e.stud_id=u.id GROUP BY s.course_id";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2)>0){
                              while($row2 = mysqli_fetch_assoc($result2)) {
                          ?>
                            <option value="<?php echo $row2['id'];?>"><?php echo $row2['name'];?></option> 
                          <?php }}?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputAssignments">Assignments<span>*</span></label>
                        <select id="inputAssignments" name="inputAssignments" class="form-control">
                          <option disabled value="0" selected style="font-weight: bold;">Select Assignments</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputTitle">grade Title<span class="warning">*</span></label>
                        <input type="text" id="inputTitle" name="inputTitle" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">grade Description <span class="warning">*</span></label>
                        <input type="text" id="inputDescription" name="inputDescription" class="form-control">
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
                    $sql1 = "SELECT * FROM grades ORDER BY id DESC";
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
                          <th scope="col">Course Name</th>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Date</th>
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
                          <td>
                            <?php 
                              $CourseId=$row['course_id'];
                              $sqlCourse = "SELECT course_name FROM courses WHERE course_id='".$CourseId."'";
                              $resultCourse = mysqli_query($conn, $sqlCourse);
                              if (mysqli_num_rows($resultCourse)>0){
                                  $rowCourse = mysqli_fetch_assoc($resultCourse);
                                  echo $CourseName= $rowCourse['course_name'];
                              }
                            ?>
                          </td>

                          <td><?php echo substr_replace($row['title'], "...", 10);?></td>
                          <td><?php echo substr_replace($row['description'], "...", 20);?></td>
                          <td><?php echo $row['updatedate'];?></td>
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
                            <a class="btn btn-primary btn-sm modalLink" href="#myModal" style="margin:5px;" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']; ?>" data-subject_name="<?php echo $CourseName; ?>" data-title="<?php echo $row['title']; ?>"  data-description="<?php echo $row['description']; ?>" data-createdate="<?php echo $row['createdate']; ?>" data-updatedate="<?php echo $row['updatedate']; ?>" data-status="<?php echo $row['status']; ?>">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-danger btn-sm itemDelete" href="#" data-id="<?php echo $row['id'];?> " style="margin:5px;">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                            </a>
                            <a class="btn btn-info btn-sm" href="grade.php?editId=<?php echo $row['id'];?>" style="margin:5px;">
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
                <h4 class="modal-title" id="myModalLabel">grade Information</h4>
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
      $('#inputStudent').change(function(){
        var mSID=jQuery(this).val();
        alert(mSID);
        var mGetAssignments='get_assignments_data';
        $.ajax({url:"../admin/function/getProfile_fun.php?mSID="+mSID+"&get_assignments_data_page="+mGetAssignments,cache:false,success:function(result){
            $("#inputAssignments").html(result);
        }});
      });
    });
  </script>
  
</body>
=======
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
        <div class="content-wrapper">
          <section class="content" >
            <div class="row" >
              <div class="col-md-4" >
                <div class="card card-info" >
                  <div class="card-header">
                    <h3 class="card-title">Grade :: Manage</h3>
                    <a href="grade.php" class="card-title" style="float: right;font-weight: bold;"><span>+</span>Add Grade </a>
                  </div>
                  <div class="card-body">
                    <form id="gradeForm" name="gradeForm" method="post">
                      <?php 
                        if($conn) {
                          if(isset($_REQUEST['editId'])){
                            $updateId=$_REQUEST['editId'];
                            $sql1 = "SELECT * FROM grades WHERE id='".$updateId."'";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1)>0){
                                while($row = mysqli_fetch_assoc($result1)) {
                      ?>
                     
                      <?php 
                        }}}else{
                      ?>
                      <input type="hidden" id="grade_page" name="grade_page"  value="grade">
                      <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
                      <input type="hidden" id="inputFacultyId" name="inputFacultyId" class="form-control" value="<?php echo $FacultyId;?>">
                      <div class="form-group">
                        <label for="inputStudent">Student<span>*</span></label>
                        <select id="inputStudent" name="inputStudent" class="form-control">
                          <option disabled value="0" selected style="font-weight: bold;">Select Student</option>
                          <?php 
                            $sql2 = "SELECT u.* FROM subject as s,enrollments as e,users as u WHERE u.status='".$status."' and s.course_id=e.course_id and s.faculty_id='".$FacultyId."' and e.stud_id=u.id GROUP BY s.course_id";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2)>0){
                              while($row2 = mysqli_fetch_assoc($result2)) {
                          ?>
                            <option value="<?php echo $row2['id'];?>"><?php echo $row2['name'];?></option> 
                          <?php }}?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputAssignments">Assignments<span>*</span></label>
                        <select id="inputAssignments" name="inputAssignments" class="form-control">
                          <option disabled value="0" selected style="font-weight: bold;">Select Assignments</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputTitle">grade Title<span class="warning">*</span></label>
                        <input type="text" id="inputTitle" name="inputTitle" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">grade Description <span class="warning">*</span></label>
                        <input type="text" id="inputDescription" name="inputDescription" class="form-control">
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
                    $sql1 = "SELECT * FROM grades ORDER BY id DESC";
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
                          <th scope="col">Course Name</th>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Date</th>
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
                          <td>
                            <?php 
                              $CourseId=$row['course_id'];
                              $sqlCourse = "SELECT course_name FROM courses WHERE course_id='".$CourseId."'";
                              $resultCourse = mysqli_query($conn, $sqlCourse);
                              if (mysqli_num_rows($resultCourse)>0){
                                  $rowCourse = mysqli_fetch_assoc($resultCourse);
                                  echo $CourseName= $rowCourse['course_name'];
                              }
                            ?>
                          </td>

                          <td><?php echo substr_replace($row['title'], "...", 10);?></td>
                          <td><?php echo substr_replace($row['description'], "...", 20);?></td>
                          <td><?php echo $row['updatedate'];?></td>
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
                            <a class="btn btn-primary btn-sm modalLink" href="#myModal" style="margin:5px;" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']; ?>" data-subject_name="<?php echo $CourseName; ?>" data-title="<?php echo $row['title']; ?>"  data-description="<?php echo $row['description']; ?>" data-createdate="<?php echo $row['createdate']; ?>" data-updatedate="<?php echo $row['updatedate']; ?>" data-status="<?php echo $row['status']; ?>">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-danger btn-sm itemDelete" href="#" data-id="<?php echo $row['id'];?> " style="margin:5px;">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                            </a>
                            <a class="btn btn-info btn-sm" href="grade.php?editId=<?php echo $row['id'];?>" style="margin:5px;">
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
                <h4 class="modal-title" id="myModalLabel">grade Information</h4>
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
      $('#inputStudent').change(function(){
        var mSID=jQuery(this).val();
        alert(mSID);
        var mGetAssignments='get_assignments_data';
        $.ajax({url:"../admin/function/getProfile_fun.php?mSID="+mSID+"&get_assignments_data_page="+mGetAssignments,cache:false,success:function(result){
            $("#inputAssignments").html(result);
        }});
      });
    });
  </script>
  
</body>
>>>>>>> Stashed changes
</html>