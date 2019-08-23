<?php
include_once "DB.php";

/**
 * Class Spieltag
 */
class Spieltag
{
    public $connection = null;

    /**
     * Fixtures constructor.
     */
    function __construct()
    {
        $this->connection = new DB("else@gmx.com");
    }

    /** holt alle werte aus der DB und legt alle spieltage in array ab
     * @param
     * @return saisonarray
     */
    public function get_saisonarray()
    {
        for ($i = 1; $i <= 306; $i++) {
            $res = $this->connection->get_spielgergebnis($i);
            $obj = $res->fetch_object();
            $saisonarray[] =  array("sp_id" => $obj->sp_id,"erg" => $obj->sp_ergebnis);
        }
        return $saisonarray;
    }

    /** holt alle werte aus der DB und legt den spieltag erstmal in daten ab, und anschliessen wird die tabelle erstellt
     * @param saisonarray
     * @return
     */
    public function spieltagermittlung($tabelle)
    {
        $i = 0;
        do {
            $i++;
        } while ($tabelle[$i]['erg'] != "TBD");
        //echo ("Aktueller Spieltag ist "); echo floor($i/9);
        return floor($i/9);
    }

    public function set_untere_grenze ($spieltag)
    {
        // in arbeit für get_data_ansetzungen
    }




    /** holt alle werte aus der DB und legt den spieltag erstmal in daten ab, und anschliessen wird die tabelle erstellt
     * @param $ug, $og;
     */
 /*   public function get_data_ansetzung($ug, $og)
    {
        for ($i = $ug; $i <= $og; $i++) {
            $res = $this->connection->get_spielgergebnis($i);
            $obj = $res->fetch_object();
            $get_data_ansetzung[] = array("team_name_heim" => $this->holemirteam_a($obj->sp_fs_heim),"erg" => $obj->sp_ergebnis,"team_name_gast" => $this->holemirteam_a($obj->sp_fs_auswaerts) );
        }
        return $get_data_ansetzung;
    }

    // Konvertierung ID->Teamname
    public function holemirteam_a($a)
    {
        $team_heim = $this->connection->get_team_by_id($a);
        return $team_heim;
    }

    public function holemirteam_b($b)
    {
        $team_gast = $this->connection->get_team_by_id($b);
        return $team_gast;
    }

    /** stellt array in html code tabelle dar
     * @param $tabelle
     * @return
     */
  /*  public function display($tabelle)
    {
        echo("</br>");
        echo("<table>");
        echo("<tr>");
        echo("<th>HEIM.</th>");
        echo("<th>ERG.</th>");
        echo("<th>GAST</th>");
        echo("</tr>");
        for ($j = 0; $j <= 8; $j++) {
            echo("<tr>");
            echo("<td>" . $tabelle[$j]['team_name_heim'] . "</td>");
            echo("<td>" . $tabelle[$j]['erg'] . "</td>");
            echo("<td>" . $tabelle[$j]['team_name_gast'] . "</td>");
            echo ("</tr>");
        }
        echo("</table>");
    }*/
}


