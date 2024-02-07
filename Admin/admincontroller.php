<?php
include("../db_connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["addfield"])) {

        $_SESSION['fielderrors'] = [];
        
        $fieldname = $_POST["fieldname"];

        if ($fieldname == null) {
            $_SESSION['fielderrors'] [] = "<p style='color: red;'>Please Enter Field Name</p>";
            header("location: addfield.php");
        }
        else
        {
            $fieldname = mysqli_real_escape_string($dbc, $fieldname);

            $stmt = $dbc->prepare("INSERT INTO Field (field_name) VALUES (?)");
            $stmt->bind_param("s", $fieldname);

            $stmt->execute();

            $stmt->close();
            mysqli_close($dbc);
            $_SESSION['fielderrors'] [] = "<p style='color: green;'>Field Name Entered Successfully</p>";
            header("location: addfield.php");
        }
    }
}
?>