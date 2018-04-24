<?php
class user{
    protected $conn;
    function __construct($con){
        $this->conn = $con;
    }

    function register($fullname,$email,$password,$rollno,$dept,$sem){
        $wq = $this->query("INSERT INTO users(fullname,email,password,rollno,dept,sem) VALUES ('$fullname','$email','$password','$rollno','$dept','$sem')");
        return $wq;
    }

    function login($email,$password){
        $qu = $this->query("SELECT * FROM users WHERE email='$email' and password='$password'");
        $res = mysqli_fetch_assoc($qu);
        return $res;
    }
    
    function userInfo($uid){
        $query = $this->query("SELECT uid,fullname,email,rollno,dept,sem FROM users WHERE uid=$uid");
        return mysqli_fetch_assoc($query);
    }

    function getUserProPic($email){
        $size = 80;
        $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size;
        return $grav_url;
    }

    function insertcomment($message,$pid){
        $timestamp = time();
        $uid = $_COOKIE['uid'];
        $query = $this->query("INSERT INTO reply(reply,uid_fk,timestamp,pid_fk) VALUES ('$message',$uid,$timestamp,$pid)");
        $selquery = $this->query("SELECT R.rid,R.reply,R.timestamp,R.uid_fk,U.uid,U.fullname,U.email FROM users U, reply R WHERE R.uid_fk=U.uid AND R.pid_fk=$pid ORDER BY rid DESC LIMIT 1");
        return mysqli_fetch_assoc($selquery);
    }


    function loadcomments($pid){
        $query = $this->query("SELECT R.rid,R.reply,R.timestamp,R.uid_fk,U.uid,U.fullname,U.email FROM users U, reply R WHERE R.uid_fk=U.uid AND R.pid_fk=$pid ORDER BY rid");
        return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }

    function getDept(){
        $query = $this->query("SELECT dept FROM class GROUP BY dept");
        return mysqli_fetch_all($query);
    }

    function get_sem($dept){
        $query = $this->query("SELECT sem FROM class WHERE dept='$dept'");
        return mysqli_fetch_all($query);
    }

    function query($query){
        return mysqli_query($this->conn,$query);
    }

}
?>