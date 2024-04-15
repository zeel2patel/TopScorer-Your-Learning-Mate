<?php
require_once "student_session.php";
$studID = $_SESSION['user_id'];
$courseId = $_REQUEST['courseId'];
$eid = $_REQUEST['eid'];

$sql01 = "SELECT * FROM users WHERE id='" . $studID . "'";
$result01 = mysqli_query($conn, $sql01);
if (mysqli_num_rows($result01) > 0) {
    $row01 = mysqli_fetch_assoc($result01);
}

require ('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TopScorer</title>
    <link rel="icon" href="theme/dist/img/logo.png" type="image/png" sizes="16x16">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 8px;
        }
        h1, h2, h3 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>TopScorer - Your Learning Mate</h1>
        <h2>Congratulations To Completing Your Course!!</h2>
        <h3>Please Pay CAD $100 to Get The Certificate For This Course.</h3>
        <form action="printDiv.php?eid=<?php echo $eid; ?>&courseId=<?php echo $courseId; ?>" method="post">
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $publishableKey ?>"
                data-amount="10000" data-name="TopScorer"
                data-description="Congratulations!!" data-image="../theme/img/favicon.jpg"
                data-currency="cad" data-email="<?php echo $row01['email']; ?>">
            </script>
        </form>
    </div>
</body>
</html>
