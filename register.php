<?php
    include "./inc/db.php";
    include "./inc/user.php";
    $db = new db();
    $user = new user($db->connect());
    $alldept = $user->getDept();
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
<body class="signup">
    <div class="row">
        <div class="col s6 left">
            <p>
                COLLABORATE.
                COMMUNICATE.
                COORDINATE.
                <a class="button register" href="index.php">Login</a>
            </p>
        </div>
        <div class="col s6 right">
            <form action="depend/register.php" id="register" method="POST">
            
                <input type="text" name="fullname" placeholder="Enter your Full Name" required="required">
                <input type="text" name="rollno" placeholder="Enter rollno" required="required">
                <input type="email" name="email" placeholder="Enter email" required="required">
                <input type="password" name="password" placeholder="Enter password" required="required">
                <select name="dept" id="dept">
                    <?php
                        foreach ($alldept as $key => $value) {
                    ?>
                            <option value="<?php echo $value[0]; ?>"><?php echo $value[0]; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <select name="sem" id="sem" style="display:none;">
                </select>
                <input type="submit" class="button" value="Register">
                <span class="success" style="display:none;">Registered Successfully</span>
                <span class="error" style="display:none;">Error</span>
            </form>
        </div>
    </div>

    <script src="./assets/js/pages/register.js"></script>
</body>
</html>