<?php
//an dieser stelle kommt immer das benötigte php zeugs
//welches ja auf jeder seite anders ist und immer auch nur den content
//betrifft
error_reporting(0);
?>

<?php

session_start();

$_SESSION['username'] = $_POST['name'];
$_SESSION['passwort'] = $_POST['passwort'];
?>


<!doctype html>

<html lang="de">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>FuMaSi</title>


    <link href="https://fonts.googleapis.com/css?family=Rajdhani:300,500,600|Source+Sans+Pro:400,700" rel="stylesheet">


    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


    <!-- Mein CSS -->


    <link rel="stylesheet" href="style/styletk.css">


</head>

<body>


<div class="ui">
    <div class="container_calendar"><?php include_once "./templatestk/headertk.php"; ?></div>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <div class="container_info container_info_margin-r">
                <?php include_once "./templatestk/infotk.php"; ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
            <div class="container_nav col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php include_once "./templatestk/navtk.php"; ?>
            </div>
            <div class="container_content col-xs-12 col-sm-12 col-md-12 col-lg-12">
                Inhalt Karriere Statistik
            </div>
        </div>
    </div>

    <div class="container_footer"><?php include_once "./templatestk/footertk.php"; ?></div>
</div>


<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>