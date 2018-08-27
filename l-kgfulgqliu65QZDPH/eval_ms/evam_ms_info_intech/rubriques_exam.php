<!DOCTYPE HTML>
<?php session_start(); ?>
<head>

    <title>Mon site d'Ali-mentation</title>
    <meta content='http-equiv' content-type='text/html; charset = UTF-8'/>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"> 
    	<style>
				body { 
				font-family: 'Josefin Sans',sans serif;
				font-size : 16px;
                position: center;
				}
                table{
                    border : 4px ridge black;
                    border-style:groove;
                }
                h1{
                    display: block;
                }
                
                
		</style>
</head>

<body>
    <center><form action="connexion_exam.php/"method="POST"><button class="button_dc" name="disconnect" value="dc">Se déconnecter</button></form></center>
    <?php echo ('<center><h1>Bonjour, '.$_SESSION['nick'].'!</center></h1></br>'); ?>
    <center><table><tr><center>Nos rubriques</center></tr></br><tr><td>Les fruits de saison</br><a href="produits.php?product=fruits"><img src="fruits.jpg"></a></td><td>Les légumes</br><ahref="produits.php?product=veggies"><img src="veggies.jpg"></a></td></tr></table></center>
    <?php if(isset($_SESSION['basket'])){ 
        echo('<center><table class="basket"><tr><td><center>Récapitulatif commande<center></td></tr><tr><td>Adresse de livraison : <br/>');echo($_SESSION['addr']);echo('</td><td></tr></table></center>');
    }
    ?>
    <?php echo('<center><form action="gestion_compte_exam.php" method="POST"><button class="button" name="account" value="gestion">Gérer mon compte</button><br/></form></center>');?>
</body>