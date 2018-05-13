<?php
    if($_SERVER['REQUEST_METHOD']==="POST"){
        include "./../inc/db.php";
        include "./../inc/user.php";
        include "./../inc/myuser.php";
        include_once "./../inc/timeago.php";
        
        $db = new db();
        $ouser = new user($db->connect());
        $user = new myUser($db->connect());


        $message = trim($_POST['reply']);
        $pid = $_POST['pid'];
        if($message==""){
            echo 0;
        }else{
            $uinfo = $ouser->insertcomment($message,$pid);
?>
        <div class="comment_single">
            <div class="comment_ppiccont cf">
                    <div>
                        <div class="left">
                            <img src="<?php echo $ouser->getUserProPic($ouser->userInfo($uinfo['uid_fk'])['email']); ?>" alt="">
                        </div>
                        <div class="floatafterimg right">
                            <a class="time"><?php echo time_stamp($uinfo['timestamp']); ?></a>
                            <a class="name"><?php echo $uinfo['fullname'] ?></a>
                            <p><?php echo $uinfo['reply']; ?></p>
                        </div>
                    </div>
            </div>
        </div>
<?php
        }
    }else{
        echo 0;
    }
?>