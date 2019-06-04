<?php

include_once "Config.php";

class DB
{
    private $db = null;

    function __construct()
    {
        $this->db = new mysqli(Config::$HOST, Config::$NUTZER, Config::$PASSWORT, Config::$DB);
        if($this->db->connect_errno)
        {
            die("problem -> " . $this->db->connect_error);
        }
        else
        {
            echo "das geht";
        }
    }

    public function execute($sql)
    {
        return $this->db->query($sql);
    }
}