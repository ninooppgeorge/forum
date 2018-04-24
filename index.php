<?php
    if(isset($_COOKIE['uid'])){

        header('Location: dashboard.php');
    }else{
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <?php include_once "inc/html_files.php" ?>
</head>
<body class="login">
    <div class="row">
        <div class="col s6 left">
            <p>
                COLLABORATE.
                COMMUNICATE.
                COORDINATE.
                <a class="button register" href="register.php">Register</a>
            </p>
        </div>
        <div class="col s6 right">
            <form action="depend/login.php" id="login" method="POST" autocomplete="off">
                <input type="text" placeholder="Enter username" name="email">
                <input type="password" placeholder="Enter password" name="password">
                <input type="submit" class="button" value="Sign In">
                <span class="success" style="display:none;">Registered Successfully</span>
                <span class="error" style="display:none;">Ooops.. Your email and password doesnt match. </span>
            </form>
        </div>
    </div>
    

     <script src="./assets/js/pages/login.js"></script>
</body>
</html>