<?php
include('header.php');
?>

<section class="addfield">
    <h2>Add Field</h2>
    <form class="field" method="post">

        <label for="name">Field Name:</label>
        <input type="text" id="name" name="name">

        <button type="submit">Add Field</button>
    </form>
</section>

<?php
include('footer.php');
?>