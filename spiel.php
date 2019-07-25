<?php

//script für errors
include_once "./scripte/php/show_errors.php";

//deaktiviert die errors -> für frontend
error_reporting(0);

session_start();

$_SESSION['username'] = $_POST['name'];
$_SESSION['passwort'] = $_POST['passwort'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/startpage.css">
    <title>Start Page</title>
</head>
<body>
<div class="page-container flex-y">
    <div class="first-block grey-block">
        <?php include_once "./templates/header.php"; ?></div>
    <div class="flex-x flex-1">
        <div class="second-block grey-block"><?php include_once "./templates/info.php"; ?></div>
        <div class="flex-y flex-1">
            <div class="third-block grey-block">
                <?php include_once "./templates/nav.php"; ?></div>
            <div class="flex-1 grey-block">

                <!--das wird dann dynamisch mit js befüllt-->
                <span>Team A </span><span> 0</span>:<span>0 </span><span> Team B</span>

                <!--das ist der vortschrittsbalken-->
                <div id="myProgress">
                    <div id="myBar"></div>
                </div>

                <!--für die auflistung der aktuellen aktion-->
                <div id="spielaktionen">
                    <div id="team_0"></div>

                    <div id="team_1"></div>
                </div>

                <button id="anpfiff">anpfiff</button>
            </div>
        </div>
    </div>

    <div class="fifth-block grey-block"><?php include_once "./templates/footer.php"; ?></div>
</div>

<script>

    let aktiona = [
        "faul",
        "ecke",
        "elfmeter",
        "tor",
        "flitzer",
        "einwurf",
        "abstoss",
        "auswechseln"
    ];

    let btn_anpfiff = document.getElementById("anpfiff");

    minute = (progress) => {
        return parseInt((progress * 90) / 100);
    };

    btn_anpfiff.onclick = () => {
        let elem = document.getElementById("myBar");
        let width = 0;
        let id = setInterval(() => {

            let num = parseInt(Math.random() * (23));
            if (num < aktiona.length) {
                let new_p = document.createElement("p");
                let aktion = document.createTextNode(aktiona[num] + " in der " + minute(width) + "ten spielminute");
                new_p.appendChild(aktion);

                let team = parseInt(Math.random() * (2));
                document.getElementById("team_" + team).appendChild(new_p);
            }
            if (50 === width) {
                alert("halbzeit");
            }
            if (width >= 100) {
                clearInterval(id);
            }
            else {
                width++;
                elem.style.width = width + '%';
            }
        }, 1000);
    }

</script>

<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

</body>
</html>

