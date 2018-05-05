<?php
    if($_SERVER['REQUEST_METHOD']==="POST"){

        include "./../inc/db.php";
        include "./../inc/user.php";
        $db = new db();
        $user = new user($db->connect());

        $email = $_POST['email'];
        $pass = md5(sha1(md5($_POST['password'])));
        $reg= $user->login($email,$pass);
        if($reg==true){
            setcookie('uid', $reg['uid'], time() + (86400 * 30), "/");
            echo $reg['role'];
        }else{
            echo "0";
        }
    }else{
        echo '0';
    }

?>