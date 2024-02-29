<!DOCTYPE html>
<html lang="en">

<head>

  <title>TopScorer - Your Learning Mate</title>
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css" />
  <script type="text/javascript">

  </script>
</head>

<body>
  <div class="container-scroller">
    <?php include_once('includes/header.php');
    if (isset($_SESSION["username"])) {
      ?>
      <div class="container-fluid page-body-wrapper">
        <?php include_once('includes/sidebar.php');

        if (isset($_POST['changepassword'])) {
          $newpassword = $_POST['newpassword'];
          $confirmpassword = $_POST['confirmpassword'];

          $passworderrors = [];

          if ($newpassword == null) {
            $passworderrors[] = "<p style='color: red;'>Please Enter New Password.</p>";
          } else if ($confirmpassword == null) {
            $passworderrors[] = "<p style='color: red;'>Please Enter Confirm Password.</p>";
          } elseif ($newpassword != $confirmpassword) {
            $passworderrors[] = "<p style='color: red;'>Confirm Password Must be Matched With New Password.</p>";
          } else {
            $userId = $_SESSION['user_id'];

            $password = md5($newpassword);

            $stmt = $dbc->prepare("UPDATE users SET password = ? WHERE user_id = ?");
            $stmt->bind_param("si", $password, $userId);

            if ($stmt->execute()) {
              echo "<script>
                      alert('Password updated successfully. Please LogIn Again With the New Password.');
                      window.location.href = 'logout.php';
                    </script>";
              exit();
            } else {
              $passworderrors[] = "<p style='color: red;'>Error updating password: " . $stmt->error . "</p>";
            }
          }
        }
        ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Change Password </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
              </nav>
            </div>
            <div class="row">

              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Change Password</h4>

                    <form class="forms-sample" method="post">
                      <?php
                      if (!empty($passworderrors)) {
                        foreach ($passworderrors as $error) {
                          echo $error;
                        }
                      }
                      ?>
                      <div class="form-group">
                        <label for="exampleInputEmail3">New Password</label>
                        <input type="password" name="newpassword" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Confirm Password</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" value="" class="form-control">
                      </div>

                      <button type="submit" class="btn btn-primary mr-2" name="changepassword">Change</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include_once('includes/footer.php'); ?>
        </div>
      </div>
    </div>
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
  </body>
  <?php
    } else {
      header("location: logout.php");
    }
    ?>