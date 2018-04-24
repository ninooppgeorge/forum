<?php
class myUser{
    protected $conn;
    protected $id;
    function __construct($con){
        $this->conn = $con;

        $this->id = $_COOKIE['uid'];
    }

    function uiddecode(){
        //return base64_decode($_COOKIE['uid']);
        return $_COOKIE['uid'];
    }

    function userInfo(){
        $query = $this->query("SELECT uid,fullname,email,rollno,dept,sem FROM users WHERE uid=$this->id");
        return mysqli_fetch_assoc($query);
    }

    function insertpost($message,$type){
        $timestamp = time();
        $uid = $_COOKIE['uid'];
        $query = $this->query("INSERT INTO posts(post,uid_fk,timestamp,type) VALUES ('$message',$uid,$timestamp,$type)");
        $selquery = $this->query("SELECT P.pid,P.post,P.timestamp,U.uid,U.fullname,U.email FROM users U, posts P WHERE P.uid_fk=U.uid AND P.uid_fk=$uid ORDER BY pid DESC LIMIT 1");
        return mysqli_fetch_assoc($selquery);
    }

    function delete_comment($rid){
        $query = $this->query("DELETE FROM reply WHERE rid=$rid");
        
    }

    function getMyPosts(){
        $uid = $_COOKIE['uid'];
        $query = $this->query("SELECT P.pid,P.post,P.timestamp,U.uid,U.fullname,U.email FROM users U, posts P WHERE P.uid_fk=U.uid AND P.uid_fk=$uid ORDER BY pid DESC");
        return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }

    function getMyDeptPost(){
        $dept = $this->userInfo()['dept'];
        $uid = $_COOKIE['uid'];
        $query = $this->query("SELECT P.pid,P.post,P.timestamp,U.uid,U.fullname,U.email FROM users U, posts P WHERE P.uid_fk=U.uid AND U.dept='$dept' AND P.type=1 ORDER BY pid DESC");
        return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }

    function getMyClassPost(){
        $dept = $this->userInfo()['dept'];
        $sem = $this->userInfo()['sem'];
        $uid = $_COOKIE['uid'];
        $query = $this->query("SELECT P.pid,P.post,P.timestamp,U.uid,U.fullname,U.email FROM users U, posts P WHERE P.uid_fk=U.uid AND U.dept='$dept' AND U.sem = '$sem' ORDER BY pid DESC");
        return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }

    function getMyProPic(){
        $email = $this->userInfo()['email'];
        $size = 40;
        $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size;
        return $grav_url;
    }

    
    function insert_like($id,$type){
        $uid = $_COOKIE['uid'];
        $timestamp = time();
        //type = 0 = postlike , reply none
        //type = 1 = replylike, post none
        if($type==0){
            $rid=0;
            $pid=$id;
        }else if($type==1){
            $rid=$id;
            $pid=0;
        }else{
            $rid=0;
            $pid=0;
        }
        $query = $this->query("INSERT INTO likes (uid_fk,type,rid,pid) VALUES ($uid,$type,$rid,$pid)");
    }

    function remove_like($id,$type){
        $uid = $_COOKIE['uid'];
        $timestamp = time();
        //type = 0 = postlike , reply none
        //type = 1 = replylike, post none
        if($type==0){
            $rid=0;
            $pid=$id;
            $query = $this->query("DELETE FROM likes WHERE uid_fk=$uid AND pid=$pid");
        }else if($type==1){
            $rid=$id;
            $pid=0;
            $query = $this->query("DELETE FROM likes WHERE uid_fk=$uid AND rid=$rid");
        }else{
            $rid=0;
            $pid=0;
        }
    }

    function post_get_likes($pid){
        $query = $this->query("SELECT * FROM likes WHERE pid=$pid");
        return mysqli_num_rows($query);
    }
    function post_get_me_liked($pid){
        $uid = $_COOKIE['uid'];
        $query = $this->query("SELECT * FROM likes WHERE pid=$pid and uid_fk=$uid");
        return mysqli_num_rows($query);
    }

    function query($query){
        return mysqli_query($this->conn,$query);
    }

}

?>