<?php
    if($section==0){
        $myposts = $user->getMyClassPost();
    }else if($section==1){
        $myposts = $user->getMyDeptPost();
    }else{
        $myposts = $user->getMyPosts();
    }
    include_once "inc/timeago.php";
    foreach ($myposts as $key => $value) {
        $pid = $value['pid'];
?>
        <div class="post_cont_cont cf">
            <div class="likebox">
                <?php 
                    if($user->post_get_me_liked($value['pid'])>0){
                ?>
                        <a class="post_dislike" id="post_dislike-<?php echo $value['pid']; ?>"><i class="fas fa-thumbs-down"></i></a>
                <?php
                    }else{
                ?>
                        <a class="post_like" id="post_like-<?php echo $value['pid']; ?>"><i class="fas fa-thumbs-up"></i></a>
                <?php
                    }
                ?>
                <a class="post_count" id="like_count-<?php echo $value['pid']; ?>"><?php echo $user->post_get_likes($value['pid']); ?></a>
            </div>
            <div class="post_cont_inner">
                <div class="post_container" id="pcont<?php echo $value['pid']; ?>">
                    <div class="ppiccont">
                        <div>
                            <img src="<?php echo $ouser->getUserProPic($ouser->userInfo($value['uid'])['email']); ?>" alt="">
                            <div class="floatafterimg">
                                <a class="name"><?php echo $value['fullname'] ?></a>
                                <a class="time"><?php echo time_stamp($value['timestamp']); ?></a>
                            </div>
                        </div>
                    </div>
                    <p><?php echo $value['post'] ?></p>
                </div>
                <div class="comments_container">
                    <div class="comments">
                        <div class="append_comment" id="append_comment-<?php echo $value['pid'] ?>">
                            <?php
                                include "inc/dashboard/load_comment.php";
                            ?>
                        </div>
                        <form class="comment_form" id="comment_cont-<?php echo $value['pid']; ?>" action="depend/insert_comment.php" method="post">
                            <img src="<?php echo $user->getMyProPic(); ?>" alt="">
                            <input type="text" name="reply" placeholder="Reply.." class="comment_input" id="comment_input-<?php echo $value['pid'] ?>" />
                            <input type="hidden" name="pid" value="<?php echo $value['pid']; ?>" />
                            <input type="submit" value="reply" id="comment_button-<?php echo $value['pid'] ?>" class="button">
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
?>