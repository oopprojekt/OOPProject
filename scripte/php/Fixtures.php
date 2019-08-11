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

        for ($team_id = 3; $team_id <= 20; $team_id++)
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
}