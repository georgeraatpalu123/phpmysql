<?php include('config.php');

$servername = "localhost";
$username = "musicgeorge";
$password = "0000";
$database = "muusikapood";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Ühendus ebaõnnestus.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $artist = $conn->real_escape_string(trim($_POST['artist']));
    $album = $conn->real_escape_string(trim($_POST['album']));

    if (!empty($artist) && !empty($album)) {
        $sql = "INSERT INTO albums (artist, album) VALUES ('$artist', '$album')";
        $conn->query($sql);
    }
}
?>

<body>
        <div class="container">   
        <h2>Lisa uus album:</h2>
        <form action="#" method="get">
            <label for="artist">Artist:</label>
            <input type="text" name="artist" id="artist"><br>
            <label for="album">Album:</label>
            <input type="text" name="album" id="album"><br>
            <label for="aasta">Aasta:</label>
            <input type="number" name="aasta" id="aasta"><br>
            <label for="hind">Hind:</label>
            <input type="number" name="hind" id="hind"><br>
            <input type="submit" class="btn btn-success my-2" value="Lisa">
        </form>
        <?php        
        if(!empty($_GET['artist']) && !empty($_GET['album']) && !empty($_GET['aasta']) && !empty($_GET['hind'])){
            $artist = $_GET["artist"];
            $album = $_GET["album"];
            $aasta = $_GET["aasta"];
            $hind = $_GET["hind"];

            $artist = mysqli_real_escape_string($yhendus, $artist);
            $album = mysqli_real_escape_string($yhendus, $album);
            $aasta = mysqli_real_escape_string($yhendus, $aasta);
            $hind = mysqli_real_escape_string($yhendus, $hind);

            $lisasql = "INSERT INTO tooted (artist, album, aasta, hind) VALUES ('$artist', '$album', '$aasta', '$hind')";
            if ($yhendus->query($lisasql) === TRUE) {
                echo "Lisatud";
            }
        }

        if(isset($_GET['action']) && $_GET['action'] == 'kustuta' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $kustutasql = "DELETE FROM tooted WHERE id=$id";
            if ($yhendus->query($kustutasql) === TRUE) {
                echo "Kustutatud!";
            }
        }

    