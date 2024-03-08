<?php
session_start();
include("includes/db_connect.php");

if (isset($_GET['id'])) {
    $field_id = mysqli_real_escape_string($dbc, $_GET['id']);

    $stmt = $dbc->prepare("DELETE FROM Field WHERE field_id = ?");

    if ($stmt) {
        $stmt->bind_param("i", $field_id);

        $stmt->execute();

        $stmt->close();

        mysqli_close($dbc);
        $_SESSION['fielderrors'][] = "<p style='color: green;'>Field Name Deleted Successfully.</p>";
        header("location: addfield.php");
        exit();
    } else {
        die("Error in prepared statement: " . $dbc->error);
    }
} else {
    echo "Invalid request";
}
?>