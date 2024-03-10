<?php
include("Admin/includes/db_connect.php");

if (isset($_POST["request"])) {
    $request = $_POST['request'];

    $query = "SELECT a.*, b.semester_name FROM courses a, semesters b WHERE field_id = '$request' AND a.semester_id = b.semester_id";
    $result = mysqli_query($dbc, $query);
    $count = mysqli_num_rows($result);

    if ($count) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card">
                <h3>
                    <?php echo $row['course_name']; ?>
                </h3>
                <p>
                    <?php echo $row['semester_name'] ?>
                </p>
                <button><a href="coursedetails.php?course_id=<?php echo $row['course_id']; ?>">Learn More</a></button>
            </div>
            <?php
        }
    }
}
?>