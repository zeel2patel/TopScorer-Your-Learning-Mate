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
              <h3 class="page-title"> Add Courses </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Courses</li>
                </ol>
              </nav>
            </div>
            <div class="row">

              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Courses</h4>

                    <form class="forms-sample" method="post" action="admincontroller.php">
                      <?php
                      if (isset($_SESSION['courseerrors']) && is_array($_SESSION['courseerrors'])) {
                        foreach ($_SESSION['courseerrors'] as $error) {
                          echo $error;
                        }
                        unset($_SESSION['courseerrors']);
                      }
                      ?>
                      <div class="form-group">
                        <label for="exampleInputName1">Course Name</label>
                        <input type="text" name="coursename" value="<?php if (isset($_SESSION['coursename'])) {
                          echo $_SESSION['coursename'];
                        }
                        unset($_SESSION['coursename']);
                        ?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Course Description</label>
                        <textarea type="text" rows="6" name="coursedesc" class="form-control"><?php if (isset($_SESSION['coursedesc'])) {
                          echo $_SESSION['coursedesc'];
                        }
                        unset($_SESSION['coursedesc']); ?></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Department</label>
                        <select name="field" class="form-control">
                          <option value="<?php if (isset($_SESSION['field_id'])) {
                            echo $_SESSION['field_id'];
                          } ?>" selected>
                            <?php if (isset($_SESSION['field_id'])) {
                              $id = $_SESSION['field_id'];
                              $query1 = "SELECT * FROM field WHERE field_id = '$id'";
                              $result1 = mysqli_query($dbc, $query1);
                              if ($result1) {
                                $row1 = mysqli_fetch_array($result1);
                                if ($row1 && isset($row1["field_name"])) {
                                  echo $row1["field_name"];
                                }
                              }
                            }
                            unset($_SESSION['field_id']); ?>
                          </option>
                          <?php
                          $query = "SELECT * FROM field";
                          $result = mysqli_query($dbc, $query);
                          while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $row['field_id'] ?>">
                              <?php echo $row['field_name'] ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Semester</label>
                        <select name="semester" class="form-control">
                          <option value="<?php if (isset($_SESSION['semester_id'])) {
                            echo $_SESSION['semester_id'];
                          } ?>" selected>
                            <?php if (isset($_SESSION['semester_id'])) {
                              $id = $_SESSION['semester_id'];
                              $semester_query1 = "SELECT * FROM semesters WHERE semester_id = '$id'";
                              $semester_result1 = mysqli_query($dbc, $semester_query1);
                              if ($semester_result1) {
                                $semester_row1 = mysqli_fetch_array($semester_result1);
                                if ($semester_row1 && isset($row1["semester_name"])) {
                                  echo $semester_row1["semester_name"];
                                }
                              }
                            }
                            unset($_SESSION['semester_id']); ?>
                          </option>
                          <?php
                          $semester_query = "SELECT * FROM semesters";
                          $semester_result = mysqli_query($dbc, $semester_query);
                          while ($semester_row = mysqli_fetch_assoc($semester_result)) {
                            ?>
                            <option value="<?php echo $semester_row['semester_id'] ?>">
                              <?php echo $semester_row['semester_name'] ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                      <button type="submit" name="addcourse" class="btn btn-primary mr-2" name="submit">Add</button>

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