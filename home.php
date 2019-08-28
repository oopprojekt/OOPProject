<?php
session_start();
include_once "./scripte/php/show_errors.php";
include_once "./scripte/php/DB.php";
//error_reporting(0);

$db = new DB($_SESSION['user_mail']);

if (!$_SESSION['team']) {
    $db->update_team_to_user($_POST['teams']);
    $_SESSION['team'] = $db->get_team_by_id($_POST['teams']);
}

$team_id = $db->get_team_id($_SESSION['user_mail']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/maintemplate.css">
    <title>Home</title>
</head>
<body>
<div class="calendartemplate"> <?php include_once "./templates/header.php"; ?></div>
<div class="leftcolumntemplate"> <?php include_once "./templates/info.php"; ?></div>
<div class="rightcolumntemplate">
    <div class="navrowtemplate"><?php include_once "./templates/nav.php"; ?></div>
    <div class="maincontentrowtemplate">

        <div class="homemaindiv">
            <div class="homeformationcolumn">
                <img src="bilder/spielfeld.jpg" id="bild" height="100%">
            </div>
            <div class="homelineupdiv">
                <?php
                $db->gets_spieler_array($team_id);
                //welche werte da im array stehen siehst du unter DB.php methode gets_array ;)
                ?>
            </div>
            <div class="homeselectformationdiv">
                <p>Wähle deine Formation:

                    <select name="formGender" id="formation" onchange="myFunction()">

                        <option value="bilder/spielfeld.jpg"></option>

                        <option value="bilder/spielfeld433.jpg">4-3-3</option>

                        <option value="4321">4-3-2-1</option>

                        <option value="F">3-4-2</option>

                    </select>

                <p id="demo"></p>
                </p>
            </div>
            <div class="homesendlineupdiv">
                <input id="btnGet" type="button" value="Startelf für nächstes Spiel abgeben"/>
            </div>
        </div>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script type="text/javascript">


function myFunction() {

var img = document.getElementById("formation");
var value = img.options[img.selectedIndex].value;

var x = document.getElementById("formation");
var i = x.selectedIndex;
test = x.options[i].text;


    if (test == "4-3-3") {
        formation = 433;
        document.getElementById("bild").src = "http://localhost/OOPProject/bilder/spielfeld433.jpg";
    }
    if (test == "4-3-2-1") {
        formation = 4321;
    }
    if (test == "3-4-2") {
        formation = 342;
    }


    $(function () {
        //Assign Click event to Button.
        $("#btnGet").click(function () {
            var message = "";

            //Loop through all checked CheckBoxes in GridView.
            $("#Table1 input[type=checkbox]:checked").each(function () {
                var row = $(this).closest("tr")[0];
                message += row.cells[0].innerHTML;
                message += "\n";
            });


            //Display selected Row data in Alert Box.
            var TWexists = message.includes("TW");
            if (TWexists) {
                var TW = (message.match(/TW/g)).length;
            }
            var LVexists = message.includes("LV");
            if (LVexists) {
                var LV = (message.match(/LV/g)).length;
            }
            var IVexists = message.includes("IV");
            if (IVexists) {
                var IV = (message.match(/IV/g)).length;
            }
            var RVexists = message.includes("RV");
            if (RVexists) {
                var RV = (message.match(/RV/g)).length;
            }
            var ZDMexists = message.includes("ZDM");
            if (ZDMexists) {
                var ZDM = (message.match(/ZDM/g)).length;
            }
            var LFexists = message.includes("LF");
            if (LFexists) {
                var LF = (message.match(/LF/g)).length;
            }
            var ZOMexists = message.includes("ZOM");
            if (ZOMexists) {
                var ZOM = (message.match(/ZOM/g)).length;
            }
            var RFexists = message.includes("RF");
            if (RFexists) {
                var RF = (message.match(/RF/g)).length;
            }
            var STexists = message.includes("ST");
            if (STexists) {
                var ST = (message.match(/ST/g)).length;
            }


            var numTW = "0";
            var numLV = "0";
            var numIV = "0";
            var numRV = "0";
            var numZDM = "0";
            var numZOM = "0";
            var numLF = "0";
            var numST = "0";
            var numRF = "0";

            if (TW !== undefined) {
                var numTW = TW.toString();
            }
            if (LV !== undefined) {
                var numLV = LV.toString();
            }
            if (IV !== undefined) {
                var numIV = IV.toString();
            }
            if (RV !== undefined) {
                var numRV = RV.toString();
            }
            if (ZDM !== undefined) {
                var numZDM = ZDM.toString();
            }
            if (ZOM !== undefined) {
                var numZOM = ZOM.toString();
            }
            if (LF !== undefined) {
                var numLF = LF.toString();
            }
            if (ST !== undefined) {
                var numST = ST.toString();
            }
            if (RF !== undefined) {
                var numRF = RF.toString();
            }

            var TW = parseInt(numTW);
            var DF = parseInt(numIV) + parseInt(numRV) + parseInt(numLV);
            var MF = parseInt(numZDM) + parseInt(numZOM);
            var ST = parseInt(numLF) + parseInt(numST) + parseInt(numRF);


            if (formation == 433) {
                if (TW == 1 && DF == 4 && MF == 3 && ST == 3) {
                    var readyForGame = true;
                } else {
                    var readyForGame = false;
                }

            }
            if (formation == 4321) {
                if (TW == 1 && DF == 4 && MF == 5 && ST == 1) {
                    var readyForGame = true;
                } else {
                    var readyForGame = false;
                }
            }

            console.log(readyForGame);
        });


    });


}


</script>

    </div>
</div>
<div class="footertemplate"><?php include_once "./templates/footer.php"; ?></div>

<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

</body>
</html>

