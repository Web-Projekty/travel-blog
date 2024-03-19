<?php

require_once("vendor/autoload.php");
$latte = new Latte\Engine;

$latte->setTempDirectory('temp');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelblog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SET CHARACTER SET UTF8";
$conn->query($sql);

$sql = "SELECT Title FROM articles";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $i = 0;

    while ($row = $result->fetch_assoc()) {
        $title[$i] = $row["Tilte"];
    }
}
$params = [
    'title' => $title,
];


// kresli na výstup
$latte->render('template/classes.latte', $params);

$conn->close();
