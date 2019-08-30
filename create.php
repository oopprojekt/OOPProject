<?php
include_once "./scripte/php/show_errors.php";
error_reporting(0);

session_start();
$_SESSION['user_name'] = $_POST['name'];
$_SESSION['user_mail'] = $_POST['email'];
$_SESSION['passwort'] = $_POST['passwort'];

include_once "./scripte/php/DB.php";

$db = new DB($_SESSION['user_mail']);
$db->create_user($_SESSION['user_name'], $_SESSION['user_mail'], $_SESSION['passwort']);

//echo $_SESSION['user_name'];
//echo $_SESSION['user_mail'];
//echo $_SESSION['passwort'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/maintemplate.css">
    <title>Teamauswahl</title>
</head>
<body>
<div id="createheader"><b>Wähle dein Team!</b></div>
<div class="maincontentrowtemplatecreate">
    <div id="infoteamandtrainer">
        <div><img id="team_logo">
            <div>
                <div>Trainer: <span id="vorname"></span>
                    <span id="nachname"></span></div>

                <form id="form" action="home.php" method="post">

                    <select name="teams" onchange="leaveChange(this)">
                        <?php
                        foreach ($db->get_all_teams() as $row) {
                            echo "<option value='" . $row["tm_id"] . "'>" . $row["tm_name"] . "</option>";
                        }
                        ?>
                    </select>
                    ´<p><input type="image" src="bilder/karrierestarten.png" id="navbutton" alt="Submit"/></p>
                    

                </form>


            </div>
        </div>

    </div>
</div>

<script>

    let trainer = <?php echo json_encode($db->get_trainer_names(), JSON_PRETTY_PRINT) ?>;
    let img_team = document.getElementById("team_logo");
    let vorname = document.getElementById("vorname");
    let nachname = document.getElementById("nachname");

    console.log(trainer);


    leaveChange = (e) => {
        img_team.src = "./bilder/livetickerlogo/logo" + e.value + ".png";
        vorname.innerText = trainer[e.value][0];
        nachname.innerText = trainer[e.value][1];
    }

</script>



<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

</body>
</html>
