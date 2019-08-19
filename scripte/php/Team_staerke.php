<?php
/**
 * Created by PhpStorm.
 * User: ssenftleben
 * Date: 19.08.19
 * Time: 05:32
 */
include_once "DB.php";

class Team_staerke
{
    private $team_staerke = null;
    private $all_team_players = null;


    function __construct($team_id)
    {
        $db = new DB("else@gmx.com");
        $this->all_team_players = $db->create_player_array($team_id);
    }

    public function printer()
    {
        echo "<br><br>alle spieler array:";
        var_dump($this->all_team_players);
    }


}