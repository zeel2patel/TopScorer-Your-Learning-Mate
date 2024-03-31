<?php 
    include_once 'dbConnection.php';
    $updateDate = date('Y/m/d');
    if(isset($_POST['activation_page']) && $_POST['activation_page']=="activation"){
        $id = $_REQUEST['mID'];
        $mStatus = $_REQUEST['mStatus'];
        if($mStatus==1){ $inputStatus=0;}else if($mStatus==0){ $inputStatus=1;}
        $sql = "UPDATE users SET status='".$inputStatus."', updatedate='".$updateDate."' WHERE id='".$id."'";
        if(mysqli_query($conn, $sql)){ 
            if($inputStatus==1){
                echo 'User activate successfully'; 
            }else if($inputStatus==0){
                echo 'User deactivate successfully'; 
            }
        }else{
            if($inputStatus==1){
                echo 'User activate error'; 
            }else if($inputStatus==0){
                echo 'User deactivate error'; 
            }
        }
    }else if(isset($_POST['course_activation_page']) && $_POST['course_activation_page']=="course_activation"){
        $id = $_REQUEST['mID'];
        $mStatus = $_REQUEST['mStatus'];
        if($mStatus==1){ $inputStatus=0;}else if($mStatus==0){ $inputStatus=1;}
        $sql = "UPDATE courses SET status='".$inputStatus."' WHERE course_id='".$id."'";
        if(mysqli_query($conn, $sql)){ 
            if($inputStatus==1){
                echo 'Course activate successfully'; 
            }else if($inputStatus==0){
                echo 'Course deactivate successfully'; 
            }
        }else{
            if($inputStatus==1){
                echo 'Course activate error'; 
            }else if($inputStatus==0){
                echo 'Course deactivate error'; 
            }
        }
    }else if(isset($_POST['assignments_activation_page']) && $_POST['assignments_activation_page']=="assignments_activation"){
        $id = $_REQUEST['mID'];
        $mStatus = $_REQUEST['mStatus'];
        if($mStatus==1){ $inputStatus=0;}else if($mStatus==0){ $inputStatus=1;}
        $sql = "UPDATE assignments SET status='".$inputStatus."' WHERE id='".$id."'";
        if(mysqli_query($conn, $sql)){ 
            if($inputStatus==1){
                echo 'Assignments activate successfully'; 
            }else if($inputStatus==0){
                echo 'Assignments deactivate successfully'; 
            }
        }else{
            if($inputStatus==1){
                echo 'Assignments activate error'; 
            }else if($inputStatus==0){
                echo 'Assignments deactivate error'; 
            }
        }
    }else if(isset($_POST['announcements_activation_page']) && $_POST['announcements_activation_page']=="announcements_activation"){
        $id = $_REQUEST['mID'];
        $mStatus = $_REQUEST['mStatus'];
        if($mStatus==1){ $inputStatus=0;}else if($mStatus==0){ $inputStatus=1;}
        $sql = "UPDATE announcements SET status='".$inputStatus."' WHERE id='".$id."'";
        if(mysqli_query($conn, $sql)){ 
            if($inputStatus==1){
                echo 'Announcements activate successfully'; 
            }else if($inputStatus==0){
                echo 'Announcements deactivate successfully'; 
            }
        }else{
            if($inputStatus==1){
                echo 'Announcements activate error'; 
            }else if($inputStatus==0){
                echo 'Announcements deactivate error'; 
            }
        }
    }
?>