<?php

//datenbankanbindungstetst
include_once "./scripte/php/DB.php";

$foo = new DB();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>fu_ma_si</title>
        <link rel="stylesheet" href="style/style.css">
    </head>

    <body onload="show_login();">

        <button id="btn_login" class="buttons">login</button>
        <button id="btn_regist" class="buttons">registrieren</button>

        <div id="div_login" class="index_content">login
            <form action="home.php" method="post">
                <input type="text" name="name" placeholder="***username***"><br>
                <input type="text" name="passwort" placeholder="***passwort***"><br>
                <input type="submit" class="buttons" value="spielen">
            </form>
        </div>

        <div id="div_regist" class="index_content">registrieren
            <form action="init.php" method="post">
                <input type="text" name="email" placeholder="***email***"><br>
                <input type="text" name="name" placeholder="***username***"><br>
                <input type="text" name="passwort" placeholder="***passwort***"><br>
                <input type="text" name="passwort_2" placeholder="***passwort***"><br>
                <input type="hidden" name="id">
                <input type="hidden" name="team">
                <input type="hidden" name="transfer">
                <input type="submit" class="buttons" value="anmelden">
            </form>
        </div>

    <script src="scripte/js/index.js"></script>
    </body>
</html>
