<?php
class DatabaseCreate
{
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const DB_HOST = 'localhost';
    const DB_NAME = 'TopScorer';
    const CHARSET = 'utf8mb4';


    protected $sqlStatement = "";
    protected $params = null;
    protected $stmt = null;

    static protected $connection = null;

    static function initializeDatabase()
    {
        try {
            $data_source_name = "mysql:host=" . self::DB_HOST . ";charset=" . self::CHARSET;
            $pdo = new PDO($data_source_name, self::DB_USER, self::DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->query("drop database if exists TopScorer");
            $pdo->query("create database TopScorer");
            $pdo->query("use TopScorer");


            $pdo->query(
                "
                CREATE TABLE IF NOT EXISTS Users (
                    user_id INT NOT NULL AUTO_INCREMENT,
                    username VARCHAR(255) NOT NULL,
                    password VARCHAR(255) NOT NULL,
                    user_type ENUM('Student', 'Faculty', 'Administrator') NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    account_recovery_info VARCHAR(255) NULL DEFAULT NULL,
                    PRIMARY KEY (user_id)
                  );"
            );

            $pdo->query(
                "
                CREATE TABLE IF NOT EXISTS Semesters (
                    semester_id INT NOT NULL AUTO_INCREMENT,
                    semester_name VARCHAR(255) NOT NULL,
                    PRIMARY KEY (semester_id)
                  );"
            );


            $pdo->query(
                "
                CREATE TABLE IF NOT EXISTS Field (
                    field_id INT NOT NULL AUTO_INCREMENT,
                    field_name VARCHAR(255) NOT NULL,
                    PRIMARY KEY (field_id)
                  );"
            );

            $pdo->query(
                "
                CREATE TABLE IF NOT EXISTS Courses (
                    course_id INT NOT NULL AUTO_INCREMENT,
                    course_name VARCHAR(255) NOT NULL,
                    course_description TEXT NULL DEFAULT NULL,
                    start_date DATE NULL DEFAULT NULL,
                    end_date DATE NULL DEFAULT NULL,
                    semester_id INT NULL DEFAULT NULL,
                    field_id INT NULL DEFAULT NULL,
                    PRIMARY KEY (course_id),
                      FOREIGN KEY (semester_id)
                      REFERENCES Semesters (semester_id),
                      FOREIGN KEY (field_id)
                      REFERENCES Field (field_id)
                  );"
            );

            $pdo->query(
                "
                CREATE TABLE IF NOT EXISTS Enrollments (
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


            $pdo->query(
                "
                CREATE TABLE IF NOT EXISTS Assignments (
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

            $pdo->query(
                "
                CREATE TABLE IF NOT EXISTS Grades (
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

            $pdo->query(
                "
                CREATE TABLE IF NOT EXISTS Attendance (
                    attendance_id INT NOT NULL AUTO_INCREMENT,
                    enrollment_id INT NULL DEFAULT NULL,
                    attendance_date DATE NULL DEFAULT NULL,
                    status ENUM('Present', 'Absent') NOT NULL,
                    PRIMARY KEY (attendance_id),
                      FOREIGN KEY (enrollment_id)
                      REFERENCES Enrollments (enrollment_id)
                  );"
            );

            $pdo->query(
                "
                CREATE TABLE IF NOT EXISTS Announcements (
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


        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function __construct()
    {
        if (self::$connection == null) {
            try {
                $data_source_name = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";charset=" . self::CHARSET;
                self::$connection = new PDO($data_source_name, self::DB_USER, self::DB_PASSWORD);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }

    function getConnection()
    {
        return self::$connection;
    }
    function getRowCount()
    {
        return $this->stmt->rowCount();
    }

    function reset()
    {
        $this->sqlStatement = "";
        $this->params = null;
        $this->stmt = null;
    }

    function statement($sqlStatement)
    {
        $this->reset();
        $this->sqlStatement = $sqlStatement;
        return $this;
    }

    function params($params)
    {
        $this->params = $params;
        return $this;
    }

    function execute($sqlStatement = "")
    {
        if (!empty($sqlStatement))
            $this->statement($sqlStatement);
        if (is_array($this->params)) {
            $this->stmt = self::$connection->prepare($this->sqlStatement);
            $this->stmt->execute($this->params);
        } else
            $this->stmt = self::$connection->query($this->sqlStatement);
        return $this;
    }

    function forOne(callable $callback, $userDefinedData = null)
    {
        if ($row = $this->stmt->fetch()) {
            $callback($row, $userDefinedData);
        }
    }

    function forEach (callable $callback, $userDefinedData = null)
    {
        $index = 0;
        while ($row = $this->stmt->fetch()) {
            $callback($index, $row, $userDefinedData);
            $index++;
        }
    }

}