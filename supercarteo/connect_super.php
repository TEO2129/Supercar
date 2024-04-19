<?php
$db = new PDO('mysql:host=localhost;dbname=supercar;charset=utf8', 'root', '');

// create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("connection failed: " .mysqli_connect_error());
}

?>
