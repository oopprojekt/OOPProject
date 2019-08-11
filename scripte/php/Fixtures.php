<?php
include_once "Config.php";

class Fixtures
{
    //eine globale variable für die DB klasse ist aber noch null
    public $connection = null;

    //im construktor wird ein objekt der datenbankklasse erzeugt
    function __construct()
    {
        $this->connection  = mysqli_connect(Config::$HOST, Config::$NUTZER, Config::$PASSWORT, Config::$DB);
    }
    public function execute($sql)
    {
        return mysqli_query($this->connection, $sql);
    }

    //eine public methode worin dann alles passiert die bekommt am besten einen parameter
    //der zum ansprechen der teams benötigt wird

        /*in der methode:
        - für jden wert der für die spieler benötigt wird erzeugst du eine variable
        - name, alter, fähigkeiten, ...

        - dann kommt eine normale for-schleife mit der anzahl der gewünschten spieler
        */
    public function set_player_data()
    {
        $set_increment = 'ALTER TABLE tbl_spieler AUTO_INCREMENT = 1;';
        $this->execute($set_increment);
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
                $this->execute($sql);
            }
        }
    }

}