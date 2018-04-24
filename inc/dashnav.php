<?php
    if(isset($_COOKIE['uid'])){

    }else{
        header('Location: login.php');
    }
    include "./inc/db.php";
    include "./inc/user.php";
    include "./inc/myuser.php";
    $db = new db();
    $ouser = new user($db->connect());

    $user = new myUser($db->connect());
    $uinfo = $user->userInfo();
    $dept = $uinfo['dept'];
    $sem = $uinfo['sem'];
?>
<nav class="dashnav">
    <div class="username">
        <img src="<?php echo $user->getMyProPic(); ?>" alt="">
        <a class="drop_open"><?php echo $uinfo['fullname']; ?></a>
        <div class="drop_p">
            <ul>
                <li><a href="logout.php">Dashboard</a></li>
                <li><a href="logout.php">My Profile</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </div>
    </div>
</nav>