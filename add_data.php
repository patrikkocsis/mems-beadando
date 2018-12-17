<?php
    // MYSQL szerver adatai
$servername = "localhost";
$username = "id8018821_kocsis98";  
$password = "Mikroproject5";  
$databasename = "id8018821_weatherstation"; 
// Kapcsolat létrehozása
$conn = new mysqli($servername, $username, $password,$databasename);
// Kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

    // SQL feltétel előkészítés
      date_default_timezone_set('Europe/Budapest');
     $dateS = date('Y-m-d H:i:s', time());
    echo $dateS;
    $SQL = "INSERT INTO WeatherStation (Date,Temperature,Humidity) VALUES ('$dateS','".$_GET["temp"]."','".$_GET["hum"]."')";     

    // SQL feltétel végrehajtása
    mysqli_query($conn, $SQL);
?>
