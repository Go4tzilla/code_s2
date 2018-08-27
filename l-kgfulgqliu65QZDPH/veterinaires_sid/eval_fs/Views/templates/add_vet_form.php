<div class="container-fluid">
    <h3 class="text-center">Ajouter un Vétérinaire</h3>
    <div class="row">
<div class="col-md-4 col-md-offset-4">
<form role="form" class="form container-fluid border border-dark rounded" action="" method="POST" name="register_form">
                <fieldset class="well">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control space-bottom" name="last_name" placeholder="Nom" required value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $last_name; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Prénom</label>
                        <input type="text" class="form-control space-bottom" name="first_name" placeholder="Prénom" required value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $first_name; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Initiales</label>
                        <input type="text" class="form-control space-bottom" name="vet_init" placeholder="Initiales" required value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $last_name; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control space-bottom" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $email; ?>" />
                        <?php if (isset($email_error)) alert($email_error); ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Téléphone</label>
                        <input type="tel" class="form-control space-bottom" name="phone_number" placeholder="Numéro de téléphone" minlength="10" maxlength="12" pattern="^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$" title="ENtrez un numéro de téléphone valide" required value="<?php if($error || $flag_email_taken || $flag_name_taken) echo $phone_number; ?>" />
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
                        <label for="name">Selectionner un jour de travail (vous pourrez en ajouter plus tard)</label>
                        <select class="form-control space-bottom" style="position:center; width: 50%; display:block; position:center; margin-left:18%;" name="days_free" required>
                            <option value="Lundi">Lundi</option>
                            <option value="Mardi">Mardi</option>
                            <option value="Mercredi">Mercredi</option>
                            <option value="Jeudi">Jeudi</option>
                            <option value="Vendredi">Vendredi</option>
                            <option value="Samedi">Samedi</option>
                            <option value="Dimanche">Dimanche</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary space-bottom" name="add_vet" value="Inscrire" />
                    </div>
                </fieldset>
</form>
</div>
</div>
</div>