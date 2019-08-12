<?
include_once "Config.php";
include_once "DB.php";
/**
 * Class spieltag
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
    public function set_spieltag()
    {
        // Teams aus DB holen
        $sql = "SELECT tm_name FROM tbl_team";
        $res = $this->execute($sql);

        $teams = array();
        while (($row = mysqli_fetch_assoc($res)) !== false)
        {
            $teams[] = $row['tm_name'];
        }
// Benötigte Variablen setzen
        $anzahl  = count($teams);									   // Anzahl der Teams
        $paare   = floor($anzahl / 2);								  // Anzahl der möglichen Spielpaare
        $plan	= array();            								  // Array für den kompletten Spielplan
        $tage	= ($anzahl % 2) ? count($teams) : count($teams)-1;	  // bei ungerader Anzahl an Teams brauchen wir einen Spieltag mehr
        $base	= ($anzahl % 2) ? $anzahl-2 : $anzahl-1;			   // die Basis für den Array-Index, bei ungerader Anzahl an Teams
// fangen wir beim vorletzten Team an

        for ($tag = 1; $tag <= $tage; $tag++) {
            if ($anzahl % 2)
                // letztes Element nach vorne
                array_unshift($teams, array_pop($teams));
            } else {
                // zweites Element mit array(letztes Element, zweites Element) ersetzen,
                // also letztes Element zwischen 1. und 2. Element einfügen
                array_splice($teams, 1, 1, array(array_pop($teams), $teams[1]));
            }

            for ($spiel = 0; $spiel < $paare; $spiel++) {
                $heim = $teams[$spiel];
                $gast = $teams[$base-$spiel];

                $plan[$tag][] = array($heim, $gast);

                /* Rückrunde */
                //$plan[$tag+$tage][] = array($heim, $gast);
            }
        }
        ksort($plan);

// Spielplan ausgeben
        echo "<h1>Spielplan</h1>\n";
        foreach ($plan as $spieltag => $spiele) {
            echo "<h2>" . $spieltag . ". Spieltag</h2>\n";
            echo "<ul>\n";
            foreach ($spiele as $spielnummer => $paarung) {
                echo "<li>" . $paarung[0] . " - " . $paarung[1] . "</li>\n";
            }
            echo "</ul>\n";
        }
    }
}

?>
