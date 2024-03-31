<?php
   require_once "admin_session.php";
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
                    <h3 class="card-title">course :: Manage</h3>
                    <a href="course.php" class="card-title" style="float: right;font-weight: bold;"><span>+</span>Add course </a>
                  </div>
                  <div class="card-body">
                    <form id="courseForm" name="courseForm" method="post">
                      <?php 
                        if($conn) {
                          if(isset($_REQUEST['editId'])){
                            $updateId=$_REQUEST['editId'];
                            $sql1 = "SELECT * FROM courses WHERE course_id='".$updateId."'";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1)>0){
                                while($row = mysqli_fetch_assoc($result1)) {
                      ?>
                      
                      <input type="hidden" id="course_page" name="course_page"  value="course">
                      <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="<?php echo $row['course_id'];?>">
                      <div class="form-group">
                        <label for="inputSemester">Semester<span>*</span></label>
                        <select id="inputSemester" name="inputSemester" class="form-control">
                          <option disabled style="font-weight: bold;">Select Semester</option>
                          <?php 
                            $sql2 = "SELECT * FROM semesters";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2)>0){
                              while($row2 = mysqli_fetch_assoc($result2)) {
                          ?>
                                <option value="<?php echo $row2['semester_id'];?>" <?php if($row2['semester_id']==$row['semester_id']){echo 'selected="selected"'; echo 'style="font-weight: bold;"'; }?>><?php echo $row2['semester_name'];?></option> 
                          <?php }}?>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="inputName">Name <span class="warning">*</span></label>
                        <input type="text" id="inputName" name="inputName" class="form-control" value="<?php echo $row['course_name'];?>">
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Description <span class="warning">*</span></label>
                        <textarea id="inputDescription" name="inputDescription" class="form-control"><?php echo $row['course_description'];?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="inputStartDate">Start Date <span class="warning">*</span></label>
                        <input type="date" id="inputStartDate" name="inputStartDate" class="form-control" value="<?php if($row['start_date']!="0000-00-00"){ echo date('Y-m-d', strtotime($row['start_date'])); }else{ echo date('Y-m-d');}?>">
                      </div>
                      <div class="form-group">
                        <label for="inputEndDate">End Date <span class="warning">*</span></label>
                        <input type="date" id="inputEndDate" name="inputEndDate" class="form-control" value="<?php if($row['end_date']!="0000-00-00"){ echo date('Y-m-d', strtotime($row['end_date'])); }else{ echo date('Y-m-d', strtotime('+1 year'));}?>">
                      </div>
                      <div style="display: flex;justify-content: center;align-items: center;">
                        <input type="submit" name="submit" class="btn btn-success submitBtn " value="UPDATE"/>
                      </div>
                      <br>
                      <span class="statusMsg"></span>
                      <?php 
                        }}}else{
                      ?>
                        <input type="hidden" id="course_page" name="course_page"  value="course">
                        <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
                        <div class="form-group">
                        <label for="inputSemester">Semester<span>*</span></label>
                        <select id="inputSemester" name="inputSemester" class="form-control">
                          <option disabled style="font-weight: bold;" selected>Select Semester</option>
                          <?php 
                            $sql2 = "SELECT * FROM semesters";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2)>0){
                              while($row2 = mysqli_fetch_assoc($result2)) {
                          ?>
                                <option value="<?php echo $row2['semester_id'];?>"><?php echo $row2['semester_name'];?></option> 
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
                        <label for="inputStartDate">Start Date <span class="warning">*</span></label>
                        <input type="date" id="inputStartDate" name="inputStartDate" class="form-control" value="<?php echo date("Y-m-d");?>">
                      </div>
                      <div class="form-group">
                        <label for="inputEndDate">End Date <span class="warning">*</span></label>
                        <input type="date" id="inputEndDate" name="inputEndDate" class="form-control" value="<?php echo date('Y-m-d', strtotime('+1 year'));?>">
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
                    $sql1 = "SELECT * FROM courses";
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
                          <th scope="col">Semester Name</th>
                          <th scope="col">Start Date</th>
                          <th scope="col">End Date</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          while($row = mysqli_fetch_assoc($result1)) {
                            $inumber++;
                            $semesterName="";
                            $semid=$row['semester_id'];
                            $sqlSem = "SELECT semester_name FROM semesters WHERE semester_id=$semid";
                            $resultSem = mysqli_query($conn, $sqlSem);
                            if (mysqli_num_rows($resultSem)>0){
                                $rowSem = mysqli_fetch_assoc($resultSem);
                                $semesterName=$rowSem['semester_name'];
                            }
                        ?>
                        <tr>
                          <th scope="row"><?php echo $inumber;?></th>
                          <td><?php echo $row['course_name'];?></td>
                          <td><?php echo $semesterName;?></td>
                          <td><?php echo $row['start_date'];?></td>
                          <td><?php echo $row['end_date'];?></td>
                          <td>
                            <?php if($row['status']==1){?>
                              <a class="btn btn-success btn-sm active_deactive" data-id="<?php echo $row['course_id'];?>" data-status="<?php echo $row['status'];?>" style="margin:5px;border-radius:10%" >
                                Active
                              </a>
                            <?php }else if($row['status']==0){?>
                              <a class="btn btn-danger btn-sm active_deactive" data-id="<?php echo $row['course_id'];?>" data-status="<?php echo $row['status'];?>" style="margin:5px;border-radius:10%" >
                                Deactive
                              </a>
                            <?php }?>
                          </td>
                          <td class="project-actions text-right" >
                            <a class="btn btn-primary btn-sm modalLink" href="#myModal" style="margin:5px;" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['course_id']; ?>" data-name="<?php echo $row['course_name']; ?>" data-description="<?php echo $row['course_description']; ?>" data-start_date="<?php echo $row['start_date']; ?>" data-end_date="<?php echo $row['end_date']; ?>" data-semester="<?php echo $semesterName; ?>">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-danger btn-sm itemDelete" href="#" data-id="<?php echo $row['course_id'];?> " style="margin:5px;">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                            </a>
                            <a class="btn btn-info btn-sm" href="course.php?editId=<?php echo $row['course_id'];?>" style="margin:5px;">
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
    <script src="function/js/function.js"></script>
    <script>
      $('.modalLink').click(function(){

          var mID=$(this).attr('data-id');
          var mName=$(this).attr('data-name');
          var mDescription=$(this).attr('data-description');
          var mStartDate=$(this).attr('data-start_date');
          var mEndDate=$(this).attr('data-end_date');
          var mSemester=$(this).attr('data-semester');

          var mGetcourse='course';
          $.ajax({url:"function/getProfile_fun.php?mID="+mID+"&mName="+mName+"&mDescription="+mDescription+"&mStartDate="+mStartDate+"&mEndDate="+mEndDate+"&mSemester="+mSemester+"&get_course_page="+mGetcourse,cache:false,success:function(result){
              $(".modal-body").html(result);
          }});
      });
      $('.itemDelete').click(function(){
          var mID=$(this).attr('data-id');
          if(!confirm('Are you sure you want to delete this course?')) return false;
           $.post('function/delete_fun.php', {'mID': mID, 'course_del_page': "course"}, function(result){
              alert(result);
              window.location = 'course.php';
          })
      });
      $('.active_deactive').click(function(){
        var mID=$(this).attr('data-id');
        var mStatus=$(this).attr('data-status');
        if(!confirm('Are you sure you want to activat this course?')) return false;
         $.post('function/activation_fun.php', {'mID': mID, 'mStatus': mStatus, 'course_activation_page': "course_activation"}, function(result){
            window.location = 'course.php';
        })
      });
    </script>
  </body>
</html>