<?php
require_once "student_session.php";
$studID = $_SESSION['user_id'];
$courseId = $_REQUEST['courseId'];
$enrollId = $_REQUEST['eid'];
$studName = "";
$courseName = "";
$semesterName = "";
?>
<html>

<head>
    <style type='text/css'>
        body,
        html {
            margin: 0;
            padding: 0;
        }

        body {
            color: black;
            display: table;
            font-family: Georgia, serif;
            font-size: 24px;
            text-align: center;
            color: black;
        }

        .container {
            border: 5px solid #1c1b19;
            width: 750px;
            height: 501px;
            display: table-cell;
            vertical-align: middle;
            position: absolute;
            margin-top: 250px;
            margin-left: 318px;
            padding-top: 30px;

        }

        .logo {
            color: tan;
        }

        .logo img {
            filter: invert(1);
            width: 200px;
        }

        .marquee {
            color: tan;
            font-size: 48px;
            margin: 20px;
            color: black;
        }

        .assignment {
            margin: 20px;
            color: black;
        }

        .person {
            border-bottom: 2px solid black;
            font-size: 32px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;
            color: black;
        }

        .reason {
            margin: 20px;
            color: black;
        }

        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px;
        }

        * {
            box-sizing: border-box;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        hr {
            width: 1097px;
            padding-top: 1px;
        }
    </style>
    <title>TopScorer</title>
    <link rel="icon" href="theme/dist/img/logo.png" type="image/png" sizes="16x16">
</head>

<body>
    <div class="row">
        <div class="column" style="">
            <div class="logo">
                <img src="../theme/img/logo.png" </div>
                <p>
                    <?php
                    $sql01 = "SELECT * FROM users WHERE  id='" . $studID . "'";
                    $result01 = mysqli_query($conn, $sql01);
                    if (mysqli_num_rows($result01) > 0) {
                        $row01 = mysqli_fetch_assoc($result01);
                        ?>
                    <div style="color:black;">
                        <?php echo $studName = $row01['name']; ?>
                    </div>
                <?php } ?>
                </p>
            </div>
            <div class="column" style="float:right; position:absolute; margin-top:-175px; margin-left:750px;">
                <h3>Student Achievement</h3>
                <?php
                $sql02 = "SELECT c.*,s.* FROM courses as c, semesters as s WHERE  c.course_id='" . $courseId . "' and c.semester_id=s.semester_id";
                $result02 = mysqli_query($conn, $sql02);
                if (mysqli_num_rows($result02) > 0) {
                    $row02 = mysqli_fetch_assoc($result02);
                    ?>
                    <p>
                    <div>
                        For <?php echo $courseName = $row02['course_name']; ?><br />
                    </div>
                    </p>
                    <p>
                    <div>
                        For <?php echo $semesterName = $row02['semester_name']; ?><br />
                    </div>
                    </p>
                <?php } ?>
            </div>
        </div>
        <p>
        <div></div>
        </p>

        <div style="margin-top: 201px;
  position: absolute;
  text-align: left;
  font-size: 22px;
  padding-left: 138px; margin-bottom:100px;">
            <hr>
            <p>Subject Name</p>
            <hr>
            <?php
            $GrandAvg = 0;
            $sql03 = "SELECT * FROM subject WHERE course_id='" . $courseId . "'";
            $result03 = mysqli_query($conn, $sql03);
            if (mysqli_num_rows($result03) > 0) {
                while ($row03 = mysqli_fetch_assoc($result03)) {
                    $subjectID = $row03['sub_id'];
                    ?>
                    <div>
                        <?php

                        $totalAvg = 0;
                        $sql04 = "SELECT SUM(g.grade) as totalGrade FROM assignments as a,grades as g WHERE a.sub_id='" . $subjectID . "' and g.assignment_id=a.id";
                        $result04 = mysqli_query($conn, $sql04);
                        if (mysqli_num_rows($result04) > 0) {
                            while ($row04 = mysqli_fetch_assoc($result04)) {
                                echo $row03['sub_name'] . ':-' . $row04['totalGrade'];
                                $GrandAvg = $GrandAvg + $row04['totalGrade'];
                            }
                        }
                        ?>
                    </div>

                <?php }
            } ?>
            <div>Result Grade:-<?php echo $GrandAvg; ?></div>
        </div>
        <div style="height: 200px;"></div>

        <div class="container">
            <div class="logo">
                <img src="../theme/img/logo.png" </div>
                <div class="marquee">
                    Certificate of Completion
                </div>
                <div class="assignment">
                    This certificate is presented to
                </div>
                <div class="person">
                    <?php echo $studName; ?>
                </div>
                <div class="reason">
                    For <?php echo $courseName; ?><br />
                </div>
            </div>
            <div class="reason">
                in <?php echo $semesterName; ?>
            </div>
</body>

</html>
<?php
require ('config.php');
if (isset($_POST['stripeToken'])) {
    \Stripe\Stripe::setVerifySslCerts(false);

    $token = $_POST['stripeToken'];

    $data = \Stripe\Charge::create(
        array(
            "amount" => 1000,
            "currency" => "cad",
            "description" => "Payment for certificate",
            "source" => $token,
        )
    );

    echo "<pre>";
}
?>