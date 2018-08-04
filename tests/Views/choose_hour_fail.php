<div class="row">
        <div class="col-xs-12" style="color:#decba4;display:block;margin:auto">
            <form role="form" title="Heure désirée" class="form container-fluid" action="" method="POST" name="choose_hour">
                        <input type="hidden" name="my_animal" value="<?php if(isset($_POST['my_animal'])){ echo $_POST['my_animal'];}?>"/>
                <fieldset class="well">
            <div class="input-group space-bottom">
                        <span class="input-group-addon">Heure de début :</span>
                        <input type="number" style="width:60px;max-width:60px" class="form-control" min="08" max="19" step="1" name="hour" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">h</span>
                        <input type="number" style="width:60px;max-width:60px" class="form-control" value="0" min="0" max="30" step="30" name="min" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">min</span><br>
                    </div>
                    <div class="form-group">
                        <input type="text" style="width:150px;height:30px;display:block;margin:auto" maxlength="200" title="Ici vous pouvez donner des détails sur les soucis de votre animal" name="details" placeholder="Commentaires" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary space-bottom" style="width:130px;margin-left:70px"name="choose_hour" value="Sélectionner" />
                        </div>
                </fieldset>
            </form>
        </div>
</div>