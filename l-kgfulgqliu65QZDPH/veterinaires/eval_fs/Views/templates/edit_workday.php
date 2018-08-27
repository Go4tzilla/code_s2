<div class="container-fluid">
    <h3 class="text-center">Modifier un jour de travail</h3>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form role="form" class="form container-fluid border border-dark rounded" action="" method="POST" name="edit_day">
                <fieldset class="well">
                    <div class="form-group">
                    <label for="name">Selectionnez un jour</label>
                    </div>
                    <select class="form-control space-bottom" name="days_edit" required>
                    <?php
                    if($work_days){
                        for($i=0; $i<count($work_days); $i++){
                            echo '<option value ="'.$work_days[$i]['working_day'].'">'.$work_days[$i]['working_day'].'</option>';
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
                        <input type="submit" class="btn btn-block btn-primary space-bottom" name="edit_day" value="Modifier" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>