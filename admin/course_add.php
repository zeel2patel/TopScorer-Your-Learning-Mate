<?php
   require_once "function/session_check.php";
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
                      
                      
                      <?php 
                        }}}else{
                      ?>
                        <input type="hidden" id="student_page" name="student_page"  value="student">
                        <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
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
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      <?php include('theme/footer.php');?>
    </div>
    <?php include('theme/footer_js.php');?>
    <script src="function/js/function.js"></script>
  </body>
</html>