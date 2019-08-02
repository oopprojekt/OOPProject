<?php
include_once "./scripte/php/show_errors.php";

session_start();
$_SESSION['user_name'] = $_POST['name'];
$_SESSION['user_mail'] = $_POST['email'];
$_SESSION['passwort'] = $_POST['passwort'];

include_once "./scripte/php/DB.php";

$db = new DB($_SESSION['user_mail']);
//$db->create_user($_SESSION['user_name'], $_SESSION['user_mail'], $_SESSION['passwort']);
//$db->create_user("name", "mail@gmx.de", "pw");

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/create.css">
    <title>Create Page</title>
</head>
<body>
<div class="page-container flex-y">
    <!-- First row -->
    <div class="flex-x mt-3">
        <div class="first-block grey-block">Starte deine Karriere!</div>
        <div class="flex-y flex-1 mr-10">
            <div class="white-space">
            </div>
            <div class="flex-1 grey-block left-border-none">
            </div>
        </div>
        <div class="first-line-last-space"></div>
    </div>
    <!-- Second row -->
    <div class="flex-x flex-1 mb-3">
        <div class="flex-y flex-1">
            <div class="flex-1 flex-x mr-6 mt-3">
                <div class="grey-block third-block">


                    <label for="usr">Vorname:</label>
                    <input type="text" class="form-control trainer_firstnameform  " id="usr"><br/>

                    <label for="usr2">Nachname:</label>
                    <input type="text" class="form-control trainer_firstnameform " id="usr2">

                    <form action="home.php" method="post">
                        <input type="text" name="trainer_vorname" placeholder="***vorname***"><br>
                        <input type="text" name="trainer_nachname" placeholder="***nachname***"><br>

<<<<<<< HEAD
                        <select name="teams">
                            <?php
                                foreach($db->get_all_teams() as $row)
                                {
                                   echo "<option>" . $row["tm_name"] . "</option>";
                                }
                            ?>
                        </select><br>
=======
                         
                        <select name="teams">
                            <?php
                               					

                        /*TK ANSATZ (funzt, aber leider in pdo) */ 


                        $pdo = new pdo('mysql:host=localhost;dbname=fumasi', 'root', 'root'); /* ZUGANGSDATEN ANPASSEN! **/

						$sql = "SELECT * FROM tbl_team";
						foreach ($pdo->query($sql) as $row) {
						   echo "<option>" . $row['tm_name'] . "</option>";;
						} 

					 
						/* STEFANS ANSATZ */

                        /*   while($row = mysqli_fetch_assoc($db->get_all_teams()))
                             {
                              	echo "<option value='" . $row["tm_id"] . "'>" . $row["tm_name"] . "</option>";
                             }
                         */

                            ?>
                        </select><br>
                        
>>>>>>> 21e044e0f64e60f06cad99d725fba421a79b9914

                        <input type="submit" class="buttons" value="spielen">
                    </form>

                </div>
                <div class="grey-block flex-1 left-border-none">


                    <img id="coach_a" src="bilder/trainer1.jpg" width="32%" height="">
                    <img id="coach_b" src="bilder/trainer2.jpg" width="32%" height="">
                    <img id="coach_c" src="bilder/trainer3.jpg" width="32%" height="">

                    <img id="coach_d" src="bilder/trainer4.jpg" width="32%" height="">
                    <img id="coach_e" src="bilder/trainer5.jpg" width="32%" height="">
                    <img id="coach_f" src="bilder/trainer6.jpg" width="32%" height="">

                </div>
            </div>
            <div class="flex-x third-row mtr-6">
                <div class="grey-block flex-1"></div>
                <div class="grey-block last-block left-border-none">
                    <a href="#">Karriere starten </a>
                </div>
            </div>
        </div>
        <div class="right-last-block"><img id="trainer_gross" width="110%" height="auto"></div>
    </div>
</div>


<script>

    let img_coach = document.getElementById("trainer_gross");
    img_coach.src = "./bilder/coach_b.png";

    document.addEventListener('click', (e) => {

        let id_img = e.target.id;
        let str_coach = id_img.substr(0, 5);


        if ("coach" === str_coach) {
            img_coach.src = "./bilder/" + id_img + ".png";
        }

    }, false);

</script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>