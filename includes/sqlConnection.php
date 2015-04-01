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
	echo "Connected";
}
function phoneEnter($phone){
{
    $number = trim(preg_replace('#[^0-9]#s', '', $phone));

    $length = strlen($number);
    if($length == 7) {
        $regex = '/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/';
        $replace = '$1-$2';
    } elseif($length == 10) {
        $regex = '/([0-9]{3})([0-9]{3})([0-9]{4})/';
        $replace = '($1) $2-$3';
    } elseif($length == 11) {
        $regex = '/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/';
        $replace = '$1 ($2) $3-$4';
    }

    $formatted = preg_replace($regex, $replace, $number);

    return $formatted;
} 
}
function phoneDisplay($number){
	$result="(".substr($number, 0, 3).") ".substr($number, 3, 3)."-".substr($number,6);
    return $result;
}
?>