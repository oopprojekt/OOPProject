<?php
    session_start();

    $_SESSION['username'] = $_POST['name'];
    $_SESSION['passwort'] = $_POST['passwort'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>fu_ma_si</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>

        <h1>home</h1>

    </body>
</html>