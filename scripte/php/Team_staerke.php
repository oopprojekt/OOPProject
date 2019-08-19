<?php
/**
 * Created by PhpStorm.
 * User: ssenftleben
 * Date: 19.08.19
 * Time: 05:32
 */
include_once "DB.php";

/**
 * Class Team_staerke
 */
class Team_staerke
{
    private $team_staerke = null;
    private $all_team_players = null;
    private $eigenschaften = [  "alter",
                                "ausdauer",
                                "technik",
                                "torgefahr",
                                "zweikampf",
                                "rote",
                                "gelbe",
                                "verletzt",
                                "preis",
                                "tore"];
    private $sum_eigenschaften = [];
    private $durchschnitt_preis = null;

    /**
     * Team_staerke constructor.
     * @param $team_id
     */
    function __construct($team_id)
    {
        $db = new DB("else@gmx.com");
        $this->all_team_players = $db->create_player_array($team_id);
        $this->init_sum_eigenschaften_array();
    }

    /**
     * initialisiert das eigenschaftenarray
     */
    private function init_sum_eigenschaften_array()
    {
        foreach($this->eigenschaften as $prop)
        {
            $this->sum_eigenschaften[$prop] = 0;
        }
    }

    /**
     * anzahl der spieler im team
     * @return int
     */
    private function spieler_anzahl()
    {
        return count($this->all_team_players);
    }

    /**
     * summiert alle eigenschaften der teamspieler
     */
    private function summe_eigenschaften()
    {
        foreach($this->all_team_players as $item)
        {
            foreach($this->eigenschaften as $prop)
            {
                $this->sum_eigenschaften[$prop] += $item[0][$prop];
            }
        }
    }

    /**
     * durchnittlicher preis der teamspieler
     */
    private function durchschnitt_preis()
    {
        $this->durchschnitt_preis = intval($this->sum_eigenschaften["preis"] / $this->spieler_anzahl());
    }

    /**
     * erzielte tore und durchnittspreis wird positiv gewertet
     * @return int
     */
    private function bonus()
    {
        $this->durchschnitt_preis();
        return ($this->sum_eigenschaften["tore"] * 10) + (intval($this->durchschnitt_preis / 100));
    }

    /**
     * karten, verletzungen und alter wird negativ gewertet
     * @return int
     */
    private function negativ()
    {
        return ($this->sum_eigenschaften["gelbe"]    * 10) +
               ($this->sum_eigenschaften["rote"]     * 20) +
               ($this->sum_eigenschaften["verletzt"] * 10) +
               ($this->sum_eigenschaften["alter"]);
    }

    /**
     * teamstärke wird final ermittelt
     */
    private function berechne_staerke()
    {
        $this->team_staerke = $this->sum_eigenschaften["ausdauer"]    +
                                $this->sum_eigenschaften["technik"]   +
                                $this->sum_eigenschaften["torgefahr"] +
                                $this->sum_eigenschaften["zweikampf"] +
                                $this->bonus() -
                                $this->negativ();
    }

    /**
     * getter für die teamstärke
     * @return int
     */
    public function get_team_staerke()
    {
        $this->summe_eigenschaften();
        $this->berechne_staerke();
        return $this->team_staerke;
    }
}