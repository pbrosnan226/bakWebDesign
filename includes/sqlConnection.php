<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bakWebDesign";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Create connection
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
}
?>