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

        <link rel="stylesheet" href="style/maintemplate.css">
    <!-- Mein CSS -->





</head>

<body>

        <div id="loginheader"><b>Wähle dein Team!</b></div>  
        <div class="maincontentrowtemplatelogin">
             <div id="infoteamandtrainer">
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
</div></div>


</div>
   </div></div> </div>         
 


  <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="scripte/js/index.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>

</html>



<style type="text/css">


    #infoteamandtrainer {
        text-align: center; 
        padding: 2vh;
             display: flex;
      align-items: center;
      justify-content: center;
    }

    #team_logo {

        margin-bottom: 3vh;
        width: auto;
        height: 20vh;
    }
    
#nachname, #vorname {
    margin-bottom: 3vh;
}

#selectteam {
    font-size: 1.5vh;
    margin-top: 1vh;
}


  #loginheader {
    padding-top: 1.2vh;
    padding-left: 1%;
  }

#createfooter {

    height: 7vh;
    background-image: url("../OOPProject/bilder/livetickerbg1.png");
    opacity: 0.95;
    border-radius: 6px;
    background-size: 100% 100%;
    margin-left: 35%;
    margin-right: 35%;
    margin-top: 1vh;
    margin-bottom: 22vh;
}
#loginheader {
        margin-top:  25vh;
    height: 4.6vh;
    background-image: url("../OOPProject/bilder/livetickerbg1.png");
    opacity: 0.95;
    border-radius: 6px;
    background-size: 100% 100%;
    margin-left: 65%;
    margin-right: 5%;
    margin-top: 20vh;
    margin-bottom: 1vh;
}

#gamebutton {
        margin-top: 1.25vh;
        height: 4.5vh;
        margin-bottom: 1.25vh;
        margin-left: 0.1vh;
        margin-right: 2vh;
        float: right;
 }
</style>
        </div>
</div>





<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    </body>
</html>
