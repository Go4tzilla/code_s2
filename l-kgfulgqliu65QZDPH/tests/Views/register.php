<div class="row" >
    <div class="col-xs-12"style="margin:auto;margin-top:60px;display:inline-block">
        <?php if ($flag_name_taken) { alert($name_taken); } ?>
        <?php if (isset($successmsg)) { success($successmsg); } ?>
        <?php if (isset($errormsg)) { alert($errormsg); } ?>
        <?php if (isset($password_error)) alert($password_error); ?>
        <?php if (isset($email_error)) alert($email_error); ?>
        <?php if (isset($cpassword_error)) alert($cpassword_error); ?>
    </div>
</div>
<div class="row" >
        <div class="col-xs-6" style="margin:auto;margin-top:60px;display:block;max-height:400px">
            <div class="container" style="max-height:400px;overflow-y:hidden;overflow-x:hidden">
                <h4 style="position:relative;padding:8px;left:25%">Inscription</h4>
                    <form role="form" class="gmap"  method="POST" style="width:400px;overflow-y:scroll;padding-bottom:10px;overflow-x:hidden;height:350px;color:#decba4;border:none" name="register_form" >
                            
                        <fieldset class="well" >
                            <div class="form-group">
                                <label class="label" for="name" style='margin-top:5px'>Email</label>
                                <input type="email" class="form-control space-bottom" autofocus name="email" placeholder="Email" 
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required 
                                value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $email; ?>" />
                            </div>
                            <div class="form-group">
                                <label class="label" for="name">Prénom</label>
                                <input type="text" class="form-control space-bottom" name="first_name" placeholder="Prénom" required 
                                value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $first_name; ?>" />
                            </div>
                            <div class="form-group">
                                <label class="label" for="name">Nom</label>
                                <input type="text" class="form-control space-bottom" name="last_name" placeholder="Nom" required 
                                value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $last_name; ?>" />
                            </div>
                            <div class="form-group">
                                <label class="label" for="name">Adresse</label>
                                <input type="text" class="form-control space-bottom" name="address" placeholder="Adresse" required 
                                value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $address; ?>" />
                            </div>
                            <div class="form-group">
                                <label class="label" for="name">Code Postal</label>
                                <input type="text" class="form-control space-bottom" name="postal_code" placeholder="Code Postal" 
                                pattern=".{2,5}" title="Entrez un code postal valide" required 
                                value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $postal_code; ?>"/>
                            </div>
                            <div class="form-group">
                                <label class="label" for="name">Ville</label>
                                <input type="text" class="form-control space-bottom" name="city" placeholder="Ville" required 
                                value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $city; ?>"/>
                            </div>
                            <div class="form-group">
                                <label class="label" for="name">Téléphone</label>
                                <input type="tel" class="form-control space-bottom" name="phone_number" 
                                placeholder="Numéro de téléphone" minlength="10" maxlength="12" 
                                pattern="^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$"
                                title="Entrez un numéro de téléphone valide" required 
                                value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $phone_number; ?>" />
                            </div>
                            <div class="form-group">
                                <label class="label"for="name">Mot de passe</label>
                                <input type="password" class="form-control space-bottom" name="password" placeholder="Mot de passe" pattern=".{6,}" title="Au moins 6 charactères" required/>
                                
                            </div>
                            <div class="form-group">
                                <label class="label" for="name">Confirmation mot de passe</label>
                                <input type="password" class="form-control space-bottom" name="cpassword" placeholder="Mot de passe" required/>
                                
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-primary space-bottom" name="register" value="S'inscrire" />
                            </div>
                        </fieldset>
                    </form>
            </div>
        </div>
            
        <div class="col-xs-6" 
        style="margin:auto;margin-top:60px;margin-left:0px;text-align:center;display:block;
        max-height:400px;height:400px;border-radius:4px">
            <div class="container map" style="width:450px;max-height:600px;overflow-y:scroll;
            overflow-x:hidden;height:400px;border:none;
            ;color:#decba4">
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
        <div id="map" class="map" style="margin:auto;display:block;height:200px;margin-bottom:10px"  name="map_canvas">q</div>
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