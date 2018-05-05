<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "../inc/html_files.php" ?>
    <style>
        form{
            width: 300px;
        }
        form input{
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="dashcont">
        <div class="dashboard">
        <h2>Edit a user</h2>
            <?php
                $s = mysqli_connect("localhost","root","");
                mysqli_select_db($s,"forum");
                if($_SERVER['REQUEST_METHOD']=='GET'){
                    $id = $_GET['id'];
                    $query = "SELECT * FROM users where uid=$id";
                    $exe = mysqli_query($s,$query);
                    $row = mysqli_fetch_assoc($exe);
            ?>
            <form action="edit_user.php" method="post">
            
                <input type="hidden" name="uid" placeholder="Name"  value="<?php echo $row['uid'] ?>"/> <br>
                <input type="text" name="name" placeholder="Name" value="<?php echo $row['fullname'] ?>"/> <br>
                <input type="text" name="email" placeholder="Email" value="<?php echo $row['email'] ?>"/> <br>
                <input type="text" name="rollno" placeholder="Roll No" value="<?php echo $row['rollno'] ?>"/> <br>
                <input type="text" name="dept" placeholder="Department" value="<?php echo $row['dept'] ?>"/> <br>
                <input type="text" name="sem" placeholder="Semester" value="<?php echo $row['sem'] ?>"/> <br>
                <input type="text" name="role" placeholder="Role" value="<?php echo $row['role'] ?>"/> <br>
                <input type="submit" value="Update" />
            </form>
        </div>
    </div>
    
</body>
</html>

<?php
    }else if($_SERVER['REQUEST_METHOD']=="POST"){
        $uid = $_POST['uid'];
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $rollno = $_POST['rollno'];
        $dept = $_POST['dept'];
        $sem = $_POST['sem'];
        $role = $_POST['role'];

        $query = "UPDATE users SET fullname='$fullname',email='$email',rollno='$rollno',dept='$dept',sem='$sem',role=$role where uid=$uid";
        mysqli_query($s,$query);
        header('Location: ../admin.php');
    }else{

    }
?>