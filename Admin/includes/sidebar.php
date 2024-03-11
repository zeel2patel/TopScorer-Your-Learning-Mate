<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="images/favicon.jpg" alt="profile image">
        </div>
        <div class="text-wrapper">
          <p class="profile-name"><?php echo $row['username']; ?></p>
          <p class="designation"><?php echo $row['email']; ?></p>
        </div>

      </a>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Dashboard</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="true" aria-controls="ui-basic1">
        <span class="menu-title">Field & Courses</span>
      </a>
      <div class="collapse" id="ui-basic1">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="addfield.php">Add & Manage Fields</a></li>
          <li class="nav-item"> <a class="nav-link" href="addcourse.php">Add Courses</a></li>
          <li class="nav-item"> <a class="nav-link" href="managecourse.php">Manage Courses</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
        <span class="menu-title">Semester Management</span>
      </a>
      <div class="collapse" id="ui-basic2">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="addsemester.php">Add Semesters</a></li>
          <li class="nav-item"> <a class="nav-link" href="managesemester.php">Manage Semesters</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
        <span class="menu-title">Student Management</span>
      </a>
      <div class="collapse" id="ui-basic2">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="studentapplication.php">Student Applications</a></li>
          <li class="nav-item"> <a class="nav-link" href="facultyapplication.php">Faculty Applications</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>