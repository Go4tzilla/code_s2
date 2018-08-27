<div class="container" style="margin-top: 100px;">
           <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form role="form" class="form container-fluid border border-dark rounded" action="" method="POST" name="login_form">
                    <fieldset class="well">
                        <h4 style="padding: 8px;">Login</h4>
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control space-bottom" name="name" placeholder="Your Username" required value="<?php if ($login_flag) { echo $username; } ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" class="form-control space-bottom" name="pass" placeholder="Your Password" required/>
                        </div>
                        <div class="form-group">
					<input type='checkbox' name='client' value='Client' checked>Client
                            <input type="submit" class="btn btn-block btn-pokestats-red space-bottom" name="login" value="Login"/>
                            <?php if (isset($errormsg)) { alert($errormsg); } ?>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                New User? <a href="index.php?page=register">Register Here</a>
            </div>
        </div>
    </div>
