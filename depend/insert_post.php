<?php
    if($_SERVER['REQUEST_METHOD']==="POST"){
        include "./../inc/db.php";
        include "./../inc/user.php";
        include "./../inc/myuser.php";
        include_once "./../inc/timeago.php";
        
        $db = new db();
        $ouser = new user($db->connect());
        $user = new myUser($db->connect());


        $message = trim($_POST['post']);
        if($message==""){
            echo 0;
        }else{
            $type = $_POST['post_type'];
            $uinfo = $user->insertpost($message, $type);
?>
            <div class="post_container" id="pcont<?php echo $uinfo['pid'] ?>">
                <div class="ppiccont">
                    <div>
                        <img src="<?php echo $ouser->getUserProPic($ouser->userInfo($uinfo['uid'])['email']); ?>" alt="">
                        <div class="floatafterimg">
                            <a class="name"><?php echo $uinfo['fullname'] ?></a>
                            <a class="time"><?php echo time_stamp($uinfo['timestamp']); ?></a>
                        </div>
                    </div>
                </div>
                <p><?php echo $uinfo['post'] ?></p>
            </div>
<?php
        }
    }else{
        echo 0;
    }
?>