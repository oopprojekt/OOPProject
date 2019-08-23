<?php
include_once "DB.php";
include_once "Team_staerke.php";

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

    /**
     * @return int
     */
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

    /**
     *
     */
    private function set_letztes_spiel()
    {
        $this->spieltag_letzter = $this->spieltag_erster + 8;
    }

    /**
     *
     */
    public function play()
    {
        $this->set_erstes_spiel();
        $this->set_letztes_spiel();
        for($i = $this->spieltag_erster; $i <= $this->spieltag_letzter; $i++)
        {
            $this->saisonarray[$i-1][$i]["ergebnis"] = $this->schiesse_tore($this->saisonarray[$i-1][$i]["heim"], $this->saisonarray[$i-1][$i]["gast"]);
        }
    }

    /**
     * @param $heim_id
     * @param $gast_id
     * @return string
     */
    private function schiesse_tore($heim_id, $gast_id)
    {
        $heim = new Team_staerke($heim_id);
        $stark_heim = $heim->get_team_staerke();
        $gast = new Team_staerke($gast_id);
        $stark_gast = $gast->get_team_staerke();

        if($stark_heim > $stark_gast)
        {
            $heim_tore = rand(1, 6);
            $gast_tore = rand(0, 4);
        }
        else
        {
            $heim_tore = rand(0, 4);
            $gast_tore = rand(1, 6);
        }

        return (string)$heim_tore . ":" . (string)$gast_tore;
    }
}