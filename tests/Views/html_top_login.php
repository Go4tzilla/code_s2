<!DOCTYPE HTML>

<html>


<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./Controllers/Functions/JS/startTime.js"></script>
    <script type="text/javascript" src="./Controllers/Functions/JS/datepicker.js"></script>
    <script type="text/javascript" src="./Controllers/Functions/JS/body_load.js"></script>
    <script type="text/javascript" src="./Controllers/Functions/JS/javastreets.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
    <link href="./Views/CSS/stylesheet.css" type="text/css" rel="stylesheet">
</head>


<body onload="startTime();datepicker()">

    
    <div class="row navbar">
        <div class="col-xs-2">
            <a href="./index.php?page=Login" title="Retour à l'accueil">
                <img src="./Views/icons/icons8-cat-profile-96.svg" alt="Kitten" style="margin-left:-25px; margin-top:-2px;margin-bottom:2px" width="30px" height ="30px" class ="kitten_icon" >
            </a>
        
            <span style="float:right;margin-top:3px;color:#decba4" >
                    <?php 
                        echo $actual_date; 
                    ?>
                <br>
                    <span id="txt" onload="startTime()"style="color:#a2ab58">
                    </span>
            </span>
        </div>
        
        <div class="col-xs-6" style="color:#FFFFFF" id="hide">
            Bonjour visiteur!
        </div>

        <div class="col-xs-6">            
            <a href="./index.php?page=Login" title="Connexion">
                <img src="./Views/icons/login-password1.png" alt="Kitten" width="25px" height ="25px">
            </a>
            <a href="./index.php?page=Register" title="Inscription">
                <img src="./Views/icons/registration.png" alt="Kitten" width="25px" height ="25px">
            </a>
        </div>

        
    </div>
