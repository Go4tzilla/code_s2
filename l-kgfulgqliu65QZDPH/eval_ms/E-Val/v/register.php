    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-md-4"><img src="./resource/image/pokemons/143.svg" class="img-responsive grow" style="max-width: 150%; margin-left: -170px;"></div>
            <div class="col-md-4">
                <form role="form" class="form container-fluid border border-dark rounded" action="" method="POST" name="register_form">
                    <fieldset class="well">
                       <h4 style="padding: 8px;">Register</h4>
                        <!--<legend class="register-border">Register</legend>-->
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control space-bottom" name="username" placeholder="Enter Username" required value="<?php if($error || $flag_name_taken || $flag_email_taken) echo $username; ?>" />
                            <?php if (isset($name_error)) alert($name_error); ?>
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" class="form-control space-bottom" name="mail" placeholder="Enter Email" required value="<?php if($error|| $flag_name_taken || $flag_email_taken) echo $email; ?>" />
                            <?php if (isset($email_error)) alert($email_error); ?>
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" class="form-control space-bottom" name="password" placeholder="Enter Password" required/>
                            <?php if (isset($password_error)) alert($password_error); ?>
                        </div>
                        <div class="form-group">
                            <label for="name">Confirm password</label>
                            <input type="password" class="form-control space-bottom" name="cpassword" placeholder="Enter Password" required/>
                            <?php if (isset($cpassword_error)) alert($cpassword_error); ?>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block space-bottom" name="register" value="Register"/>
                            <?php if ($flag_name_taken) { alert($name_taken); }
                if ($flag_email_taken) { alert($email_taken); } ?>
                <?php if (isset($successmsg)) { success($successmsg); } ?>
                <?php if (isset($errormsg)) { alert($errormsg); } ?>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                Already Registered? <a href="./index.php?page=login">Login Here</a>
            </div>
        </div>
    </div>
