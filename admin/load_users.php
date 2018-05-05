<table>
    <tr>
        <th>Name</th>
        <th>Dept</th>
        <th>USN</th>
        <th>Sem</th>
        <th>Email</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
        $s = mysqli_connect("localhost","root","");
        mysqli_select_db($s,"forum");
        $query = "SELECT * FROM users";
        $exe = mysqli_query($s,$query);
        while($row = mysqli_fetch_assoc($exe)){
    ?>
        <tr>
            <td><?php echo $row['fullname']; ?></td>
            <td><?php echo $row['dept']; ?></td>
            <td><?php echo $row['rollno']; ?></td>
            <td><?php echo $row['sem']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo displayRole($row['role']); ?></td>
            <td><a href="admin/edit_user.php?id=<?php echo $row['uid']; ?>">Edit</a></td>
            <td><a href="admin/delete_user.php?id=<?php echo $row['uid']; ?>">Delete</a></td>
        </tr>
    <?php
        }
    ?>
</table>

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