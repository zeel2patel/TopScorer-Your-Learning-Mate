<?php
   require_once "student_session.php";
   $studID= $_SESSION['user_id'];
?>
<html>
    <head>
        <style type='text/css'>
            body, html {
                margin: 0;
                padding: 0;
            }
            body {
                color: black;
                display: table;
                font-family: Georgia, serif;
                font-size: 24px;
                text-align: center;
            }
            .container {
                border: 20px solid tan;
                width: 750px;
                height: 563px;
                display: table-cell;
                vertical-align: middle;
            }
            .logo {
                color: tan;
            }

            .marquee {
                color: tan;
                font-size: 48px;
                margin: 20px;
            }
            .assignment {
                margin: 20px;
            }
            .person {
                border-bottom: 2px solid black;
                font-size: 32px;
                font-style: italic;
                margin: 20px auto;
                width: 400px;
            }
            .reason {
                margin: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="logo">
                An Organization
            </div>

            <div class="marquee">
                Certificate of Completion
            </div>

            <div class="assignment">
                This certificate is presented to
            </div>
				
				<?php 
                  if($conn) {
					
                    $status=1;
                    $sql1 = "SELECT e.*, u.name,c.*,s.* FROM enrollments as e, courses as c, subject as s, users as u WHERE  e.stud_id='".$studID."' and e.id=".$_GET['eid']." and s.sub_id=".$_GET['subid']." and e.course_id=c.course_id and s.course_id=c.course_id  and e.stud_id=u.id ORDER BY e.id DESC";
                    $result1 = mysqli_query($conn, $sql1);
                    $inumber=0;
					  
                    if (mysqli_num_rows($result1)>0){
						
						$row = mysqli_fetch_assoc($result1);
						
				?> 
            <div class="person">
                <?php echo $row['name']; ?>
            </div>

            <div class="reason">
                For <?php echo $row['sub_name']; ?><br/>
                in <?php echo $row['course_name']; ?>
            </div>
			<?php
			}
				  }
				  
                ?>
        </div>
    </body>
</html>