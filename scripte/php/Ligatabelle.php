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

    /**
     *  erstellt array für teilnehmende teams
     * @return $plan
     */
    public function get_technik_team()
    {
        $sql = "SELECT `spl_technik`FROM `tbl_spieler` WHERE `spl_fs_team` = '1';";
        $res = $this->connection->execute($sql);
        $technik_team = 0;
        while($row = mysqli_fetch_object($res))
        {
            $technik_team =  $technik_team + $row->spl_technik;
        }
        return $technik_team;
    }

    public function get_ausdauer_team()
    {
        $sql = "SELECT `spl_ausdauer`FROM `tbl_spieler` WHERE `spl_fs_team` = '1';";
        $res = $this->connection->execute($sql);
        $ausdauer_team = 0;
        while($row = mysqli_fetch_object($res))
        {
            $ausdauer_team =  $ausdauer_team + $row->spl_ausdauer;
        }
        return $ausdauer_team;
    }

    public function get_torgefahr_team()
    {
        $sql = "SELECT `spl_torgefahr`FROM `tbl_spieler` WHERE `spl_fs_team` = '1';";
        $res = $this->connection->execute($sql);
        $torgefahr_team = 0;
        while($row = mysqli_fetch_object($res))
        {
            $torgefahr_team =  $torgefahr_team + $row->spl_torgefahr;
        }
        return $torgefahr_team;
    }

    public function get_zweikampf_team()
    {
        $sql = "SELECT `spl_ausdauer`FROM `tbl_spieler` WHERE `spl_fs_team` = '1';";
        $res = $this->connection->execute($sql);
        $zweikampf_team = 0;
        while($row = mysqli_fetch_object($res))
        {
            $zweikampf_team =  $zweikampf_team + $row->spl_ausdauer;
        }
        return $zweikampf_team;
    }

    public function get_teamstaerke()
    {
        $teamstaerke = $this->get_zweikampf_team() + $this->get_torgefahr_team() + $this->get_technik_team() + $this->get_ausdauer_team();
        $sql = "SELECT `spl_ausdauer`FROM `tbl_spieler` WHERE `spl_fs_team` = '1';";
        $res = $this->connection->execute($sql);
        $anzahl_spielerwerte = floor($res->num_rows*4);
        $teamstaerke = floor($teamstaerke/$anzahl_spielerwerte);
        return $teamstaerke;
    }
    /**
     *  erstellt array für teilnehmende teams
     * @return $plan
     */
    public function ergebnislogik()
    {
        $teamstaerke_heim = $this->get_teamstaerke(); //1-66
        $teamstaerke_gast = $this->get_teamstaerke();
        $z_faktor_heim = rand(1,34);
        $z_faktor_gast = rand(1,34);
        $erg_heim = $teamstaerke_heim + $z_faktor_heim;
        $erg_gast = $teamstaerke_gast + $z_faktor_gast;
        if ($erg_heim > $erg_gast && ($erg_heim - $erg_gast)>5) {
            echo ("Team dahoam hat gewonnen!");
        } elseif($erg_heim < $erg_gast && ($erg_gast - $erg_heim)>3) {
            echo ("Team away hat gewonnen!");
        } else {
            echo ("Beide Teams müssen sich mit einem Punkt begnügen!");
        }
        $ergebnis = $erg_heim . ":" . $erg_gast;
        echo $ergebnis;
        echo ("</br>");
    }

    public function spielstand()
    {

    }

    public function punktvergabe()
    {

<<<<<<< HEAD
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
=======
>>>>>>> 9993e3a07ea5dbc7dd2fc85a9cb7027d5514ec99
    }

}