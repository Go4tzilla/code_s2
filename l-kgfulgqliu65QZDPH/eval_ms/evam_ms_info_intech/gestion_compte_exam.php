<!DOCTYPE HTML>
<?php session_start(); ?>
<head>

    <title>LE drive d'Ali-mentation</title>
    <meta content='http-equiv' content-type='text/html; charset = UTF-8'/>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"> 
    	<style>
				body { 
				font-family: 'Josefin Sans',sans serif;
				font-size : 16px;
				}
                form{
                    width: 65%;
                }
		</style>
</head>

<body>
                <center><bold>Ici, vous pouvez gérer votre compte selon l'utlisation que vous faites du site!</bold></center>

                <?php
                if(!empty($_POST['fruit'])&&!empty($_POST['producer'])&&!empty($_POST['price'])&&!empty($_POST['amount'])){
                    
                    require_once("add_product.php"); 
                    $check=add_product($_POST['fruit'],$_POST['producer'],$_POST['price'],$_POST['amount']);
                    echo('<center><form action="" method="POST"><button class="button" name="choice" value="add">Ajouter un article</button></br>
                    <button class="button" name="choice" value="draw">Retirer un article</button></br>
                    <button class="button" name="choice" value="change">Modifier un article existant</button></center>
                    <center><input type="submit" value="submit"></center></form>');   
                   
                } else if($_SESSION['category']==="farmers"&&!isset($_POST['choice'])){
                    echo('<center><form action="" method="POST"><button class="button" name="choice" value="add">Ajouter un article</button></br>
                    <button class="button" name="choice" value="draw">Retirer un article</button></br>
                    <button class="button" name="choice" value="change">Modifier un article existant</button></center>
                    <center><input type="submit" value="submit"></center></form>');                   
                } else if($_SESSION['category']==="farmers"&&isset($_POST['choice'])){
                    if($_POST['choice']==="add"){
                        echo('<center><form action="gestion_compte_exam.php" method="POST"><p><input type="text" placeholder="Votre produit" name="fruit" value="" style="width: 150px;"><br>
                        <input type="text" placeholder="Producteur" name="producer" value= "');echo$_SESSION['nick'];echo('"style="width: 150px;"><br/>
                        <input type="number" placeholder="Prix unitaire" name="price" value="" style="width: 150px;"><br>
                        <input type="number" placeholder="Quantités unitaires" name="amount" value="" style="width: 150px;"></p>
                        <input type="submit" value="submit"></form><br>
                        Veuillez remplir tous les champs</center>');
                    } else if ($_POST['choice']==="draw"){

                    }
                }
                ?>
</body>