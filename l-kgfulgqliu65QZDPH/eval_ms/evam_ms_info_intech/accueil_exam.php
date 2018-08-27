<!DOCTYPE HTML>

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

        echo('<center>Bienvenue sur magic-ali-mentation.com, LE site de courses en ligne. Veuillez vous connecter avant de passer commande.</center><br/>');
        
                    /** Vérification du contenu des champs du formulaire*/
        if(isset($_POST['name'])){
            
            if(empty($_POST['name']) || empty($_POST['first_name']) || empty($_POST['adress']) || empty($_POST['postal']) || empty($_POST['town'])||empty($_POST['nick'])||empty($_POST['pwd'])){
                
                if(empty($_POST['name'])){
                    $name = "nom";
                    $name1 = "";
                } else {
                    $name = "";
                    $name1 = $_POST['name'];
                }
                if(empty($_POST['first_name'])){
                    $first = "prénom";
                    $first1 = "";
                } else {
                    $first = "";
                    $first1 = $_POST['first_name'];
                }
                if(empty($_POST['adress'])){
                    $adress = "adresse";
                    $adress1 = "";
                } else {
                    $adress = "";
                    $adress1 = $_POST['adress'];
                }
                if(empty($_POST['postal'])){
                    $postal = "code postal";
                    $postal1 = "";
                } else {
                    $postal = "";
                    $postal1 = $_POST['postal'];
                }
                if(empty($_POST['town'])){
                    $town = "ville";
                    $town1 = "";
                } else {
                    $town = "";
                    $town1 = $_POST['town'];
                }
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
                        <center><h3>Inscription</h3></center></br>
                        <input type="text" placeholder= "Nom*" name="name" value="');echo("$name1");echo('">
                        <br/>
                        <input type="text" placeholder= "Prénom*" name="first_name" value="');echo("$first1");echo('">
                        <br/>
                        <input type="text" placeholder="Pseudo**" name="nick" value="');echo("$nick1");echo('">
                        <br/>
                        <input type="password" placeholder="Mot de passe**" name="pwd" value="');echo("$pwd1");echo('">
                        <br/>
                        <input type="text" placeholder= "Adresse*" name="adress" value="');echo("$adress1");echo('">
                        <br/>
                        <input type="text" placeholder= "Code postal*" name="postal" value="');echo("$postal1");echo('">
                        <br/>
                        <input type="text" placeholder= "Ville*" name="town" value="');echo("$town1");echo('"><br/>
                        <table><tr>Je suis un :</tr></table><br/><td><input type="radio" name="category" value="farmers" checked>Producteur**</input></td>
                        <td><input type="radio" name="category" value="clients">Client**</input></td>
                        <td><input type="radio" name="category" value="delivers">Transporteur**</input></td></tr></table>
                        <br/>
                        <button class="button" name="action" value="Se connecter">Inscription</button>
                        </form></center></br><center><a href="connexion_exam.php">Déjà inscrit? Pour te connecter ce sera par ici!</a></center></br>');
                echo("<center><bold>Les champs suivants n'ont pas été remplis : $name $first $adress $postal $town!<br/>
                Les champs marqués par un * sont relatifs au suivi de commande. Les champs marqués par un ** concernent votre compte sur le site.<bold></center>");

                            /**Vérifie l'existence du compte avant éventuelle redirection */

            } else if(isset($_POST['name']) && isset($_POST['first_name']) && isset($_POST['adress']) && isset($_POST['postal']) && isset($_POST['town'])&& isset($_POST['nick'])&& isset($_POST['pwd'])){
                require_once("reg_check.php"); 
                $check=reg_check($_POST['nick']);
                         /** Mauvais pseudo/pwd, réaffiche page avec formulaire prérempli */
                if(reg_check($_POST['nick']) == false){
                    echo('<center><form action="" method="POST">
                        <center><h3>Inscription</h3></center></br>
                        <input type="text" placeholder="Pseudo**" name="nick" value="');echo($_POST['nick']);echo('">
                        <br/>
                        <input type="password" placeholder="Mot de passe**" name="pwd" value="');echo($_POST['pwd']);echo('">
                        <br/>
                        <input type="text" placeholder= "Nom*" name="name" value="');echo($_POST['name']);echo('">
                        <br/>
                        <input type="text" placeholder= "Prénom*" name="first_name" value="');echo($_POST['first_name']);echo('">
                        <br/>
                        <input type="text" placeholder= "Adresse*" name="adress" value="');echo($_POST['adress']);echo('">
                        <br/>
                        <input type="text" placeholder= "Code postal*" name="postal" value="');echo($_POST['postal']);echo('">
                        <br/>
                        <input type="text" placeholder= "Ville*" name="town" value="');echo($_POST['town']);echo('"><br/>
                        <table><tr>Je suis un :</tr></table><br/><table><tr><td><input type="radio" name="category" value="farmers" checked>Producteur**</input></td>
                        <td><input type="radio" name="category" value="clients">Client**</input></td>
                        <td><input type="radio" name="category" value="delivers">Transporteur**</input></td></tr></table>
                        <br/>
                        <button class="button" name="action" value="Se connecter">Inscription</button>
                        </form></center><br><center><a href="connexion_exam.php">Déjà inscrit? Pour te connecter ce sera par ici!</a></center></br>');
                echo("<center><bold>Le pseudo est déjà pris!</bold></center>
                <br/>
                Les champs marqués par un * sont relatifs au suivi de commande. Les champs marqués par un ** concernent votre compte sur le site.<bold></center>
                ");

                            /** Inscription réussie, redirige vers l'accueil du magasin avec choix des catégories */
                }else{

                header("refresh:10;url=rubriques_exam.php");
                session_start();
                $_SESSION['name']=$_POST['name'];
                $_SESSION['first_name']=$_POST['first_name'];
                $_SESSION['addr']="".$_POST['adress']."</br>".$_POST['postal']."</br>".$_POST['town']."</br>";
                $_SESSION['nick']=$_POST['nick'];
                $_SESSION['category']=$_POST['category'];
                $tableau = array(array($_SESSION['name'],$_SESSION['first_name'],$_SESSION['adress'],$_SESSION['postal'],$_SESSION['town'],$_SESSION['nick'],$_SESSION['pwd']));
                
                $nom= "".$_POST['category'].".csv";
                $tmp = fopen($nom,"a+");
                
                    foreach($tableau as $line){
                        fputcsv($tmp,$line);
                    }
                fclose($tmp);
                echo('<br/><p><center><h1>Inscription réussie, vous allez être redirigé vers notre épicerie.</h1></p></center>');
                }   
                $nom= "".$_POST['category']."_".$_POST['nick'].".csv";
                $tmp = fopen($nom,"a+");
                fclose($tmp);
            }
     
        } else {
            echo('<center><form action="" method="POST">
                    <center><h3>Inscription</h3></center></br>
                    <input type="text" placeholder="Pseudo**" name="nick" value="">
                    <br/>
                    <input type="password" placeholder="Mot de passe**" name="pwd" value="">
                    <br/>
                    <input type="text"  placeholder = "Nom*" name="name" value="">
                    <br/>
                    <input type="text" placeholder="Prénom*" name="first_name" value="">
                    <br/>
                    <input type="text" placeholder="Adresse*" name="adress" value="">
                    <br/>
                    <input type="text" placeholder="ZIP/Code Postal*" name="postal" value="">
                    <br/>
                    <input type="text" placeholder="Ville*" name="town" value=""><br/>
                    <table><tr>Je suis un :</tr></table><br/><table><tr><td><input type="radio" name="category" value="farmers" checked>Producteur**</input></td>
                    <td><input type="radio" name="category" value="clients">Client**</input></td>
                    <td><input type="radio" name="category" value="delivers">Transporteur**</input></td></tr></table>
                    <button class="button" name="action" value="Se connecter">Inscription</button>
                </form></center><br>
                <center><bold><a href="connexion_exam.php">Déjà inscrit? Pour te connecter ce sera par ici!</a></bold></center>
                <br/>
                Les champs marqués par un * sont relatifs au suivi de commande. Les champs marqués par un ** concernent votre compte sur le site.<bold></center>');
                
        }
    ?>
</body>
</html>