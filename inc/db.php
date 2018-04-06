<?php
class db{
    public function connect(){
        $host = "localhost";
        $uname = "root";
        $pass = "";
        $dbname = "forum";
        $conn = new mysqli($host,$uname,$pass,$dbname);
        return $conn;
    }
}
?>