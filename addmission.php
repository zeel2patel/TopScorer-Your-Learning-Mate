
<!DOCTYPE html>
<html lang="en">

<head>


    <style>
        /* Add any additional styles here */
        body {
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #17a2b8;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: space-between;
        }

        header .logo img {
            max-width: 150px;
        }

        nav ul {
            list-style: none;
            display: flex;
            align-items: center;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

       

        section.filter {
            margin: 20px 0;
        }

        section.filter select {
            padding: 10px;
            font-size: 16px;
        }

        section.registration-form {
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
        }

        section.registration-form h2 {
            text-align: center;
            color: #333;
        }

        section.registration-form form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: auto;
        }

        section.registration-form label {
            margin-top: 10px;
            font-weight: bold;
        }

        section.registration-form input {
            padding: 10px;
            margin-top: 5px;
        }

        section.registration-form input[type="submit"] {
            background-color: #17a2b8;
            color: white;
            cursor: pointer;
        }

    </style>
</head>

<body>
<?php
include('Extra/header.php');
?>


<section class="registration-form">
    <h2>Admission Form</h2>
    <form action="admission.php" method="POST">
        <label for="first_name">Applicant First Name:*</label>
        <input type="text" name="first_name" required>

        <label for="middle_name">Applicant Middle Name:</label>
        <input type="text" name="middle_name">

        <label for="last_name">Applicant Last Name:*</label>
        <input type="text" name="last_name" required>

        <label for="father_name">Father Name:*</label>
        <input type="text" name="father_name" required>

        <label for="email">Applicant Email:*</label>
        <input type="email" name="email" required>

        <label for="mobile_no">Mobile No:*</label>
        <input type="tel" name="mobile_no" required>

        <label for="course">Course which you want?:*</label>
        <select name="course" required>
            <option value="it">IT</option>
            <option value="mechanical">Mechanical</option>
            <option value="doctor">Doctor</option>
            <option value="chemistry">Chemistry</option>
            <option value="arts">Arts</option>
        </select>

        <input type="submit" value="Apply Now">
    </form>
</section>


</body>

</html>
<?php
include('Extra/footer.php');
?>
