<?php
    if($_SERVER['REQUEST_METHOD']==="POST"){
        include "./../../inc/db.php";
        include "./../../inc/user.php";
        include "./../../inc/myuser.php";
        
        $db = new db();
        $ouser = new user($db->connect());
        $user = new myUser($db->connect());


        $id = $_POST['id'];
        $type = $_POST['type'];
        if(isset($_POST['remove'])){
            $uinfo = $user->remove_like($id, $type);
        }else{
            $uinfo = $user->insert_like($id, $type);
        }
?>
        
<?php
    }else{
        echo 0;
    }
?>