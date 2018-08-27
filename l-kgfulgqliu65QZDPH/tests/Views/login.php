<div class="row" >
<div class="col-xs-12"style="margin:auto;margin-top:60px;display:inline-block">
          <p style="font-size:10px;width:100px"><?php if (isset($successmsg)) { success($successmsg); } ?>
            <?php if (isset($errormsg)) { alert($errormsg); } ?></p>
            
        </div>
    </div>
    <div class="row" style='<?php if($_GET['page'] ==='login'){ echo "margin-top:15px";}else{ echo "margin-top:30px";}?>'>
        <div class="col-xs-6" style="max-height:400px;width:55%;margin-top:10px">
            <div class="container" style="width:350px;max-height:350px;overflow-y:hidden;overflow-x:hidden">
            <form action="./index.php?page=Login" method="POST" name="login" value="log">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <p style="color:#D38312"><strong>Connexion</strong></p>
                        <div class="col-auto" style="margin-left:-15px">
                        <label class="sr-only" for="inlineFormInputGroup">Email</label>
                        <p style="color:#decba4">Mail</p>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                            </div>
                            <input type="text" name="em" class="form-control" id="inlineFormInputGroup" 
                            title="Veuillez saisir l'email valide correspondant à votre compte" required 
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" 
                            style="width:175px" placeholder="Adresse mail" 
                            value='<?php if(isset($_POST["em"])){ echo $_POST["em"];}?>'>
                        </div>
                        </div>
                        <p style="color:#decba4">Mot de Passe</p>
                    <label class="sr-only" for="inlineFormInput" style="margin-top:20px">Mot de Passe</label>
                    <input type="password" name="pw" class="form-control mb-2" 
                    value='<?php if(isset($_POST["pw"])){ echo $_POST["pw"];}?>' id="inlineFormInput" 
                    title="Veuillez saisir le mot de passe correspondant à votre adresse mail (minimum 5 caractères)"
                    style="width:212px" pattern=".{5,45}" required placeholder="Mot de passe">
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-primary mb-2" required  name="login" value="Connexion" 
                    style="margin-left:35px;height:45px;width:150px"/>
                    </div>
                </div>
                </form>
            </div>
        </div>
            
        <div class="col-xs-6" style="width:400px;margin-right:-5px">
            <div class="gmap" style="width:400px;max-height:350px;height:350px;margin:10px;text-align:indent;color:#decba4;
            overflow-y:scroll;overflow-x:hidden">
                <p class="first_sentence">Bienvenue sur le site de Heal mon Bichon</p>
                <p class="first_sentence">Votre clinique vétérinaire de référence à Ivry-sur-Seine</p>

                <p>Le cabinet est ouvert tous les jours de la semaine, de <br> <strong style="color:#FFFFFF">8h à 19h30</strong>. 
                Nocturne le premier dimanche de chaque mois.</p>
                <p>Nous sommes situés au <strong style="color:#FFFFFF">74, avenue Maurice Thorez à Ivry-sur-Seine.</strong></p>
                <p> Vous pouvez facilement accèder à notre clinique via le 
                    
                <strong style="color:#FFFFFF">métro ligne 7 (arrêt Pierre et Marie Curie).
                </strong></p>
                <p>Des correspondances vers le tramway sont disponibles aux stations :</p>
                    <ul>
                        <li> Porte d'Italie</li> 
                        <li> Porte de Choisy</li>
                    </ul> 
                <P><strong style="color:#FFFFFF">Des métros et RER (ligne 1/6/8/14 RER A/B/C/D) 
                    sont accessibles sur l'ensemble de la ligne 7.
               </strong></p>
                <div id="map" class="map"  style="margin:auto;display:block;height:200px;margin-bottom:10px"  name="map_canvas"></div>
            </div>
        </div>
    </div>
</body>
<script>
    search();
    body_load();
    datepicker();
    startTime();
    initMap();
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8SryylEF5v_C1_pTMszfi0wofkCpxbrE&callback=initMap">
    </script>
<script type="text/javascript" src="../Player/Controllers/Functions/JS/img_preview.js"></script>
<script type="text/javascript" src="../Player/Controllers/Functions/JS/search.js"></script>
</html>