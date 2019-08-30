<?php
//an dieser stelle kommt immer das benötigte php zeugs
//welches ja auf jeder seite anders ist und immer auch nur den content
//betrifft
include_once "./scripte/php/show_errors.php";
include_once "./scripte/php/DB.php";

session_start();
error_reporting(0);

$db = new DB($_SESSION['user_mail']);

if (!$_SESSION['team']) {
    $db->update_team_to_user($_POST['teams']);
    $_SESSION['team'] = $db->get_team_by_id($_POST['teams']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/maintemplate.css">
    <link rel="stylesheet" href="style/doku.css">
    <title>Start Page</title>
</head>
<body>
<div class="calendartemplate"> <?php include_once "./templates/header.php"; ?></div>
<div class="leftcolumntemplate"> <?php include_once "./templates/info.php"; ?></div>
<div class="rightcolumntemplate">
    <div class="navrowtemplate"><?php include_once "./templates/nav.php"; ?></div>
    <div class="maincontentrowtemplate" id="dokumentation">

        <h1>DOKUMENTATION</h1>

        <ol>
            <a href="#1_0"><li>Projektvorbereitung</a>
            <ol class="li-alpha">
                <a href="#1_a"><li>Projektumfeld</li></a>
                <a href="#1_b"><li>Projektziel</li></a>
                <a href="#1_c"><li>Projektabgrenzung</li></a>
            </ol>
            </li><br>

            <a href="#2_0"><li>Projektplanung</a>
            <ol class="li-alpha">
                <a href="#2_a"><li>Soll-Konzept</li></a>
                <a href="#2_b"><li>Zeitplanung & Arbeitsteilung</li></a>
            </ol>
            </li><br>

            <a href="#3_0"><li>Projektrealisierung</a>
            <ol class="li-alpha">
                <a href="#3_a"><li>Entwurf der Datenstruktur</li></a>
                <a href="#3_b"><li>Entwurf eines logischen Ablaufs</li></a>
                <a href="#3_c"><li>Codierung</li></a>
                <a href="#3_d"><li>Datenbank</li></a>
                <a href="#3_e"><li>Klassen</li></a>
                <a href="#3_f"><li>Frontend</li></a>
                <a href="#3_g"><li>Testphase</li></a>
                <a href="#3_h"><li>Bugliste</li></a>
            </ol>
            </li><br>

            <a href="#4_0"><li>Schlussbetrachtung</li></a><br>

            <a href="#5_0"><li>Pflichtenheft</li></a><br>

            <a href="#6_0"><li>Präsentation</li></a><br>

            <a href="#7_0"><li>Anhang</a>
            <ol class="li-alpha">
                <a href="#7_a"><li>Klassendiagramm</li></a>
                <a href="#7_b"><li>Dia</li></a>
                <a href="#7_c"><li>Dia</li></a>
                <a href="#7_d"><li>Dia</li></a>
            </ol>
            </li>
        </ol>


        <h1 id="1_0">1. Projektvorbereitung</h1>

        <h2 id="1_a">1.a. Projektumfeld</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>

        <h2 id="1_b">1.b. Projektziel</h2>
        <p>
            Im Rahmen unserer theoretischen Ausbildung im Modul objektorientierte Programmierung und Entwicklung, hatten
            wir die Aufgabe eine objektorientierte Applikation zu entwickeln. Wir haben uns für die Entwicklung einer
            Fußball-Manager-Simulation entschieden. Diese haben wir versucht als Webapplikation umzusetzen.
        </p>

        <h2 id="1_c">1.c. Projektabgrenzung</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>


        <h1 id="2_0">2. Projektplanung</h1>

        <h2 id="2_a">2.a. Soll-Konzept</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>

        <h2 id="2_b">2.b. Zeitplanung & Arbeitsteilung</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>

        <h1 id="3_0">3. Projektrealisierung</h1>
        <h2 id="3_a">3.a. Entwurf der Datenstruktur</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>

        <h2 id="3_b">3.b. Entwurf eines logischen Ablaufs</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>

        <h2 id="3_c">3.c. Codierung</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>

        <h2 id="3_d">3.d. Datenbank</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>

        <h2 id="3_e">3.e. Klassen</h2>
        <p>
                Für die Wiederverwendbarkeit ist das Konzept der Klassen ideal. Denn alles was der Programmierer wissen muss, sind deren Wirkung und das Verhalten ihrer Methoden.
                Deswegen haben wir verschiedene objektorientierte Klassen in unserem Projekt implementiert.
            <p>Class Config:</p>
                - setzt Parameter der verwendeten Datenbank
            <p>Class Fixtures:</p>
                - enthält Methoden zur Erzeugung von Testdaten
            <p>Class DB:</p>
                - beinhaltet alle Methoden welche in die Datenbank schreiben und lesen können
            <p>Class Ligatabelle:</p>
                - Tabellenberechnung und -ausgabe
            <p>Class Spieltag:</p>
                - Spieltagberechnung
            <p>Class Team_staerke:</p>
                - ermittelt Gesamtstärke der Teams auf Basis einzelner Spielerfaktoren
        </p>

        <h2 id="3_f">3.f. Frontend</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>

        <h2 id="3_g">3.g. Testphase</h2>
        <p>
            Eine Testphase und Fehlerüberprüfung der Kode-Bausteine ist einer der wichtigsten Schritte in der Programmentwicklung.
            Deswegen wurden alle Weiterentwicklungen der Teammitglieder vor jedem Commit bei Github, von dem verantwortlichem Entwickler
            der Kode-Bausteine auf Funktion und Fehler überprüft und sollten erst dann veröffentlicht und zur Weiterverarbeitung freigegeben werden.
        </p>

        <h2 id="3_h">3.h. Bugliste</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>



        <h1 id="4_0">Schlussbetrachtung</h1>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>


        <h1 id="5_0">Pflichtenheft</h1>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>


        <h1 id="6_0">Präsentation</h1>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>


        <h1 id="7_0">Anhang</h1>
        <h2 id="7_a">Klassendiagramm</h2>
        <img src="bilder/doku/klassen_tb.png">
        <img src="bilder/doku/klassen_ss.png">

        <h2 id="7_b">Dia</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>

        <h2 id="7_c">Dia</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>

        <h2 id="7_d">Dia</h2>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
            kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
            duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
        </p>


    </div>
</div>
<div class="footertemplate"><?php include_once "./templates/footer.php"; ?></div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
</body>
</html>
 