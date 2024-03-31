<?php
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
      $sql = 'SELECT id, email, password, user_type, status FROM users WHERE email = ?';
      if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('s', $username);
        if ($stmt->execute()) {
          $stmt->store_result();
          if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $username, $hashed_password, $user_type, $status);
            if ($stmt->fetch()) {
              if (password_verify($password, $hashed_password)) {
                    $_SESSION['user_type']=$user_type;
                    $_SESSION['user_id'] = $id;
                    $_SESSION['loggedin'] = TRUE;
                    if($_SESSION['user_type']=="admin"){
                      if($status==1){
                        header("Location:index.php");
                      }else if($status==0){
                        header("Location:login.php?error=1");
                      }
                    }else if($_SESSION['user_type']==""){
                      header("Location:login.php?error=2");
                    }else{
                      header("Location:login.php?error=3");
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
        <div>◄ <a class="text-whitesmoke" style="" href="../index.php"><big>Back to Home</big></a> 
      </form>
    </div>
      <p class="margin-t text-whitesmoke"><small> TopScorer &copy; 2024</small> </p>
    </div>
  </div>
</body>
</html>