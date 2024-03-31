<?php
  require_once "../admin/function/dbConnection.php";
  require_once "../admin/function/session_check.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TopScorer</title>
    <link rel="stylesheet" type="text/css" href="theme/dist/css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style type="text/css">
      .help-block{
        color: whitesmoke;
      }
    </style>
</head>
<body class="main-bg">
  <div class="login-container   animated flipInX">
    <div class="text-c " style="font-size: 40px;"> <p class="text-orange">Registration</p></div>
    <div class="container-content textcol">
      <form id="facultyForm" name="facultyForm" method="post" >
          <input type="hidden" id="faculty_page" name="faculty_page"  value="faculty">
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
          <div class="form-group">
            <label for="inputCPassword">Confirm Password <span class="warning">*</span></label>
            <input type="Password" id="inputCPassword" name="inputCPassword" class="form-control">
          </div>
           <input type="hidden" id="inputUserType" name="inputUserType" class="form-control" value="faculty">
          <div style="display: flex;justify-content: center;align-items: center;">
            <input type="submit" name="submit" class="btn btn-success submitBtn " value="Register"/>
          </div>
        <br>
        <br>
         <span class="statusMsg"></span>
      </form>
    </div>
      <p class="margin-t text-whitesmoke"><small> TopScorer &copy; 2024</small> </p>
    </div>
  </div>
  <script src="../admin/function/js/function.js"></script>
</body>
</html>