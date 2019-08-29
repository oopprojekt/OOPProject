<div id="infoteamandtrainer">

    <div id='infoteamlogodiv'><img src='http://localhost/OOPProject/bilder/infologos/logo<?php echo $db->get_team_id($_SESSION['user_mail']); ?>.png' id='infoteamlogo'></div>
    <div id='infoteamtrainerdiv'><img src='http://localhost/OOPProject/bilder/infotrainer1.png' id='infoteamlogo'></div>
    <div id='infoteamnamediv'> <?php echo $_SESSION["team"]; ?></div>
    <div><?php echo $db->get_trainer_by_team($_SESSION["team_id"]); ?></div>
</div>
<div id="infoteamübersicht">

    <div id="infobudget">Budget:</div>
    <div id="infobudgetcontent">23.000.000 €</div>
    <div id="infospieler">Spieleranzahl:</div>
<div id="infospielercontent"><?php echo $db->number_of_players($_SESSION["team_id"]); ?></div>
</div>


<div id="infolastresults">
    <?php
    include_once "./scripte/php/Ligatabelle.php";
    $ligatabelle = new Ligatabelle();
    $ligatabelle->display_head_to_head_only_logos();
    ?>

</div>
