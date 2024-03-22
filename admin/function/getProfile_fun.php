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
?>