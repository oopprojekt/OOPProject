<?php
session_start();
include_once "./scripte/php/show_errors.php";
include_once "./scripte/php/DB.php";
//error_reporting(0);

$db = new DB($_SESSION['user_mail']);

if (!$_SESSION['team']) {
    $db->update_team_to_user($_POST['teams']);
    $_SESSION['team'] = $db->get_team_by_id($_POST['teams']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/maintemplate.css">
    <title>Start Page</title>
</head>
<body>
<div class="calendartemplate"><?php include_once "./templates/header.php"; ?></div>
<div class="leftcolumntemplate"><?php include_once "./templates/info.php"; ?></div>
<div class="rightcolumntemplate">
    <div class="navrowtemplate"><?php include_once "./templates/nav.php"; ?></div>
    <div class="maincontentrowtemplate flexer">

        <!--Stefan Senftleben-->
        <!--leider bekomme ich die actions nicht kombiniert zum laufen...somit ist ein kauf leider nicht möglich :( -->
        <?php
        $poolers = $db->get_player_pool();
        ?>

        <form class="trans-margin" method="post" action="transfer.php">
            <select name="pool_player" onchange="this.form.submit()">
                <option value="" disabled selected>***Spielerwahl***</option>
                <?php while ($row = mysqli_fetch_assoc($poolers)): ?>
                    <option value="<?php echo $row["res_id"]; ?>"><?php echo $row["res_vorname"] . " " . $row["res_nachname"]; ?></option>
                <?php endwhile; ?>
            </select>
        </form>
        <?php
            $vorname = "***";
            $nachname = "***";
            $alter = "***";
            $preis = 0;
            $pos = "***";
            $ausdauer = "***";
            $technik = "***";
            $torgefahr = "***";
            $zweikampf = "***";

            if (isset($_POST["pool_player"])) {
                $man = $db->get_pooler_by_id($_POST["pool_player"]);
                $vorname = $man["res_vorname"];
                $nachname = $man["res_nachname"];
                $alter = $man["res_alter"];
                $pos = $man["res_position"];
                $ausdauer = $man["res_ausdauer"];
                $technik = $man["res_technik"];
                $torgefahr = $man["res_torgefahr"];
                $zweikampf = $man["res_zweikampf"];
                $preis = $man["res_kosten"];
            }
        ?>
        <div class="trans-margin">
            <table>
                <tr>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Alter</th>
                    <th>Position</th>
                    <th>Ausdauer</th>
                    <th>Technik</th>
                    <th>Torgefahr</th>
                    <th>Zweikampf</th>
                    <th>Preis</th>
                </tr>
                <tr>
                    <td><?php echo $vorname; ?></td>
                    <td><?php echo $nachname; ?></td>
                    <td><?php echo $alter; ?></td>
                    <td><?php echo $pos; ?></td>
                    <td><?php echo $ausdauer; ?></td>
                    <td><?php echo $technik; ?></td>
                    <td><?php echo $torgefahr; ?></td>
                    <td><?php echo $zweikampf; ?></td>
                    <td><strong><?php echo number_format($preis, 0, ",", "."); ?> €</strong></td>
                </tr>
            </table>

        </div>
        <!--
        <form>
            <select name="nummer" onchange="this.form.submit()">
                <option value="" disabled selected>***Nummernwahl***</option>
                <?php for ($i = 1; $i <= 42; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
            <button name="button">koofen</button>
        </form>
        -->
    </div>
</div>
<div class="footertemplate"><?php include_once "./templates/footer.php"; ?></div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

</body>
</html>
