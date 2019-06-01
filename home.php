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

        <?php include_once "./templates/haeder.php"; ?>

        <div id="info_and_content">

            <?php include_once "./templates/info.php"; ?>

            <div id="home">
                content home
            </div>

        </div>

        <?php include_once "./templates/footer.php"; ?>

    </body>
</html>