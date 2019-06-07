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


    <link rel="stylesheet" href="style/stylek.css">


</head>

<body>


<div class="uibereichstart">

    <div class="creatediv">
        <div class="container-fluid create_grid">
            <div class="row">
                <div class="col-sm-2 create_topic">
                    Beginne deine Karriere
                </div>
                <div class="col-sm-10">

                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 create_columnone">
                    <div class="row">
                        <div class="trainerfirstname">Item 1</div>
                        <div class="trainersecondname">Item 2</div>
                        <div class="trainersecondname">Item 2</div>
                    </div>
                </div>
                <div class="col-sm-5 create_columntwo">

                    <div class="row">
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
                        <div class="col-sm create_trainerone">
                            <img id="coach_c" src="bilder/trainer3.jpg" width="100%" height="">
                        </div>
                        <div class="col-sm create_trainertwo">
                            <img id="coach_c" src="bilder/trainer2.jpg" width="100%" height="">
                        </div>
                        <div class="col-sm create_trainerthree">
                            <img id="coach_c" src="bilder/trainer1.jpg" width="100%" height="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 create_columnthree">

                    <div class="row">
                        <div class="chooseteam"><img id="bilder/trainer_gross" width="80%" height="180%"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- Optional JavaScript -->

<script>

    let img_coach = document.getElementById("bilder/trainer_gross");
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

        background-image: url("http://localhost/OOPProject/bilder/panelpic.png");
        background-size: 100%;
        height: 50px;
        padding-top: 10px;
    }


    .create_columnone {
        background-color: #ccc;
    }

    .create_columntwo {
        background-color: #ccc;
    }

    .create_columnthree {
        padding-top: 30px;
    }

    .create_trainerone, .create_trainertwo, .create_trainerthree, .create_trainerfour, .create_trainerfive, .create_trainersix {
        background-color: #999;
        height: 325px;
        width: 100px;
        position: relative;
    }

    .trainer_gross {
        background-color: transparent;
    }

    .trainerfirstname {
        height: 150px;
        width: 100%;
    }

    .trainersecondname {
        height: 150px;
        width: 100%;
    }

    .chooseteam {
        height: 350px;
        width: 100%;
    }
</style>