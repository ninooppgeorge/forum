<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include_once "inc/html_files.php" ?>
    <style>
        table{
            width: 80%;
            margin: auto;
        }
        table tr th{
            text-align: left;
        }
        table tr{
            border-bottom: 1px solid #ddd;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php include_once("inc/dashnav.php"); ?>
    <div class="dashcont">
        <div class="dashboard">
            <div class="button_slick">
                <a href="admin.php">Manage users</a>
                <a href="admin_posts.php" class="active">Manage Posts</a>
            </div>
            <?php
                include "admin/load_posts.php";
            ?>
        </div>
    </div>
</body>
</html>