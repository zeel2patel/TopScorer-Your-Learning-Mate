<?php
session_start();
include("includes/db_connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["addfield"])) {

        $_SESSION['fielderrors'] = [];

        $fieldname = $_POST["fieldname"];

        $query = "SELECT * FROM field WHERE field_name = '$fieldname'";
        $result = mysqli_query($dbc, $query);

        if ($fieldname == null) {
            $_SESSION['fielderrors'][] = "<p style='color: red;'>Please Enter Field Name.</p>";
            header("location: addfield.php");
        } elseif (mysqli_num_rows($result) > 0) {
            $_SESSION['fielderrors'][] = "<p style='color: red;'>This Field Is Already Exist. Please Enter Diffrent Field.</p>";
            header("location: addfield.php");
        } else {
            $fieldname = mysqli_real_escape_string($dbc, $fieldname);

            $stmt = $dbc->prepare("INSERT INTO Field (field_name) VALUES (?)");
            $stmt->bind_param("s", $fieldname);

            $stmt->execute();

            $stmt->close();
            mysqli_close($dbc);

            $_SESSION['fielderrors'][] = "<p style='color: green;'>Field Name Enterd Successfully.</p>";
            header("location: addfield.php");
            exit();
        }
    }

    if (isset($_POST["updatefield"])) {

        $_SESSION['fieldupdate'] = [];

        $fieldId = $_POST["field_id"];
        $fieldname = $_POST["fieldname"];

        if ($fieldname == null) {
            $_SESSION['fieldupdate'][] = "<p style='color: red;'>Please Enter Field Name.</p>";
            header("location: updatefield.php?id=$fieldId");
            exit();
        } else {
            $fieldname = mysqli_real_escape_string($dbc, $fieldname);

            $stmt = $dbc->prepare("UPDATE Field SET field_name = ? WHERE field_id = ?");
            $stmt->bind_param("si", $fieldname, $fieldId);

            $stmt->execute();

            $stmt->close();
            mysqli_close($dbc);

            $_SESSION['fieldupdate'][] = "<p style='color: green;'>Field Name Updated Successfully.</p>";
            header("location: addfield.php");
            exit();
        }
    }

    function checkIfExists($dbc, $column, $value, $userid)
    {
        $query = "SELECT * FROM users WHERE user_type = 'Administrator' AND $column = ? AND user_id != ?";
        $stmt = $dbc->prepare($query);
        $stmt->bind_param("si", $value, $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = mysqli_num_rows($result);
        $stmt->close();
        return $count;
    }

    if (isset($_POST["updateadmin"])) {
        $_SESSION['updateadmin'] = [];

        $userid = $_POST["userid"];
        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);

        if (empty($username)) {
            $_SESSION['updateadmin'][] = "<p style='color: red;'>Please Enter Username.</p>";
        } elseif (empty($email)) {
            $_SESSION['updateadmin'][] = "<p style='color: red;'>Please Enter Email.</p>";
        } else {
            $count = checkIfExists($dbc, 'username', $username, $userid);

            $count1 = checkIfExists($dbc, 'email', $email, $userid);

            if ($count > 0) {
                $_SESSION['updateadmin'][] = "<p style='color: red;'>Username Is Already Taken. Please Choose Another Username.</p>";
            } elseif ($count1 > 0) {
                $_SESSION['updateadmin'][] = "<p style='color: red;'>Email Is Already Taken. Please Choose Another Email.</p>";
            } else {
                $stmt = $dbc->prepare("UPDATE users SET username = ?, email = ? WHERE user_id = ?");
                $stmt->bind_param("ssi", $username, $email, $userid);

                if ($stmt->execute()) {
                    echo "<script>
                        alert('Data updated successfully. Please LogIn Again With New Data.');
                        window.location.href = 'logout.php';
                      </script>";
                    exit();
                } else {
                    $_SESSION['updateadmin'][] = "<p style='color: red;'>Error updating details: " . mysqli_error($dbc) . "</p>";
                }
            }
        }
        header("location: updateadmindetails.php");
        exit();
    }

    if (isset($_POST["addcourse"])) {
        $_SESSION['courseerrors'] = [];

        $coursename = $_POST["coursename"];
        $coursedescription = $_POST["coursedesc"];
        $field = $_POST["field"];
        $_SESSION['coursename'] = $coursename;
        $_SESSION['coursedesc'] = $coursedescription;
        $_SESSION['field_id'] = $field;

        $query = "SELECT * FROM courses WHERE course_name = '$coursename' AND field_id = '$field'";
        $result = mysqli_query($dbc, $query);

        if ($coursename == null) {
            $_SESSION['courseerrors'][] = "<p style='color: red;'>Please Enter Course Name.</p>";
            header("location: addcourse.php");
        } elseif ($coursedescription == null) {
            $_SESSION['courseerrors'][] = "<p style='color: red;'>Please Enter Course Description.</p>";
            header("location: addcourse.php");
        } elseif ($field == null) {
            $_SESSION['courseerrors'][] = "<p style='color: red;'>Please Select Field Name.</p>";
            header("location: addcourse.php");
        } elseif (mysqli_num_rows($result) > 0) {
            $_SESSION['courseerrors'][] = "<p style='color: red;'>This Course Is Already Exist. Please Enter Different Course Name.</p>";
            header("location: addcourse.php");
        } else {

            $stmt = $dbc->prepare("INSERT INTO courses (course_name, course_description, field_id) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $coursename, $coursedescription, $field);

            $stmt->execute();

            $stmt->close();
            mysqli_close($dbc);

            $_SESSION['courseerrors'][] = "<p style='color: green;'>Course Entered Successfully.</p>";
            unset($_SESSION['coursename']);
            unset($_SESSION['coursedesc']);
            unset($_SESSION['field_id']);
            header("location: addcourse.php");
            exit();
        }
    }

    if (isset($_POST["updatecourse"])) {
        $_SESSION['courseerrors'] = [];

        $course_id = $_POST["course_id"];
        $coursename = $_POST["coursename"];
        $coursedescription = $_POST["coursedesc"];
        $field = $_POST["field"];
        $_SESSION['coursename'] = $coursename;
        $_SESSION['coursedesc'] = $coursedescription;
        $_SESSION['field_id'] = $field;

        if ($coursename == null) {
            $_SESSION['courseerrors'][] = "<p style='color: red;'>Please Enter Course Name.</p>";
            header("location: updatecourse.php?id=$course_id");
        } elseif ($coursedescription == null) {
            $_SESSION['courseerrors'][] = "<p style='color: red;'>Please Enter Course Description.</p>";
            header("location: updatecourse.php?id=$course_id");
        } elseif ($field == null) {
            $_SESSION['courseerrors'][] = "<p style='color: red;'>Please Select Field Name.</p>";
            header("location: updatecourse.php?id=$course_id");
        } else {
            $stmt = $dbc->prepare("UPDATE courses SET course_name=?, course_description=?, field_id=? WHERE course_id=?");
            $stmt->bind_param("ssii", $coursename, $coursedescription, $field, $course_id);

            $stmt->execute();

            $stmt->close();
            mysqli_close($dbc);

            $_SESSION['courseerrors'][] = "<p style='color: green;'>Course Updated Successfully.</p>";
            unset($_SESSION['coursename']);
            unset($_SESSION['coursedesc']);
            unset($_SESSION['field_id']);
            header("location: updatecourse.php?id=$course_id");
            exit();
        }
    }


}
?>