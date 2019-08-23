<?php
include_once "DB.php";
include_once "Spieltag.php";
/**
 * Class Ligatabelle
 */
class Ligatabelle
{
    public $connection = null;
    public $spieltag = null;

    /**
     * Fixtures constructor.
     */
    function __construct()
    {
        $this->connection = new DB("else@gmx.com");
        $this->spieltag = new Spieltag();
    }

    public function get_saisonarray()
    {
        for ($i = 1; $i <= 306; $i++) {
            $res = $this->connection->get_sp_ergebnis_by_row($i);
            $obj = $res->fetch_object();
            $saisonarray[] =  array("sp_id" => $obj->sp_id,"erg" => $obj->sp_ergebnis);
        }
        return $saisonarray;
    }

    /** holt alle werte aus der DB und legt den spieltag erstmal in daten ab, und anschliessen wird die tabelle erstellt
     * @param saisonarray
     * @return
     */
    public function spieltagermittlung()
    {   $tabelle = $this->get_saisonarray();
        $si = 0;
        do {
            $si++;
        } while ($tabelle[$si]['erg'] != "TBD");
        $spieltag = floor($si/9);
        return $spieltag;

    }


    public function obergrenze($spieltag){
        $og = $spieltag*9;
        return $og;
    }

    public function untergrenze($og)
    {
        $ug = $og-8;
        return $ug;
    }

    /** holt alle werte aus der DB und legt den spieltag erstmal in daten ab, und anschliessen wird die tabelle erstellt
     * @param $ug, $og;
     */
    public function spieltag_tabelle($ug,$og)
    {
        for ($i = $ug; $i <= $og; $i++) {
            $res = $this->connection->get_sp_ergebnis_by_row($i);
            $obj = $res->fetch_object();
            $ergebnis = $obj->sp_ergebnis;

            //erstellt tabellenarray
            if($ergebnis == "TBD"){
                $spieltag_tabelle[] = array("team_id" => $obj->sp_fs_heim,"team_name" => $this->holemirteam_a($obj->sp_fs_heim), "differenz" => 0, "punkte" => 0);
                $spieltag_tabelle[] = array("team_id" => $obj->sp_fs_auswaerts,"team_name" => $this->holemirteam_b($obj->sp_fs_auswaerts), "differenz" => 0, "punkte" => 0);
            }else{
                $spieltag_tabelle[] = array("team_id" => $obj->sp_fs_heim,"team_name" => $this->holemirteam_a($obj->sp_fs_heim), "differenz" => $diff = $this->tore($ergebnis)[0] - $this->tore($ergebnis)[1], "punkte" => $this->punktberechnung($ergebnis)[0]);
                $spieltag_tabelle[] = array("team_id" => $obj->sp_fs_auswaerts,"team_name" => $this->holemirteam_b($obj->sp_fs_auswaerts), "differenz" => $diff = $this->tore($ergebnis)[1] - $this->tore($ergebnis)[0], "punkte" => $this->punktberechnung($ergebnis)[1]);
            }
        }
        return $spieltag_tabelle;
    }

    public function gesamt_tabelle()
    {

    }

    public function sortierung_by_team_id($tabelle)
    {
        $tabelle_sortierung_by_team_id = $tabelle;
        foreach ($tabelle_sortierung_by_team_id as $key => $row) {
            $team[$key] = $row['team_id'];
        }
        array_multisort($team, SORT_ASC, $tabelle_sortierung_by_team_id);
        return $tabelle_sortierung_by_team_id;
    }

    public function spieltag_addition($tabelle_1,$tabelle_2)
    {
        for ($i = 0; $i < 18; $i++) {
            $tabelle_aktuell[] =
                array('team_id'=>$tabelle_1[$i]['team_id'],'team_name'=> $tabelle_1[$i]['team_name'],
                    'differenz'=>$tabelle_1[$i]['differenz'] + $tabelle_2[$i]['differenz'],
                    'punkte'=>$tabelle_1[$i]['punkte'] + $tabelle_2[$i]['punkte']);
        }
        return $tabelle_aktuell;
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

    /** zerlegt das ergebnis aus der DB, verteilt danach die punkte und returnt die beiden werte
     * @param $ergebnis
     * @return $punkte_arr (enthält [0]-heim [1]-gast)
     */
    public function punktberechnung($ergebnis)
    {
        $ergebnis_arr = explode(':', $ergebnis);
        if($ergebnis_arr[0] > $ergebnis_arr[1]){
            $heimpunkte = 3;
            $gastpunkte = 0;
            $punkte_arr = array($heimpunkte,$gastpunkte);
        } else if ($ergebnis_arr[0] < $ergebnis_arr[1]){
            $heimpunkte = 0;
            $gastpunkte = 3;
            $punkte_arr = array($heimpunkte,$gastpunkte);
        } else {
            $heimpunkte = 1;
            $gastpunkte = 1;
            $punkte_arr = array($heimpunkte,$gastpunkte);
        }
        return $punkte_arr;
    }

    /** zerlegt das ergebnis aus der DB, returnt die beiden werte alleine für torverhältnis
     * @param $ergebnis
     * @return $ergebnis_arr (enthält [0]-heim [1]-gast)
     */
    public function tore($ergebnis)
    {
        $ergebnis_arr = explode(':', $ergebnis);
        return $ergebnis_arr;
    }

    /** stellt array in html code tabelle dar
     * @param $tabelle
     * @return
     */
    public function display($tabelle)
    {
        foreach ($tabelle as $key => $row) {
            $team[$key] = $row['team_id'];
            $tor[$key] = $row['differenz'];
            $punkte[$key] = $row['punkte'];
        }
        array_multisort($punkte, SORT_DESC, $tor, SORT_DESC, $tabelle);

        echo("</br>");
        echo("<table>");
        echo("<tr>");
        echo("<th>PL.</th>");
        echo("<th>ID</th>");
        echo("<th>VEREIN</th>");
        echo("<th>PKT.</th>");
        echo("<th>SP.</th>");
        echo("<th>DIFF.</th>");
        echo("</tr>");
        for ($j = 0, $i = 1; $j <= 17, $i <= 18; $j++, $i++) {
            echo("<tr>");
            echo("<td>" .  $i . "</td>");
            echo("<td>" . $tabelle[$j]['team_id'] . "</td>");
            echo("<td>" . $tabelle[$j]['team_name'] . "</td>");
            echo("<td>" . $tabelle[$j]['punkte'] . "</td>");
            echo("<td>" . $tabelle[$j]['spiele']=1 . "</td>");
            echo("<td>" . $tabelle[$j]['differenz'] . "</td>");
            echo ("</tr>");
        }
        echo("</table>");
    }
}