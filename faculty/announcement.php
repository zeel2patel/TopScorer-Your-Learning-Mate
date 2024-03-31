<?php
   require_once "faculty_session.php";
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
                    <h3 class="card-title">Announcement :: Manage</h3>
                    <a href="announcement.php" class="card-title" style="float: right;font-weight: bold;"><span>+</span>Add announcement </a>
                  </div>
                  <div class="card-body">
                    <form id="announcementForm" name="announcementForm" method="post">
                      <?php 
                        if($conn) {
                          if(isset($_REQUEST['editId'])){
                            $updateId=$_REQUEST['editId'];
                            $sql1 = "SELECT * FROM announcements WHERE id='".$updateId."'";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1)>0){
                                while($row = mysqli_fetch_assoc($result1)) {
                      ?>
                      <input type="hidden" id="announcement_page" name="announcement_page"  value="announcement">
                      <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="<?php echo $row['id'];?>">
                      <div class="form-group">
                        <label for="inputCourse">Course<span>*</span></label>
                        <select id="inputCourse" name="inputCourse" class="form-control">
                          <option disabled value="0" selected style="font-weight: bold;">Select Course</option>
                          <?php 
                            $FacultyId=$_SESSION['user_id'];
                            $sql2 = "SELECT * FROM courses as c,subject as s WHERE c.status='".$status."' and s.faculty_id='".$FacultyId."' and s.course_id=c.course_id";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2)>0){
                              while($row2 = mysqli_fetch_assoc($result2)) {
                          ?>
                            <option value="<?php echo $row2['course_id'];?>" <?php if($row2['course_id ']==$row['course_id ']){echo 'selected="selected"'; echo 'style="font-weight: bold;"'; }?>><?php echo $row2['course_name'];?></option> 
                          <?php }}?>
                        </select>
                      </div>
                      <input type="hidden" id="inputFacultyId" name="inputFacultyId" class="form-control" value="<?php echo $_SESSION['user_id'];?>">
                      <div class="form-group">
                        <label for="inputTitle">Announcement Title<span class="warning">*</span></label>
                        <input type="text" id="inputTitle" name="inputTitle" class="form-control" value="<?php echo $row['title'];?>">
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Announcement Description <span class="warning">*</span></label>
                        <input type="text" id="inputDescription" name="inputDescription" class="form-control" value="<?php echo $row['description'];?>">
                      </div>
                      
                      <div style="display: flex;justify-content: center;align-items: center;">
                        <input type="submit" name="submit" class="btn btn-success submitBtn " value="UPDATE"/>
                      </div>
                      <br>
                      <span class="statusMsg"></span>
                      
                      <?php 
                        }}}else{
                      ?>
                      <input type="hidden" id="announcement_page" name="announcement_page"  value="announcement">
                      <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
                      <div class="form-group">
                        <label for="inputCourse">Course<span>*</span></label>
                        <select id="inputCourse" name="inputCourse" class="form-control">
                          <option disabled value="0" selected style="font-weight: bold;">Select Course</option>
                          <?php 
                            $FacultyId=$_SESSION['user_id'];
                            $sql2 = "SELECT * FROM courses as c,subject as s WHERE c.status='".$status."' and s.course_id=c.course_id and s.faculty_id='".$FacultyId."' GROUP BY c.course_id";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2)>0){
                              while($row2 = mysqli_fetch_assoc($result2)) {
                          ?>
                            <option value="<?php echo $row2['course_id'];?>"><?php echo $row2['course_name'];?></option> 
                          <?php }}?>
                        </select>
                      </div>

                      <input type="hidden" id="inputFacultyId" name="inputFacultyId" class="form-control" value="<?php echo $_SESSION['user_id'];?>">
                      <div class="form-group">
                        <label for="inputTitle">Announcement Title<span class="warning">*</span></label>
                        <input type="text" id="inputTitle" name="inputTitle" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Announcement Description <span class="warning">*</span></label>
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
                    $sql1 = "SELECT * FROM announcements ORDER BY id DESC";
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
                            <a class="btn btn-info btn-sm" href="announcement.php?editId=<?php echo $row['id'];?>" style="margin:5px;">
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
                <h4 class="modal-title" id="myModalLabel">Announcement Information</h4>
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
      var mSubjectName=$(this).attr('data-subject_name');
      var mTitle=$(this).attr('data-title');
      var mDescription=$(this).attr('data-description');
      var mCreateDate=$(this).attr('data-createdate');
      var mUpdateDate=$(this).attr('data-updatedate');
      var mStatus=$(this).attr('data-status');
      var mGetAnnouncement='announcement';
      $.ajax({url:"../admin/function/getProfile_fun.php?mID="+mID+"&mSubjectName="+mSubjectName+"&mTitle="+mTitle+"&mDescription="+mDescription+"&mCreateDate="+mCreateDate+"&mUpdateDate="+mUpdateDate+"&mStatus="+mStatus+"&get_announcement_page="+mGetAnnouncement,cache:false,success:function(result){
          $(".modal-body").html(result);
      }});
    });
    $('.itemDelete').click(function(){
      var mID=$(this).attr('data-id');
      if(!confirm('Are you sure you want to delete this announcement?')) return false;
       $.post('../admin/function/delete_fun.php', {'mID': mID, 'announcements_del_page': "announcements"}, function(result){
          alert(result);
          window.location = 'announcement.php';
      })
    });
    $('.active_deactive').click(function(){
      var mID=$(this).attr('data-id');
      var mStatus=$(this).attr('data-status');
      if(!confirm('Are you sure you want to activat this announcements?')) return false;
       $.post('../admin/function/activation_fun.php', {'mID': mID, 'mStatus': mStatus, 'announcements_activation_page': "announcements_activation"}, function(result){
          window.location = 'announcement.php';
      })
    });
  </script>
</body>
</html>