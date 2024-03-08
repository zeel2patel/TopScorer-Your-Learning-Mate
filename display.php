<?php
include("Admin/includes/db_connect.php");

if (isset($_POST["request"])) {
    $request = $_POST['request'];

    $query = "SELECT * FROM courses WHERE field_id = '$request'";
    $result = mysqli_query($dbc, $query);
    $count = mysqli_num_rows($result);

    if ($count) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card">
            <h3><?php echo $row['course_name']; ?></h3>
                    <p><?php echo $row['course_description']; ?></p>
            </div>
            <?php
        }
    }
}
?>