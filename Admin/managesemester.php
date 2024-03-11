<!DOCTYPE html>
<html lang="en">

<head>

  <title>TopScorer - Your Learning Mate</title>
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
  <link rel="stylesheet" href="./css/style.css">
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
              <h3 class="page-title"> Manage Semester</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Manage Semester</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Manage Semester</h4>
                    </div>
                    <?php
                    if (isset($_SESSION['semestererrors']) && is_array($_SESSION['semestererrors'])) {
                      foreach ($_SESSION['semestererrors'] as $error) {
                        echo $error;
                      }
                      unset($_SESSION['semestererrors']);
                    }
                    ?>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">Semester Name</th>
                            <th class="font-weight-bold">Semester Start Date</th>
                            <th class="font-weight-bold">Semester End Date</th>
                            <th class="font-weight-bold">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = "SELECT * FROM semesters";
                          $result = mysqli_query($dbc, $query);
                          while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                              <td>
                                <?php echo $row['semester_name'] ?>
                              </td>
                              <td>
                                <?php echo $row['start_date'] ?>
                              </td>
                              <td>
                                <?php echo $row['end_date'] ?>
                              </td>
                              <td>
                                <div><a style="text-decoration: none; color: black;"
                                    href="updatesemester.php?id=<?php echo htmlspecialchars($row['semester_id']); ?>"><i
                                      class="icon-note"></i></a>
                                  || <a style="text-decoration: none; color: black;"
                                    href="deletesemester.php?id=<?php echo htmlspecialchars($row['semester_id']); ?>"
                                    onclick="return confirm('Do you really want to Delete ?');"> <i
                                      class="icon-trash"></i></a></div>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
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
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <script src="./js/dashboard.js"></script>
  </body>

  </html>
  <?php
    } else {
      header("location: logout.php");
    }
    ?>