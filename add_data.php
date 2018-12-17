<?php
    // Connect to MySQL
$servername = "localhost";
$username = "id8018821_kocsis98";  //your user name for php my admin if in local most probaly it will be "root"
$password = "Mikroproject5";  //password probably it will be empty
$databasename = "id8018821_weatherstation"; //Your db nane
// Create connection
$conn = new mysqli($servername, $username, $password,$databasename);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

    // Prepare the SQL statement
      date_default_timezone_set('Europe/Budapest');
     $dateS = date('Y-m-d H:i:s', time());
    echo $dateS;
    $SQL = "INSERT INTO WeatherStation (Date,Temperature,Humidity) VALUES ('$dateS','".$_GET["temp"]."','".$_GET["hum"]."')";     

    // Execute SQL statement
    mysqli_query($conn, $SQL);
?>