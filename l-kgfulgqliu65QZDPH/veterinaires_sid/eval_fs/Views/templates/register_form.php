<div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
        <br>Déjà inscrit ? <a href="./index.php?page=Login">Connectez vous ici</a>
        </div>
    </div>
<div class="container"  style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="max-height= 600px overflow-x= scroll">
            <form role="form" class="form container-fluid border border-dark rounded" action="index.php?page=Inscription" method="POST" name="register_form">
                    <?php if ($flag_email_taken) { alert($email_taken); } ?>
                    <?php if ($flag_name_taken) { alert($name_taken); } ?>
                    <?php if (isset($successmsg)) { success($successmsg); } ?>
                    <?php if (isset($errormsg)) { alert($errormsg); } ?>
                <fieldset class="well">
                    <h4 style="padding: 8px;">Inscription</h4>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control space-bottom" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $email; ?>" />
                        <?php if (isset($email_error)) alert($email_error); ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Prénom</label>
                        <input type="text" class="form-control space-bottom" name="first_name" placeholder="Prénom" required value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $first_name; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control space-bottom" name="last_name" placeholder="Nom" required value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $last_name; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Adresse</label>
                        <input type="text" class="form-control space-bottom" name="address" placeholder="Adresse" required value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $address; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Code Postal</label>
                        <input type="text" class="form-control space-bottom" name="postal_code" placeholder="Code Postal" pattern=".{2,5}" title="Entrez un code postal valide" required value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $postal_code; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Ville</label>
                        <input type="text" class="form-control space-bottom" name="city" placeholder="Ville" required value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $city; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Téléphone</label>
                        <input type="tel" class="form-control space-bottom" name="phone_number" placeholder="Numéro de téléphone" minlength="10" maxlength="12" pattern="^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$" title="Entrez un numéro de téléphone valide" required value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $phone_number; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Mot de passe</label>
                        <input type="password" class="form-control space-bottom" name="password" placeholder="Mot de passe" pattern=".{6,}" title="Au moins 6 charactères" required/>
                        <?php if (isset($password_error)) alert($password_error); ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Confirmation du mot de passe</label>
                        <input type="password" class="form-control space-bottom" name="cpassword" placeholder="Mot de passe" required/>
                        <?php if (isset($cpassword_error)) alert($cpassword_error); ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary space-bottom" name="register" value="Register" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    
</div>