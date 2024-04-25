<?php class Database
{
    public function getDestination($id)
    {

        ######## build SQL ########
        $sql = "SELECT `name` FROM Destinations WHERE `idDestination` = " . $id;
        ######## SQL connect ########
        include "../config/mysql.php";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_array()[0];
    }
    public function getAuthor($id)
    {

        ######## build SQL ########
        $sql = "SELECT `user` FROM Users WHERE `idUsers` = " . $id;
        ######## SQL connect ########
        include "../config/mysql.php";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_array()[0];
    }
}
