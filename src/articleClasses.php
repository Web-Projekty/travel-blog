<?php
class Articles
{
    public $title;
    ############### returns array of all article titles ###############
    function getTitleArray()
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
                $i++;
            }
            return $title;
            $conn->close();
        }
    }
}