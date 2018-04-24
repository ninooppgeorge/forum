<?php
    if($_SERVER['REQUEST_METHOD']==="GET"){
        include "./../db.php";
        include "./../user.php";
        
        $db = new db();
        $ouser = new user($db->connect());


        $dept = $_GET['dept'];
        $seminfo = $ouser->get_sem($dept);
        print json_encode($seminfo);
    }else{
        echo 0;
    }
?>