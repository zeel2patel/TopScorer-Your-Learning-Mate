<?php
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'TopScorer');
define('CHARSET', 'utf8mb4');

if (defined("INITIALIZING_DATABASE")) {
    $dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD)
        or die("Could Not Connect To MySQL: " . mysqli_connect_error());
    mysqli_set_charset($dbc, CHARSET);
} else {
    $dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die("Could Not Connect To MySQL: " . mysqli_connect_error());
    mysqli_set_charset($dbc, CHARSET);
}
?>