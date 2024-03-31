<<<<<<< Updated upstream
<?php 
   if(isset($_REQUEST['get_student_page']) && $_REQUEST['get_student_page']=="student"){
      $mID=$_GET['mID'];
      $mName=$_GET['mName'];
      $mEmail=$_GET['mEmail'];
      $mMobile=$_GET['mMobile'];
      $mPassword=$_GET['mPassword'];
      $mUsertype=$_GET['mUsertype'];
      $mStatus=$_GET['mStatus'];
      $mCreatedate=$_GET['mCreatedate'];
      $mUpdatedate=$_GET['mUpdatedate'];
?>
   <div class="card card-primary card-outline">
      <h3 class="profile-username text-center"><?php echo $mName;?></h3>
      <p class="text-muted text-center"><?php echo $mUsertype;?></p>
      <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Email:</b> <a class="float-right"><?php echo $mEmail;?></a>
        </li>
        <li class="list-group-item">
            <b>Mobile:</b> <a class="float-right"><?php echo $mMobile;?></a>
        </li>
        <li class="list-group-item">
            <b>Password:</b> <a class="float-right"><?php echo $mPassword;?></a>
        </li>
        <li class="list-group-item">
            <b>Usertype:</b> <a class="float-right"><?php echo $mUsertype;?></a>
        </li>
         <li class="list-group-item">
            <b>Status:</b> <a class="float-right"><?php echo $mStatus;?></a>
        </li>
         <li class="list-group-item">
            <b>Create date:</b> <a class="float-right"><?php echo $mCreatedate;?></a>
        </li>
        <li class="list-group-item">
            <b>Update date:</b> <a class="float-right"><?php echo $mUpdatedate;?></a>
        </li>
      </ul>
      <div>
         <?php if($mStatus==1){?>
           <a class="btn btn-danger btn-sm" href="student_add.php?deactivate=<?php echo $mID;?>" style="margin:5px;" >
               <i class="fas fa-pencil-alt">
               </i>
               Deactive
           </a>
         <?php }else if($mStatus==0){?>
           <a class="btn btn-success btn-sm" href="student_add.php?activate=<?php echo $mID;?>" style="margin:5px;" >
            <i class="fas fa-pencil-alt">
            </i>
               Active
           </a>
         <?php }?>
         <a class="btn btn-info btn-sm" href="student_add.php?editId=<?php echo $mID;?>" style="margin:5px;">
            <i class="fas fa-pencil-alt">
            </i>
             Edit
         </a>
         
      </div>
   </div>
<?php 
   }else if(isset($_REQUEST['get_faculty_page']) && $_REQUEST['get_faculty_page']=="faculty"){
      $mID=$_GET['mID'];
      $mName=$_GET['mName'];
      $mEmail=$_GET['mEmail'];
      $mMobile=$_GET['mMobile'];
      $mPassword=$_GET['mPassword'];
      $mUsertype=$_GET['mUsertype'];
      $mStatus=$_GET['mStatus'];
      $mCreatedate=$_GET['mCreatedate'];
      $mUpdatedate=$_GET['mUpdatedate'];
?>
   <div class="card card-primary card-outline">
      <h3 class="profile-username text-center"><?php echo $mName;?></h3>
      <p class="text-muted text-center"><?php echo $mUsertype;?></p>
      <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Email:</b> <a class="float-right"><?php echo $mEmail;?></a>
        </li>
        <li class="list-group-item">
            <b>Mobile:</b> <a class="float-right"><?php echo $mMobile;?></a>
        </li>
        <li class="list-group-item">
            <b>Password:</b> <a class="float-right"><?php echo $mPassword;?></a>
        </li>
        <li class="list-group-item">
            <b>Usertype:</b> <a class="float-right"><?php echo $mUsertype;?></a>
        </li>
         <li class="list-group-item">
            <b>Status:</b> <a class="float-right"><?php echo $mStatus;?></a>
        </li>
         <li class="list-group-item">
            <b>Create date:</b> <a class="float-right"><?php echo $mCreatedate;?></a>
        </li>
        <li class="list-group-item">
            <b>Update date:</b> <a class="float-right"><?php echo $mUpdatedate;?></a>
        </li>
      </ul>
      <div>
         <?php if($mStatus==1){?>
           <a class="btn btn-danger btn-sm" href="faculty_add.php?editId=<?php echo $row['id'];?>" style="margin:5px;" >
               <i class="fas fa-pencil-alt">
               </i>
               Deactive
           </a>
         <?php }else if($mStatus==0){?>
           <a class="btn btn-info btn-sm" href="faculty_add.php?editId=<?php echo $row['id'];?>" style="margin:5px;" >
            <i class="fas fa-pencil-alt">
            </i>
               Active
           </a>
         <?php }?>
         <a class="btn btn-info btn-sm" href="faculty_add.php?editId=<?php echo $mID;?>" style="margin:5px;">
            <i class="fas fa-pencil-alt">
            </i>
             Edit
         </a>
      </div>
   </div>
<?php 
    }
=======
<?php 
    include_once 'dbConnection.php';
    session_start();

if(isset($_REQUEST['get_student_page']) && $_REQUEST['get_student_page']=="student"){
      $mID=$_GET['mID'];
      $mName=$_GET['mName'];
      $mEmail=$_GET['mEmail'];
      $mMobile=$_GET['mMobile'];
      $mPassword=$_GET['mPassword'];
      $mUsertype=$_GET['mUsertype'];
      $mStatus=$_GET['mStatus'];
      $mCreatedate=$_GET['mCreatedate'];
      $mUpdatedate=$_GET['mUpdatedate'];
?>
   <div class="card card-primary card-outline">
      <h3 class="profile-username text-center"><?php echo $mName;?></h3>
      <p class="text-muted text-center"><?php echo $mUsertype;?></p>
      <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Email:</b> <a class="float-right"><?php echo $mEmail;?></a>
        </li>
        <li class="list-group-item">
            <b>Mobile:</b> <a class="float-right"><?php echo $mMobile;?></a>
        </li>
        <li class="list-group-item">
            <b>Password:</b> <a class="float-right"><?php echo "*****" //$mPassword;?></a>
            <!-- <a class="" href="student.php?passChange=<?php echo $mID;?>" style="margin:5px;" >
               <i class="fas fa-pencil-alt">
               </i>
               Change
           </a> -->
        </li>
        <li class="list-group-item">
            <b>Usertype:</b> <a class="float-right"><?php echo $mUsertype;?></a>
        </li>
        <li class="list-group-item">
            <b>Status:</b> <a class="float-right">
                <?php if($mStatus==0){?>
                    <b>Deactive</b>
                <?php }else if($mStatus==1){?>
                    <b>Active</b>
                <?php }?>
            </a>
        </li>
         <li class="list-group-item">
            <b>Create date:</b> <a class="float-right"><?php echo $mCreatedate;?></a>
        </li>
        <li class="list-group-item">
            <b>Update date:</b> <a class="float-right"><?php echo $mUpdatedate;?></a>
        </li>
      </ul>
      <div>
         <a class="btn btn-info btn-sm" href="student.php?editId=<?php echo $mID;?>" style="margin:5px;">
            <i class="fas fa-pencil-alt">
            </i>
             Edit
         </a>
      </div>
   </div>
<?php 
   }else if(isset($_REQUEST['get_faculty_page']) && $_REQUEST['get_faculty_page']=="faculty"){
      $mID=$_GET['mID'];
      $mName=$_GET['mName'];
      $mEmail=$_GET['mEmail'];
      $mMobile=$_GET['mMobile'];
      $mPassword=$_GET['mPassword'];
      $mUsertype=$_GET['mUsertype'];
      $mStatus=$_GET['mStatus'];
      $mCreatedate=$_GET['mCreatedate'];
      $mUpdatedate=$_GET['mUpdatedate'];
?>
   <div class="card card-primary card-outline">
      <h3 class="profile-username text-center"><?php echo $mName;?></h3>
      <p class="text-muted text-center"><?php echo $mUsertype;?></p>
      <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Email:</b> <a class="float-right"><?php echo $mEmail;?></a>
        </li>
        <li class="list-group-item">
            <b>Mobile:</b> <a class="float-right"><?php echo $mMobile;?></a>
        </li>
        <li class="list-group-item">
            <b>Password:</b> <a class="float-right"><?php echo "*****" //$mPassword;?></a>
            <!-- <a class="" href="student.php?passChange=<?php echo $mID;?>" style="margin:5px;" >
               <i class="fas fa-pencil-alt">
               </i>
               Change
           </a> -->
        </li>
        <li class="list-group-item">
            <b>Usertype:</b> <a class="float-right"><?php echo $mUsertype;?></a>
        </li>
        <li class="list-group-item">
            <b>Status:</b> <a class="float-right">
                <?php if($mStatus==0){?>
                    <b>Deactive</b>
                <?php }else if($mStatus==1){?>
                    <b>Active</b>
                <?php }?>
            </a>
        </li>
         <li class="list-group-item">
            <b>Create date:</b> <a class="float-right"><?php echo $mCreatedate;?></a>
        </li>
        <li class="list-group-item">
            <b>Update date:</b> <a class="float-right"><?php echo $mUpdatedate;?></a>
        </li>
      </ul>
      <div>
         <a class="btn btn-info btn-sm" href="faculty.php?editId=<?php echo $mID;?>" style="margin:5px;">
            <i class="fas fa-pencil-alt">
            </i>
             Edit
         </a>
      </div>
   </div>
<?php 
   }else if(isset($_REQUEST['get_semester_page']) && $_REQUEST['get_semester_page']=="semester"){
      $mID=$_GET['mID'];
      $mName=$_GET['mName'];
?>
    <div class="card card-primary card-outline">
      <h3 class="profile-username text-center"><?php echo $mName;?></h3>
    </div>
<?php 
   }else if(isset($_REQUEST['get_course_page']) && $_REQUEST['get_course_page']=="course"){
      $mID=$_GET['mID'];
      $mName=$_GET['mName'];
      $mDescription=$_GET['mDescription'];
      $mStartDate=$_GET['mStartDate'];
      $mEndDate=$_GET['mEndDate'];
      $mSemester=$_GET['mSemester'];
?>
    <div class="card card-primary card-outline">
      <h3 class="profile-username text-center"><?php echo $mName;?></h3>
      <p class="text-muted text-center"><?php echo $mDescription;?></p>
      <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Start Date:</b> <a class="float-right"><?php echo $mStartDate;?></a>
        </li>
        <li class="list-group-item">
            <b>End Date:</b> <a class="float-right"><?php echo $mEndDate;?></a>
        </li>
        <li class="list-group-item">
            <b>Semester:</b> <a class="float-right"><?php echo $mSemester;?></a>
        </li>
      </ul>
    <div>
<?php 
   }else if(isset($_REQUEST['get_course_data_page']) && $_REQUEST['get_course_data_page']=="get_course_data"){
?>
    <option disabled value="0" selected style="font-weight: bold;">Select Course</option>
<?php 
        $mID=$_GET['mID'];
        $sqlCourse = "SELECT * FROM courses WHERE semester_id='".$mID."'";
        $resultCourse = mysqli_query($conn, $sqlCourse);
        if (mysqli_num_rows($resultCourse)>0){
          while($rowCourse = mysqli_fetch_assoc($resultCourse)) {
?> 
    <option value="<?php echo $rowCourse['course_id'];?>"><?php echo $rowCourse['course_name'];?></option> 
<?php 
    }}
?>
<?php 
   }else if(isset($_REQUEST['get_subject_page']) && $_REQUEST['get_subject_page']=="subject"){
      $mID=$_GET['mID'];
      $mName=$_GET['mName'];
      $mDescription=$_GET['mDescription'];
      $mSubImg=$_GET['mSubImg'];
      $mSemesterName=$_GET['mSemesterName'];
      $mCourseName=$_GET['mCourseName'];
?>
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-circle " src="<?php echo $mSubImg;?>">
            </div>
          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Subject Name:</b> <a class="float-right"><?php echo $mName;?></a>
            </li>
            <li class="list-group-item">
                <b>Semester Name:</b> <a class="float-right"><?php echo $mSemesterName;?></a>
            </li>
            <li class="list-group-item">
                <b>Course Name:</b> <a class="float-right"><?php echo $mCourseName;?></a>
            </li>
            <li class="list-group-item">
                 <p class="float-left"><?php echo $mDescription;?></p>
            </li>
          </ul>
        </div>
    <div>
<?php 
   }else if(isset($_REQUEST['get_assignment_page']) && $_REQUEST['get_assignment_page']=="assignment"){
      $mID=$_GET['mID'];
      $mAssignmentName=$_GET['mAssignmentName'];
      $mSubjectName=$_GET['mSubjectName'];
      $mCourseName=$_GET['mCourseName'];
      $mDueDate=$_GET['mDueDate'];
      $mRubrics=$_GET['mRubrics'];
      $mSubmissionFolder=$_GET['mSubmissionFolder'];
      $mCreateDate=$_GET['mCreateDate'];
      $mStatus=$_GET['mStatus'];
?>
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            
          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>Assignment Name:</b> <a class="float-right"><?php echo $mAssignmentName;?></a>
            </li>
            <li class="list-group-item">
                <b>Subject Name:</b> <a class="float-right"><?php echo $mSubjectName;?></a>
            </li>
            <li class="list-group-item">
                <b>Course Name:</b> <a class="float-right"><?php echo $mCourseName;?></a>
            </li>
            <li class="list-group-item">
                <b>Due Date:</b> <a class="float-right"><?php echo $mDueDate;?></a>
            </li>
            <li class="list-group-item">
                <b>Create Date:</b> <a class="float-right"><?php echo $mCreateDate;?></a>
            </li>
            <li class="list-group-item">
                <b>Status:</b> <a class="float-right">
                <?php if($mStatus==0){?>
                    <b>Deactive</b>
                <?php }else if($mStatus==1){?>
                    <b>Active</b>
                <?php }?>
            </a>
            </li>
            <li class="list-group-item">
                <b>Rubrics:</b> 
                <div class="text-center">
                    <img class="profile-user-img img-circle " src="<?php echo $mRubrics;?>">
                </div>
            </li>
            <li class="list-group-item">
                <b>Assignment:</b> 
                <div class="text-center">
                    <img class="profile-user-img img-circle " src="<?php echo $mSubmissionFolder;?>">
                </div>
            </li>
          </ul>
            
        </div>
    <div>
<?php 
   }else if(isset($_REQUEST['get_subject_data_page']) && $_REQUEST['get_subject_data_page']=="get_subject_data"){
?>
    <option disabled value="0" selected style="font-weight: bold;">Select Subject</option>
<?php 
        $mCID=$_GET['mCID'];
        $sqlSubject = "SELECT * FROM subject WHERE course_id='".$mCID."'";
        $resultSubject = mysqli_query($conn, $sqlSubject);
        if (mysqli_num_rows($resultSubject)>0){
          while($rowSubject = mysqli_fetch_assoc($resultSubject)) {
?> 
    <option value="<?php echo $rowSubject['sub_id'];?>"><?php echo $rowSubject['sub_name'];?></option> 
<?php 
    }}
?>
<?php 
   }else if(isset($_REQUEST['get_announcement_page']) && $_REQUEST['get_announcement_page']=="announcement"){
      $mID=$_GET['mID'];
      $mSubjectName=$_GET['mSubjectName'];
      $mTitle=$_GET['mTitle'];
      $mDescription=$_GET['mDescription'];
      $mCreateDate=$_GET['mCreateDate'];
      $mUpdateDate=$_GET['mUpdateDate'];
      $mStatus=$_GET['mStatus'];
?>
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        
      <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
            <b>Course Name:</b> <a class="float-right"><?php echo $mSubjectName;?></a>
        </li>
        <li class="list-group-item">
            <b>Title:</b> <a class="float-right"><?php echo $mTitle;?></a>
        </li>
        <li class="list-group-item">
            <b>Description:</b> <a class="float-right"><?php echo $mDescription;?></a>
        </li>
        <li class="list-group-item">
            <b>Create Date:</b> <a class="float-right"><?php echo $mCreateDate;?></a>
        </li>
        <li class="list-group-item">
            <b>Update Date:</b> <a class="float-right"><?php echo $mUpdateDate;?></a>
        </li>
        <li class="list-group-item">
            <b>Status:</b> <a class="float-right">
            <?php if($mStatus==0){?>
                <b>Deactive</b>
            <?php }else if($mStatus==1){?>
                <b>Active</b>
            <?php }?>
        </a>
        </li>
      </ul>
    </div>
<div>
<?php 
   }else if(isset($_REQUEST['get_courseDetails_page']) && $_REQUEST['get_courseDetails_page']=="courseDetails"){
      $mID=$_GET['mID'];
      $mSubName=$_GET['mSubName'];
      $mSubDescription=$_GET['mSubDescription'];
      $mSubIMG=$_GET['mSubIMG'];
      $mCourseName=$_GET['mCourseName'];
      $mCourseDescription=$_GET['mCourseDescription'];
      $mStartDate=$_GET['mStartDate'];
      $mEndDate=$_GET['mEndDate'];
      $mSemesterName=$_GET['mSemesterName'];
?>
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        
      <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
            <b>Semester Name:</b> <a class="float-right"><?php echo $mSemesterName;?></a>
        </li>
        <li class="list-group-item">
            <b>Course:</b> <a class="float-right"><?php echo $mCourseName;?></a>
        </li>
        <li class="list-group-item">
            <b>Course Description:</b> <a class="float-right"><?php echo $mCourseDescription;?></a>
        </li>
        <li class="list-group-item">
            <b>Course Start Date:</b> <a class="float-right"><?php echo $mStartDate;?></a>
        </li>
        <li class="list-group-item">
            <b>Course End Date:</b> <a class="float-right"><?php echo $mEndDate;?></a>
        </li>
        <li class="list-group-item">
            <b>Subject:</b> <a class="float-right"><?php echo $mSubName;?></a>
        </li>
        <li class="list-group-item">
            <b>Description:</b> <a class="float-right"><?php echo $mSubDescription;?></a>
        </li>
        
      </ul>
    </div>
<div>
<?php 
   }else if(isset($_REQUEST['get_assignments_data_page']) && $_REQUEST['get_assignments_data_page']=="get_assignments_data"){
?>
    <option disabled value="0" selected style="font-weight: bold;">Select Assignments</option>
<?php 
        $mSID=$_GET['mSID'];
        $sqlAssignment = "SELECT a.*,s.*,e.* FROM subject as s,enrollments as e,assignments as a WHERE e.stud_id='".$mSID."' and e.course_id=s.course_id and s.sub_id=a.sub_id";
        $resultAssignment = mysqli_query($conn, $sqlAssignment);
        if (mysqli_num_rows($resultAssignment)>0){
          while($rowAssignment = mysqli_fetch_assoc($resultAssignment)) {
?> 
    <option value="<?php echo $rowAssignment['id'];?>"><?php echo $rowAssignment['assignment_name'];?></option> 
<?php 
    }}
?>
<?php 
    }
>>>>>>> Stashed changes
?>