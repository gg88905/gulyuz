<?php
$host = "localhost";
$user = "mysql";
$password = "mysql";
$dbname = "gulyuz";

$conn = new mysqli($host, $user, $password, $dbname);


if ($conn->connect_error) {
    die("Ma'lumotlar bazasiga ulanishda xatolik: " . $conn->connect_error);
}

?>
