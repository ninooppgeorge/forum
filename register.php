<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <?php include_once "inc/html_files.php" ?>
</head>
<body>
    <form action="depend/register.php" method="POST">
        <input type="text" name="rollno" placeholder="Enter rollno">
        <input type="text" name="email" placeholder="Enter email">
        <input type="text" name="password" placeholder="Enter password">
        <input type="submit" class="button">
    </form>
</body>
</html>