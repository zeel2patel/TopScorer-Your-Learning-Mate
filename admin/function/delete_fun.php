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
?>