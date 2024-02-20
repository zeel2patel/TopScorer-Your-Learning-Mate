<!doctype html>
<html>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        define("INITIALIZING_DATABASE", 1);
        require_once("db_connect.php");

        mysqli_query($dbc, "DROP database IF EXISTS TopScorer");
        mysqli_query($dbc, "CREATE database TopScorer");
        mysqli_query($dbc, "USE TopScorer");

        mysqli_query(
            $dbc,
            "CREATE TABLE IF NOT EXISTS Users (
                        user_id INT NOT NULL AUTO_INCREMENT,
                        username VARCHAR(255) NOT NULL,
                        password VARCHAR(255) NOT NULL,
                        user_type VARCHAR(255) NOT NULL,
                        email VARCHAR(255) NOT NULL,
                        account_recovery_info VARCHAR(255) NULL DEFAULT NULL,
                        PRIMARY KEY (user_id)
                      );"
        );

        mysqli_query(
            $dbc,
            "CREATE TABLE IF NOT EXISTS Semesters (
                semester_id INT NOT NULL AUTO_INCREMENT,
                semester_name VARCHAR(255) NOT NULL,
                start_date DATE NULL DEFAULT NULL,
                end_date DATE NULL DEFAULT NULL,
                PRIMARY KEY (semester_id)
              );"
        );

        mysqli_query(
            $dbc,
            "CREATE TABLE IF NOT EXISTS Field (
                field_id INT NOT NULL AUTO_INCREMENT,
                field_name VARCHAR(255) NOT NULL,
                PRIMARY KEY (field_id)
              );"
        );

        mysqli_query(
            $dbc,
            "CREATE TABLE IF NOT EXISTS Courses (
                course_id INT NOT NULL AUTO_INCREMENT,
                course_name VARCHAR(255) NOT NULL,
                course_description TEXT NULL DEFAULT NULL,
                field_id INT NULL DEFAULT NULL,
                PRIMARY KEY (course_id),
                  FOREIGN KEY (field_id)
                  REFERENCES Field (field_id)
              );"
        );

        mysqli_query(
            $dbc,
            "CREATE TABLE IF NOT EXISTS Enrollments (
                enrollment_id INT NOT NULL AUTO_INCREMENT,
                user_id INT NULL DEFAULT NULL,
                course_id INT NULL DEFAULT NULL,
                enrollment_date DATE NULL DEFAULT NULL,
                PRIMARY KEY (enrollment_id),
                  FOREIGN KEY (user_id)
                  REFERENCES Users (user_id),
                  FOREIGN KEY (course_id)
                  REFERENCES Courses (course_id)
              );"
        );

        mysqli_query(
            $dbc,
            "CREATE TABLE IF NOT EXISTS Assignments (
                assignment_id INT NOT NULL AUTO_INCREMENT,
                course_id INT NULL DEFAULT NULL,
                faculty_id INT NULL DEFAULT NULL,
                assignment_name VARCHAR(255) NOT NULL,
                due_date DATE NULL DEFAULT NULL,
                rubrics TEXT NULL DEFAULT NULL,
                submission_folder VARCHAR(255) NULL DEFAULT NULL,
                PRIMARY KEY (assignment_id),
                  FOREIGN KEY (course_id)
                  REFERENCES Courses (course_id),
                  FOREIGN KEY (faculty_id)
                  REFERENCES Users (user_id)
              );"
        );

        mysqli_query(
            $dbc,
            "CREATE TABLE IF NOT EXISTS Grades (
                grade_id INT NOT NULL AUTO_INCREMENT,
                enrollment_id INT NULL DEFAULT NULL,
                assignment_id INT NULL DEFAULT NULL,
                grade DECIMAL(5,2) NULL DEFAULT NULL,
                grade_date DATE NULL DEFAULT NULL,
                PRIMARY KEY (grade_id),
                  FOREIGN KEY (enrollment_id)
                  REFERENCES Enrollments (enrollment_id),
                  FOREIGN KEY (assignment_id)
                  REFERENCES Assignments (assignment_id)
              );"
        );


        mysqli_query(
            $dbc,
            "CREATE TABLE IF NOT EXISTS Attendance (
                attendance_id INT NOT NULL AUTO_INCREMENT,
                enrollment_id INT NULL DEFAULT NULL,
                attendance_date DATE NULL DEFAULT NULL,
                status ENUM('Present', 'Absent') NOT NULL,
                PRIMARY KEY (attendance_id),
                  FOREIGN KEY (enrollment_id)
                  REFERENCES Enrollments (enrollment_id)
              );"
        );


        mysqli_query(
            $dbc,
            "CREATE TABLE IF NOT EXISTS Announcements (
                announcement_id INT NOT NULL AUTO_INCREMENT,
                course_id INT NULL DEFAULT NULL,
                faculty_id INT NULL DEFAULT NULL,
                announcement_text TEXT NULL DEFAULT NULL,
                announcement_date DATE NULL DEFAULT NULL,
                PRIMARY KEY (announcement_id),
                  FOREIGN KEY (course_id)
                  REFERENCES Courses (course_id),
                  FOREIGN KEY (faculty_id)
                  REFERENCES Users (user_id)
              );"
        );

        mysqli_query(
            $dbc,
            "INSERT INTO users VALUES (1,'HoneyPatel7','b89a210147be0acc9b51045f28fe6f6d','Administrator','honeypatel3@icloud.com','HoneyPatel'
              );"
        );
        echo "<h3>DataBase Initialized</h3>";
    }
    ?>
    <form method="POST">
        <input type="submit" value="Initialize Database">
    </form>
</body>

</html>