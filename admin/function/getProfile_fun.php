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
        $sqlAssignment = "SELECT a.*,a.id as assignmentsID,s.*,e.* FROM subject as s,enrollments as e,assignments as a,assignments_student as ass WHERE e.stud_id='".$mSID."' and e.course_id=s.course_id and s.sub_id=a.sub_id and ass.assignments_id=a.id";
        $resultAssignment = mysqli_query($conn, $sqlAssignment);
        if (mysqli_num_rows($resultAssignment)>0){
          while($rowAssignment = mysqli_fetch_assoc($resultAssignment)) {
                $assID=$rowAssignment['assignmentsID'];
        $sqlAssignment1 = "SELECT * FROM grades WHERE assignment_id='".$assID."'";
        $resultAssignment1 = mysqli_query($conn, $sqlAssignment1);
        if (mysqli_num_rows($resultAssignment1)>0){}else{
?> 
    <option value="<?php echo $rowAssignment['assignmentsID'];?>"><?php echo $rowAssignment['assignment_name'];?></option> 
<?php 
    }}}
?>
<?php 
   }else if(isset($_REQUEST['get_std_course_data_page']) && $_REQUEST['get_std_course_data_page']=="get_std_course_data"){
?>
    <option disabled value="0" selected style="font-weight: bold;">Select Course</option>
<?php 
        $mSID=$_GET['mSID'];
        $mEID=$_GET['mEID'];
        $sqlSubject = "SELECT c.* FROM courses as c,enrollments as e WHERE e.course_id=c.course_id and e.stud_id='".$mSID."'";
        $resultSubject = mysqli_query($conn, $sqlSubject);
        if (mysqli_num_rows($resultSubject)>0){
          while($rowSubject = mysqli_fetch_assoc($resultSubject)) {
?> 
    <option value="<?php echo $rowSubject['course_id'];?>" data-eid="<?php echo $mEID;?>" data-sid="<?php echo $mSID;?>"><?php echo $rowSubject['course_name'];?></option> 
<?php 
    }}
?>
<?php 
   }else if(isset($_REQUEST['get_grade_details_data_page']) && $_REQUEST['get_grade_details_data_page']=="get_grade_details_data"){
        $mCID=$_GET['mCID'];
        $mEID=$_GET['mEID'];
        $mSID=$_GET['mSID'];
?> 
    <div class="row">
      <div class="col-md-12">
        <?php 
          if($conn) {
            $sql1 = "SELECT c.*,a.*,e.*,s.* FROM assignments as a, enrollments as e,subject as s,courses as c WHERE e.course_id=c.course_id and e.course_id=s.course_id and s.sub_id=a.sub_id and e.stud_id='".$mSID."' GROUP BY c.course_id ORDER BY a.id DESC";
            $result1 = mysqli_query($conn, $sql1);
            $inumber=0;
            if (mysqli_num_rows($result1)>0){
        ?>
        <div class="card card-info">
          <div class="card-header">
          </div>
          <div class="card-body">
            <table class="table table-striped projects text-center">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Subject Name</th>
                  <th scope="col">Assignments Name</th>
                  <th scope="col">Due Date</th>
                  <th scope="col">Grade</th>
                </tr>
              </thead>
              <tbody >
                <?php 
                  while($row = mysqli_fetch_assoc($result1)) {
                    $today = date("Y-m-d");
                    $courseId=$row['course_id'];
                    $GrandAvg=0;
                        $sqlSub = "SELECT * FROM subject WHERE course_id='".$courseId."'";
                        $resultSub = mysqli_query($conn, $sqlSub);
                        if (mysqli_num_rows($resultSub)>0){
                            while($rowSemSub = mysqli_fetch_assoc($resultSub)) {
                                $inumber++;
                                $subId=$rowSemSub['sub_id'];
                ?>
                    <tr style="border: hidden;">
                      <td scope="row"><?php echo  $inumber;?></td>
                      <td scope="row"><?php echo $rowSemSub['sub_name'];?></td>
                        <?php 
                          $totalAvg=0;
                          $sqlAssi = "SELECT * FROM assignments WHERE sub_id='".$subId."'";
                          $resultAssi = mysqli_query($conn, $sqlAssi);
                          if (mysqli_num_rows($resultAssi)>0){
                            while($rowAssi = mysqli_fetch_assoc($resultAssi)) {
                              $assignmentId=$rowAssi['id'];
                        ?>
                        <tr >
                          <td></td>
                          <td></td>
                          <td scope="row"><?php echo $rowAssi['assignment_name'];?></td>
                          <td>
                            <?php echo $dueDate=$rowAssi['due_date'];?>
                          </td>
                          <td class="project-actions text-center">
                            <?php 
                                $sql002 = "SELECT g.grade FROM grades as g WHERE g.assignment_id='".$assignmentId."'";
                                $result002 = mysqli_query($conn, $sql002);
                                if (mysqli_num_rows($result002)>0){
                                  while($row002 = mysqli_fetch_assoc($result002)) {
                                    $totalAvg=$totalAvg+$row002['grade'];
                                    $GrandAvg=$GrandAvg+$row002['grade'];
                                    echo $row002['grade'];
                                  }
                                }else{
                                  echo '--';
                                }
                            ?>
                          </td>
                        </tr>
                        <?php } } ?>
                    </tr>
                    <tr scope="row">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Subject Total Grade:</td>
                      <td><?php echo $totalAvg;?></td>
                    </tr>
                    <?php } } ?>
                    <tr scope="row">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Grant Total Grade:</td>
                      <td><?php echo $GrandAvg;?></td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <?php } } ?>
      </div>
    </div>
<?php 
   }else if(isset($_REQUEST['get_attend_details_data_page']) && $_REQUEST['get_attend_details_data_page']=="get_attend_details_data"){
        $mCID=$_GET['mCID'];
        $mEID=$_GET['mEID'];
?> 
<div class="row" >
  <div class="col-md-12" >
    <?php 
        $sql1 = "SELECT c.*,a.* FROM attendance as a,courses as c WHERE a.enrollment_id='".$mEID."' and a.course_id='".$mCID."' and a.course_id=c.course_id  ORDER BY a.attendance_date DESC";
        $result1 = mysqli_query($conn, $sql1);
        $inumber=0;
        if (mysqli_num_rows($result1)>0){
    ?>
    <div class="card card-info">
      <div class="card-header">
      </div>
      <div class="card-body">
        <table class="table table-striped projects text-center">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Course Name</th>
              <th scope="col">Date</th>
              <th scope="col">Attendance</th>
            </tr>
          </thead>
          <tbody >
            <?php 
                while($row = mysqli_fetch_assoc($result1)) {
                  $inumber++;
            ?>
            <tr>
                <td scope="row"><?php echo  $inumber;?></td>
                <td scope="row"><?php echo $row['course_name'];?></td>
                <td scope="row"><?php echo $row['attendance_date'];?></td>
                <td scope="row">
                    <?php if($row['status']=="present"){?>
                        <div style="background-color: greenyellow; font-weight: bold; color: darkgreen;">Present</div>
                    <?php }else if($row['status']=="absent"){?>
                        <div style="background-color: orangered; font-weight: bold; color: white;">Absent</div>
                    <?php }?>
                </td>
            </tr>
        <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php } ?>
  </div>
</div> 
<?php 
    }
?>