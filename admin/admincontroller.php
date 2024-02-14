<?php
session_start();
include("includes/db_connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["addfield"])) {

        $_SESSION['fielderrors'] = [];

        $fieldname = $_POST["fieldname"];

        if ($fieldname == null) {
            $_SESSION['fielderrors'][] = "<p style='color: red;'>Please Enter Field Name.</p>";
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
}
?>