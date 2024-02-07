<?php
include('header.php');
session_start();
?>

<section class="addfield">
    <h2>Add Field</h2>
    <form class="field" method="post" action="admincontroller.php">
            <?php
            if (isset($_SESSION['fielderrors']) && is_array($_SESSION['fielderrors'])) {
                foreach ($_SESSION['fielderrors'] as $error) {
                    echo "{$error}";
                }
                session_destroy();
            }
            ?>
        <label for="name">Field Name:</label>
        <input type="text" id="name" name="fieldname">

        <button type="submit" name="addfield">Add Field</button>
    </form>
</section>

<?php
include('footer.php');
?>