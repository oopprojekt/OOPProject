<?php
//nötig um mit die sessionarrays zu nutzen
session_start();
include_once "./scripte/php/show_errors.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>fu_ma_si</title>
    <link rel="stylesheet" href="style/style.css">

    <!--einbindung der klasse-->
    <script src="scripte/js/Training.js"></script>
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

</script>


</html>
