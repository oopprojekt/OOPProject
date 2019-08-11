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
    <link rel="stylesheet" href="alteskripte_entwürfe/templatesalt/style.css">

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
    alert(wert);

    //test setter
    foobar.foo = 42;
    alert(foobar.foo);

    const bar = new Config();
    alert(bar.ORTE);

</script>


</html>

<?php

    include_once "./scripte/php/DB.php";

    $foo = new DB("else@gmx.com");

    echo $foo->get_team_id("else@gmx.com");
    echo "<br><br>...";

        $con = mysqli_connect("localhost","root","root","fumasi");
        $set_increment = 'ALTER TABLE tbl_spieler AUTO_INCREMENT = 1;';
        mysqli_query($con, $set_increment);
        for ($team_id = 3; $team_id <= 20; $team_id++) {
            //spieler werden angelegt
            for ($i = 1; $i <= 11; $i++) {
                $alter = rand(16,49);
                $position = rand(1,10);
                $ausdauer = rand(1,100);
                $technik = rand(1,100);
                $torgefahr = rand(1,100);
                $zweikampf = rand(1,100);
                $rote_karte = 0;
                $gelbe_karte = 0;
                $verletzt = 0;
                $preis = rand(10000,100000);
                $tore = 0;
                $nummer = 0;
                $sql = "INSERT INTO `tbl_spieler` (`spl_vorname`, `spl_nachname`, `spl_fs_team`, `spl_alter`, `spl_fs_position`, `spl_ausdauer`, `spl_technik`, `spl_torgefahr`, `spl_zweikampf`, `spl_rote`, `spl_gelbe`, `spl_verletzt`, `spl_preis`, `spl_tore`, `spl_nummer`) 
    VALUES ('spl_" . $i . "_vorname', 'spl_" . $i . "_nachname',' " . $team_id . "','" . $alter . "', '" . $position . "', '" . $ausdauer . "', '" . $technik . "', '" . $torgefahr . "', '" . $zweikampf . "', '0', '0', '0', '" . $preis . "', '1', '" . $i . "');";
            //INSERT INTO `tbl_spieler` (`spl_id`, `spl_vorname`, `spl_nachname`, `spl_fs_team`, `spl_alter`, `spl_fs_position`, `spl_ausdauer`, `spl_technik`, `spl_torgefahr`, `spl_zweikampf`, `spl_rote`, `spl_gelbe`, `spl_verletzt`, `spl_preis`, `spl_tore`, `spl_nummer`)
            // VALUES (NULL, 'hans', 'gruber', '15', '35', '1', '100', '100', '100', '100', '0', '0', '0', '1', '1', '1')
            //echo($sql); echo "<br>";
            mysqli_query($con, $sql);
            }
        }
    //var_dump($foo->get_all_teamplayers());

    echo "<br><br>...";

    //var_dump($foo->get_fieldnames());

    echo "<br><br>...";

?>
