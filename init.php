<?php
    //nötig um mit die sessionarrays zu nutzen
    session_start();

    include_once "./scripte/php/show_errors.php";

    //nun stehen die werte in den session zur verfügung
    //und können durch alle seiten durchgeschleust werden
    $_SESSION['email']    = $_POST['email'];
    $_SESSION['username'] = $_POST['name'];
    $_SESSION['passwort'] = $_POST['passwort'];
    $_SESSION['passwort_2']  = $_POST['passwort_2'];

    include_once "./scripte/php/DB.php";

    $foo = new DB($_POST['email']);

    $foo->create_user($_POST['name'], $_POST['email'], $_POST['passwort']);

    $res = $foo->get_user_id($_POST['email']);

    $foo->get_user_color();

    //an der stelle kommt der eintrag in die datenbank
    //validierung und prüfung der daten
    //andernfalls bei fehlenden unkorrekten daten umlenkung auf die vorherige seite
    //mit aufforderung korrekte daten zu nutzen


    //nur zum test ob die daten korrekt aus der seite davor übergeben werden
    echo $_SESSION['email'];
    echo $_SESSION['username'];
    echo $_SESSION['passwort'];
    echo $_SESSION['passwort_2'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>fu_ma_si</title>
        <link rel="stylesheet" href="alteskripte_entwürfe/templatesalt/style.css">
    </head>
    <body>
        <h1>initi</h1>
    </body>
</html>
