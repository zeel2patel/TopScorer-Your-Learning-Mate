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
    <link rel="icon" type="image/x-icon" href="images/favicon.jpg">

</head>

<body>
  <div class="container-scroller">
    <?php include_once('includes/header.php');
    if (isset($_SESSION["username"])) {
      ?>
      <div class="container-fluid page-body-wrapper">
        <?php include_once('includes/sidebar.php'); ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Add Semesters </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Semesters</li>
                </ol>
              </nav>
            </div>
            <div class="row">

              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Semesters</h4>

                    <form class="forms-sample" method="post" action="admincontroller.php">
                      <?php
                      if (isset($_SESSION['semestererrors']) && is_array($_SESSION['semestererrors'])) {
                        foreach ($_SESSION['semestererrors'] as $error) {
                          echo $error;
                        }
                        unset($_SESSION['semestererrors']);
                      }
                      ?>
                      <div class="form-group">
                        <label for="exampleInputName1">Semester Name</label>
                        <input type="text" name="semestername" value="<?php if (isset($_SESSION['semestername'])) {
                          echo $_SESSION['semestername'];
                        }
                        unset($_SESSION['semestername']);
                        ?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Semester Start Date</label>
                        <input type="date" name="startdate" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Semester End Date</label>
                        <input type="date" name="enddate" class="form-control">
                      </div>
                      <button type="submit" name="addsemester" class="btn btn-primary mr-2" name="submit">Add</button>

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

  </html>
  <?php
    } else {
      header("location: logout.php");
    }
    ?>