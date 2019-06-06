<?php

include_once "Config_0.php";

class DB
{
    // private $db = null;
    private $id_class = null;
    private $connection = null;
    private $email_class = null;

    function __construct()
    {
        /*$this->db = new mysqli(Config::$HOST, Config::$NUTZER, Config::$PASSWORT, Config::$DB);
        if($this->db->connect_errno)
        {
            die("problem -> " . $this->db->connect_error);
        }
        else
        {
            echo "das geht";
        }*/
        $this->connection = mysqli_connect(Config::$HOST, Config::$NUTZER, Config::$PASSWORT, Config::$DB);

    }

    /**
     * @param $sql
     * @return bool|mysqli_result
     */

    private function execute($sql)
    {
        return mysqli_query($this->connection, $sql);
    }

    /**
     * @param $name
     * @param $email
     * @param $password
     */

    public function create_user($name, $email, $passwort)
    {
        $team = 0;
        $transfer = 0;
        $sql_anmeldung = "INSERT INTO `tbl_user` (`usr_email`, `usr_name`, `usr_passwort`, `usr_fs_team`, `usr_fs_transfer`) VALUES ('" . $email . "', '" . $name . "', '" . $passwort . "', " . $team ."," . $transfer . ");";
        // echo $sql_anmeldung;
        $this->execute($sql_anmeldung); //aufruf execute
    }

    public function  get_user_id($email)
    {
        $this->email_class = $email;
        $sql = "SELECT `usr_id` FROM `tbl_user` WHERE `usr_email` = '". $this->email_class . "';";
        // mysqli_fetch_assoc($res)["usr_id"];
        $res = $this->execute($sql);
        $this->id_class = (int)mysqli_fetch_assoc($res)["usr_id"];
        return $this->id_class;
    }

    public function  get_user_color()
    {
        $sql = "SELECT tbl_team.tm_farbe  FROM tbl_team JOIN tbl_user ON tbl_user.usr_fs_team = tbl_team.tm_id WHERE tbl_user.usr_id =" . $this->id_class . ";";
        $hv = $this->execute($sql);
        $hv2 = mysqli_fetch_assoc($hv)["tm_farbe"];
        echo ($hv2);
        return $this->execute($hv2);
    }
}