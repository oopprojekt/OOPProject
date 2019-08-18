<?php
include_once "Config.php";
include_once "DB.php";

/**
 * Class Ligatabelle
 */
class Ligatabelle
{
    public $connection = null;

    /**
     * Fixtures constructor.
     */
    function __construct()
    {
        $this->connection = new DB("else@gmx.com");
    }

    /** holt alle werte aus der DB und legt den spieltag erstmal in daten ab, und anschliessen wird die tabelle erstellt
     * --
     */
    public function get_data_tbl_spielplan()
    {
        for ($i = 1; $i <= 9; $i++) {
            $sql = "SELECT `sp_fs_heim`,`sp_fs_auswaerts`,`sp_ergebnis` FROM `tbl_spielplan` WHERE `sp_id` = '$i';";
            $res = $this->connection->execute($sql);
            $obj = $res->fetch_object();
            $ergebnis = $obj->sp_ergebnis;
            $daten[] = array($obj->sp_fs_heim, $obj->sp_fs_auswaerts, $obj->sp_ergebnis, $this->ergbeniszerlegung($ergebnis)[0], $this->ergbeniszerlegung($ergebnis)[1]);
            $tabelle[] = array($obj->sp_fs_heim, $this->tore($ergebnis)[0], $this->ergbeniszerlegung($ergebnis)[0]);
            $tabelle[] = array($obj->sp_fs_auswaerts, $this->tore($ergebnis)[1], $this->ergbeniszerlegung($ergebnis)[1]);
        }

        for ($j = 0; $j <= 17; $j++) {
            for ($k = 0; $k <= 2; $k++) {
                echo $tabelle[$j][$k];
                echo("-");
            }
            echo("</br>");
        }
        echo("ohne sortierung</br>");
        echo("</br>");
        //sortiert nach Punkten absteigend 3->0
        for ($i = 0; $i < 18; $i++) {
            // Position des kleinsten Elements suchen
            $minpos = $i;
            for ($j = $i + 1; $j < 18; $j++)
                if ($tabelle[$j][2] > $tabelle[$minpos][2]) {
                    $minpos = $j;
                }
            // Elemente vertauschen
            $tmp = $tabelle[$minpos][2];
            $tabelle[$minpos][2] = $tabelle[$i][2];
            $tabelle[$i][2] = $tmp;

            $tmp = $tabelle[$minpos][1];
            $tabelle[$minpos][1] = $tabelle[$i][1];
            $tabelle[$i][1] = $tmp;

            $tmp = $tabelle[$minpos][0];
            $tabelle[$minpos][0] = $tabelle[$i][0];
            $tabelle[$i][0] = $tmp;
        }
        //werte sortiert rohformat
        for ($j = 0; $j <= 17; $j++) {

            for ($k = 0; $k <= 2; $k++) {
                echo $tabelle[$j][$k];
                echo("-");
            }
            echo("</br>");
        }
        echo("mit sortierung nach Punkten</br>");
        echo("</br>");
        echo("<table>");
            echo("<tr>");
                echo("<th>Platz</th>");
                echo("<th>Team</th>");
                echo("<th>Tore</th>");
                echo("<th>Punkte</th>");
            echo("</tr>");
        for ($j = 0; $j <= 17; $j++) {
            echo("<tr>");
                echo("<td>");
                echo $w = $j+1;
                echo("</td>");
                for ($k = 0; $k <= 2; $k++) {
                    echo("<td>");
                    echo $tabelle[$j][$k];
                    echo("</td>");
            }
            echo("</tr>");
        }
        echo("</table>");
        echo("</br>");
    }

    /** zerlegt das ergebnis aus der DB, verteilt danach die punkte und returnt die beiden werte
     * @param $ergebnis
     * @return $punkte_arr (enthält [0]-heim [1]-gast)
     */
    public function ergbeniszerlegung($ergebnis)
    {
        $ergebnis;
        $ergebnis_arr = explode(':', $ergebnis);
        //echo $ergebnis_arr[0];echo ("</br>");
        //echo $ergebnis_arr[1];echo ("</br>");
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
        $ergebnis;
        $ergebnis_arr = explode(':', $ergebnis);
        return $ergebnis_arr;
    }
 }