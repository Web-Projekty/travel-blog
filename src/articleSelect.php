<?php

require_once "../vendor/autoload.php";
$latte = new Latte\Engine;

$latte->setTempDirectory('temp');


class articleSelect
{
    function __construct()
    {
        include("../config/mysql.php");
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT Title FROM Articles";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $i = 0;

            while ($row = $result->fetch_assoc()) {
                $title[$i] = $row['Title'];
                $id[$i] = $i;
                $i++;
            }
        }
        $conn->close();
    }
    public function getData()
    {
    }
}
$articleSelect = new articleSelect;

$params = [
    'article' => $articleSelect
];


// kresli na výstup
$latte->render('../templates/articleSelect.latte', $params);


