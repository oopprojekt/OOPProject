<?php



?>

    <div id="infoteamandtrainer">

                    Trainer: <span id="vorname"></span>
                    <span id="nachname"></span>

                      <form id="form" action="home.php" method="post">

                        <select name="teams" onchange="leaveChange(this)">
                            <?php
                                foreach($db->get_all_teams() as $row)
                                {
                                   echo "<option value='" . $row["tm_id"] . "'>" . $row["tm_name"] . "</option>";
                                }
                            ?>
                        </select><br>

                    </form>

 <img id="team_logo" width="50%" height="50%">
</div>


<script>

    let trainer = <?php echo json_encode($db->get_trainer_names(), JSON_PRETTY_PRINT) ?>;
    let img_team = document.getElementById("team_logo");
    let vorname = document.getElementById("vorname");
    let nachname = document.getElementById("nachname");

    console.log(trainer);


    leaveChange = (e) => {
        img_team.src = "./bilder/logo/" + e.value + ".png";
        vorname.innerText = trainer[e.value][0];
        nachname.innerText = trainer[e.value][1];
    }

</script>

<style type="text/css">
	#infoteamandtrainer {
		text-align: center; 
    	padding: 2vh;
	}

	#team_logo {
		margin-top: 3vh;
	}
	
#nachname, #vorname {
	margin-bottom: 3vh;
}

</style>

<!--
    <div id="parent">
      <div id="child_1"><img src="http://localhost/OOPProject/bilder/logo/1.png" id="infoteamlogo"></div>
      <div id="child_2"><img src="http://localhost/OOPProject/bilder/logo/15.png"></div>
    </div>    #parent
{
  position: relative;
  
}
 
#child_1, #child_2
{
  width: 100%;
  position: absolute;

 
}

 
#infoteamlogo {
	width: 40%;

}
#child_1
{
  background-color: #ccc;
      display: flex;
  align-items: center;
  justify-content: center;
}
 
#child_2
{

}

#tescht {
	position: relative;
}

-->