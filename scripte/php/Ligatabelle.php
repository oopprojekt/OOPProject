<?php
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

    /** zerlegt das ergebnis aus der DB, returnt die beiden werte alleine
     *
     * @return $tabelle
     */
    public function get_data_tbl_spielplan()
    {
        for ($i = 1; $i <= 9; $i++) {
            $res = $this->connection->get_spielgergebnis($i);
            $obj = $res->fetch_object();
            $ergebnis = $obj->sp_ergebnis;
            // legt daten in array ab
            $daten[] = array($obj->sp_fs_heim, $obj->sp_fs_auswaerts, $obj->sp_ergebnis, $this->punktvergabe($ergebnis)[0], $this->punktvergabe($ergebnis)[1]);
            //erstellt tabellenarray
            $tabelle[] = array('team'=>$obj->sp_fs_heim,'differenz'=> $diff = $this->tore($ergebnis)[0] - $this->tore($ergebnis)[1], 'punkte'=>$this->punktvergabe($ergebnis)[0]);
            $tabelle[] = array('team'=>$obj->sp_fs_auswaerts,'differenz'=> $diff = $this->tore($ergebnis)[1] - $this->tore($ergebnis)[0], 'punkte'=>$this->punktvergabe($ergebnis)[1]);
        }
        foreach ($tabelle as $key => $row) {
            $tor[$key] = $row['differenz'];
            $punkte[$key] = $row['punkte'];
        }
        array_multisort($tor, SORT_DESC, $punkte, SORT_DESC, $tabelle);
        var_dump($tabelle);

        echo("</br>");
        echo("<table>");
        echo("<tr>");
        echo("<th>Platz</th>");
        echo("<th>Team</th>");
        echo("<th>Tordifferenz</th>");
        echo("<th>Punkte</th>");
        echo("</tr>");
        for ($j = 0, $i = 1; $j <= 17, $i <= 18; $j++, $i++) {
            echo("<tr>");
            echo("<td>" .  $i . "</td>");
            echo("<td>" . $tabelle[$j]['team'] . "</td>");
            echo("<td>" . $tabelle[$j]['differenz'] . "</td>");
            echo("<td>" . $tabelle[$j]['punkte'] . "</td>");
            echo ("</tr>");
        }
        echo("</table>");
        echo("</br>");
        return $tabelle;
    }

    /** zerlegt das ergebnis aus der DB, returnt die beiden werte alleine
     * @param $ergebnis
     * @return $ergebnis_arr (enthält [0]-heim [1]-gast)
     */
    private function tore($ergebnis)
    {
        $ergebnis_arr = explode(':', $ergebnis);
        return $ergebnis_arr;
    }

    /** verteilt die punkte und returnt die beiden werte
     * @param $ergebnis_arr
     * @return $punkte_arr (enthält [0]-heim [1]-gast)
     */
    private function punktvergabe($ergebnis_arr)
    {
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
 }