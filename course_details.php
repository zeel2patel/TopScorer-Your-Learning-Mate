<?php  
    @session_start();
    include_once 'admin/function/dbConnection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Course Details</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
           <?php include('theme/main_head.php');?>

            <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-12 text-center">
                            <h1 class="text-white animated zoomIn">Course Details</h1>
                            <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Full Screen Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="input-group" style="max-width: 600px;">
                            <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword">
                            <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->

<div class="content">
    <div class="container">
      <div class="row">

        
        <?php 
            $cid=$_REQUEST['cid'];
            $sql2 = "SELECT * FROM courses WHERE course_id='".$cid."'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2)>0){
                while($row2 = mysqli_fetch_assoc($result2)) {
        ?>

        <div class="col-6">
            <h1><?php echo $row2['course_name'];?></h1>
            <div class="list-group" style="text-align: left;">
                <p><?php echo $row2['course_description'];?></p>
            </div>

        </div>
        <div class="col-2"></div>
        <div class="col-2" style="padding: 20px;">
            <div class="main" >
                 <h5 style="font-weight: bold;border-radius: 10px;">Course Details</h5>
                <div class="list-group" style="text-align: left;">
                    <label style="color: #212471;">Start Date: <span style="color: #2124B1;"><?php echo $row2['start_date'];?></span></label>
                </div>
                <div class="list-group" style="text-align: left;">
                    <label style="color: #212471;">End Date: <span style="color: #2124B1;"><?php echo $row2['end_date'];?></span></label>
                </div>
                <div class="list-group" >
                    <a class="btn" href="student/login.php?applyId=<?php echo $row2['course_id'];?>" style="margin:5px;padding: 10px; background-color: #216A97;color: whitesmoke;font-weight: bold;border-radius: 10px; cursor:pointer !important; width:80%; ">
                       APPLY NOW
                    </a>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    <?php }}?>
      </div>
    </div>

    
  </div>
      
        


      
        

       
 <?php include('theme/main_footer.php');?>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>