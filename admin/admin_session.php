<?php
   error_reporting(0);
   @session_start();
   include_once 'function/dbConnection.php';
   if (!isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] !== false) {
      header("location:login.php");
   }
   
?>