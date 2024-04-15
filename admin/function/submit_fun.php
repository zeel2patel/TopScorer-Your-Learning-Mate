<?php 
    include_once 'dbConnection.php';
    session_start();
    date_default_timezone_set("Asia/Kolkata");
    $createDate = date('Y/m/d');
    $updateDate = date('Y/m/d');
    $createDateTime = date('Y/m/d H:i a');
    $updateDateTime = date('Y/m/d H:i a');

    if(isset($_REQUEST['login_page']) && $_REQUEST['login_page']=="login"){
        $response = array( 
            'status' => 0, 
            'message' => 'username and password not found, please try again.', 
            'page' => 'login.php' 
        ); 
        if(isset($_POST['inputEmail']) || isset($_POST['inputPassword']) || isset($_POST['inputUserType'])){ 
            $inputEmail = mysqli_real_escape_string($conn,$_POST['inputEmail']);
            $inputPassword = mysqli_real_escape_string($conn,$_POST['inputPassword']);
            $inputUserType =mysqli_real_escape_string($conn,$_POST['inputUserType']);
            if(!empty($inputEmail) && !empty($inputPassword) && !empty($inputUserType)){ 
                if($conn) {
                    $sql = 'SELECT id, email, password, user_type, status FROM users WHERE email = ?';
                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param('s', $inputEmail);
                        if ($stmt->execute()) {
                          $stmt->store_result();
                          if ($stmt->num_rows == 1) {
                            $stmt->bind_result($id, $inputEmail, $hashed_password, $user_type, $status);
                            if ($stmt->fetch()) {
                              if (password_verify($inputPassword, $hashed_password)) {
                                if($inputUserType=="faculty"){
                                    if($user_type=="faculty"){
                                        if($status==1){
                                            $_SESSION['user_type']=$user_type;
                                            $_SESSION['user_id'] = $id;
                                            $_SESSION['faculty_loggedin'] = true;
                                            $response['status'] = 1; 
                                            $response['message'] = 'Faculty Login successfully';
                                            $response['page'] = 'index.php';
                                        }else if($status==0){
                                            $response['status'] = 0; 
                                            $response['message'] = 'Faculty User not active yet.';
                                            $response['page'] = 'login.php';
                                        }
                                    }else{
                                        $response['status'] = 0; 
                                        $response['message'] = 'User not found!';
                                        $response['page'] = 'login.php';
                                    }
                                }else if($inputUserType=="student"){
                                    if($user_type=="student"){
                                        if($status==1){
                                            $_SESSION['user_type']=$user_type;
                                            $_SESSION['user_id'] = $id;
                                            $_SESSION['student_loggedin'] = true;
                                            $response['status'] = 1; 
                                            $response['message'] = 'Student Login successfully';
                                            $response['page'] = 'index.php';
                                        }else if($status==0){
                                            $response['status'] = 0; 
                                            $response['message'] = 'Student User not active yet.';
                                            $response['page'] = 'login.php';
                                        }
                                    }else{
                                        $response['status'] = 0; 
                                        $response['message'] = 'User not found!';
                                        $response['page'] = 'login.php';
                                    }
                                }
                              }else {
                                $response['status'] = 0; 
                                $response['message'] = 'Invalid password.';
                                $response['page'] = 'login.php'; 
                              }
                            }
                          }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Username does not exists.'; 
                            $response['page'] = 'login.php';
                          }
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Oops! Something went wrong please try again';
                            $response['page'] = 'login.php'; 
                        }
                        $stmt->close();
                    }
                    $conn->close();
                }else {
                    $response['status'] = 0; 
                    $response['message'] = die("Error". mysqli_connect_error()); 
                    $response['page'] = 'login.php';
                } 
            }else{
                $response['status'] = 0; 
                $response['message'] = 'Please fill all the mandatory fields.'; 
                $response['page'] = 'login.php';
            } 
        }
        echo json_encode($response);
    }else if(isset($_REQUEST['user_self_reg_page']) && $_REQUEST['user_self_reg_page']=="registration"){
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.',
            'page' => 'login.php'  
        ); 
        if(isset($_POST['inputName']) || isset($_POST['inputMobile']) || isset($_POST['inputEmail']) || isset($_POST['inputPassword']) || isset($_POST['inputUserType']) || isset($_POST['inputupdateId'])){ 

            $inputName = mysqli_real_escape_string($conn,$_POST['inputName']); 
            $inputMobile = mysqli_real_escape_string($conn,$_POST['inputMobile']); 
            $inputEmail = mysqli_real_escape_string($conn,$_POST['inputEmail']);
            $param_password = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
            $inputPassword = mysqli_real_escape_string($conn,$param_password);
            $inputupdateId = $_POST['inputupdateId'];
            $inputUserType =mysqli_real_escape_string($conn,$_POST['inputUserType']);
            $inputCourseId = mysqli_real_escape_string($conn,$_POST['inputCourseId']);

            if(!empty($inputName) && !empty($inputMobile) && !empty($inputEmail) && !empty($inputPassword) && !empty($inputUserType) && !empty($inputCourseId)){ 
                if($conn) {
                    $inputStatus=0;
                    $sqlInsert = "INSERT INTO users(name,email,password,user_type,status,mobile,createdate,updatedate) VALUES ('".$inputName."','".$inputEmail."','".$inputPassword."','".$inputUserType."','".$inputStatus."','".$inputMobile."','".$createDate."','".$updateDate."')";
                    if(mysqli_query($conn, $sqlInsert)){ 
                        $studId = mysqli_insert_id($conn);
                        $sqlEnrollInsert = "INSERT INTO enrollments(stud_id,course_id,enrollment_date) VALUES ('".$studId."','".$inputCourseId."','".$createDate."')";
                        if(mysqli_query($conn, $sqlEnrollInsert)){ 
                            $response['status'] = 1; 
                            $response['message'] = 'User Registration successfully! After activate login again.';
                            $response['page'] = 'login.php';
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'User Registration unsuccessfully!';
                            $response['page'] = 'login.php';  
                        }
                    }else{
                        $response['status'] = 0; 
                        $response['message'] = 'User Registration unsuccessfully!';
                        $response['page'] = 'login.php';  
                    }
                }else {
                    $response['status'] = 0; 
                    $response['message'] = die("Error". mysqli_connect_error());
                    $response['page'] = 'login.php'; 
                } 
            }else{
                $response['status'] = 0; 
                $response['message'] = 'Please fill all the mandatory fields.';
                $response['page'] = 'login.php'; 
            } 
        }
        echo json_encode($response);
    }else if(isset($_REQUEST['student_reg_page']) && $_REQUEST['student_reg_page']=="registration"){
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.',
            'page' => 'index.php'   
        ); 
        if(isset($_POST['inputName']) || isset($_POST['inputMobile']) || isset($_POST['inputEmail']) || isset($_POST['inputPassword']) || isset($_POST['inputUserType']) || isset($_POST['inputupdateId']) || isset($_POST['inputSemester']) || isset($_POST['inputCourse'])){ 
            
            $inputName = mysqli_real_escape_string($conn,$_POST['inputName']); 
            $inputMobile = mysqli_real_escape_string($conn,$_POST['inputMobile']); 
            $inputEmail = mysqli_real_escape_string($conn,$_POST['inputEmail']);
            $param_password = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
            $inputPassword = mysqli_real_escape_string($conn,$param_password);
            $inputupdateId = $_POST['inputupdateId'];
            $inputUserType =mysqli_real_escape_string($conn,$_POST['inputUserType']);
            $inputSemester = mysqli_real_escape_string($conn,$_POST['inputSemester']); 
            $inputCourse = mysqli_real_escape_string($conn,$_POST['inputCourse']);
            
            if(!empty($inputName) && !empty($inputMobile) && !empty($inputEmail) && !empty($inputPassword) && !empty($inputUserType) && !empty($inputSemester) && !empty($inputCourse)){ 
                if($conn) {
                    if ($inputupdateId!=0){
                        $inputStatus=0;
                        $sqlUpdateQuery = "UPDATE users SET name='".$inputName."', mobile='".$inputMobile."', email='".$inputEmail."',  user_type='".$inputUserType."', status='".$inputStatus."', updatedate='".$updateDate."' WHERE id='".$inputupdateId."'";
                        if(mysqli_query($conn, $sqlUpdateQuery)){ 
                            $sqlEnrollUpdate = "UPDATE enrollments SET stud_id='".$studentId."',course_id='".$inputCourse."',enrollment_date='".$createDate."'";
                            if(mysqli_query($conn, $sqlEnrollUpdate)){ 
                                $response['status'] = 1; 
                                $response['message'] = 'User update successfully!';
                                $response['page'] = $inputUserType.'.php';
                            }else{
                                $response['status'] = 0; 
                                $response['message'] = 'User Registration unsuccessfully!';
                                $response['page'] = $inputUserType.'.php';  
                            }

                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'User not update!'; 
                            $response['page'] = $inputUserType.'.php';   
                        }
                    }else if ($inputupdateId==0){
                        $inputStatus=0;
                        $sqlInsert = "INSERT INTO users(name,mobile,email,password,user_type,status,createdate,updatedate) VALUES ('".$inputName."','".$inputMobile."','".$inputEmail."','".$inputPassword."','".$inputUserType."','".$inputStatus."','".$createDate."','".$updateDate."')";
                        if(mysqli_query($conn, $sqlInsert)){ 
                            $studentId = mysqli_insert_id($conn);
                            $sqlEnrollInsert = "INSERT INTO enrollments(stud_id,course_id,enrollment_date) VALUES ('".$studentId."','".$inputCourse."','".$createDate."')";
                            if(mysqli_query($conn, $sqlEnrollInsert)){ 
                                $response['status'] = 1; 
                                $response['message'] = 'User Registration successfully.';
                                $response['page'] = $inputUserType.'.php';
                            }else{
                                $response['status'] = 0; 
                                $response['message'] = 'User Registration unsuccessfully!';
                                $response['page'] = $inputUserType.'.php';  
                            }  
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'User Registration unsuccessfully'; 
                            $response['page'] = $inputUserType.'.php';   
                        }
                    }
                }else {
                    $response['status'] = 0; 
                    $response['message'] = die("Error". mysqli_connect_error()); 
                    $response['page'] = $inputUserType.'.php';  
                } 
            }else{
                $response['status'] = 0; 
                $response['message'] = 'Please fill all the mandatory fields.'; 
                $response['page'] = $inputUserType.'.php';  
            } 
        }
        echo json_encode($response);
    }else if(isset($_REQUEST['faculty_reg_page']) && $_REQUEST['faculty_reg_page']=="registration"){
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.',
            'page' => 'index.php'   
        ); 
        if(isset($_POST['inputName']) || isset($_POST['inputMobile']) || isset($_POST['inputEmail']) || isset($_POST['inputPassword']) || isset($_POST['inputUserType'])){ 
            
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
                        $sqlUpdateQuery = "UPDATE users SET name='".$inputName."', mobile='".$inputMobile."', email='".$inputEmail."',  user_type='".$inputUserType."', status='".$inputStatus."', updatedate='".$updateDate."' WHERE id='".$inputupdateId."'";
                        if(mysqli_query($conn, $sqlUpdateQuery)){ 
                            $response['status'] = 1; 
                            $response['message'] = 'User update successfully!';
                            $response['page'] = $inputUserType.'.php';
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'User not update!'; 
                            $response['page'] = $inputUserType.'.php';   
                        }
                    }else if ($inputupdateId==0){
                        $inputStatus=0;
                        $sqlInsert = "INSERT INTO users(name,mobile,email,password,user_type,status,createdate,updatedate) VALUES('".$inputName."','".$inputMobile."','".$inputEmail."','".$inputPassword."','".$inputUserType."','".$inputStatus."','".$createDate."','".$updateDate."')";
                        if(mysqli_query($conn, $sqlInsert)){ 
                            $response['status'] = 1; 
                            $response['message'] = 'User Registration successfully.';
                            $response['page'] = $inputUserType.'.php'; 
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'User Registration unsuccessfully'; 
                            $response['page'] = $inputUserType.'.php';   
                        }
                    }
                }else {
                    $response['status'] = 0; 
                    $response['message'] = die("Error". mysqli_connect_error()); 
                    $response['page'] = $inputUserType.'.php';  
                } 
            }else{
                $response['status'] = 0; 
                $response['message'] = 'Please fill all the mandatory fields.'; 
                $response['page'] = $inputUserType.'.php';  
            } 
        }
        echo json_encode($response);
    }else if(isset($_REQUEST['semester_page']) && $_REQUEST['semester_page']=="semester"){
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.' 
        ); 
        if(isset($_POST['inputName']) || isset($_POST['inputupdateId'])){ 

            $inputName = mysqli_real_escape_string($conn,$_POST['inputName']); 
            $inputupdateId = $_POST['inputupdateId'];

            if(!empty($inputName)){ 
                if($conn) {
                    if ($inputupdateId!=0){
                        $sqlUpdateQuery = "UPDATE semesters SET semester_name='".$inputName."' WHERE semester_id='".$inputupdateId."'";
                        if(mysqli_query($conn, $sqlUpdateQuery)){ 
                            $response['status'] = 1; 
                            $response['message'] = 'Form data update successfully!'; 
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Form data not update!';  
                        }
                    }else if ($inputupdateId==0){
                        $sqlInsert = "INSERT INTO semesters(semester_name) VALUES ('".$inputName."')";
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
    }else if(isset($_REQUEST['course_page']) && $_REQUEST['course_page']=="course"){
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.' 
        ); 
        if(isset($_POST['inputSemester']) || isset($_POST['inputName']) || isset($_POST['inputDescription'])  || isset($_POST['inputStartDate']) || isset($_POST['inputEndDate']) || isset($_POST['inputupdateId'])){ 
            $inputupdateId = $_POST['inputupdateId'];
            $inputSemester = mysqli_real_escape_string($conn,$_POST['inputSemester']); 
            $inputName = mysqli_real_escape_string($conn,$_POST['inputName']); 
            $inputDescription = mysqli_real_escape_string($conn,$_POST['inputDescription']); 
            $inputStartDate = mysqli_real_escape_string($conn,$_POST['inputStartDate']); 
            $inputEndDate = mysqli_real_escape_string($conn,$_POST['inputEndDate']); 

            if(!empty($inputSemester) && !empty($inputName) && !empty($inputDescription) && !empty($inputStartDate) && !empty($inputEndDate) ){ 
                if($conn) {
                    if ($inputupdateId!=0){
                        $inputStatus=0;
                        $sqlUpdateQuery = "UPDATE courses SET  course_name='".$inputName."', course_description='".$inputDescription."', start_date='".$inputStartDate."', end_date='".$inputEndDate."', status='".$inputStatus."', semester_id='".$inputSemester."' WHERE course_id='".$inputupdateId."'";
                        if(mysqli_query($conn, $sqlUpdateQuery)){ 
                            $response['status'] = 1; 
                            $response['message'] = 'Form data update successfully!'; 
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Form data not update!';  
                        }
                    }else if ($inputupdateId==0){
                        $inputStatus=0;
                        $sqlInsertQuery = "INSERT INTO courses(course_name,course_description,start_date,end_date,status,semester_id) VALUES ('".$inputName."','".$inputDescription."','".$inputStartDate."','".$inputEndDate."','".$inputStatus."','".$inputSemester."')";
                        if(mysqli_query($conn, $sqlInsertQuery)){ 
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
        }else{
            $response['status'] = 0; 
            $response['message'] = 'Please fill mandatory fields.'; 
        } 
        echo json_encode($response);
    }else if(isset($_REQUEST['subject_page']) && $_REQUEST['subject_page']=="subject"){
        $uploadDir = '../uploads/subject/'; 
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.' 
        ); 
        if(isset($_POST['inputupdateId']) || isset($_POST['inputName']) || isset($_POST['inputDescription']) || isset($_POST['inputCourse']) || isset($_POST['inputFaculty'])){ 

            $inputupdateId = $_POST['inputupdateId'];
            $inputName = mysqli_real_escape_string($conn,$_POST['inputName']); 
            $inputDescription = mysqli_real_escape_string($conn,$_POST['inputDescription']); 
            $inputImg = mysqli_real_escape_string($conn,$_POST['img1']); 
            $inputCourse = mysqli_real_escape_string($conn,$_POST['inputCourse']);
            $inputFaculty = mysqli_real_escape_string($conn,$_POST['inputFaculty']); 

            if(!empty($inputName)){ 
                if($conn) {
                    if ($inputupdateId!=0){
                        $uploadStatus = 1; 
                        if($_FILES['inputSubImage']['name']!=null ||$_FILES['inputSubImage']['name']!=""){
                            $sourcePath = $_FILES['inputSubImage']['tmp_name'];
                            $targetPath = $uploadDir.$inputName.$_FILES['inputSubImage']['name'];
                            $targetsqlPath = 'uploads/subject/'.$inputName.$_FILES['inputSubImage']['name'];
                            if(move_uploaded_file($sourcePath,$targetPath)) {
                                $img1 = $targetsqlPath; 
                            }else{
                                $uploadStatus = 0; 
                                $response['message'] = 'Sorry, there was an error uploading your image 11.';
                            }
                        }else{
                            $img1 =$inputImg;
                        }
                        if($uploadStatus == 1){ 
                            $sqlUpdateQuery = "UPDATE subject SET  sub_name='".$inputName."', sub_description='".$inputDescription."', sub_img='".$img1."', course_id='".$inputCourse."', faculty_id='".$inputFaculty."' WHERE sub_id ='".$inputupdateId."'";
                            if(mysqli_query($conn, $sqlUpdateQuery)){ 
                                $response['status'] = 1; 
                                $response['message'] = 'Form data update successfully!'; 
                            }else{
                                $response['status'] = 0; 
                                $response['message'] = 'Form data not update!';  
                            }
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Form data not update!';  
                        }
                    }else if ($inputupdateId==0){
                        $uploadStatus = 1; 
                        $sourcePath = $_FILES['inputSubImage']['tmp_name'];
                        $targetPath = $uploadDir.$inputName.$_FILES['inputSubImage']['name'];
                        $targetsqlPath = 'uploads/subject/'.$inputName.$_FILES['inputSubImage']['name'];
                        if(move_uploaded_file($sourcePath,$targetPath)) {
                            $img1 = $targetsqlPath; 
                        }else{
                            $uploadStatus = 0; 
                            $response['message'] = 'Sorry, there was an error uploading your image 1.';
                        }
                        if($uploadStatus == 1){ 
                            $sqlInsertQuery = "INSERT INTO subject(sub_name,sub_description,sub_img,course_id,faculty_id) VALUES ('".$inputName."','".$inputDescription."','".$img1."','".$inputCourse."','".$inputFaculty."')";
                            if(mysqli_query($conn, $sqlInsertQuery)){ 
                                $response['status'] = 1; 
                                $response['message'] = 'Form data submitted successfully!'; 
                            }else{
                                $response['status'] = 0; 
                                $response['message'] = 'Form data not submitted!';  
                            }
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Form data not update!';  
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
        }else{
            $response['status'] = 0; 
            $response['message'] = 'Please fill mandatory fields.2'; 
        } 
        echo json_encode($response);
    }else if(isset($_REQUEST['assignments_page']) && $_REQUEST['assignments_page']=="assignments"){
        $uploadDir = '../../faculty/uploads/assignments/'; 
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.' 
        ); 
        if(isset($_POST['inputupdateId']) || isset($_POST['inputSubject']) || isset($_POST['inputFacultyId']) || isset($_POST['inputName']) || isset($_POST['inputDueDate']) || isset($_POST['imgRubrics']) || isset($_POST['imgAssignments'])){ 

            $inputupdateId = $_POST['inputupdateId'];
            $inputSubject = mysqli_real_escape_string($conn,$_POST['inputSubject']); 
            $inputFacultyId = mysqli_real_escape_string($conn,$_POST['inputFacultyId']); 
            $inputName = mysqli_real_escape_string($conn,$_POST['inputName']); 
            $inputDueDate = mysqli_real_escape_string($conn,$_POST['inputDueDate']); 

            if(!empty($inputSubject) && !empty($inputFacultyId) && !empty($inputName) && !empty($inputDueDate)){
                $imgRubrics = mysqli_real_escape_string($conn,$_POST['imgRubrics']);
                $imgAssignments = mysqli_real_escape_string($conn,$_POST['imgAssignments']);
                $uploadRubricsStatus = 1; 
                if($_FILES['inputRubricsImage']['name']!=null ||$_FILES['inputRubricsImage']['name']!=""){
                    $sourcePath = $_FILES['inputRubricsImage']['tmp_name'];
                    $targetPath = $uploadDir.$inputName.$_FILES['inputRubricsImage']['name'];
                    $targetsqlPath = 'uploads/assignments/'.$inputName.$_FILES['inputRubricsImage']['name'];
                    if(move_uploaded_file($sourcePath,$targetPath)) {
                        $rubricsImg = $targetsqlPath; 
                    }else{
                        $uploadRubricsStatus = 0; 
                        $response['message'] = 'Sorry, there was an error uploading your image 11.';
                    }
                }else{
                    $rubricsImg =$imgRubrics;
                }
                $uploadAssignmentsStatus = 1; 
                if($_FILES['inputAssignmentsImage']['name']!=null ||$_FILES['inputAssignmentsImage']['name']!=""){
                    $sourcePath = $_FILES['inputAssignmentsImage']['tmp_name'];
                    $targetPath = $uploadDir.$inputName.$_FILES['inputAssignmentsImage']['name'];
                    $targetsqlPath = 'uploads/assignments/'.$inputName.$_FILES['inputAssignmentsImage']['name'];
                    if(move_uploaded_file($sourcePath,$targetPath)) {
                        $assignmentsImg = $targetsqlPath; 
                    }else{
                        $uploadAssignmentsStatus = 0; 
                        $response['message'] = 'Sorry, there was an error uploading your image 11.';
                    }
                }else{
                    $assignmentsImg =$imgAssignments;
                }
                if($conn) {
                    if ($inputupdateId!=0){
                        if($uploadRubricsStatus == 1 && $uploadAssignmentsStatus == 1){ 
                            $inputStatus=1;
                            $sqlUpdateQuery = "UPDATE assignments SET  sub_id='".$inputSubject."', assignment_name='".$inputName."', due_date='".$inputDueDate."', rubrics='".$rubricsImg."', assignment_folder='".$assignmentsImg."', status='".$inputStatus."', create_date='".$createDate."' WHERE id ='".$inputupdateId."'";
                            if(mysqli_query($conn, $sqlUpdateQuery)){ 
                                $response['status'] = 1; 
                                $response['message'] = 'Form data update successfully!'; 
                            }else{
                                $response['status'] = 0; 
                                $response['message'] = 'Form data not update!';  
                            }
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Form data not update!';  
                        }
                    }else if ($inputupdateId==0){
                        if($uploadRubricsStatus == 1 && $uploadAssignmentsStatus == 1){ 
                            $inputStatus=1;
                            $sqlInsertQuery = "INSERT INTO assignments(sub_id,assignment_name,due_date,rubrics,assignment_folder,status,create_date) VALUES('".$inputSubject."','".$inputName."','".$inputDueDate."','".$rubricsImg."','".$assignmentsImg."','".$inputStatus."','".$createDate."')";
                            if(mysqli_query($conn, $sqlInsertQuery)){ 
                                $response['status'] = 1; 
                                $response['message'] = 'Form data submitted successfully!'; 
                            }else{
                                $response['status'] = 0; 
                                $response['message'] = 'Form data not submitted!';  
                            }
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Form data not submitted!';  
                        }
                    }else{
                        $response['status'] = 0; 
                        $response['message'] = "Something wrong!";
                    }
                }else {
                    $response['status'] = 0; 
                    $response['message'] = die("Error". mysqli_connect_error()); 
                }
            }else{
                $response['status'] = 0; 
                $response['message'] = 'Please fill mandatory fields.'; 
            } 
        }else{
            $response['status'] = 0; 
            $response['message'] = 'Please fill mandatory fields.2'; 
        } 
        echo json_encode($response);
    }else if(isset($_REQUEST['assignments_submit_page']) && $_REQUEST['assignments_submit_page']=="assignments_submit"){
        $uploadDir = '../../faculty/uploads/assignmentsSubmit/'; 
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.' 
        ); 
        if(isset($_POST['inputStudentID']) || isset($_POST['inputAssessmentID']) || isset($_POST['inputComment'])){ 
            $inputStudentID = mysqli_real_escape_string($conn,$_POST['inputStudentID']);
            $inputAssessmentID = mysqli_real_escape_string($conn,$_POST['inputAssessmentID']); 
            $inputComment = mysqli_real_escape_string($conn,$_POST['inputComment']); 

            if(!empty($inputStudentID) && !empty($inputAssessmentID) && !empty($inputComment)){
                if($conn) {
                    if($_FILES['inputAssignments']['name']!=null ||$_FILES['inputAssignments']['name']!=""){
                        $sourcePath = $_FILES['inputAssignments']['tmp_name'];
                        $targetPath = $uploadDir.$inputStudentID.'_'.$inputAssessmentID.'_'.$_FILES['inputAssignments']['name'];
                        $targetsqlPath = 'uploads/assignmentsSubmit/'.$inputStudentID.'_'.$inputAssessmentID.'_'.$_FILES['inputAssignments']['name'];
                        if(move_uploaded_file($sourcePath,$targetPath)) {
                            $sqlInsertQuery = "INSERT INTO assignments_student(stud_id,assignments_id,comment,submission_folder) VALUES('".$inputStudentID."','".$inputAssessmentID."','".$inputComment."','".$targetsqlPath."')";
                            if(mysqli_query($conn, $sqlInsertQuery)){ 
                                $response['status'] = 1; 
                                $response['message'] = 'Assessment submitted successfully!'; 
                            }else{
                                $response['status'] = 0; 
                                $response['message'] = 'Assessment not submitted!';  
                            }
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Sorry, there was an error uploading your image.';
                        }
                    } 
                }else {
                    $response['status'] = 0; 
                    $response['message'] = die("Error". mysqli_connect_error()); 
                }
            }else{
                $response['status'] = 0; 
                $response['message'] = 'Please fill mandatory fields.'; 
            } 
        }else{
            $response['status'] = 0; 
            $response['message'] = 'Please fill mandatory fields.'; 
        } 
        echo json_encode($response);
    }else if(isset($_REQUEST['announcement_page']) && $_REQUEST['announcement_page']=="announcement"){
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.' 
        ); 
        if(isset($_POST['inputupdateId']) || isset($_POST['inputCourse']) || isset($_POST['inputFacultyId']) || isset($_POST['inputTitle']) || isset($_POST['inputDescription'])){ 

            $inputupdateId = $_POST['inputupdateId'];
            $inputCourse = mysqli_real_escape_string($conn,$_POST['inputCourse']); 
            $inputFacultyId = mysqli_real_escape_string($conn,$_POST['inputFacultyId']); 
            $inputTitle = mysqli_real_escape_string($conn,$_POST['inputTitle']); 
            $inputDescription = mysqli_real_escape_string($conn,$_POST['inputDescription']); 

            if(!empty($inputCourse) && !empty($inputFacultyId) && !empty($inputTitle) && !empty($inputDescription)){
                if($conn) {
                    if ($inputupdateId!=0){
                        $inputStatus=1;
                        $sqlUpdateQuery = "UPDATE announcements SET  course_id='".$inputCourse."', faculty_id='".$inputFacultyId."', title='".$inputTitle."', description='".$inputDescription."', status='".$inputStatus."', createdate='".$createDateTime."', updatedate='".$updateDateTime."'  WHERE id ='".$inputupdateId."'";
                        if(mysqli_query($conn, $sqlUpdateQuery)){ 
                            $response['status'] = 1; 
                            $response['message'] = 'Form data update successfully!'; 
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Form data not update!';  
                        }
                    }else if ($inputupdateId==0){
                        $inputStatus=1;
                        $sqlInsertQuery = "INSERT INTO announcements(course_id,faculty_id,title,description,status,createdate,updatedate) VALUES('".$inputCourse."','".$inputFacultyId."','".$inputTitle."','".$inputDescription."','".$inputStatus."','".$createDateTime."','".$updateDateTime."')";
                        if(mysqli_query($conn, $sqlInsertQuery)){ 
                            $response['status'] = 1; 
                            $response['message'] = 'Form data submitted successfully!'; 
                        }else{
                            $response['status'] = 0; 
                            $response['message'] = 'Form data not submitted!';  
                        }
                    }else{
                        $response['status'] = 0; 
                        $response['message'] = "Something wrong!";
                    }
                }else {
                    $response['status'] = 0; 
                    $response['message'] = die("Error". mysqli_connect_error()); 
                }
            }else{
                $response['status'] = 0; 
                $response['message'] = 'Please fill mandatory fields.'; 
            } 
        }else{
            $response['status'] = 0; 
            $response['message'] = 'Please fill mandatory fields.'; 
        } 
        echo json_encode($response);
    }else if(isset($_REQUEST['grade_page']) && $_REQUEST['grade_page']=="grade"){
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.' 
        ); 
        if(isset($_POST['inputupdateId']) || isset($_POST['inputEnrollmentsId']) || isset($_POST['inputAssignments']) || isset($_POST['inputAssignmentsGrade'])){ 

            $inputupdateId = $_POST['inputupdateId'];
            $inputEnrollmentsId = mysqli_real_escape_string($conn,$_POST['inputEnrollmentsId']); 
            $inputAssignments = mysqli_real_escape_string($conn,$_POST['inputAssignments']); 
            $inputAssignmentsGrade = mysqli_real_escape_string($conn,$_POST['inputAssignmentsGrade']);

            if(!empty($inputEnrollmentsId) && !empty($inputAssignments) && !empty($inputAssignmentsGrade)){
                if($conn) {
                    $sqlInsertQuery = "INSERT INTO grades(enrollment_id,assignment_id,grade,grade_date) VALUES('".$inputEnrollmentsId."','".$inputAssignments."','".$inputAssignmentsGrade."','".$createDate."')";
                    if(mysqli_query($conn, $sqlInsertQuery)){ 
                        $response['status'] = 1; 
                        $response['message'] = 'Grade data submitted successfully!'; 
                    }else{
                        $response['status'] = 0; 
                        $response['message'] = 'Grade data not submitted!';  
                    }
                }else {
                    $response['status'] = 0; 
                    $response['message'] = die("Error". mysqli_connect_error()); 
                }
            }else{
                $response['status'] = 0; 
                $response['message'] = 'Please fill mandatory fields.'; 
            } 
        }else{
            $response['status'] = 0; 
            $response['message'] = 'Please fill mandatory fields.'; 
        } 
        echo json_encode($response);
    }else if(isset($_REQUEST['attendance_page']) && $_REQUEST['attendance_page']=="attendance"){
        $response = array( 
            'status' => 0, 
            'message' => 'Form submission failed, please try again.' 
        ); 
        if(isset($_POST['inputupdateId']) || isset($_POST['inputEnrollmentsId']) || isset($_POST['inputStudent']) || isset($_POST['inputAssignmentsGrade'])){ 
            $inputEnrollmentsId = mysqli_real_escape_string($conn,$_POST['inputEnrollmentsId']); 
            $inputAttCourse = mysqli_real_escape_string($conn,$_POST['inputAttCourse']);
            $inputAttStatus = mysqli_real_escape_string($conn,$_POST['inputAttStatus']); 
            if(!empty($inputEnrollmentsId) && !empty($inputAttCourse) && !empty($inputAttStatus)){
                if($conn) {
                    $sqlInsertQuery = "INSERT INTO attendance(enrollment_id,course_id,attendance_date,status) VALUES('".$inputEnrollmentsId."','".$inputAttCourse."','".$createDate."','".$inputAttStatus."')";
                    if(mysqli_query($conn, $sqlInsertQuery)){ 
                        $response['status'] = 1; 
                        $response['message'] = 'Attendance submitted successfully!'; 
                    }else{
                        $response['status'] = 0; 
                        $response['message'] = 'Attendance not submitted!';  
                    }
                }else {
                    $response['status'] = 0; 
                    $response['message'] = die("Error". mysqli_connect_error()); 
                }
            }else{
                $response['status'] = 0; 
                $response['message'] = 'Please fill mandatory fields.'; 
            } 
        }else{
            $response['status'] = 0; 
            $response['message'] = 'Please fill mandatory fields.'; 
        } 
        echo json_encode($response);
    }

 ?>
