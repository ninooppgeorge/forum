<?php
    function getactive($page,$id){
        if($page==$id){
            return 'active';
        }else{
            return '';
        }
    }
?>
<div class="sidenav">
    <ul>
        <li class="<?php echo getactive($page,'2'); ?>"><a href="myprofile.php">My Profile</a></li>
        <li class="<?php echo getactive($page,'1'); ?>"><a href="dashboard_dept.php">My Department Discussions</a></li>
        <li class="<?php echo getactive($page,'0'); ?>"><a href="dashboard.php">My Class Discussions</a></li>
    </ul>
</div>