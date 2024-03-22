<?php
error_reporting(E_ERROR | E_PARSE);
   include_once 'function/dbConnection.php';
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
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload1{
            width: 100%;
        }
        .
        .img-fluid{
          height: 150px; 
          width: 100%; 
          margin-bottom: 10px; 
          border-radius:20px;
          border: groove;
        }
        .show-p{
          padding-left: 10px;
          margin-top: 20px;
          margin-bottom: 30px;
        }
        .warning{
          color: red;
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
              <div class="col-md-4" >
                <div class="card card-info" >
                  <div class="card-header">
                    <h3 class="card-title">Student :: Manage</h3>
                    <a href="student_add.php" class="card-title" style="float: right;font-weight: bold;"><span>+</span>Add Student </a>
                  </div>
                  <div class="card-body">
                    <form id="studentForm" name="studentForm" method="post">
                      <?php 
                        if($conn) {
                          if(isset($_REQUEST['editId'])){
                            $updateId=$_REQUEST['editId'];
                           
                            $sql1 = "SELECT * FROM users WHERE id='".$updateId."'";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1)>0){
                                while($row = mysqli_fetch_assoc($result1)) {
                      ?>
                      
                      <input type="hidden" id="student_page" name="student_page"  value="student">
                      <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="<?php echo $row['id'];?>">
                      <div class="form-group">
                        <label for="inputName">Name <span class="warning">*</span></label>
                        <input type="text" id="inputName" name="inputName" class="form-control" value="<?php echo $row['name'];?>">
                      </div>
                      <div class="form-group">
                        <label for="inputMobile">Mobile <span class="warning">*</span></label>
                        <input type="text" id="inputMobile" name="inputMobile" class="form-control"value="<?php echo $row['mobile'];?>">
                      </div>
                      <div class="form-group">
                        <label for="inputEmail">Email <span class="warning">*</span></label>
                        <input type="email" id="inputEmail" name="inputEmail" class="form-control" value="<?php echo $row['email'];?>">
                      </div>
                      <div class="form-group">
                        <label for="inputUserName">User Name <span class="warning">*</span></label>
                        <input type="text" id="inputUserName" name="inputUserName" class="form-control" value="<?php echo $row['username'];?>">
                      </div>
                      <div class="form-group">
                        <label for="inputPassword">Password <span class="warning">*</span></label>
                        <input type="Password" id="inputPassword" name="inputPassword" class="form-control" value="<?php echo $row['password'];?>">
                      </div>
                      <input type="hidden" id="inputUserType" name="inputUserType" class="form-control" value="student">

                      <div style="display: flex;justify-content: center;align-items: center;">
                        <input type="submit" name="submit" class="btn btn-success submitBtn " value="UPDATE"/>
                      </div>
                      <br>
                      <br>
                      <span class="statusMsg"></span>
                      <?php 
                        }}}else{
                      ?>
                        <input type="hidden" id="student_page" name="student_page"  value="student">
                        <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
                        <div class="form-group">
                          <label for="inputName">Name <span class="warning">*</span></label>
                          <input type="text" id="inputName" name="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="inputMobile">Mobile <span class="warning">*</span></label>
                          <input type="text" id="inputMobile" name="inputMobile" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="inputEmail">Email <span class="warning">*</span></label>
                          <input type="email" id="inputEmail" name="inputEmail" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="inputUserName">User Name <span class="warning">*</span></label>
                          <input type="text" id="inputUserName" name="inputUserName" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="inputPassword">Password <span class="warning">*</span></label>
                          <input type="Password" id="inputPassword" name="inputPassword" class="form-control">
                        </div>
                         <input type="hidden" id="inputUserType" name="inputUserType" class="form-control" value="student">
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
                <div class="card card-info" >
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">UserName</th>
                          <th scope="col">UserType</th>
                          <th scope="col">Status</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          if($conn) {
                            $userType="admin";
                            $userType1="faculty";
                            $sql1 = "SELECT * FROM users WHERE NOT user_type='".$userType."' and NOT user_type='".$userType1."'";
                            $result1 = mysqli_query($conn, $sql1);
                            $inumber=0;
                            if (mysqli_num_rows($result1)>0){
                                while($row = mysqli_fetch_assoc($result1)) {
                                  $inumber++;
                          ?>
                        <tr>
                          <th scope="row"><?php echo $inumber;?></th>
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['username'];?></td>
                          <td><?php echo $row['user_type'];?></td>
                          <td>
                            <?php if($row['status']==1){?>
                              <label class="btn-primary" style="border-radius:10%">Active</label><br>
                            <?php }else if($row['status']==0){?>
                              <label class="btn-primary" style="border-radius:10%">Deactive</label><br>
                            <?php }?>
                          </td>
                          <td class="project-actions text-right" >
                            <a class="btn btn-primary btn-sm modalLink" href="#myModal" style="margin:5px;" data-toggle="modal" data-target="#myModal" 
                            data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-email="<?php echo $row['email']; ?>" data-mobile="<?php echo $row['mobile']; ?>" data-username="<?php echo $row['username']; ?>" data-password="<?php echo $row['password']; ?>" data-usertype="<?php echo $row['user_type']; ?>"  data-status="<?php echo $row['status']; ?>" data-createdate="<?php echo $row['createdate']; ?>" data-updatedate="<?php echo $row['updatedate']; ?>">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-danger btn-sm itemDelete" href="#" data-id="<?php echo $row['id'];?> " style="margin:5px;">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                            </a>
                          </td>
                        </tr>
                        <?php } } }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Student Information</h4>
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
          var mEmail=$(this).attr('data-email');
          var mMobile=$(this).attr('data-mobile');
          var mUsername=$(this).attr('data-username');
          var mPassword=$(this).attr('data-password');
          var mUsertype=$(this).attr('data-usertype');
          var mStatus=$(this).attr('data-status');
          var mCreatedate=$(this).attr('data-createdate');
          var mUpdatedate=$(this).attr('data-updatedate');

          var mGetStudent='student';
          $.ajax({url:"function/getProfile_fun.php?mID="+mID+"&mName="+mName+"&mEmail="+mEmail+"&mMobile="+mMobile+"&mUsername="+mUsername+"&mPassword="+mPassword+"&mUsertype="+mUsertype+"&mStatus="+mStatus+"&mCreatedate="+mCreatedate+"&mUpdatedate="+mUpdatedate+"&get_student_page="+mGetStudent,cache:false,success:function(result){
              $(".modal-body").html(result);
          }});
      });
      $('.itemDelete').click(function(){
          var mID=$(this).attr('data-id');
          if(!confirm('Are you sure you want to delete this student?')) return false;
           $.post('function/delete_fun.php', {'mID': mID, 'student_del_page': "student"}, function(result){
              alert(result);
              window.location = 'student_add.php';
          })
      });
    </script>
  </body>
</html>