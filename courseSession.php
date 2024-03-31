<<<<<<< HEAD
<?php  
@session_start();
$course=$_REQUEST["applyId"]; 
$_SESSION['select_semesters']=$semesters;
$_SESSION['select_course'] = $course;
$_SESSION['select_subject'] = $subject;

header("Location:student/index.php");
=======
<?php  
@session_start();
$course=$_REQUEST["applyId"]; 
$_SESSION['select_semesters']=$semesters;
$_SESSION['select_course'] = $course;
$_SESSION['select_subject'] = $subject;

header("Location:student/index.php");
>>>>>>> dca3ad7e5005466afc739c01ee917dab6bfcdb2b
?>  