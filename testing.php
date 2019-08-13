<?php
//nötig um mit die sessionarrays zu nutzen
session_start();
include_once "./scripte/php/show_errors.php";

include_once "./scripte/php/DB.php";

$db_test = new DB("grete@il.de");
//$db_test->set_string_tbl_transfer("warum ist die banane immer krumm?");
//$db_test->create_user("name", "mail@gmx.de", "pw");


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

    //test getter
    let wert = foobar.foo;
    //alert(wert);

    //test setter
    foobar.foo = 42;
    //alert(foobar.foo);

    const bar = new Config();
    //alert(bar.ORTE);

</script>


</html>

<?php
    include_once "./scripte/php/Fixtures.php";
    $fixtures = new Fixtures();
    //$fixtures->set_player_data();
    //$fixtures->set_spieltag();
?>

<?php

    $alle_trainer = $db_test->get_trainer_names();

    echo json_encode($alle_trainer, JSON_PRETTY_PRINT);

    echo "danach angekommen?!";

?>
