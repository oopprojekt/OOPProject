<?php

//datenbankanbindungstetst
include_once "./scripte/php/DB.php";

?>

<!doctype html>

<html lang="de">

<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>FuMaSi</title>


    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


    <!-- Mein CSS -->


    <link rel="stylesheet" href="style/...">


</head>

<body>

<div class="wrapper">
  <div class="box a"></div>
  <div class="box b"></div>
  <div class="box c">                    

  <button id="btn_login" class="buttons">login</button>
  <button id="btn_regist" class="buttons">registrieren</button>

<body onload="show_login();">


 

                    <div id="div_login" class="index_content">login
                        <form action="home.php" method="post">
                            <input type="text" name="name" placeholder="***username***"><br>
                            <input type="text" name="passwort" placeholder="***passwort***"><br>
                            <input type="submit" class="buttons" value="spielen">
                        </form>
                    </div>

                    <div id="div_regist" class="index_content">registrieren
                        <form action="create.php" method="post">
                            <input type="text" name="email" placeholder="***email***"><br>
                            <input type="text" name="name" placeholder="***username***"><br>
                            <input type="text" name="passwort" placeholder="***passwort***"><br>
                            <input type="text" name="passwort_2" placeholder="***passwort***"><br>
                            <input type="submit" class="buttons" value="anmelden">
                        </form>
                    </div>
</div>
  <div class="box d"></div>
</div>



  <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="scripte/js/index.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>


<style type="text/css">

body {
	 background-image: url("/OOPProject/Bilder/indexbg.png");
    background-color: #000;
    background-size: 100% 100%;
    overflow-y: hidden;
}

.wrapper {
	width: 100%;
}
 
.a {
	width: 100%;
	height: 40vh;
}

.b {
	width: 50%;
	height: 33vh;
	float: left;
}

.c {
	width: 50%;
	height: 33vh;
	float: right;
 
	text-align: center;	
}
.d {
	float: left;
	width: 100%;
	height: 30vh;
	}
}

</style>