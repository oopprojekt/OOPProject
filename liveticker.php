<?php
session_start();
//datenbankanbindungstetst
include_once "./scripte/php/DB.php";
$db = new DB($_SESSION['user_mail']);
$game = $db->get_next_game();
$heim = $game["heim"];
$gast = $game["gast"];
$datum = $game["datum"];
$heim_id = $game["heim_id"];
$gast_id = $game["gast_id"];
?>

<!doctype html>

<html lang="de">

<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>FuMaSi</title>


    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


    <!-- Mein CSS -->

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/liveticker.css">
</head>

<body>

 
  <div class="box livetickergridtop">
    
<div class="container-fluid liveresultcontainer">
  <div class="row liveresultcontainerrow">
    <div class="tickertopcolumns">
      
    </div>
    <div class="tickertopcolumns">
      <img src="bilder/logo/<?php echo $heim_id; ?>.png" height="80%">
    </div>
    <div class="tickertopcolumns">
      <?php echo $heim; ?>
    </div>
        <div class="tickertopcolumns">
      <span id="tore_a"></span><span id="ergebnispoint"> : </span><span id="tore_b"><br/><button id="anpfiff">Anpfiff</button> 
    </div>
    <div class="tickertopcolumns">
      <?php echo $gast; ?>
    </div>
    <div class="tickertopcolumns">
     <img src="bilder/logo/<?php echo $gast_id; ?>.png" height="80%">
    </div>
    <div class="tickertopcolumns">
    </div>
        <div id="myProgress"><div id="myBar"></div>
    </div>
  </div>
</div>
 

                

  </div>
  <div class="box livetickergridmiddle">
  <div class="row">
    <div class="tickercolumns">

    </div>
    <div id="spielaktitickertopcolumnsn"  class="tickercolumns ticker">
    <div id="team_0"></div>             
        </div>
    <div  class="tickercolumns ticker">
      <div id="team_1"></div>
    </div>
        <div  class="tickercolumns">
    </div>
  </div>
</div>
 <div class="box livetickergridbottom">
    <div id="livetickerfooter">    <img src="bilder/fumasifooterlogo.png" id="fumasifooterlogo"> </div>
    <div class="livetickerfootermiddlecolumn"><img src="bilder/bllogo.png" id="bllogo">Spieltag: <?php echo $datum; ?></div>
    <div class="livetickerfooterleftcolumn"><a href="home.php"> <img src="bilder/homemenu.png" id="backhomebutton" ></a></div>
  </div>
</div>


  <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="scripte/js/index.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>
<script>

    let aktiona = [
        "Foul. Es gibt eine Ermahnung",
        "Eckball",
        "Gefährlicher Torschuss",
        'TOR ⚽',
        "Schuss daneben",
        "Glanzparade des Torwarts",
        "Auswechslung 🔁",
        "Schuss ans Aluminium",
        "Gelbe Karte",
        "Schuss geblockt",
        "Videobeweis"

    ];

    let btn_anpfiff = document.getElementById("anpfiff");
    let tore_a = document.getElementById("tore_a");
    let tore_b = document.getElementById("tore_b");

    minute = (progress) => {
        return parseInt((progress * 90) / 100);
    };

    btn_anpfiff.onclick = () => {
        let elem = document.getElementById("myBar");
        let width = 0;
        let a = 0, b = 0;


        let id = setInterval(() => {

            let num = parseInt(Math.random() * (23));
            if (num < aktiona.length) {
                let new_p = document.createElement("p");
                let aktion = document.createTextNode(minute(width) + ". Minute - " + aktiona[num]);
                new_p.appendChild(aktion);

                let team = parseInt(Math.random() * (2));
                document.getElementById("team_" + team).appendChild(new_p);

                //es fällt ein tor
                if(num === 3)
                {
                    team ? b++ : a++;
                }

                tore_a.innerText = a;
                tore_b.innerText = b;
            }
            if (50 === width) {
                alert("Halbzeit");
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
 