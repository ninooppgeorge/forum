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
    <?php include_once("inc/dashnav.php"); ?>
    <div class="dashcont">
        <div class="dashboard">
            <div class="row">
                <div class="col s3">
                    <?php 
                        $page = 1;
                        include("./inc/sidenav.php"); 
                    ?>
                </div>
                <div class="col s6">
                    <form action="depend/insert_post.php" id="postform" method="POST" class="postform">
                        <textarea name="post" placeholder="Type Something.."></textarea>
                        <input type="hidden" value="1" name="post_type"/>
                        <input type="submit" value="post" class="round" />
                    </form>
                    <div class="loading_cont"><a class="loading_comp"><img src="assets/img/loading.gif" alt=""></a></div>
                    <div class="dash_load_msg">
                        <?php
                            $section = 1;
                            include("./inc/dashboard/load_dashboard.php");
                        ?>
                    </div>

                </div>
                <div class="col s3">
                     
                </div>
            </div>
        </div>
        <?php

        ?>
    </div>
    <script src="./assets/js/pages/dashboard.js"></script>
</body>
</html>