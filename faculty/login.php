<?php
  session_start();
  error_reporting(0);
  echo $_SESSION["faculty_loggedin"];
  if(isset($_SESSION["admin_loggedin"]) && $_SESSION["admin_loggedin"] === true){
    header("Location:../admin/index.php");
    exit;
  }else if(isset($_SESSION["student_loggedin"]) && $_SESSION["student_loggedin"] === true){
    header("Location:../student/index.php");
    exit;
  }else if(isset($_SESSION["faculty_loggedin"]) && $_SESSION["faculty_loggedin"] === true){
    header("Location:index.php");
    exit;
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TopScorer</title>
    <link rel="stylesheet" type="text/css" href="theme/dist/css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style type="text/css">
      .help-block { color: whitesmoke;}
      .statusMsg{ color: whitesmoke; }
    </style>
</head>
<body class="main-bg">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="register-container  animated flipInX">
          <div class="text-c">
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
            <h2 class="text-orange">Registration</h2>
          </div>
          <div class="container-content">
            <form id="userSelfRegForm" name="userSelfRegForm" method="post" >
              <input type="hidden" id="faculty_reg_page" name="faculty_reg_page"  value="registration">
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
                <label for="inputPassword">Password <span class="warning">*</span></label>
                <input type="Password" id="inputPassword" name="inputPassword" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputCPassword">Confirm Password <span class="warning">*</span></label>
                <input type="Password" id="inputCPassword" name="inputCPassword" class="form-control">
              </div>
              <input type="hidden" id="inputUserType" name="inputUserType" class="form-control" value="faculty">
              <div style="display: flex;justify-content: center;align-items: center;">
                <input type="submit" name="submit" class="form-button button-l margin-b submitBtn " value="Register"/>
              </div>
              <br>
              <span class="statusMsg"></span>
              <div>◄ <a class="text-whitesmoke" style="" href="../index.php"><big>Back to Home</big></a></div>
            </form>
            <p class="margin-t text-whitesmoke text-c"><small> TopScorer &copy; 2024</small> </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6 ">
        <div class="login-container text-c animated flipInX">
          <div>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
            <img src="theme/dist/img/admin.png"  style="width: 100px; height: 100px;border-radius: 50%;" />
            <h4 class="text-orange">Sign In</h4>
          </div>
          <div class="container-content">
            <form id="loginForm" name="loginForm" method="post">
              <input type="hidden" id="login_page" name="login_page"  value="login">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" required="" name="inputEmail" id="inputEmail">
                <span class="help-block username_error"></span>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="*****" required="" name="inputPassword" id="inputPassword" > 
                <span class="help-block password_error"></span>
              </div>
              <input type="hidden" id="inputUserType" name="inputUserType" class="form-control" value="faculty">
              <input type="submit" name="submit" class="form-button button-l margin-b submitBtn " value="Sign In"/>
            <!--  <a class="text-darkyellow" href="password_reset.php"><small>Forgot your password?</small></a>  --><br>
              <br>
              <br>
              <span class="statusMsg1"></span>
              <div>◄ <a class="text-whitesmoke" style="" href="../index.php"><big>Back to Home</big></a></div>
            </form>
            <p class="margin-t text-whitesmoke"><small> TopScorer &copy; 2024</small> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="theme/dist/js/jquery.min.js"></script>
  <script src="../admin/function/js/function.js"></script>
</body>
</html>