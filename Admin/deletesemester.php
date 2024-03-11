<?php
session_start();
include("includes/db_connect.php");

if (isset($_GET['id'])) {
    $semester_id = mysqli_real_escape_string($dbc, $_GET['id']);

    $stmt = $dbc->prepare("DELETE FROM semesters WHERE semester_id = ?");

    if ($stmt) {
        $stmt->bind_param("i", $semester_id);

        $stmt->execute();

        $stmt->close();

        mysqli_close($dbc);
        $_SESSION['semestererrors'][] = "<p style='color: green;'>Semester Deleted Successfully.</p>";
        header("location: managesemester.php");
        exit();
    } else {
        die("Error in prepared statement: " . $dbc->error);
    }
} else {
    echo "Invalid request";
}
?>