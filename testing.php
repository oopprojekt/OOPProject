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
</html>

<?php
include_once "./scripte/php/Ligatabelle.php";
$ligatabelle = new Ligatabelle();
echo("</br>");
echo("</br>");
$ligatabelle->untergrenze($ligatabelle->obergrenze($ligatabelle->spieltagermittlung()));
var_dump($ligatabelle->untergrenze($ligatabelle->obergrenze($ligatabelle->spieltagermittlung())));
echo("</br>");
$ligatabelle->display($ligatabelle->sortierung_by_team_id($ligatabelle->spieltag_tabelle($ligatabelle->untergrenze($ligatabelle->obergrenze($ligatabelle->spieltagermittlung())),
    $ligatabelle->obergrenze($ligatabelle->spieltagermittlung()))));
//Muss das so umständlich sein??? um die returnten werte weiter zu geben
?>

<script>

    //object erzeugen und wert für konstruktor mitschicken
    let foobar = new Training(23);

    //test getter
    let wert = foobar.foo;
    //alert(wert);

    //test setter
    foobar.foo = 42;
    //alert(foobar.foo);
</script>

<?php

    echo "<br>vor spieltag<br>";
    include_once "./scripte/php/Spieltag.php";
    $spieltag = new Spieltag();
    var_dump($spieltag->get_saisonarray());
    echo "##################";

    //var_dump($spieltag->play() );

    echo "<br>nach spieltag<br>";

?>


<?php
    echo ("</br>players:</br>");

    //$players = $db_test->create_player_array(8);

    //echo json_encode($players, JSON_PRETTY_PRINT);

?>


<?php

    $alle_trainer = $db_test->get_trainer_names();

    echo json_encode($alle_trainer, JSON_PRETTY_PRINT);

    echo "danach angekommen?!";
?>


<?php
/*
    include_once "./scripte/php/Fixtures.php";
    $fix = new Fixtures();
    $fix->set_tbl_spielplan();
*/
?>
