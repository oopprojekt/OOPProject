<?php
//an dieser stelle kommt immer das benötigte php zeugs
//welches ja auf jeder seite anders ist und immer auch nur den content
//betrifft
include_once "./scripte/php/show_errors.php";
include_once "./scripte/php/DB.php";

session_start();
$db = new DB($_SESSION['user_mail']);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/maintemplate.css">
    <title>Start Page</title>
</head>
<body>
<div class="calendartemplate"> <?php include_once "./templates/header.php"; ?></div>
  <div class="leftcolumntemplate"> <?php include_once "./templates/info.php"; ?></div>
  <div class="rightcolumntemplate">
        <div class="navrowtemplate"><?php include_once "./templates/nav.php"; ?></div>
        <div class="maincontentrowtemplate">

            <h1>training</h1>

            <?php

                $players = $db->create_array_player_staerke_pos();

                var_dump($players);

                echo "<br><br>";
                echo "der spieler: " . $players[0]["vorname"] . " " . $players[0]["nachname"];
                echo  " spielt auf der position: " . $players[0]["position"];




            ?>




        </div>
</div>
<div class="footertemplate"><?php include_once "./templates/footer.php"; ?></div>

 


<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    </body>
</html>

