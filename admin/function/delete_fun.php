<<<<<<< Updated upstream
<?php 
    include_once 'dbConnection.php';
    if(isset($_POST['student_del_page']) && $_POST['student_del_page']=="student"){
        $id = $_REQUEST['mID'];
        $sql = "DELETE FROM users WHERE id=$id";
        if(mysqli_query($conn, $sql)){ 
            echo 'Delete student successfully!'; 
        }else{
            echo 'Delete student not successfully!';
        }
    }else if(isset($_POST['faculty_del_page']) && $_POST['faculty_del_page']=="faculty"){
        $id = $_REQUEST['mID'];
        $sql = "DELETE FROM users WHERE id=$id";
        if(mysqli_query($conn, $sql)){ 
            echo 'Delete faculty successfully!'; 
        }else{
            echo 'Delete faculty not successfully!';
        }
    }
=======
<?php 
    include_once 'dbConnection.php';
    if(isset($_POST['student_del_page']) && $_POST['student_del_page']=="student"){
        $id = $_REQUEST['mID'];
        $sql = "DELETE FROM users WHERE id=$id";
        if(mysqli_query($conn, $sql)){ 
            echo 'Delete student successfully!'; 
        }else{
            echo 'Delete student not successfully!';
        }
    }else if(isset($_POST['faculty_del_page']) && $_POST['faculty_del_page']=="faculty"){
        $id = $_REQUEST['mID'];
        $sql = "DELETE FROM users WHERE id=$id";
        if(mysqli_query($conn, $sql)){ 
            echo 'Delete faculty successfully!'; 
        }else{
            echo 'Delete faculty not successfully!';
        }
    }else if(isset($_POST['semester_del_page']) && $_POST['semester_del_page']=="semester"){
        $id = $_REQUEST['mID'];
        $sql = "DELETE FROM semesters WHERE semester_id=$id";
        if(mysqli_query($conn, $sql)){ 
            echo 'Delete semester successfully!'; 
        }else{
            echo 'Delete semester not successfully!';
        }
    }else if(isset($_POST['course_del_page']) && $_POST['course_del_page']=="course"){
        $id = $_REQUEST['mID'];
        $sql = "DELETE FROM courses WHERE course_id=$id";
        if(mysqli_query($conn, $sql)){ 
            echo 'Delete course successfully!'; 
        }else{
            echo 'Delete course not successfully!';
        }
    }else if(isset($_POST['subject_del_page']) && $_POST['subject_del_page']=="subject"){
        $id = $_REQUEST['mID'];
        $sql = "DELETE FROM subject WHERE sub_id=$id";
        if(mysqli_query($conn, $sql)){ 
            echo 'Delete subject successfully!'; 
        }else{
            echo 'Delete subject not successfully!';
        }
    }else if(isset($_POST['assignments_del_page']) && $_POST['assignments_del_page']=="assignments"){
        $id = $_REQUEST['mID'];
        $sql = "DELETE FROM assignments WHERE id=$id";
        if(mysqli_query($conn, $sql)){ 
            echo 'Delete assignments successfully!'; 
        }else{
            echo 'Delete assignments not successfully!';
        }
    }else if(isset($_POST['announcements_del_page']) && $_POST['announcements_del_page']=="announcements"){
        $id = $_REQUEST['mID'];
        $sql = "DELETE FROM announcements WHERE id=$id";
        if(mysqli_query($conn, $sql)){ 
            echo 'Delete announcements successfully!'; 
        }else{
            echo 'Delete announcements not successfully!';
        }
    }
>>>>>>> Stashed changes
?>