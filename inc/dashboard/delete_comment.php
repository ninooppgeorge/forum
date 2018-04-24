<?php
    if($_SERVER['REQUEST_METHOD']==="POST"){
        include "./../db.php";
        include "./../user.php";
        include "./../myuser.php";
        include_once "./../timeago.php";
        
        $db = new db();
        $ouser = new user($db->connect());
        $user = new myUser($db->connect());


        $rid = $_POST['rid'];
        $uinfo = $user->delete_comment($rid);
        echo $rid;
    }else{
        echo 0;
    }
?>