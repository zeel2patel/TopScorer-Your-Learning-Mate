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
                    <h3 class="card-title">Semester :: Manage</h3>
                    <a href="semester.php" class="card-title" style="float: right;font-weight: bold;"><span>+</span>Add semester </a>
                  </div>
                  <div class="card-body">
                    <form id="semesterForm" name="semesterForm" method="post">
                      <?php 
                        if($conn) {
                          if(isset($_REQUEST['editId'])){
                            $updateId=$_REQUEST['editId'];
                            $sql1 = "SELECT * FROM semesters WHERE semester_id='".$updateId."'";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1)>0){
                                while($row = mysqli_fetch_assoc($result1)) {
                      ?>
                      
                      <input type="hidden" id="semester_page" name="semester_page"  value="semester">
                      <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="<?php echo $row['semester_id'];?>">
                      <div class="form-group">
                        <label for="inputName">Name <span class="warning">*</span></label>
                        <input type="text" id="inputName" name="inputName" class="form-control" value="<?php echo $row['semester_name'];?>">
                      </div>
                      <div style="display: flex;justify-content: center;align-items: center;">
                        <input type="submit" name="submit" class="btn btn-success submitBtn " value="UPDATE"/>
                      </div>
                      <br>
                      <br>
                      <span class="statusMsg"></span>
                      <?php 
                        }}}else{
                      ?>
                        <input type="hidden" id="semester_page" name="semester_page"  value="semester">
                        <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
                        <div class="form-group">
                          <label for="inputName">Name <span class="warning">*</span></label>
                          <input type="text" id="inputName" name="inputName" class="form-control">
                        </div>
                        <div style="display: flex;justify-content: center;align-items: center;">
                          <input type="submit" name="submit" class="btn btn-success submitBtn " value="SUBMIT"/>
                        </div>
                      <br>
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
                    $sql1 = "SELECT * FROM semesters";
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
                          <th scope="col">Name</th>
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
                          <td><?php echo $row['semester_name'];?></td>
                          <td class="project-actions text-right" >
                            <a class="btn btn-primary btn-sm modalLink" href="#myModal" style="margin:5px;" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['semester_id']; ?>" data-name="<?php echo $row['semester_name']; ?>" >
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-danger btn-sm itemDelete" href="#" data-id="<?php echo $row['semester_id'];?> " style="margin:5px;">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                            </a>
                            <a class="btn btn-info btn-sm" href="semester.php?editId=<?php echo $row['semester_id'];?>" style="margin:5px;">
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
                <h4 class="modal-title" id="myModalLabel">Semester Information</h4>
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
          var mGetsemester='semester';
          $.ajax({url:"function/getProfile_fun.php?mID="+mID+"&mName="+mName+"&get_semester_page="+mGetsemester,cache:false,success:function(result){
              $(".modal-body").html(result);
          }});
      });
      $('.itemDelete').click(function(){
          var mID=$(this).attr('data-id');
          if(!confirm('Are you sure you want to delete this semester?')) return false;
           $.post('function/delete_fun.php', {'mID': mID, 'semester_del_page': "semester"}, function(result){
              alert(result);
              window.location = 'semester.php';
          })
      });
    </script>
  </body>
</html>