<?php
session_start();
include("includes/db_connect.php");

if (isset($_GET['id'])) {
    $course_id = mysqli_real_escape_string($dbc, $_GET['id']);

    $stmt = $dbc->prepare("DELETE FROM courses WHERE course_id = ?");

    if ($stmt) {
        $stmt->bind_param("i", $course_id);

        $stmt->execute();

        $stmt->close();

        mysqli_close($dbc);
        $_SESSION['courseerrors'][] = "<p style='color: green;'>Course Deleted Successfully.</p>";
        header("location: managecourse.php");
        exit();
    } else {
        die("Error in prepared statement: " . $dbc->error);
    }
} else {
    echo "Invalid request";
}
?>
