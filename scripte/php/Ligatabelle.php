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

    /** setz oberen grenzwert für den spieltag
     * @param
     *@return $og
     * */
    public function obergrenze(){
        $spieltag = $this->spieltag->aktueller_spieltag();
        $og = $spieltag*9;
        return $og;
    }

    /** setz unteren grenzwert für den spieltag
     * @param
     *@return $ug
     * */
    public function untergrenze()
    {
        $og = $this->obergrenze();
        $ug = $og-8;
        return $ug;
    }

    /** schreibt array tabelle bis zum $og grenzwert
     * @param
     *@return $ug
     * */
    public function gesamt_tabelle()
    {
        $og = $this->obergrenze();
        for ($i = 1; $i <= $og; $i++) {
            $res = $this->connection->get_sp_ergebnis_by_row($i);
            $obj = $res->fetch_object();
            $ergebnis = $obj->sp_ergebnis;

            //erstellt tabellenarray
            if($ergebnis == "TBD"){
                $gesamt_tabelle[] = array("team_id" => $obj->sp_fs_heim,"team_name" => $this->holemirteam_a($obj->sp_fs_heim), "differenz" => 0, "punkte" => 0);
                $gesamt_tabelle[] = array("team_id" => $obj->sp_fs_auswaerts,"team_name" => $this->holemirteam_b($obj->sp_fs_auswaerts), "differenz" => 0, "punkte" => 0);
            }else{
                $gesamt_tabelle[] = array("team_id" => $obj->sp_fs_heim,"team_name" => $this->holemirteam_a($obj->sp_fs_heim), "differenz" => $diff = $this->tore($ergebnis)[0] - $this->tore($ergebnis)[1], "punkte" => $this->punktberechnung($ergebnis)[0]);
                $gesamt_tabelle[] = array("team_id" => $obj->sp_fs_auswaerts,"team_name" => $this->holemirteam_b($obj->sp_fs_auswaerts), "differenz" => $diff = $this->tore($ergebnis)[1] - $this->tore($ergebnis)[0], "punkte" => $this->punktberechnung($ergebnis)[1]);
            }
        }
        return $gesamt_tabelle;
    }

    /** schreibe tbl_statistik als zwischenspeicher für tabellenberechnung
     * @param $gesamt_tabelle, $og
     *@return
     * */
    public function schreibe_tbl_statistik()
    {
        $this->connection->delete_tbl_statistik();
        $gesamt_tabelle = $this->gesamt_tabelle();
        $og = $this->obergrenze();
        for ($i = 0; $i <=($og*2)-1 ; $i++) {
            $team_id = $gesamt_tabelle[$i]['team_id'];
            $diff = $gesamt_tabelle[$i]['differenz'];
            $punkte = $gesamt_tabelle[$i]['punkte'];
            $this->connection->setze_tbl_statistik($i,$team_id,$diff,$punkte);
        }
    }

    /** schreibe spieltag tabelle
     * @param
     *@return $tabelle_universal
     * */
    public function tabelle_universal()
    {
        $this->schreibe_tbl_statistik();
        for ($i = 1; $i <=18 ; $i++)
        {
            $sql = "SELECT `id`,`team_id`,SUM(`diff`), SUM(`punkte`) FROM `tbl_statistik` WHERE `team_id` = " . $i . ";";
            $this->connection->execute($sql);
            $team_id = $this->connection->execute($sql)->fetch_row()[1];
            $diff_sum = $this->connection->execute($sql)->fetch_row()[2];
            $punkte_sum = $this->connection->execute($sql)->fetch_row()[3];
            // Konvertierung ID->Teamname heim
            $team_name = $this->connection->get_team_by_id($i);
            $tabelle_universal[] = array("spieltag"=>$this->spieltag->aktueller_spieltag(),"team_id" => $team_id,"team_name" => $team_name, "differenz" => $diff_sum, "punkte" => $punkte_sum);
        }
        return $tabelle_universal;
    }

    /** konvertiert id zu vereinsnamen
     * @param
     *@return $team_name
     * */
    public function holemirteam_a($a)
    {
        $team_name = $this->connection->get_team_by_id($a);
        return $team_name;
    }

    /** konvertiert id zu vereinsnamen
     * @param
     *@return $team_gast
     * */
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
    public function display_ligatabelle()
    {
        $tabelle = $this->tabelle_universal();
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
        echo("<th>DIFF.</th>");
        echo("<th>SP.</th>");
        echo("</tr>");
        for ($j = 0, $i = 1; $j <= 17, $i <= 18; $j++, $i++) {
            echo("<tr>");
            echo("<td>" .  $i . "</td>");
            echo("<td>" . $tabelle[$j]['team_id'] . "</td>");
            echo("<td>" . $tabelle[$j]['team_name'] . "</td>");
            echo("<td>" . $tabelle[$j]['punkte'] . "</td>");
            echo("<td>" . $tabelle[$j]['differenz'] . "</td>");
            echo("<td>" . $tabelle[$j]['spieltag'] . "</td>");
            echo ("</tr>");
        }
        echo("</table>");
    }

}