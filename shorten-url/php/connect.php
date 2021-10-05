<?php 
$domain = "localhost/url/";
$servername = "localhost";
$username = "root";
$password = "";
$dbname='shorten-url';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>