<?php 
    include_once 'dbConnection.php';
    $createDate = date('Y/m/d');
    $updateDate = date('Y/m/d');
    if(isset($_REQUEST['student_page']) && $_REQUEST['student_page']=="student"){
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.' 
        ); 
        if(isset($_POST['inputName']) || isset($_POST['inputMobile']) || isset($_POST['inputEmail']) || isset($_POST['inputPassword']) || isset($_POST['inputUserType']) || isset($_POST['inputupdateId'])){ 

            $inputName = mysqli_real_escape_string($conn,$_POST['inputName']); 
            $inputMobile = mysqli_real_escape_string($conn,$_POST['inputMobile']); 
            $inputEmail = mysqli_real_escape_string($conn,$_POST['inputEmail']);
            $param_password = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
            $inputPassword = mysqli_real_escape_string($conn,$param_password);
            $inputupdateId = $_POST['inputupdateId'];
            $inputUserType =mysqli_real_escape_string($conn,$_POST['inputUserType']);

            if(!empty($inputName) && !empty($inputMobile) && !empty($inputEmail) && !empty($inputPassword) && !empty($inputUserType)){ 
                if($conn) {
                    if ($inputupdateId!=0){
                        $inputStatus=0;
                        $sqlUpdateQuery = "UPDATE users SET name='".$inputName."', email='".$inputEmail."', password='".$inputPassword."', user_type='".$inputUserType."', status='".$inputStatus."', mobile='".$inputMobile."', updatedate='".$updateDate."' WHERE id='".$inputupdateId."'";
                        if(mysqli_query($conn, $sqlUpdateQuery)){ 
                            $response['status'] = 1; 
                            $response['message'] = 'Form data update successfully!'; 
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Form data not update!';  
                        }
                    }else if ($inputupdateId==0){
                        $inputStatus=0;
                        $sqlInsert = "INSERT INTO users(name,email,password,user_type,status,mobile,createdate,updatedate) VALUES ('".$inputName."','".$inputEmail."','".$inputPassword."','".$inputUserType."','".$inputStatus."','".$inputMobile."','".$createDate."','".$updateDate."')";
                        if(mysqli_query($conn, $sqlInsert)){ 
                            $response['status'] = 1; 
                            $response['message'] = 'Form data submitted successfully!'; 
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Form data not submitted!';  
                        }
                    }
                }else {
                    $response['status'] = 0; 
                    $response['message'] = die("Error". mysqli_connect_error()); 
                } 
            }else{
                $response['status'] = 0; 
                $response['message'] = 'Please fill all the mandatory fields.'; 
            } 
        }
        echo json_encode($response);
    }else if(isset($_REQUEST['faculty_page']) && $_REQUEST['faculty_page']=="faculty"){
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.' 
        ); 
        if(isset($_POST['inputName']) || isset($_POST['inputMobile']) || isset($_POST['inputEmail']) || isset($_POST['inputUserName']) || isset($_POST['inputPassword']) || isset($_POST['inputUserType']) || isset($_POST['inputupdateId'])){ 

            $inputName = mysqli_real_escape_string($conn,$_POST['inputName']); 
            $inputMobile = mysqli_real_escape_string($conn,$_POST['inputMobile']); 
            $inputEmail = mysqli_real_escape_string($conn,$_POST['inputEmail']);
            $inputUserName = mysqli_real_escape_string($conn,$_POST['inputUserName']);
            $inputPassword = mysqli_real_escape_string($conn,$_POST['inputPassword']);
            $inputupdateId = $_POST['inputupdateId'];
            $inputUserType =mysqli_real_escape_string($conn,$_POST['inputUserType']);

            if(!empty($inputName) && !empty($inputMobile) && !empty($inputEmail) && !empty($inputUserName) && !empty($inputPassword) && !empty($inputUserType)){ 
                if($conn) {
                    if ($inputupdateId!=0){
                        $inputStatus=0;
                        $sqlUpdateQuery = "UPDATE users SET name='".$inputName."', email='".$inputEmail."', username='".$inputUserName."', password='".$inputPassword."', user_type='".$inputUserType."', status='".$inputStatus."', mobile='".$inputMobile."', updatedate='".$updateDate."' WHERE id='".$inputupdateId."'";
                        if(mysqli_query($conn, $sqlUpdateQuery)){ 
                            $response['status'] = 1; 
                            $response['message'] = 'Form data update successfully!'; 
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Form data not update!';  
                        }
                    }else if ($inputupdateId==0){
                        $inputStatus=0;
                        $sqlInsert = "INSERT INTO users(name,email,username,password,user_type,status,mobile,createdate,updatedate) VALUES ('".$inputName."','".$inputEmail."','".$inputUserName."','".$inputPassword."','".$inputUserType."','".$inputStatus."','".$inputMobile."','".$createDate."','".$updateDate."')";
                        if(mysqli_query($conn, $sqlInsert)){ 
                            $response['status'] = 1; 
                            $response['message'] = 'Form data submitted successfully!'; 
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Form data not submitted!';  
                        }
                    }
                }else {
                    $response['status'] = 0; 
                    $response['message'] = die("Error". mysqli_connect_error()); 
                } 
            }else{
                $response['status'] = 0; 
                $response['message'] = 'Please fill all the mandatory fields.'; 
            } 
        }
        echo json_encode($response);
    }

 ?>
