<?php
include_once "Config.php";
include_once "DB.php";

/**
 * Class Fixtures
 */
class Fixtures
{
    public $connection = null;

    /**
     * Fixtures constructor.
     */
    function __construct()
    {
        $this->connection = new DB("else@gmx.com");
    }

    /**
     * zum leeren des alten standes
     */
    private function delete_fixtures()
    {
        $sql = "DELETE FROM tbl_spieler;";
        $this->connection->execute($sql);
    }

    /**
     * damit die id's mit 1 beginnen
     */
    private function set_increment()
    {
        $sql = "ALTER TABLE tbl_spieler AUTO_INCREMENT = 1;";
        $this->connection->execute($sql);
    }

    /**
     * schreibt für alle teams jeweils 11 spieler
     */
    public function set_player_data()
    {
        $this->delete_fixtures();
        $this->set_increment();

        for ($team_id = 1; $team_id <= 18; $team_id++)
        {
            //spieler werden angelegt
            for ($i = 1; $i <= 11; $i++)
            {
                $alter = rand(16,49);
                $position = rand(1,10);
                $ausdauer = rand(1,100);
                $technik = rand(1,100);
                $torgefahr = rand(1,100);
                $zweikampf = rand(1,100);
                $preis = rand(10000,100000);

                $sql = "INSERT INTO `tbl_spieler` (`spl_vorname`, `spl_nachname`, `spl_fs_team`, `spl_alter`, `spl_fs_position`, `spl_ausdauer`, `spl_technik`, `spl_torgefahr`, `spl_zweikampf`, `spl_rote`, `spl_gelbe`, `spl_verletzt`, `spl_preis`, `spl_tore`, `spl_nummer`) 
    VALUES ('spl_" . $i . "_vorname', 'spl_" . $team_id . "_nachname',' " . $team_id . "','" . $alter . "', '" . $position . "', '" . $ausdauer . "', '" . $technik . "', '" . $torgefahr . "', '" . $zweikampf . "', '0', '0', '0', '" . $preis . "', '0', '" . $i . "');";

                $this->connection->execute($sql);
            }
        }

        echo "testdummys der spieler wurden geschrieben";
    }
    //TODO bei allen methoden an die php-docs denken (diese grünen kommentare - funktionsbeschreibung)
    private function delete_tbl_spielplan()
    {
        $sql = "DELETE FROM tbl_spielplan;";
        $this->connection->execute($sql);
    }

    /**
     * damit die id's mit 1 beginnen
     */
    private function set_increment_tbl_spielplan()
    {
        $sql = "ALTER TABLE tbl_spielplan AUTO_INCREMENT = 1;";
        $this->connection->execute($sql);
    }





    //TODO bei allen methoden an die php-docs denken (diese grünen kommentare - funktionsbeschreibung) und diese methode sollte private sein
    public function set_saisonstart()
    {
        /**
         * Gibt den Unix-Timestamp entsprechend der gegebenen Argumente zurück. Dieser Timestamp
         * ist ein Long Integer, der die Anzahl der Sekunden zwischen der
         * Unix-Epoche (01. Januar 1970 00:00:00 GMT) und dem angegebenen Zeitpunkt enthält
         */
        $saisonstart_datum = mktime(15, 30, 0, 8, 17, 2019);
        return $saisonstart_datum;
    }
    //TODO bei allen methoden an die php-docs denken (diese grünen kommentare - funktionsbeschreibung)
    public function set_spieltag()
    {
        $this->delete_tbl_spielplan();
        $this->set_increment_tbl_spielplan();
        //TODO ist der aufruf der fkt hier nicht sinnfrei??!!
        $this->set_saisonstart();

        //TODO in eine private methode auslagern (zeile 108, 109)
        // Teams aus DB holen
        $sql = "SELECT tm_id FROM tbl_team";
        $res = $this->connection->execute($sql);

        $teams = array();
        while ($row = mysqli_fetch_assoc($res)) {
            //TODO debugechos auch immer entfernen wenn alles fertig ist
            //echo $row['tm_name'];
            $teams[] = $row['tm_id'];
        }

        // benötigte Variablen setzen
        $anzahl  = count($teams);                                       // Anzahl der Teams
        $paare   = floor($anzahl / 2);                           // Anzahl der möglichen Spielpaare
        $plan    = array();                                             // Array für den kompletten Spielplan
        $tage    = ($anzahl % 2) ? count($teams) : count($teams)-1;     // bei ungerader Anzahl an Teams brauchen wir einen Spieltag mehr
        $base    = ($anzahl % 2) ? $anzahl-2 : $anzahl-1;               // die Basis für den Array-Index, bei ungerader Anzahl an Teams
        // fangen wir beim vorletzten Team an

        for ($tag = 1; $tag <= $tage; $tag++) {
            if ($anzahl % 2) {
                // letztes element nach vorne
                array_unshift($teams, array_pop($teams));
            } else {
                // zweites element mit array(letztes element, zweites element) ersetzen,
                // also letztes element zwischen 1. und 2. element einfügen
                array_splice($teams, 1, 1, array(array_pop($teams), $teams[1]));
            }

            for ($spiel = 0; $spiel < $paare; $spiel++) {
                $heim = $teams[$spiel];
                $gast = $teams[$base-$spiel];

                $plan[$tag][] = array($heim, $gast);

                /* Rückrunde */
                $plan[$tag+$tage][] = array($gast, $heim);
            }
        }
        ksort($plan);

        //TODO diesen kommentar dann auch zur methode
        /** spielplan in db schreiben
         * INSERT INTO `tbl_spielplan` (`sp_id`, `sp_datum`, `sp_fs_heim`, `sp_fs_auswaerts`, `sp_ergebnis`) VALUES ('1', '2019-08-17 00:00:00', '12', '4', 'TBD');
         * formatierung datum DB wie folgt 2019-08-17 00:00:00
         */
        $saisonstart_datum = $this->set_saisonstart();
        foreach ($plan as $spieltag => $spiele) {
            //TODO der kommentar ist zweimal da und er würde besser bei der set_saisonstart passen
            // formatierung DB 2019-08-17 00:00:00
            foreach ($spiele as $spielnummer => $paarung) {
                // formatierung DB 2019-08-17 00:00:00
                //TODO auch in eine private methode auslagern der du die entsprechenden parameter übergibst (zeile 161 bis 163)
                $datum = date("Y-m-d H:i:s",$saisonstart_datum);
                $sql = "INSERT INTO `tbl_spielplan`(`sp_datum`, `sp_fs_heim`, `sp_fs_auswaerts`, `sp_ergebnis`) 
                VALUES ('" . $datum. "','" . $paarung[0] . "','" . $paarung[1] . "','TBD')";
                $this->connection->execute($sql);
            }
            // datum eine woche später
            $saisonstart_datum = $saisonstart_datum + 604800;
        }
    }

}