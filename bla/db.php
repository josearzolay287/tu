<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'tuchat');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE) or die(mysqli_connect_error());
$path = "uploads/"; //Images upload folder 

?>