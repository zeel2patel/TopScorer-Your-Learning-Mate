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

</head>

<body>
  <div class="container-scroller">
    <?php include_once('includes/header.php'); ?>
    <div class="container-fluid page-body-wrapper">
      <?php include_once('includes/sidebar.php'); ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Add & Manage Fields </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Add & Manage Fields</li>
              </ol>
            </nav>
          </div>
          <div class="row">

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title" style="text-align: center;">Add Field</h4>

                  <form class="forms-sample" method="post" action="admincontroller.php">
                    <?php
                    if (isset($_SESSION['fielderrors']) && is_array($_SESSION['fielderrors'])) {
                      foreach ($_SESSION['fielderrors'] as $error) {
                        echo $error;
                      }
                      unset($_SESSION['fielderrors']);
                    }
                    ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Field Name</label>
                      <input type="text" name="fieldname" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="addfield">Add</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-sm-flex align-items-center mb-4">
                    <h4 class="card-title mb-sm-0" style="margin: 0 auto;">Manage Fields</h4>
                  </div>
                  <?php
                  if (isset($_SESSION['fieldupdate']) && is_array($_SESSION['fieldupdate'])) {
                    foreach ($_SESSION['fieldupdate'] as $error) {
                      echo $error;
                    }
                    unset($_SESSION['fieldupdate']);
                  }
                  ?>
                  <div class="table-responsive border rounded p-1">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="font-weight-bold">Filed Name</th>
                          <th class="font-weight-bold">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $fieldqry = "SELECT * FROM field";
                        $fieldres = mysqli_query($dbc, $fieldqry);
                        while ($fieldrow = mysqli_fetch_array($fieldres)) {
                          ?>
                          <tr>
                            <td>
                              <?php echo htmlspecialchars($fieldrow['field_name']); ?>
                            </td>
                            <td>
                              <div><a style="text-decoration: none; color: black;"
                                  href="updatefield.php?id=<?php echo htmlspecialchars($fieldrow['field_id']); ?>"><i
                                    class="icon-note"></i></a>
                                || <a style="text-decoration: none; color: black;"
                                  href="deletefield.php?id=<?php echo htmlspecialchars($fieldrow['field_id']); ?>"
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
  <script src="vendors/select2/select2.min.js"></script>
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
</body>

</html>