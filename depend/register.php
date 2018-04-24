<?php
    if($_SERVER['REQUEST_METHOD']==="POST"){

        include "./../inc/db.php";
        include "./../inc/user.php";
        $db = new db();
        $user = new user($db->connect());

        $fullname = $_POST['fullname'];
        $rollno = $_POST['rollno'];
        $email = $_POST['email'];
        $pass = md5(sha1(md5($_POST['password'])));
        $dept = $_POST['dept'];
        $sem = $_POST['sem'];


        $reg= $user->register($fullname,$email,$pass,$rollno,$dept,$sem);
        if($reg==true){
            echo $reg;
        }else{
            echo "0";
        }
    }else{
        echo '0';
    }

?>