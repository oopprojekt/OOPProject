<?php
include_once "DB.php";

/**
 * Class Spieltag
 */
class Spieltag
{
    private $connection = null;
    private $spieltag_erster = null;
    private $spieltag_letzter = null;
    private $saisonarray = [];


    /**
     * Spieltag constructor.
     */
    function __construct()
    {
        $this->connection = new DB("else@gmx.com");
    }

    /**
     * @return array
     */
    public function get_saisonarray()
    {
        $spielergebnisse = $this->connection->get_spielgergebnis();

        while ($row = mysqli_fetch_assoc($spielergebnisse))
        {
            $ergebnis = [$row["sp_id"] => [
                                        "heim" => $row["sp_fs_heim"],
                                        "gast" => $row["sp_fs_auswaerts"],
                                        "ergebnis" => $row["sp_ergebnis"]
            ]];

            array_push($this->saisonarray, $ergebnis);
        }

        return $this->saisonarray;
    }

    private function set_erstes_spiel()
    {
        for ($i = 0; $i < count($this->saisonarray); $i++)
        {
            if("TBD" === $this->saisonarray[$i][$i+1]["ergebnis"])
            {
                return $this->spieltag_erster = $i+1;
            }
        }
    }

    private function set_letztes_spiel()
    {
        $this->spieltag_letzter = $this->spieltag_erster + 8;
    }

    public function play()
    {
        $this->set_erstes_spiel();
        $this->set_letztes_spiel();
        for($i = $this->spieltag_erster; $i <= $this->spieltag_letzter; $i++)
        {
            $this->saisonarray[$i-1][$i]["ergebnis"] = "0:0";
        }
    }




}


