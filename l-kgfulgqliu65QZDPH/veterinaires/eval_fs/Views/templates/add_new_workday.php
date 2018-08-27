<div class="container-fluid">
    <h3 class="text-center">Ajouter un jour de travail</h3>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form role="form" class="form container-fluid border border-dark rounded" action="" method="POST" name="add_day">
                <fieldset class="well">
                    <div class="form-group">
                    <label for="name">Selectionnez un jour</label>
                        <select class="form-control" name="days_add" required>
                    <?php   for($i = 0; $i< count($days_available);$i++){
                                echo '<option value ="'.$days_available[$i].'">'.$days_available[$i].'</option>';
                            }?>
                        </select>
                    </div>
                    <div class="input-group space-bottom">
                        <span class="input-group-addon" style"padding:-5px">De:</span>
                        <input type="number" class="form-control" min="08" max="19" step="1" name="from_hour" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">h</span>
                        <input type="number" class="form-control" value="0" min="0" max="30" step="30" name="from_min" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">min</span>
                    </div>
                    <div class="input-group space-bottom">
                        <span class="input-group-addon"> Á  :</span>
                        <input type="number" class="form-control" min="08" max="19" step="1" name="to_hour" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0; height:10px">h</span>
                        <input type="number" class="form-control" value="0" min="0" max="30" step="30" name="to_min" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;">min</span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-primary space-bottom" name="add_day" value="Ajouter" />
                        </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>