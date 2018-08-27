    <div class="row">
        <div class="col-xs-6" style="color:#decba4;display:block;margin:auto;margin-top:90px">
    <h3 class="text-center">Modifier un jour de travail</h3>
            <form role="form" class="form container-fluid" action="" method="POST" name="edit_day">
                <fieldset class="well">
                    <div class="form-group">
                    <label for="name">Selectionnez un jour</label>
                    </div>
                    <select class="form-control space-bottom" style="width:120px;margin-left:36%" name="days_edit" required>
                    <?php>
                    if($table_rows){
                        for($i=0; $i<count($table_rows); $i++){
                            echo '<option value ="'.$table_rows[$i]['working_day'].'">'.$table_rows[$i]['working_day'].'</option>';
                        }
                    }?>
            </select><div class="input-group space-bottom">
                        <span class="input-group-addon">De :</span>
                        <input type="number" class="form-control" min="08" max="19" step="1" name="from_hour" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">h</span>
                        <input type="number" class="form-control" value="0" min="0" max="30" step="30" name="from_min" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">min</span>
                    </div>
                    <div class="input-group space-bottom">
                        <span class="input-group-addon"> Á :</span>
                        <input type="number" class="form-control" min="08" max="19" step="1" name="to_hour" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">h</span>
                        <input type="number" class="form-control" value="0" min="0" max="30" step="30" name="to_min" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">min</span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary space-bottom" name="edit_day" value="Modifier" /></div>
                </fieldset>
            </form>
        </div>
    <div class="col-xs-6" style="position:absolute;max-height:500px;margin-left:85%;margin-top:-201px;width:145px">
    <div class="btn-group-vertical">
            <form role="form" action="" method="POST" name="edit">
                <button class="btn btn-primary" style="background:#333333" name="add" title="Ajouter un jour de travail" value="Ajouter">Ajouter</button>
                <button class="btn btn-primary" style="background:#333333" name="edit" title="Modifier une amplitude horaire">Modifier</button>
                <button class="btn btn-primary" style="background:#333333" name="delete" title="Supprimer un jour de travail">Supprimer</button>
            </form>
        </div>
</div>
</div>