<?php




echo $_SESSION['team'];

?>

    <div id="infoteamandtrainer">

      <div id="a"><img src="http://localhost/OOPProject/bilder/logo/1.png" id="infoteamlogo"></div>
      <div id="b"><img src="http://localhost/OOPProject/bilder/infotrainer1.png" id="infoteamlogo"></div>
      <div id="g"><?php echo $_SESSION["team"]; ?></div>
      <div>(Trainername)</div>
 </div>  
    <div id="infoteamübersicht">

      <div id="infobudget">Budget:</div>
      <div id="infobudgetcontent">23.000.000 €</div>
      <div id="infospieler">Spieleranzahl: </div>
      <div id="infospielercontent">21 </div>
 </div>  


<div id="infolastresults">
	            <?php
            include_once "./scripte/php/Ligatabelle.php";
            $ligatabelle = new Ligatabelle();
            $ligatabelle->display_head_to_head_only_logos();
            ?>

</div>

<style type="text/css">
	#infoteamandtrainer {
		text-align: center; 
    	padding: 2vh;
	}

	#infoteamlogo {
		width: 80%;
	}

	#a {
		display: inline-block;
		float: left;
		width: 50%;
	}

	#b {
		display: inline-block;
		float: left;
		width: 50%;
		margin-bottom:  2vh;
}
	#g {
		margin-top: 30px;
	}


	#infoteamübersicht {
		background-color: #ccc;
		margin-left: 5%;
		margin-right: 5%;
	}
 
	#infobudget {
		display: inline-block;
		float: left;
		width: 60%;
 		background-image: linear-gradient(to top, #CFCFCF 0%, #EAEAEA 50%);
 		padding-top: 0.5vh;
		padding-bottom: 0.5vh;
	}

	#infobudgetcontent {
		display: inline-block;
		float: right;
		width: 40%;
 		background-image: linear-gradient(to top, #CFCFCF 0%, #EAEAEA 50%);
		padding-top: 0.5vh;
		padding-bottom: 0.5vh;
	}
	#infospieler {
		display: inline-block;
		float: left;
		width: 60%;
 		margin-bottom:  3vh;
 		background-image: linear-gradient(to top, #CFCFCF 0%, #EAEAEA 50%);
 		padding-top: 0.5vh;
 		padding-bottom: 0.5vh;
	}
	#infospielercontent {
		display: inline-block;
		float: right;
		width: 40%;
		margin-bottom:  3vh;
 		background-image: linear-gradient(to top, #CFCFCF 0%, #EAEAEA 50%);
		padding-top: 0.5vh;
		padding-bottom: 0.5vh;
	}


	#infolastresults {
		margin-left: 5%;
		margin-right: 5%;
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