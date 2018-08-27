    <div class="row">
        <div class="col-xs-6" style="color:#decba4;display:block;margin:auto;margin-top:60px">
           <h3 class="text-center">Modifier un jour de travail</h3>
            <form role="form" class="form container-fluid" action="" method="POST" name="edit_day">
                <fieldset class="well">
                    <div class="form-group">
                    <label for="name">Selectionnez un jour</label>
                    </div>
                    <select class="form-control space-bottom" style="width:120px;margin-left:20%;margin-bottom:10px" name="days_edit" required>
                    <?php
                    if($work_days){
                        for($i=0; $i<count($work_days); $i++){
                            echo '<option value ="'.$work_days[$i]['working_day'].'">'.$work_days[$i]['working_day'].'</option>';
                        }
                    }?>
            </select><div class="input-group space-bottom">
                        <span class="input-group-addon" style="margin-top:10px">De : </span>
                        <input type="number" class="form-control" style="margin-bottom:5px;width:50px" min="08" max="19" step="1" name="from_hour" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;margin:5px;margin-top:10px">h</span>
                        <input type="number" class="form-control"style="margin-bottom:5px;width:50px" value="0" min="0" max="30" step="30" name="from_min" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;margin:5px;margin-top:10px">min</span>
                    </div>
                    <div class="input-group space-bottom">
                        <span class="input-group-addon" style="margin-right:8px"> Á :</span>
                        <input type="number" class="form-control" style="margin-bottom:5px;width:50px" min="08" max="19" step="1" name="to_hour" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;margin:5px;margin-top:10px">h</span>
                        <input type="number" class="form-control" style="margin-bottom:5px;width:50px" value="0" min="0" max="30" step="30" name="to_min" required/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;margin:5px;margin-top:10px">min</span>
                    </div>
                    <div class="form-group" style="">
                        <input type="submit" class="btn btn-primary" style="padding:auto;margin-left:45px;" name="edit_day" value="Modifier" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="col-xs-6" style="position:absolute;max-height:500px;right:0;margin-top:-260px;width:150px">
    <div class="btn-group-vertical">
        <form role="form" action="" method="POST" name="edit">
            <button class="btn btn-primary" style="background:#333333" name="add" value="Ajouter">Ajouter</button>
            <button class="btn btn-primary" style="background:#333333" name="edit">Modifier</button>
            <button class="btn btn-primary" style="background:#333333" name="delete">Supprimer</button>
        </form>
    </div>
</div>

</body>
</html>