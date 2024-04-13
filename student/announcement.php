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
                    $sql1 = "SELECT a.id as aid,a.*,e.* FROM announcements as a, enrollments as e WHERE  e.course_id=a.course_id and e.stud_id='".$studID."' and a.status='".$status."' ORDER BY a.id DESC";
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
                              $courseId=$row['course_id'];
                              $sqlCourse = "SELECT course_name FROM courses WHERE course_id='".$courseId."'";
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
                          
                          <td class="project-actions text-right" >
                            <a class="btn btn-primary btn-sm modalLink" href="#myModal" style="margin:5px;" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id']; ?>" data-subject_name="<?php echo $CourseName; ?>" data-title="<?php echo $row['title']; ?>"  data-description="<?php echo $row['description']; ?>" data-createdate="<?php echo $row['createdate']; ?>" data-updatedate="<?php echo $row['updatedate']; ?>" data-status="<?php echo $row['status']; ?>">
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
                    <label style="color: limegreen;;">No any Announcement by faculty </label>
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
  </script>
</body>
</html>