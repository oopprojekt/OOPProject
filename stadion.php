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

    <div class="container_footer"><?php include_once "./templatestk/footertk.php"; ?></div>
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
            if(num < aktiona.length)
            {
                let new_p = document.createElement("p");
                let aktion = document.createTextNode(aktiona[num] + " in der " + minute(width) + "ten spielminute");
                new_p.appendChild(aktion);

                let team = parseInt(Math.random() * (2));
                document.getElementById("team_" + team).appendChild(new_p);
            }
            if(50 === width)
            {
                alert("halbzeit");
            }
            if (width >= 100)
            {
                clearInterval(id);
            }
            else
            {
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

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>