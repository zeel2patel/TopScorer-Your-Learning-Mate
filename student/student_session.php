<<<<<<< HEAD
<?php
   error_reporting(0);
   @session_start();
   include_once '../admin/function/dbConnection.php';
   if (!isset($_SESSION['student_loggedin']) && $_SESSION['student_loggedin'] !== false) {
      header("location:login.php");
   }
=======
<?php
   error_reporting(0);
   @session_start();
   include_once '../admin/function/dbConnection.php';
   if (!isset($_SESSION['student_loggedin']) && $_SESSION['student_loggedin'] !== false) {
      header("location:login.php");
   }
>>>>>>> dca3ad7e5005466afc739c01ee917dab6bfcdb2b
?>