<?php
    if($_SERVER['REQUEST_METHOD']==="POST"){

        include "./../inc/db.php";
        include "./../inc/user.php";
        $db = new db();
        $user = new user($db->connect());

        $rollno = $_POST['rollno'];
        $email = $_POST['email'];
        $pass = md5(sha1(md5($_POST['password'])));
        $reg= $user->register($email,$pass,$rollno);
        if($reg==true){
            echo "1";
        }else{
            echo "0";
        }
    }else{
        echo '0';
    }

?>