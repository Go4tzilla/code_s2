<div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
        <br><p>Pas encore inscrit ?</p> <a href="./index.php?page=Inscription">Vous pouvez le faire ici</a>
        </div>
    </div>
<div class="container"  style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="max-height= 600px overflow-x= scroll">
            <form role="form" class="form container-fluid border border-dark rounded" action="index.php?page=Login" method="POST" name="login_form">
                    <?php if (isset($successmsg)) { success($successmsg); } ?>
                    <?php if (isset($errormsg)) { alert($errormsg); } ?>
                <fieldset class="well">
                    <h4 style="padding: 8px;"><p style="font-size:18px; color:#333333">Connexion</p></h4>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control space-bottom" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Mot de passe</label>
                        <input type="password" class="form-control space-bottom" name="password" placeholder="Mot de passe" pattern=".{6,}" title="Au moins 6 charactères" required/>
                        
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary space-bottom" name="register" value="Connexion" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    
</div>