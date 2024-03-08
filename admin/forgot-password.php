<!DOCTYPE html>
<html lang="en">

<head>

  <title>TopScorer - Your Learning Mate</title>
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.jpg">
  <script type="text/javascript">
  </script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="images/logo.png" style="filter: invert(1);">
              </div>
              <h4>RECOVER PASSWORD</h4>
              <h6 class="font-weight-light">Enter your email address to reset password!</h6>
              <form class="pt-3" id="login" method="post" name="login">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" placeholder="Email Address" required="true"
                    name="email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="mobile" placeholder="Mobile Number"
                    required="true" maxlength="10" pattern="[0-9]+">
                </div>
                <div class="form-group">
                  <input class="form-control form-control-lg" type="password" name="newpassword"
                    placeholder="New Password" required="true" />
                </div>
                <div class="form-group">
                  <input class="form-control form-control-lg" type="password" name="confirmpassword"
                    placeholder="Confirm Password" required="true" />
                </div>
                <div class="mt-3">
                  <button class="btn btn-success btn-block loginbtn" name="submit" type="submit">Reset</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                </div>
                <div class="mb-2">
                  <a href="login.php" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="icon-social-home mr-2"></i>Signin</a>
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