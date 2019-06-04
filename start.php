<?php

//datenbankanbindungstetst
include_once "./scripte/php/DB.php";

$foo = new DB();

?>
<!--dieses komplette html dokument wird immer so unveränderd für jede seite genutzt
nur im content werden die dinge geschrieben die man sehen soll
der rest wird ja aus den anderen templates gezogen-->

<!doctype html>

<html lang="de">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 

<title>FuMaSi</title>

 

<link href="https://fonts.googleapis.com/css?family=Rajdhani:300,500,600|Source+Sans+Pro:400,700" rel="stylesheet">

 

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

 

    <!-- Mein CSS -->

 

            <link rel="stylesheet" href="style/styletk.css">

 

    </head>

    <body>



 <div class="uibereichstart">
 
<div class="logindiv">
    <div class="logindiv container-fluid">
  <div class="row">
    <div class="col-sm login_div_1">
      
    </div>
    <div class="col-sm login_div_2">
      
    </div>
        <div class="col-sm login_div_3">
      
    </div>
        <div class="col-sm login_div_4">
      

 <body onload="show_login();">

        <button id="btn_login" class="buttons">login</button>
        <button id="btn_regist" class="buttons">registrieren</button>

        <div id="div_login" class="index_content">login
            <form action="home.php" method="post">
                <input type="text" name="name" placeholder="***username***"><br>
                <input type="text" name="passwort" placeholder="***passwort***"><br>
                <input type="submit" class="buttons" value="spielen">
            </form>
        </div>

        <div id="div_regist" class="index_content">registrieren
            <form action="init.php" method="post">
                <input type="text" name="email" placeholder="***email***"><br>
                <input type="text" name="name" placeholder="***username***"><br>
                <input type="text" name="passwort" placeholder="***passwort***"><br>
                <input type="text" name="passwort_2" placeholder="***passwort***"><br>
                <input type="submit" class="buttons" value="anmelden">
            </form>
        </div>

    <script src="scripte/js/index.js"></script>

      
    </div>
  </div>
</div>

</div>




    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  </body>

</html>