<?php
//připojení k databázi
$servername = "193.85.203.188";
$username = "nejedly2";
$password = "inq4yAke";
$dbname = "nejedly2";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: index.html");
        exit();
    } else {
        echo "Nesprávné uživatelské jméno nebo heslo.";
    }
}

$conn->close();
?>
