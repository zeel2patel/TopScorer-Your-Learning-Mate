<?php
   error_reporting(0);
   @session_start();
   include_once '../admin/function/dbConnection.php';
   if (!isset($_SESSION['faculty_loggedin']) && $_SESSION['faculty_loggedin'] !== false) {
      header("location: login.php");
   }
?>