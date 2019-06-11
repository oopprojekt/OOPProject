<!--dieses komplette html dokument wird immer so unveränderd für jede seite genutzt
nur im content werden die dinge geschrieben die man sehen soll
der rest wird ja aus den anderen templates gezogen-->

<!doctype html>

<html lang="de">

<head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>FuMaSi</title>


    <link href="https://fonts.googleapis.com/css?family=Rajdhani:300,500,600|Source+Sans+Pro:400,700" rel="stylesheet">


    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


    <!-- Mein CSS -->


    <link rel="stylesheet" href="style/stylek.css">


</head>

<body>


<div class="uibereichstart">
<!-- LINKE HAUPTSPALTE -->
    <div class="creatediv">
        <div class="container-fluid create_grid">
            <div class="row">
                <!-- Überschrift Grid -->
                <div class="col-sm-2 create_topic">
                    Beginne deine Karriere
                </div>
                <div class="col-sm-6 topicleiste">
                    <!-- LEERZEILE -->
                </div>
                <div class="col-sm-4">
                    <!-- LEERZEILE -->
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 create_columnone">
                    <!-- LEERZEILE -->
                    <div class="row">
                        <div class="trainerfirstname">
                            <!-- LINKE HAUPTSPALTE -->
                            <div class="form-group trainer_firstname">
                                <label for="usr">Vorname:</label>
                                <input type="text" class="form-control trainer_firstnameform  " id="usr">
                            </div>
                            <div class="form-group trainer_firstname">
                                <label for="usr2">Nachname:</label>
                                <input type="text" class="form-control trainer_firstnameform " id="usr2">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-5 create_columntwo">
                    <!-- RECHTE HAUPTSPALTE -->
                    <div class="row">
                        <!-- TRAINER ÜBERSICHT AUSWAHL -->
                        <div class="col-sm create_trainerone">
                            <img id="coach_a" src="bilder/trainer1.jpg" width="100%" height="">
                        </div>
                        <div class="col-sm create_trainertwo">
                            <img id="coach_b" src="bilder/trainer2.jpg" width="100%" height="">
                        </div>
                        <div class="col-sm create_trainerthree">
                            <img id="coach_c" src="bilder/trainer3.jpg" width="100%" height="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm create_trainerfour">
                            <img id="coach_d" src="bilder/trainer4.jpg" width="100%" height="">
                        </div>
                        <div class="col-sm create_trainerfive">
                            <img id="coach_e" src="bilder/trainer5.jpg" width="100%" height="">
                        </div>
                        <div class="col-sm create_trainersix">
                            <img id="coach_f" src="bilder/trainer6.jpg" width="100%" height="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 create_columnthree">
                    <!-- TRAINER BILD GANZKÖRPER -->
                    <div class="row">
                        <div class="chooseteam"><img id="trainer_gross" width="auto" height="190%"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- UNTERE LEISTE MIT FERTIG BUTTON -->
                <div class="col-sm-8 traineruntereleiste">
                    <img src="./bilder/trainercontinuebutton.png" class="trainercontinuebutton" height="100%">
                </div>
                <div class="col-sm-4 ">
                    <!-- LEERZEILE -->
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->

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

<style type="text/css">


    body {
        background-image: url("https://answers.ea.com/ea/attachments/ea/fifa-18-technical-issues-en/1347/1/9-21-2017_2-12-52_PM.png");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .uibereichstart {
        margin-left: 10%;
        margin-right: 0%;
    }

    .create_grid {
        margin-top: 120px;
    }

    .create_topic {
        background-image: url("http://localhost/OOPProject/bilder/panelbg.png");
        background-size: 100%;
        height: 50px;
        padding-top: 10px;
        border-radius: 5px 5px 0px 0px;
    }

    .traineruntereleiste {
        background-image: url("http://localhost/OOPProject/bilder/traineruntereleiste.png");
        background-size: 100%;
        height: 50px;
        padding-top: 10px;
        border-radius: 5px 5px 5px 5px;
    }

    .topicleiste {
        background-image: url("http://localhost/OOPProject/bilder/traineruntereleiste.png");
        background-size: 100%;
        height: 40px;
        padding-top: 20px;
        border-radius: 5px 5px 5px 5px;
        margin-top: 10px;
        opacity: 0.8;
    }

    .trainercontinuebutton {
        float: right;
    }

    .create_columnone {
        background-image: url("http://localhost/OOPProject/bilder/panelbg.png");
        background-size: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 0px 0px 0px 5px;
    }

    .create_columntwo {
        background-image: url("http://localhost/OOPProject/bilder/panelbg.png");
        background-size: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 0px 5px 5px 0px;
    }

    .create_columnthree {
        padding-top: 30px;
    }

    .create_trainerone, .create_trainertwo, .create_trainerthree, .create_trainerfour, .create_trainerfive, .create_trainersix {

        height: 325px;
        width: 100px;
        position: relative;
        margin-top: 20px;
        margin-bottom: -20px;
    }

    .trainer_gross {
        background-color: transparent;
    }

    .trainer_firstname {
        margin-left: 40px;
        margin-top: 40px;
    }

    .trainer_firstnameform {
        width: 100%;
        background-color: #444;
        border-color: #444;
        height: 50px;
        display: inline-block;
        opacity: 0.5;
    }

    .chooseteam {
        height: 350px;
        width: 100%;
    }
    
</style>