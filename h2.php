<?php
include("config.php");

?>


<form method="get" action="">
	Otsing <input type="text" name="otsi">
	<input type="submit" value="otsi...">
</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumid</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php
       
        require_once('config.php');

      

      
        if ($conn->connect_error) {
            die("Ühenduse viga: " . $conn->connect_error);
        } else {
            echo "Andmebaasiga ühendatud edukalt.<br><br>";
        }

      
        echo "<h2>Albumid:</h2>";
        $sql_query = "SELECT * FROM albumid LIMIT 10";
        $result = $conn->query($sql_query);
        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<tr><th>Artist</th><th>Album</th><th>Aasta</th><th>Hind</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['artist']."</td><td>".$row['album']."</td><td>".$row['aasta']."</td><td>".$row['hind']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Tulemusi ei leitud.";
        }

    
        $conn->close();
        ?>
    </div>
</body>
</html>
