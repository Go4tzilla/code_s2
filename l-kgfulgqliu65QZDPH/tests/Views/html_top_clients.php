<!DOCTYPE HTML>

<html>


<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./Controllers/Functions/JS/startTime.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>		
    <script type="text/javascript" src="./Controllers/Functions/JS/datepicker_app.js"></script>
    <script type="text/javascript" src="./Controllers/Functions/JS/datepicker.js"></script>
    <script type="text/javascript" src="./Controllers/Functions/JS/body_load.js"></script>
    <script type="text/javascript" src="./Controllers/Functions/JS/javastreets.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
    <link href="./Views/CSS/stylesheet.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="./Controllers/Functions/AJAX/insert_message.js"></script>
    <script type="text/javascript" src="./Controllers/Functions/AJAX/update_history.js"></script>
    <script type="text/javascript" src="./Controllers/Functions/AJAX/get_history_clients.js"></script>
    <script type="text/javascript" src="./Controllers/Functions/AJAX/order_by.js"></script>
    <script type="text/javascript" src="./Controllers/Functions/AJAX/search.js"></script>
    <script type="text/javascript" src="./Controllers/Functions/AJAX/cancel_apps_clients.js"></script>
</head>


<body class="bar" onload="startTime()">

    
    <div class="row navbar">
        <div class="col-xs-2" >
            <a href="./index.php?page=Lobby" title="Retour à l'accueil">
                <img src="./Views/icons/icons8-cat-profile-96.svg" alt="Kitten" style="margin-left:-25px; margin-top:-2px;margin-bottom:2px" width="40px" height ="40px" class ="kitten_icon" >
            </a>
        
            <span style="float:right;position:absolute;top:20px;left:40px;color:#decba4" >
                    <?php 
                        echo $actual_date; 
                    ?>
                <br>
                    <span id="txt" style="color:#a2ab58">
                    </span>
            </span>
        </div>
        <div class="col-xs-2" style="color:#FFFde4;text-align:center;margin-right:2px">
                    <?php 
                    if(isset($_SESSION['greeting_msg'])){
                        echo $_SESSION['greeting_msg'];
                    } 
                    ?>
        </div>
        <div class="col-xs-4" style="color:#FFFFFF;position:relative" >
        <div class="container" style="position:absolute;right:160px;top:-29px;width:60px">
            <label style="left:10px;font-size:12px;color:#decba4;font-weight:bold;">RdV</label>
            <a href="./index.php?page=Appointments" title="Rendez-vous" style="margin-left:0px">
                <img src="./Views/icons/rdv.png" alt="Kitten" width="25px" height ="25px">
            </a>
        </div>
        <div class="container" style="position:absolute;right:120px;top:-29px;width:60px;height:80px">
            <label style="left:10px;font-size:12px;font-weight:bold;color:#decba4">Animaux</label>
            <a href="./index.php?page=Patients" title="Mes animaux" style="position:absolute;padding-bottom:30px;left:30px">
                <img src="./Views/icons/animals.png" alt="Kitten" width="25px" height ="25px">
            </a>
        </div>
        </div>

        <div class="col-xs-6" id="hide">
        <div class="container" style="position:absolute;right:340px;top:0px;width:60px;text-align:center">
            <label style="left:10px;font-size:12px;color:#decba4;font-weight:bold;position:absolute;;top:6px;left:50px;text-align:center">Recherche</label> 
            <form action="./index.php?page=Search" id="search_form" method='post' onsubmit="seek_pet()">            
                <input type="search" autofocus id="check"   style="float:left;top:19px;position:absolute;left:0" class ="search" optional result="5" size="40"name="Search"title="Appuyez sur Entrée pour lancer la requête" placeholder="Rechercher un animal..."/>
                </form>
            </div>
            <div class="container" style="position:absolute;right:160px;top:0px;width:60px">
            <label style="font-size:12px;color:#decba4;font-weight:bold;left:-10px;position:absolute;top:6px">Messagerie</label>        
            <a href="./index.php?page=Messages" title="Messagerie" style="top:30px">
                <img src="./Views/icons/address-book-solid.svg" alt="Kitten" style="top:20px;position:absolute" width="25px" height ="25px">
            </a>
            </div>
            <div class="container" style="position:absolute;right:100px;top:0px;width:60px">
            <label style="font-size:12px;color:#decba4;position:absolute;font-weight:bold;top:6px">Paramètres</label> 
            <a href="./index.php?page=Settings" title="Mon compte" style="top:20px">
                <img src="./Views/icons/cogs-solid.svg" alt="Kitten" style="top:20px;left:35px;position:absolute"  width="25px" height ="25px">
            </a>
            </div>
            <div class="container" style="position:absolute;right:20px;top:0px;width:60px">
            <label style="left:10px;font-size:12px;color:#decba4;position:absolute;font-weight:bold;top:6px">Logout</label> 
            <a href="./index.php?page=Logout" title="Déconnexion">
                <img src="./Views/icons/sign-out-alt-solid.svg" alt="Kitten" style="top:20px;left:20px;position:absolute"  width="25px" height ="25px">
            </a>
            </div>
        </div>

        
    </div>