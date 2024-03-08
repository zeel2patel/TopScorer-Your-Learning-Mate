<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopScorer - Your Learning Mate</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.jpg">
    <style>
        body,
        h1,
        h2,
        h3,
        p,
        ul {
            margin: 0;
            padding: 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: #fff;
            padding: 15px 0;
        }

        .logo img {
            width: 150px;
            height: auto;
            margin-left: 20px;
        }

        nav ul {
            list-style: none;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .row {
            display: flex;
            justify-content: space-evenly;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">

            <a href="home.php"><img src="images/logo.png" alt="Top Scorer - Your Learning Mate"></a>
        </div>
        <nav>
            <ul>
                <li><a href="./home.php">Home</a></li>
                <li><a href="./courses.php">Courses</a></li>
                <li><a href="./admin/login.php">Admin</a></li>
                <li><a href="login.php">Student</a></li>
            </ul>
        </nav>
    </header>