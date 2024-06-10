<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: admin.php");
    exit;
}

$servername = "localhost";
$db_username = "musicgeorge";
$db_password = "0000";
$dbname = "muusikapood";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Ühendus ebaõnnestus: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_user = $conn->real_escape_string($_POST['new_username']);
    $new_pass = $_POST['new_password'];

    if (strlen($new_pass) < 8) {
        echo "Parool peab olema vähemalt 8 tähemärki pikk!";
    } else {
        $hashed_pass = md5($new_pass);
        $check_user_sql = "SELECT COUNT(*) as count FROM users WHERE username='$new_user'";
        $check_user_result = $conn->query($check_user_sql);
        $row = $check_user_result->fetch_assoc();

        if ($row['count'] > 0) {
            echo "Kasutajanimi on juba olemas!";
        } else {
            $insert_sql = "INSERT INTO users (username, password) VALUES ('$new_user', '$hashed_pass')";
            if ($conn->query($insert_sql) === TRUE) {
                echo "Uus kasutaja lisatud edukalt!";
            } else {
                echo "Viga: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
</head>
<body>
    <h2>Tere, <?php echo $_SESSION['username']; ?>!</h2>
    <p>See on administraatori leht.</p>
    <h3>Lisa uus kasutaja</h3>
    <form method="post" action="">
        Uus kasutajanimi: <input type="text" name="new_username" required><br>
        Uus parool: <input type="password" name="new_password" required><br>
        <input type="submit" value="Registreeri">
    </form>
    <br>
    <a href="logout.php">Logi välja</a>
</body>
</html>
