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

        <div id="loginheader"><b>LOGINBEREICH</b></div>  
        <div class="maincontentrowtemplatelogin">
             <div id="infoteamandtrainer">
               <div class="wrapper">
  <div class="box a"></div>
  <div class="box b"></div>
  <div class="box c">                    

  <input type="image" name="submit" src="login.png" id="btn_login" alt="Submit"/>
  <input type="image" name="submit" src="register.png" id="btn_regist" alt="Submit"/>

<body onload="show_login();">


 

                    <div id="div_login" class="index_content"><b>LOGIN</b>
                        <form action="home.php" method="post">
                            <input type="text" name="name" id="logininputstyle" placeholder="***username***"><br>
                            <input type="text" name="passwort" id="logininputstyle" placeholder="***passwort***"><br>
                            <input type="image" name="submit" src="login.png" id="navbutton" alt="Submit"/>
  
                        </form>
                    </div>

                    <div id="div_regist" class="index_content"><b>REGISTRIEREN</b>
                        <form action="create.php" method="post">
                            <input type="text" name="email" id="logininputstyle" placeholder="***email***"><br>
                            <input type="text" name="name" id="logininputstyle" placeholder="***username***"><br>
                            <input type="text" name="passwort" id="logininputstyle" placeholder="***passwort***"><br>
                            <input type="text" name="passwort_2" id="logininputstyle" placeholder="***passwort***"><br>
                            <input type="image" name="submit" src="register.png" id="navbutton" alt="Submit"/>
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
        </div>
</div>





<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    </body>
</html>
