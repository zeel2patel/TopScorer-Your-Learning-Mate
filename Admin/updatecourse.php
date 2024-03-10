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
        <?php
        include_once('includes/header.php');
        if (isset($_SESSION["username"])) {
            $course_id = isset($_GET['id']) ? $_GET['id'] : null;

            $course_query = "SELECT * FROM courses WHERE course_id = '$course_id'";
            $course_result = mysqli_query($dbc, $course_query);
            $course_row = mysqli_fetch_assoc($course_result);
            ?>
            <div class="container-fluid page-body-wrapper">
                <?php include_once('includes/sidebar.php'); ?>
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title"> Edit Courses </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Edit Courses</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title" style="text-align: center;">Edit Courses</h4>

                                        <form class="forms-sample" method="post" action="admincontroller.php">
                                            <?php
                                            if (isset($_SESSION['courseerrors']) && is_array($_SESSION['courseerrors'])) {
                                                foreach ($_SESSION['courseerrors'] as $error) {
                                                    echo $error;
                                                }
                                                unset($_SESSION['courseerrors']);
                                            }
                                            ?>
                                            <input type="hidden" name="course_id"
                                                value="<?php echo $course_row['course_id']; ?>">

                                            <div class="form-group">
                                                <label for="exampleInputName1">Course Name</label>
                                                <input type="text" name="coursename"
                                                    value="<?php echo isset($_SESSION['coursename']) ? $_SESSION['coursename'] : $course_row['course_name']; ?>"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Course Description</label>
                                                <textarea rows="6" name="coursedesc"
                                                    class="form-control"><?php echo isset($_SESSION['coursedesc']) ? $_SESSION['coursedesc'] : $course_row['course_description']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Department</label>
                                                <select name="field" class="form-control">
                                                    <option
                                                        value="<?php echo isset($_SESSION['field_id']) ? $_SESSION['field_id'] : $course_row['field_id']; ?>"
                                                        selected>
                                                        <?php
                                                        $selectedFieldId = isset($_SESSION['field_id']) ? $_SESSION['field_id'] : $course_row['field_id'];

                                                        if (isset($selectedFieldId)) {
                                                            $id = $selectedFieldId;
                                                            $query1 = "SELECT * FROM field WHERE field_id = '$id'";
                                                            $result1 = mysqli_query($dbc, $query1);

                                                            if ($result1) {
                                                                $row1 = mysqli_fetch_array($result1);

                                                                if ($row1 && isset($row1["field_name"])) {
                                                                    echo $row1["field_name"];
                                                                }
                                                            }

                                                            unset($_SESSION['field_id']);
                                                        }
                                                        ?>
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
                                                    <option
                                                        value="<?php echo isset($_SESSION['semester_id']) ? $_SESSION['semester_id'] : $course_row['semester_id']; ?>"
                                                        selected>
                                                        <?php
                                                        $selectedSemesterId = isset($_SESSION['semester_id']) ? $_SESSION['semester_id'] : $course_row['semester_id'];

                                                        if (isset($selectedSemesterId)) {
                                                            $id = $selectedSemesterId;
                                                            $query1 = "SELECT * FROM semesters WHERE semester_id = '$id'";
                                                            $result1 = mysqli_query($dbc, $query1);

                                                            if ($result1) {
                                                                $row1 = mysqli_fetch_array($result1);

                                                                if ($row1 && isset($row1["semester_name"])) {
                                                                    echo $row1["semester_name"];
                                                                }
                                                            }

                                                            unset($_SESSION['semester_id']);
                                                        }
                                                        ?>
                                                    </option>
                                                    <?php
                                                    $query = "SELECT * FROM semesters";
                                                    $result = mysqli_query($dbc, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                        <option value="<?php echo $row['semester_id'] ?>">
                                                            <?php echo $row['semester_name'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <button type="submit" name="updatecourse" class="btn btn-primary mr-2"
                                                name="submit">Update</button>
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