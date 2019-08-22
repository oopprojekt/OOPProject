


<?php 
//an dieser stelle kommt immer das benötigte php zeugs
//welches ja auf jeder seite anders ist und immer auch nur den content
//betrifft
include_once "./scripte/php/show_errors.php";
include_once "./scripte/php/DB.php";
$db = new DB("grete@il.de");
session_start();
//error_reporting(0);
$_SESSION['tr_vorname'] = $_POST['trainer_vorname'];
$_SESSION['tr_nachname'] = $_POST['trainer_nachname'];

if(!$_SESSION['team'])
{
    $_SESSION['team'] = $db->get_team_by_id($_POST['teams']);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="maintemplate.css">
    <title>Start Page</title>
</head>
<body>
<div class="calendartemplate"><?php include_once "./templates/header.php"; ?></div>
  <div class="leftcolumntemplate"><?php include_once "./templates/info.php"; ?></div>
  <div class="rightcolumntemplate">
		<div class="navrowtemplate"><?php include_once "./templates/nav.php"; ?></div>
		<div class="maincontentrowtemplate"></div>
</div>
<div class="footertemplate"><?php include_once "./templates/footer.php"; ?></div>


<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

</body>
</html>
 




<!--
<style type="text/css">
body {
	padding: 3vh 10% 3vh 10%;
	margin: 0;
}
	.a {
		background-color: #888;
		width: 20%;
		height: 650px;
		display: inline-block; 
		background-color: #666;    
		background-image: url("/OOPProject/Bilder/livetickerbg1.png"); 
		opacity: 0.95; 
		border-radius: 6px;
  		background-size: 100% 100%;
  		float: left;
	}
	.b {
		background-color: #999;
		width: 60%;
		display: inline-block;
		padding-left: 1%;
		padding-top: 1vh;
	}
	.c {
		background-color: #666;	         
		height: 15vh;  
		background-image: url("/OOPProject/Bilder/livetickerbg1.png"); 
		opacity: 0.95; 
		border-radius: 6px;
  		background-size: 100% 100%;	
  		width: 100%;
	}
	.d {
		background-color: #777;	        
		height: 15vh;  
		background-image: url("/OOPProject/Bilder/livetickerbg1.png"); 
		opacity: 0.95; 
		border-radius: 6px;
  		background-size: 100% 100%;	
  		width: 100%;
  		margin-top: 1vh;
	}
</style>