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
                        <h3 class="page-title"> Welcome,
                            <?php echo $row['username']; ?>
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo $row['username']; ?>'s Profile
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title" style="text-align: center;">Admin Profile</h4>

                                    <form class="forms-sample" method="post" action="admincontroller.php">
                                        <?php
                                        if (isset($_SESSION['updateadmin']) && is_array($_SESSION['updateadmin'])) {
                                            foreach ($_SESSION['updateadmin'] as $error) {
                                                echo $error;
                                            }
                                            unset($_SESSION['updateadmin']);
                                        }
                                        ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail3">User Name</label>
                                            <input type="text" name="username" value="<?php echo $row['username']; ?>"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputCity1">Email</label>
                                            <input type="email" name="email" value="<?php echo $row['email']; ?>"
                                                class="form-control">
                                        </div>
                                        <input type="hidden" name="userid" value="<?php echo $row['user_id']; ?>">
                                        <button type="submit" class="btn btn-primary mr-2"
                                            name="updateadmin">Update</button>
                                    </form>
                                    <p style="margin-top: 20px;"><strong>Note:</strong> If the details are successfully updated, it is advisable to log in again for the changes to take effect.</p>
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