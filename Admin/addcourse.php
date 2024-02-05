<?php
include('header.php');
?>

<section class="addcourse">
    <h2>Add Course</h2>
    <form class="course" method="post">

        <label for="coursename">Course Name:</label>
        <input type="text" id="coursename" name="coursename">

        <label for="description">Course Description:</label>
        <textarea rows="5" id="description" name="description"></textarea>

        <label for="field">Select Field:</label>
        <select name="field" id="field">
            <option value="">abc</option>
            <option value="">fghjk</option>
        </select>

        <button type="submit">Add Course</button>
    </form>
</section>

<?php
include('footer.php');
?>