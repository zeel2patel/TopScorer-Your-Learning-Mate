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
        <?php include_once('includes/header.php');
        if (isset($_SESSION["username"])) {
            ?>
            <div class="container-fluid page-body-wrapper">
                <?php include_once('includes/sidebar.php'); ?>
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title"> Update Fields </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Update Fields</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row">

                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title" style="text-align: center;">Update Field</h4>

                                        <form class="forms-sample" method="post" action="admincontroller.php">
                                            <?php
                                            if (isset($_SESSION['fieldupdate']) && is_array($_SESSION['fieldupdate'])) {
                                                foreach ($_SESSION['fieldupdate'] as $error) {
                                                    echo $error;
                                                }
                                                unset($_SESSION['fieldupdate']);
                                            }

                                            if (isset($_GET['id'])) {
                                                $id = $_GET['id'];

                                                $displayqry = "SELECT * FROM field WHERE field_id = $id";
                                                $displayres = mysqli_query($dbc, $displayqry);
                                                $displayrow = mysqli_fetch_array($displayres);
                                            }
                                            ?>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Field Name</label>
                                                <input type="text" name="fieldname"
                                                    value="<?php echo $displayrow['field_name']; ?>" class="form-control">
                                            </div>
                                            <input type="hidden" name="field_id"
                                                value="<?php echo $displayrow['field_id']; ?>">
                                            <button type="submit" class="btn btn-primary mr-2"
                                                name="updatefield">Update</button>

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