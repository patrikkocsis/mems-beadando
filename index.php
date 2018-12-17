


<html>
<head>
    <title>Raspberry Pi Weather Log</title>
    <style type="text/css">
        .table_titles, .table_cells_odd, .table_cells_even {
                padding-right: 20px;
                padding-left: 20px;
                color: #000;
        }
        .table_titles {
            color: #FFF;
            background-color: #666;
        }
        .table_cells_odd {
            background-color: #CCC;
        }
        .table_cells_even {
            background-color: #FAFAFA;
        }
        table {
            border: 2px solid #333;
            
        }
        body { font-family: "Trebuchet MS", Arial; 
            background-image: url("bground.jpg");
            
            background-repeat: no-repeat;
            background-size: cover;
        }
        #table-wrapper {
  position:relative;
}
#table-scroll {
  height:90%;
  overflow:auto;  
  margin-top:20px;
  width:60%;
  margin-left: auto;
margin-right: auto;
  
}
#table-wrapper table {
  width:100%;

}

#table-wrapper table thead th .text {
  position:absolute;   
  top:-20px;
  z-index:2;
  height:20px;
  width:35%;
  border:1px solid red;
}
        
    </style>
</head>

    <body>
        <h1 style="color:white;" align="center">Raspberry Pi Weather Log</h1>
        
    <div id="table-wrapper">
  <div id="table-scroll">
    <table align="center" border="0" cellspacing="0" cellpadding="4">
      <tbody>
      <tr align=center>
           
            <td class="table_titles">Dátum</td>
            <td class="table_titles">Hőmérséklet</td>
            <td class="table_titles">Páratartalom</td>
          </tr>
           </tbody>
<?php

    // MySQL szerver adatai
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

    // Rekordok lekérdezése és kijelzése
    $sql = 'SELECT * FROM `WeatherStation`';
    $result = mysqli_query($conn, $sql);

    // Páratlan sorok vizsgálata
    $oddrow = true;

    // Rekordok feldolgozása
    while( $row = mysqli_fetch_array($result) )
    {
        if ($oddrow) 
        { 
            $css_class=' class="table_cells_odd"'; 
        }
        else
        { 
            $css_class=' class="table_cells_even"'; 
        }

        $oddrow = !$oddrow;

        echo '<tr align=center>';
       
        echo '   <td'.$css_class.'>'.$row["Date"].'</td>';
        echo '   <td'.$css_class.'>'.$row["Temperature"].'°C</td>';
        echo '   <td'.$css_class.'>'.$row["Humidity"].'%</td>';
        echo '</tr>';
    }
?>
    </table>
    </div>
</div>
    </body>
</html>