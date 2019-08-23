<?php
//nötig um mit die sessionarrays zu nutzen
session_start();
include_once "./scripte/php/show_errors.php";

include_once "./scripte/php/DB.php";

$db_test = new DB("grete@il.de");
//$db_test->set_string_tbl_transfer("warum ist die banane immer krumm?");
//$db_test->create_user("name", "mail@gmx.de", "pw");
//$db_test->set_team(13);
echo "trainername:";
var_dump($db_test->get_trainer("bratob"));


//$db_test->foo();

echo "trallali";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>fu_ma_si</title>

    <!--einbindung der klasse-->
    <script src="scripte/js/Training.js"></script>
    <script src="scripte/js/Config.js"></script>
</head>
<body>
<h1>TESTSEITE</h1>
<h2>zum ausprobieren was man bastetlt</h2>

<p>bla bla blub</p>
</body>

<script>

    //object erzeugen und wert für konstruktor mitschicken
    let foobar = new Training(23);

</script>


</html>

<?php
include_once "./scripte/php/Spieltag.php";
$spieltag = new Spieltag();
$spieltag->spieltagermittlung($spieltag->get_saisonarray());
?>


<?php
    echo ("</br>players:</br>");

    $players = $db_test->create_player_array(8);

    //echo json_encode($players, JSON_PRETTY_PRINT);

?>

<script>

    let players = <?php echo json_encode($players, JSON_PRETTY_PRINT);?>;
    console.log(players);
    let training = new Training(players);
    console.log("#######################");
    console.log(training.id_by_number("10"));

</script>

<?php

    include_once "./scripte/php/Team_staerke.php";
    $ts = new Team_staerke(18);
    echo "########### ts->printer ########";
    echo $ts->get_team_staerke();

?>

<?php
include_once "./scripte/php/Ligatabelle.php";
$ligatabelle = new Ligatabelle();
echo("</br>");
echo ("1. Spieltag");
$ligatabelle->display($ligatabelle->sortierung_by_team_id($ligatabelle->get_data_spielplan(1,9)));
echo("</br>");
echo ("2. Spieltag");
$ligatabelle->display($ligatabelle->sortierung_by_team_id($ligatabelle->get_data_spielplan(10,18)));
echo("</br>");
echo ("3. Spieltag");
$ligatabelle->display($ligatabelle->sortierung_by_team_id($ligatabelle->get_data_spielplan(19 ,27)));
//var_dump($ligatabelle->sortierung_by_team_id($ligatabelle->get_data_spielplan(19 ,27)));
echo("</br>");
echo ("Tabelle 2. Spieltag");
$ligatabelle->display($ligatabelle->spieltag_addition($ligatabelle->sortierung_by_team_id($ligatabelle->get_data_spielplan(1,9)), $ligatabelle->sortierung_by_team_id($ligatabelle->get_data_spielplan(10,18))));
//var_dump($ligatabelle->spieltag_addition($ligatabelle->sortierung_by_team_id($ligatabelle->get_data_spielplan(1,9)), $ligatabelle->sortierung_by_team_id($ligatabelle->get_data_spielplan(10,18))));
echo("</br>");
echo ("Tabelle 3. Spieltag");
echo("</br>");
$ligatabelle->display($ligatabelle->spieltag_addition($ligatabelle->sortierung_by_team_id($ligatabelle->get_data_spielplan(19 ,27)),$ligatabelle->spieltag_addition($ligatabelle->sortierung_by_team_id($ligatabelle->get_data_spielplan(1,9)), $ligatabelle->sortierung_by_team_id($ligatabelle->get_data_spielplan(10,18))))
);
?>

<?php
include_once "./scripte/php/Spieltag.php";
$spieltag = new Spieltag();
$spieltag->display($spieltag->get_data_ansetzung(1,9));
?>

<?php

    echo "spieler und die poss:<br>";

    var_dump($db_test->create_array_player_staerke_pos());

?>
