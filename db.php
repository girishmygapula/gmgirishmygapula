<?php
$host = 'localhost';
// MySQL Database Name
$dbname = 'welcome';
// MySQL Database User
$dbuser = 'root';
// MySQL Database Password
$dbpass = '';
$dbConnect = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $dbuser, $dbpass);
$dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>