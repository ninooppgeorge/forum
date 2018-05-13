<div class="stable">
    <div class="row shead">
        <div class="col s1">Pid</div>
        <div class="col s7">post</div>
        <div class="col s2">user</div>
        <div class="col s1">Sem</div>
        <div class="col s1">Delete</div>
    </div>
    <?php
        $s = mysqli_connect("localhost","root","");
        mysqli_select_db($s,"forum");
        $query = "SELECT * FROM users U,posts P where P.uid_fk=U.uid order by pid";
        $exe = mysqli_query($s,$query);
        while($row = mysqli_fetch_assoc($exe)){
    ?>
        <div class="row schild">
            <div class="col s1"><?php echo $row['pid']; ?></div>
            <div class="col s7"><?php echo $row['post']; ?></div>
            <div class="col s2"><?php echo $row['fullname']; ?></div>
            <div class="col s1"><?php echo $row['sem']; ?></div>
            <div class="col s1"><a href="admin/delete_post.php?id=<?php echo $row['pid']; ?>">Delete</a></div>
        </div>
    <?php
        }
    ?>
</div>

<?php
    function displayRole($role){
        if($role==="2"){
            $data = 'Admin';
        }else if($role==="1"){
            $data = 'User';
        }
        return $data;
    }
?>