<?php
class user{
    protected $conn;
    function __construct($con){
        $this->conn = $con;
    }

    function register($email,$password,$rollno){
        $wq = $this->query("INSERT INTO users(email,password,rollno) VALUES ('$email','$password','$rollno')");
        return $wq;
    }

    function query($query){
        return mysqli_query($this->conn,$query);
    }
}
?>