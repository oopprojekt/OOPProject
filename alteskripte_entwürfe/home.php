<?php
//an dieser stelle kommt immer das benötigte php zeugs
//welches ja auf jeder seite anders ist und immer auch nur den content
//betrifft
session_start();

$_SESSION['username'] = $_POST['name'];
$_SESSION['passwort'] = $_POST['passwort'];
?>

<!--dieses komplette html dokument wird immer so unveränderd für jede seite genutzt
nur im content werden die dinge geschrieben die man sehen soll
der rest wird ja aus den anderen templates gezogen-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>fu_ma_si</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>

        <!--nur in dieser datei wird der header geschrieben-->
        <?php include_once "./templates/haeder.php"; ?>

        <div id="info_and_content">

            <!-- in dem div welche in der info.php liegt
            kommt quasi nur das infozeugs-->
            <?php include_once "./templates/info.php"; ?>

            <!--nur in diesem div werden je nach seite die inhalte geändert
            und nirgends sonst
            demzufolge gibt es eine kopie dieser ganzen seite wo je nachdem nur
            hier die inhalte für
            -training
            -spiel
            -tabelle
            -einkauf
            -...
            geändert werden-->
            <div id="home">
                content home
            </div>

        </div>

        <!--und in dieser nur der footer-->
        <?php include_once "./templates/footer.php"; ?>

    </body>
</html>