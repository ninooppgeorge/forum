<?php
    if($_SERVER['REQUEST_METHOD']==="POST"){
        include "./../db.php";
        include "./../user.php";
        include "./../myuser.php";
        include_once "./../timeago.php";
        
        $db = new db();
        $ouser = new user($db->connect());
        $user = new myUser($db->connect());


        $pid = $_POST['pid'];
        $uinfo = $user->delete_post($pid);
        echo $pid;
    }else{
        echo 0;
    }
?>