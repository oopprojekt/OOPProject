<?php

include_once "Config.php";

class DB
{
    private $connection = null;
    private $id_class = null;
    private $email_class = null;
    private $team_id = null;

    /**
     * DB constructor.
     * @param $mail
     */
    function __construct($mail)
    {
        $this->connection = mysqli_connect(Config::$HOST, Config::$NUTZER, Config::$PASSWORT, Config::$DB);
        $this->email_class = $mail;
        $this->get_user_id($this->email_class);
        $this->get_team_id($this->email_class);
    }

    /**
     * @param $sql
     * @return bool|mysqli_result
     */
    public function execute($sql)
    {
        return mysqli_query($this->connection, $sql);
    }

    /**
     * @param $name
     * @param $email
     * @param $passwort
     */
    public function create_user($name, $email, $passwort)
    {
        $team = 0;
        $transfer = 0;
        $sql_anmeldung = "INSERT INTO `tbl_user` (`usr_email`, `usr_name`, `usr_passwort`, `usr_fs_team`, `usr_fs_transfer`) VALUES ('" . $email . "', '" . $name . "', '" . $passwort . "', " . $team . "," . $transfer . ");";
        $this->execute($sql_anmeldung);
    }

    /**
     * @param $email
     * @return integer
     */
    public function get_user_id($email)
    {
        $sql = "SELECT `usr_id` FROM `tbl_user` WHERE `usr_email` = '" . $email . "';";
        $res = $this->execute($sql);
        $this->set_id((int)mysqli_fetch_assoc($res)["usr_id"]);
        return $this->id_class;
    }

    /**
     * @param $id
     */
    private function set_id($id)
    {
        $this->id_class = $id;
    }

    /**
     * @return string farbe
     */
    public function get_user_color()
    {
        $sql = "SELECT tbl_team.tm_farbe  FROM tbl_team JOIN tbl_user ON tbl_user.usr_fs_team = tbl_team.tm_id WHERE tbl_user.usr_id =" . $this->id_class . ";";
        $res = $this->execute($sql);
        return mysqli_fetch_assoc($res)["tm_farbe"];
    }

    /**
     * @param $id
     */
    private function set_team_id($id)
    {
        $this->team_id = $id;
    }

    /**
     * @param $email
     * @return integer team_id
     */
    public function get_team_id($email)
    {
        $sql = "SELECT `usr_fs_team` FROM `tbl_user` WHERE `usr_email` = '" . $email . "';";
        $res = $this->execute($sql);
        $this->set_team_id((int)mysqli_fetch_assoc($res)["usr_fs_team"]);
        return $this->team_id;
    }

    /**
     * @return bool|mysqli_result
     */
    private function get_all_teamplayers($team_id)
    {
        $sql = "SELECT * FROM tbl_spieler WHERE spl_fs_team = " . $team_id . ";";
        return $this->execute($sql);
    }

    /**
     * @return array
     */
    private function get_fieldnames()
    {
        $result = [];
        $sql = "SHOW COLUMNS FROM tbl_spieler;";
        $res = $this->execute($sql);

        while ($row = mysqli_fetch_assoc($res)) {
            array_push($result, $row["Field"]);
        }
        return $result;
    }

    /**
     * @param $feild
     * @return bool|string
     */
    private function clear_fieldname($feild)
    {
        return substr($feild, 4);
    }

    /**
     * @return array
     */
    public function create_player_array($team_id)
    {
        $players = [];
        $all_players = $this->get_all_teamplayers($team_id);
        $fields = $this->get_fieldnames();
        array_shift($fields);

        while ($row = mysqli_fetch_assoc($all_players)) {
            $keys = [];
            $values = [];
            $players[$row["spl_id"]] = [];

            for ($i = 0; $i < 15; $i++) {
                array_push($keys, $this->clear_fieldname($fields[$i]));
                array_push($values, $row[$fields[$i]]);
            }
            $actual_player = array_combine($keys, $values);
            array_push($players[$row["spl_id"]], $actual_player);
        }
        return $players;
    }

    /**
     * @param string
     */
    public function set_string_tbl_transfer($string)
    {
        $sql = "INSERT INTO `tbl_transfer`(`trf_info`) VALUES ('" . $string . "')";
        $this->execute($sql);
    }

    /**
     * @return bool|mysqli_result
     */
    public function get_all_teams()
    {
        $sql = "SELECT * FROM tbl_team;";
        return $this->execute($sql);
    }

    /**
     * @param $id
     * @return string
     */
    public function get_team_by_id($id)
    {
        $sql = "SELECT tm_name FROM tbl_team WHERE tm_id = " . $id . ";";
        //->fetch_row()[0] -> liefert vom
        // resultobjekt den gewünschten string
        return $this->execute($sql)->fetch_row()[0];
    }

    /**
     * @return array
     */
    public function get_trainer_names()
    {
        $sql = "SELECT * FROM tbl_team JOIN tbl_trainer ON tbl_team.tm_fs_trainer = tbl_trainer.tr_id;";
        $trainer = [];
        foreach ($this->execute($sql) as $item) {
            $trainer[$item["tm_id"]] = [utf8_encode($item["tr_vorname"]), utf8_encode($item["tr_nachname"])];
        }
        return $trainer;
    }

    /**
     * @param $team_id
     */
    public function set_team($team_id)
    {
        $sql = "UPDATE tbl_user SET usr_fs_team = " . $team_id . " WHERE usr_email = '" . $this->email_class . "';";
        $this->execute($sql);
    }

    /**
     * @param $user
     * @return string
     */
    public function get_trainer($user)
    {
        $sql = "SELECT tbl_trainer.tr_vorname, tbl_trainer.tr_nachname FROM tbl_trainer JOIN tbl_team 
                ON 
                tbl_trainer.tr_id = tbl_team.tm_fs_trainer JOIN tbl_user 
                ON 
                tbl_team.tm_id = tbl_user.usr_fs_team 
                WHERE tbl_user.usr_name = '" . $user . "';";
        $vorname = $this->execute($sql)->fetch_row()[0];
        $nachname = $this->execute($sql)->fetch_row()[1];
        return $vorname . " " . $nachname;
    }

    /**
     * @param $id
     * @return $res
     */
    public function get_spielgergebnis($id)
    {
        $sql = "SELECT `sp_fs_heim`,`sp_fs_auswaerts`,`sp_ergebnis` FROM `tbl_spielplan` WHERE `sp_id` = " . $id . ";";
        $res = $this->execute($sql);
        return $res;
    }



    /**
     * @return bool|mysqli_result
     */
    private function get_spieler_staerke_pos()
    {
        $sql = "SELECT spl_vorname AS vorname, spl_nachname AS nachname, spl_ausdauer, spl_technik, spl_torgefahr, spl_zweikampf, pos_kurzel AS posi 
                FROM tbl_spieler JOIN tbl_position ON spl_fs_position = pos_id WHERE spl_fs_team = " . $this->team_id . ";";
        return $this->execute($sql);
    }

    /**
     * @return array
     */
    public function create_array_player_staerke_pos()
    {
        $players = [];
        $all_players = $this->get_spieler_staerke_pos();

        while ($row = mysqli_fetch_assoc($all_players))
        {
            $staerken = $row["spl_ausdauer"] + $row["spl_technik"] + $row["spl_torgefahr"] + $row["spl_zweikampf"];
            $stark = intval($staerken / 4);

            $spieler = ["vorname" => $row["vorname"],
                        "nachname" => $row["nachname"],
                        "position" => $row["posi"],
                        "stärke" => $stark];

            array_push($players, $spieler);
        }

        return $players;
    }





    /*  methode welche das budget unseres teams holt aus der tbl_team
        benötigt keinen parameter, da die id des users ja schon als
        klassenvariable vorhanden ist ($this->id_class)
        im sql-befehl musst du wieder JOIN nutzen
        und einen integer returnen */


    /*  methode zum ändern des budget in der tbl_team
        ein parameter als integer (also das neue budget)
        für den sql-string benötigst du wieder die id des users und
        wieder JOINen
        tip: sql-befehl UPDATE
        */


    /*  methode zum ändern der formation
        ein parameter als string der formation
        aber das passiert nicht in der tbl_formation, sondern in der
        tbl_team wird der wert des fremdschlüssels tm_fs_formation
        geändert */


    /*  und natürlich auch noch eine methode zum auslesen der formation
        ein parameter als integer für die team_id
        und es wird ein string returnt */


    /*  eine methode welche dir die komplette tabelle
        tbl_spielplan returnt */


    /*  ausserdem kommen dann noch einige methoden
        getter und setter
        für die eigenschaften der speiler */

    /*  ĥier angelangt sollte der grossteil dieser klasse fertig sein
        dann ist gehirnschmalz gefordert wenn du die klasse für die
        ligatabelle baust ;) */
}