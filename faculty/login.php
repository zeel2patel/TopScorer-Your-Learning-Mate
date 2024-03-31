<<<<<<< HEAD
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
              <input type="hidden" id="user_self_reg_page" name="user_self_reg_page"  value="registration">
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
    </div>
  </div>
  <script src="theme/dist/js/jquery.min.js"></script>
  <script src="../admin/function/js/function.js"></script>
</body>
=======
<?php
  session_start();
  require_once "../admin/function/dbConnection.php";
  require_once "../admin/function/session_check.php";
  $username = $password = '';
  $username_err = $password_err = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty(trim($_POST['username']))){
      $username_err = 'Please enter username.';
    } else{
      $username = trim($_POST['username']);
    }
    if(empty(trim($_POST['password']))){
      $password_err = 'Please enter your password.';
    } else{
      $password = trim($_POST['password']);
    }
    if (empty($username_err) && empty($password_err)) {
      $sql = 'SELECT id, username, password,user_type FROM users WHERE username = ?';
      if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('s', $username);
        if ($stmt->execute()) {
          $stmt->store_result();
          if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $username, $hashed_password, $user_type);
            if ($stmt->fetch()) {
              if (password_verify($password, $hashed_password)) {
                    $_SESSION['user_type']=$user_type;
                    $_SESSION['user_id'] = $id;
                    $_SESSION['loggedin'] = TRUE;
                    if($_SESSION['user_type']=="faculty"){
                      header("Location:index.php");
                    }else if($_SESSION['user_type']==""){
                      header("Location:login.php?error=0");
                    }else{
                      header("Location:login.php?error=0");
                    }
              } else {
                $password_err = 'Invalid password';
              }
            }
          } else {
            $username_err = "Username does not exists.";
          }
        } else {
          echo "Oops! Something went wrong please try again";
        }
        $stmt->close();
      }
      $conn->close();
    }
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
      .help-block{
        color: whitesmoke;
      }
    </style>
</head>
<body class="main-bg">
  <div class="login-container text-c animated flipInX">
    <div>
      <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
    </div>
    <img src="theme/dist/img/admin.png"  style="width: 100px; height: 100px;border-radius: 50%;" />
    <p class="text-orange">Sign In</p>
    <div class="container-content">
      <form class="margin-t" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group <?php (!empty($username_err))?'has_error':'';?>" >
          <input type="text" class="form-control" placeholder="Username" required="" name="username" id="username" value="<?php echo $username ?>">
          <span class="help-block"><?php echo $username_err;?></span>
        </div>
        <div class="form-group <?php (!empty($password_err))?'has_error':'';?>">
          <input type="password" class="form-control" placeholder="*****" required="" name="password" id="password" value="<?php echo $password ?>"> 
          <span class="help-block"><?php echo $password_err;?></span>
        </div>
        <button type="submit" class="form-button button-l margin-b">Sign In</button>
        <a class="text-darkyellow" href="password_reset.php"><small>Forgot your password?</small></a> <br>
        <br>
        <br>
        <a class="" style="font-size: 19px;color: whitesmoke;" href="registration.php">Sign Up</a> <br>
        <div>◄ <a class="text-whitesmoke" style="" href="../index.php"><big>Back to Home</big></a> 
      </form>
    </div>
      <p class="margin-t text-whitesmoke"><small> TopScorer &copy; 2024</small> </p>
    </div>
  </div>
</body>
>>>>>>> dca3ad7e5005466afc739c01ee917dab6bfcdb2b
</html>