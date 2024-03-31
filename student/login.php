<<<<<<< HEAD
<?php
  session_start();
  error_reporting(0);

  if(isset($_SESSION["admin_loggedin"]) && $_SESSION["admin_loggedin"] === true){
    header("Location:../admin/index.php");
    exit;
  }else if(isset($_SESSION["student_loggedin"]) && $_SESSION["student_loggedin"] === true){
    header("Location:index.php");
    exit;
  }else if(isset($_SESSION["faculty_loggedin"]) && $_SESSION["faculty_loggedin"] === true){
    header("Location:../faculty/index.php");
    exit;
  }
    if(isset($_REQUEST['login'])){
      $_SESSION['select_semesters']="";
      $_SESSION['select_course'] = "";
      $_SESSION['select_subject'] = "";
      $_SESSION['select_semesters']=null;
      $_SESSION['select_course'] = null;
      $_SESSION['select_subject'] = null;
      header("Location:index.php");
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
      a:hover {color: yellow;}
    </style>
</head>
<body class="main-bg">
  <div class="container-fluid">
    <div class="row">
      <?php
          if(!isset($_REQUEST['applyId'])){
      ?>
        <div class="col-sm-12 col-md-12 col-lg-12 ">
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
                <input type="hidden" id="inputUserType" name="inputUserType" class="form-control" value="student">
                <input type="submit" name="submit" class="form-button button-l margin-b submitBtn " value="Sign In"/>
                <a class="text-darkyellow" href="password_reset.php"><small>Forgot your password?</small></a> <br>
                <br>
                <br>
                <span class="statusMsg1"></span>
                <div>◄ <a class="text-whitesmoke" style="" href="../index.php"><big>Back to Home</big></a></div>
              </form>
              <p class="margin-t text-whitesmoke"><small> TopScorer &copy; 2024</small> </p>
            </div>
          </div>
        </div>
      <?php
          }else if(isset($_REQUEST['applyId'])){
      ?>
        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="register-container  animated flipInX">
            <div class="text-c">
              <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
              <h2 class="text-orange">Registration</h2>
            </div>
            <div class="container-content">
              <form id="userSelfRegForm" name="userSelfRegForm" method="post" >
                <input type="hidden" id="user_self_reg_page" name="user_self_reg_page"  value="registration">
                <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
                <input type="hidden" id="inputCourseId" name="inputCourseId" class="form-control" value="<?php echo $_REQUEST['applyId'];?>">
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
                <input type="hidden" id="inputUserType" name="inputUserType" class="form-control" value="student">
                <div style="display: flex;justify-content: center;align-items: center;">
                  <input type="submit" name="submit" class="form-button button-l margin-b submitBtn " value="Register"/>
                </div>
                <div style="visibility: hidden;display: none;justify-content: center;align-items: center;" class="login_btn2">
                  <a class="text-whitesmoke btn btn-success"  href="login.php"><big>Login</big></a>
                </div>
                <br>
                <span class="statusMsg"></span>
              </form>
              <p class="margin-t text-whitesmoke text-c"><small> TopScorer &copy; 2024</small> </p>
            </div>
          </div>
        </div>
      <?php
          }
      ?>
    </div>
  </div>
  <script src="theme/dist/js/jquery.min.js"></script>
  <script src="../admin/function/js/function.js"></script>
</body>
=======
<?php
  session_start();
  error_reporting(0);

  if(isset($_SESSION["admin_loggedin"]) && $_SESSION["admin_loggedin"] === true){
    header("Location:../admin/index.php");
    exit;
  }else if(isset($_SESSION["student_loggedin"]) && $_SESSION["student_loggedin"] === true){
    header("Location:index.php");
    exit;
  }else if(isset($_SESSION["faculty_loggedin"]) && $_SESSION["faculty_loggedin"] === true){
    header("Location:../faculty/index.php");
    exit;
  }
    if(isset($_REQUEST['login'])){
      $_SESSION['select_semesters']="";
      $_SESSION['select_course'] = "";
      $_SESSION['select_subject'] = "";
      $_SESSION['select_semesters']=null;
      $_SESSION['select_course'] = null;
      $_SESSION['select_subject'] = null;
      header("Location:index.php");
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
      a:hover {color: yellow;}
    </style>
</head>
<body class="main-bg">
  <div class="container-fluid">
    <div class="row">
      <?php
          if(!isset($_REQUEST['applyId'])){
      ?>
        <div class="col-sm-12 col-md-12 col-lg-12 ">
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
                <input type="hidden" id="inputUserType" name="inputUserType" class="form-control" value="student">
                <input type="submit" name="submit" class="form-button button-l margin-b submitBtn " value="Sign In"/>
                <a class="text-darkyellow" href="password_reset.php"><small>Forgot your password?</small></a> <br>
                <br>
                <br>
                <span class="statusMsg1"></span>
                <div>◄ <a class="text-whitesmoke" style="" href="../index.php"><big>Back to Home</big></a></div>
              </form>
              <p class="margin-t text-whitesmoke"><small> TopScorer &copy; 2024</small> </p>
            </div>
          </div>
        </div>
      <?php
          }else if(isset($_REQUEST['applyId'])){
      ?>
        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="register-container  animated flipInX">
            <div class="text-c">
              <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
              <h2 class="text-orange">Registration</h2>
            </div>
            <div class="container-content">
              <form id="userSelfRegForm" name="userSelfRegForm" method="post" >
                <input type="hidden" id="user_self_reg_page" name="user_self_reg_page"  value="registration">
                <input type="hidden" id="inputupdateId" name="inputupdateId" class="form-control" value="0">
                <input type="hidden" id="inputCourseId" name="inputCourseId" class="form-control" value="<?php echo $_REQUEST['applyId'];?>">
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
                <input type="hidden" id="inputUserType" name="inputUserType" class="form-control" value="student">
                <div style="display: flex;justify-content: center;align-items: center;">
                  <input type="submit" name="submit" class="form-button button-l margin-b submitBtn " value="Register"/>
                </div>
                <div style="visibility: hidden;display: none;justify-content: center;align-items: center;" class="login_btn2">
                  <a class="text-whitesmoke btn btn-success"  href="login.php"><big>Login</big></a>
                </div>
                <br>
                <span class="statusMsg"></span>
              </form>
              <p class="margin-t text-whitesmoke text-c"><small> TopScorer &copy; 2024</small> </p>
            </div>
          </div>
        </div>
      <?php
          }
      ?>
    </div>
  </div>
  <script src="theme/dist/js/jquery.min.js"></script>
  <script src="../admin/function/js/function.js"></script>
</body>
>>>>>>> dca3ad7e5005466afc739c01ee917dab6bfcdb2b
</html>