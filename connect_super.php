<?php
$db = new PDO('mysql:host=mysql-abaidine.alwaysdata.net;dbname=abaidine_supercar;charset=utf8', 'abaidine', '6Swdc!FQVEaV6-U');

// create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// check connection
if (!$conn) {
    die("connection failed: " .mysqli_connect_error());
}

?>
