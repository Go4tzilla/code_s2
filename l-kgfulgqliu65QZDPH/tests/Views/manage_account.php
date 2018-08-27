<div class="row">

    <div class="col-xs-12"  style="margin:auto;display:inline-block;margin-top:40px;color:#decba4">
        <p style="font-size:10px;width:100px">
        <?php if (isset($successmsg)) { success($successmsg); } ?>
        <?php if (isset($errormsg)) { alert($errormsg); } ?></p>
        
    </div>
</div>
<div class="row">
<div class="col-xs-6" style="margin:auto;display:block;margin-top:10px;color:#decba4">
<p><h4 style="font-size:20px;text-align:center;display:block; margin:auto"> Ici vous pouvez modifier votre email ET/OU votre mot de passe.</p><p> En cliquant sur Supprimer, vous acceptez de supprimer définitivement votre compte de nos services.</p><p>Vous ne pourrez plus accéder à vos données</h></p>
<form role="form" class="form container-fluid" style="width:30%"action="" method="POST" name="register_form">
                <fieldset class="well">
                    <div class="form-group">
                        <label for="name" style="color:#F2994A">Modifier mon mail</label>
                        <input type="email" class="form-control space-bottom" title="Adresse mail, qui servira à l'authentification"name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="" />
                        <?php if (isset($email_error)) alert($email_error); ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="name" style="color:#F2994A">Mot de passe actuel</label>
                        <input type="password" class="form-control space-bottom" title="Mot de passe de votre compte (6 caractères)"name="opassword" placeholder="Mot de passe" pattern=".{6,}" title="Au moins 6 charactères"/>
                        <?php if (isset($password_error)) alert($password_error); ?>
                    </div>
                    <div class="form-group">
                        <label for="name" style="color:#F2994A">Mot de passe désiré</label>
                        <input type="password" class="form-control space-bottom" title="Mot de passe de votre compte (6 caractères)"name="password" placeholder="Mot de passe" pattern=".{6,}" title="Au moins 6 charactères"/>
                        <?php if (isset($password_error)) alert($password_error); ?>
                    </div>
                    <div class="form-group">
                        <label for="name" style="color:#F2994A">Confirmation du mot de passe</label>
                        <input type="password" class="form-control space-bottom" title="Veuillez confirmer le mot de passe" name="cpassword" pattern=".{6,}" placeholder="Mot de passe"/>
                        <?php if (isset($cpassword_error)) alert($cpassword_error); ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary space-bottom" title="Valider les modifications" name="change_settings" value="Modifier" />
                    </div>
                </fieldset>
</form>
</div>
<div class ="col-xs-6 msg" style="position:fixed;right:-100px">
    <div class="btn-group-vertical">
            <form role="form" action="" method="POST" name="edit" style="width:400px">
                <button class="btn btn-primary"name="suppress" style="width:300px;background:red" title="supprimer mon compte" value="convos">Supprimer mon compte</button>
            </form>
        </div>
</div>
</div>