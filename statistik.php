<?php
//an dieser stelle kommt immer das benötigte php zeugs
//welches ja auf jeder seite anders ist und immer auch nur den content
//betrifft
include_once "./scripte/php/show_errors.php";

session_start();
error_reporting(0);
$_SESSION['username'] = $_POST['name'];
$_SESSION['passwort'] = $_POST['passwort'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style/style.css">
        <title>Start Page</title>
    </head>
    <body>
<<<<<<< HEAD
<div class="calendartemplate"><?php include_once "./templates/header.php"; ?></div>
  <div class="leftcolumntemplate"><?php include_once "./templates/info.php"; ?></div>
  <div class="rightcolumntemplate">
        <div class="navrowtemplate"><?php include_once "./templates/nav.php"; ?></div>
        <div class="maincontentrowtemplate">
            <?php
            include_once "./scripte/php/Spieltag.php";
            $spieltag = new Spieltag();
            $spieltag->display($spieltag->get_data_ansetzung(1,9));
            ?>
=======
        <div class="page-container flex-y">
            <div class="first-block grey-block">
                <?php include_once "./templates/header.php"; ?></div>
            <div class="flex-x flex-1">
                <div class="second-block grey-block"><?php include_once "./templates/info.php"; ?></div>
                <div class="flex-y flex-1">
                    <div class="third-block grey-block">
                        <?php include_once "./templates/nav.php"; ?></div>
                    <div class="flex-1 grey-block">4</div>
                </div>
            </div>
            <div class="fifth-block grey-block"><?php include_once "./templates/footer.php"; ?></div>
>>>>>>> 9993e3a07ea5dbc7dd2fc85a9cb7027d5514ec99
        </div>


<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    </body>
</html>

