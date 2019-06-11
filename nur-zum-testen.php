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
    let wert = foobar.get_foo();
    alert(wert);

    //test setter
    foobar.set_foo(42);
    alert(foobar.get_foo());


    //bzw kann ich auch direkt so an die variable ran
    foobar.foo = 88;
    alert(foobar.foo);

</script>


</html>
