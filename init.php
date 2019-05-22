<?php
    //nötig um mit die sessionarrays zu nutzen
    session_start();

    //nun stehen die werte in den session zur verfügung
    //und können durch alle seiten durchgeschleust werden
    $_SESSION['email']    = $_POST['email'];
    $_SESSION['username'] = $_POST['name'];
    $_SESSION['passwort'] = $_POST['passwort'];
    $_SESSION['passw_2']  = $_POST['passwort_2'];


    //an der stelle kommt der eintrag in die datenbank
    //validierung und prüfung der daten
    //andernfalls bei fehlenden unkorrekten daten umlenkung auf die vorherige seite
    //mit aufforderung korrekte daten zu nutzen


    //nur zum test ob die daten korrekt aus der seite davor übergeben werden
    echo $_SESSION['email'];
    echo $_SESSION['username'];
    echo $_SESSION['passwort'];
    echo $_SESSION['passw_2'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>fu_ma_si</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <h1>initi</h1>
    </body>
</html>
