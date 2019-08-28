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
//var_dump($db_test->get_trainer("bratob"));
//$db_test->gets_spieler_array();
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
/*
include_once "./scripte/php/Ligatabelle.php";
$ligatabelle = new Ligatabelle();
echo("</br>");

*/
?>

<?php
include_once "./scripte/php/Ligatabelle.php";
//$lgatabelle = new Ligatabelle();
//$lgatabelle->display_head_to_head();
?>



