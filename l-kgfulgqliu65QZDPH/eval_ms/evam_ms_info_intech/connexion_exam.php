<!DOCTYPE HTML>
<?php session_start()?>
<html>
<head>

    <title>LE drive d'Ali-mentation</title>
    <meta content='http-equiv' content-type='text/html; charset = UTF-8'/>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"> 
    	<style>
				body { 
				font-family: 'Josefin Sans',sans serif;
				font-size : 16px;
				}
		</style>
</head>

<body>
    <?php

        echo('<center>Bienvenue sur magic-ali-mentation.com, veuillez vous connecter avant de passer commande.</center><br/>');
                    
                /** Vérification du contenu des champs du formulaire*/
        if(isset($_POST['nick'])){
            
            if(empty($_POST['nick'])||empty($_POST['pwd'])){
                
                if(empty($_POST['nick'])){
                    $nick = "pseudo";
                    $nick1 = "";
                } else {
                    $nick = "";
                    $nick1 = $_POST['nick'];
                }
                if(empty($_POST['pwd'])){
                    $pwd = "mot de passe";
                    $pwd1 = "";
                } else {
                    $pwd = "";
                    $pwd1 = $_POST['pwd'];
                }


                echo('<center><form action="" method="POST">
                        <center><h3>Connexion</h3></center>
                        <input type="text" placeholder="Pseudo" name="nick" value="');echo("$nick1");echo('">
                        <br/>
                        <input type="password" placeholder="Mot de passe" name="pwd" value="');echo("$pwd1");echo('">
                        <br/>
                        <table><tr>Je suis un :</tr></table><br/><table><tr><td><input type="radio" name="category" value="farmers" checked>Producteur</input></td>
                        <td><input type="radio" name="category" value="clients">Client</input></td>
                        <td><input type="radio" name="category" value="delivers">Transporteur</input></td></tr></table>
                        <button class="button" name="action" value="Se connecter">Connexion</button>
                        </form></center><br><center><a href="http://localhost/accueil_exam.php">Pas encore inscrit? Pour le faire ce sera par ici!</a></center></br>');
                echo("<center><bold>Les champs suivants n'ont pas été remplis : $nick $pwd!</bold></center><br/>
                Les champs marqués par un * sont relatifs au suivi de commande. Les champs marqués par un ** concernent votre compte sur le site.<bold></center><br>
                ");

                        /**Vérifie l'existence du compte avant redirection */

            } else if(isset($_POST['nick'])&& isset($_POST['pwd'])){
                require_once("log_check.php"); 
                $check=log_check($_POST['nick'],$_POST['pwd']);
               
                    /** Mauvais pseudo/pwd, réaffiche page avec formulaire prérempli */
                        
                if($check== false){
                    echo('<center><form action="" method="POST">
                        <center><h3>Connexion</h3></center>
                        <input type="text" placeholder="Pseudo" name="nick" value="');echo($_POST['nick']);echo('">
                        <br/>
                        <input type="password" placeholder="Mot de passe" name="pwd" value="');echo($_POST['pwd']);echo('">
                        <br/>
                        <table><tr>Je suis un :</tr></table><br/><table><tr><td><input type="radio" name="category" value="farmers" checked>Producteur</input></td>
                        <td><input type="radio" name="category" value="clients">Client</input></td>
                        <td><input type="radio" name="category" value="delivers">Transporteur</input></td></tr></table>
                        <button class="button" name="action" value="Se connecter">Connexion</button>
                        </form></center><br><center><a href="http://localhost/accueil_exam.php">Pas encore inscrit? Pour le faire ce sera par ici!</a></center></br>');
                echo("<center><h1>Le pseudo ou le mot de passe saisi ne correspond pas!<h1></center><br/>
                Les champs marqués par un * sont relatifs au suivi de commande. Les champs marqués par un ** concernent votre compte sur le site.<bold></center><br>");

                        /** Authentification réussie, redirige vers l'accueil du magasin avec choix des catégories */
                }else{

                header("refresh:10;url=rubriques_exam.php");
                $_SESSION['nick']=$_POST['nick'];
                $_SESSION['category']=$_POST['category'];
                $_SESSION['info'] =array($_SESSION['nick'],$_SESSION['pwd']);
                echo('<bold><center><p>Authentification réussie, vous allez être redirigé vers notre épicerie.</p></bold></center>');
                }   
            }
     
                    /** Affiche un formulaire de connexion, 1er accès à la page */
        } else {
            echo('<center><form action="" method="POST">
                    <center><h3>Connexion</h3></center>
                    <input type="text" placeholder="Pseudo" name="nick" value="">
                    <br/>
                    <input type="password" placeholder="Mot de passe" name="pwd" value="">
                    <br/>
                    <table><tr>Je suis un :</tr></table><br/><table><tr><td><input type="radio" name="category" value="farmers" checked>Producteur</input></td>
                    <td><input type="radio" name="category" value="clients">Client</input></td>
                    <td><input type="radio" name="category" value="delivers">Transporteur</input></td></tr></table>
                    <button class="button" name="action" value="Se connecter">Connexion</button>
                </form></center><br>
                <center><h1><a href="http://localhost/accueil_exam.php">Pas encore inscrit? Pour le faire ce sera par ici!</a></h1></center><br/>
                Les champs marqués par un * sont relatifs au suivi de commande. Les champs marqués par un ** concernent votre compte sur le site.<bold></center><br>');
                
        }
    ?>
</body>
</html>