<?php
session_start();
include('includes/db_connect.php');

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $errors = [];

  if ($username == null) {
    $errors[] = "<p style='color: red; text-align: center;'>Please Enter Username.</p>";
  } elseif ($password == null) {
    $errors[] = "<p style='color: red; text-align: center;'>Please Enter Password.</p>";
  } else {
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

    if ($count > 0) {

      $adminpassword = $row["password"];

      if (md5($password) == $adminpassword) {
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $row['user_id'];
        header("location: dashboard.php");
      } else {
        $errors[] = "<p style='color: red; text-align: center;'>Username Or Password Is Incorrect.</p>";
      }

    } else {
      $errors[] = "<p style='color: red; text-align: center;'>Username Is Incorrect.</p>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>TopScorer - Your Learning Mate</title>
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo" style="display: flex; justify-content: center;">
                <img src="images/logo.png" style="filter: invert(1);">
              </div>
              <h6 class="font-weight-light" style="text-align: center;">Sign In To Continue</h6>
              <form class="pt-3" id="login" method="post" name="login">
                <?php
                if (!empty($errors)) {
                  foreach ($errors as $error) {
                    echo $error;
                  }
                }
                ?>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" placeholder="Enter Your Username"
                    name="username" value="<?php if (isset($username)) {
                      echo $username;
                    } ?>">
                </div>
                <div class="form-group">

                  <input type="password" class="form-control form-control-lg" placeholder="Enter Your Password"
                    name="password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-success btn-block loginbtn" name="login" type="submit">Login</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" id="remember" class="form-check-input" name="remember" /> Keep Me Signed In
                    </label>
                  </div>
                  <a href="forgot-password.php" class="auth-link text-black">Forgot password?</a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
</body>

</html>