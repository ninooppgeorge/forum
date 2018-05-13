<?php
    $mycomments = $ouser->loadcomments($pid);
    include_once "inc/timeago.php";
    foreach ($mycomments as $key => $cvalue) {
        $rid = $cvalue['rid'];
?>
        <div class="comment_single" id="comment-single-<?php echo $rid; ?>">
            <div class="comment_ppiccont cf">
                    <div>
                        <div class="left">
                            <img src="<?php echo $ouser->getUserProPic($ouser->userInfo($cvalue['uid_fk'])['email']); ?>" alt="">
                        </div>
                        <div class="floatafterimg right">
                            <div class="time">
                                <a><?php echo time_stamp($cvalue['timestamp']); ?></a>
                                <?php 
                                    if($cvalue['uid_fk']==$_COOKIE['uid']){
                                ?>
                                    <a id="delete-<?php echo $rid; ?>" class="delete delete_btn">x</a>
                                <?php
                                    }
                                ?>
                            </div>
                                <a class="name"><?php echo $cvalue['fullname'] ?></a>
                                <p><?php echo $cvalue['reply']; ?></p>
                        </div>
                    </div>
            </div>
        </div>
<?php
    }
?>