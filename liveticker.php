<?php

//datenbankanbindungstetst
include_once "./scripte/php/DB.php";

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

</head>

<body>

 
  <div class="box livetickergridtop">
    
<div class="container-fluid liveresultcontainer">
  <div class="row liveresultcontainerrow">
    <div class="tickertopcolumns">
      
    </div>
    <div class="tickertopcolumns">
      <img src="/OOPProject/Bilder/livetickerlogo/logo1.png" height="80%">
    </div>
    <div class="tickertopcolumns">
     FC Bayern München
    </div>
        <div class="tickertopcolumns">
      <span id="tore_a"></span><span id="ergebnispoint"> : </span><span id="tore_b"><br/><button id="anpfiff">Anpfiff</button> 
    </div>
    <div class="tickertopcolumns">
      FC Schalke 04
    </div>
    <div class="tickertopcolumns">
     <img src="/OOPProject/Bilder/livetickerlogo/logo2.png" height="80%">
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
  <div class="row">
    <div><a href="http://localhost/OOPProject/home.php"> <img src="homemenu.png" id="backhomebutton" ></a></div>
    
  </div>
</div>
                <!--für die auflistung der aktuellen aktion-->
      




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

<style type="text/css">

body {
  background-image: url("/OOPProject/Bilder/indexbg.png");
  background-color: #000;
  background-size: 100% 100%;
  overflow-y: hidden;
  background-image: url("https://wallpapercave.com/wp/wp2878440.jpg")!important;
  background-color: #000;
  background-size: 100% 100%;
}

.livetickergridtop {
  width: 80%;
  margin-left: 10%;
  margin-right: 10%;
  height: 30vh;
  margin-top: 3vh;
  text-align: center; 
  font-size: 3vh;
  overflow: hidden;
  background-image: url("/OOPProject/Bilder/livetickerbg1.png"); opacity: 0.95; border-radius: 6px;
  background-size: 100% 100%;
}

.livetickergridmiddle {
  width: 80%;
  margin-left: 10%;
  margin-right: 10%;
  margin-top: 1vh;
  margin-bottom: 0.5vh;
  height: 55vh;
  float: left;
  background-image: url("/OOPProject/Bilder/livetickerbg2.png");border-radius: 6px;
  background-size: 100% 100%;
  opacity: 0.95;
  overflow-y: hidden;
  overflow-x: hidden;
}

.livetickergridbottom {
  width: 80%;
  margin-left: 10%;
  margin-right: 10%;
  margin-top: 1vh;
  margin-bottom: 3vh;
  height: 7vh;
  background-image: url("/OOPProject/Bilder/livetickerbg4.png"); 
  border-radius: 6px;
  background-size: 100% 100%;
  opacity: 0.95;
  overflow: hidden;
  }

.tickertopcolumns {
  width: 14.2%;
  display: inline-block; 
  height: 22vh;
  padding-top: 20px;
}

#myProgress {
  align-items: center;
  width: 78%; 
  margin-left: 11%;
  margin-right: 11%;
  height: 5vh;

}
#myBar {
  width: 0;
  height: 5vh;
  background-color: green;
}
#tore_a, #tore_b, #ergebnispoint {
  font-weight: bold;
  font-size: 6vh;
}

.tickercolumns {
  width: 22%;
  margin-left: 3vh;
  margin-top: 3vh;
  margin-bottom: 3vh;
  font-size: 1.5vh;
  font-weight: bold;
}
.livetickerresultrow {
  margin-right: 0px;
  margin-left: 0px;
}
.ticker {
  margin-left: 4%;
}
#anpfiff {
  font-size: 3vh;
}
.liveresultcontainerrow {
  width: 100%;
}
#livetickercontinue {
  float: right;
  margin-right: 7px;
  margin-top: 1.1vh;
  height: 4vh;
  width: 70px;
  font-size: 2vh;
}

#backhomebutton {  
  margin-top: 1.25vh;
  height: 4.5vh;
  margin-bottom: 1.25vh;
  margin-left: 0.1vh;
  margin-right: 2vh;
  float: right;
}

</style>