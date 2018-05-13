<?php
    $id = $_GET['id'];
    $s = mysqli_connect("localhost","root","");
    mysqli_select_db($s,"forum");
    $query = "DELETE FROM posts where pid=$id";
    $exe = mysqli_query($s,$query);
    header("Location: ../admin_posts.php");
?>