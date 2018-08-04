    <div class="row">
        <div class="col-xs-6" style="color:#decba4;margin:auto;display:block;margin-top:60px" >
    <h3 class="text-center">Ajouter un jour de travail</h3>
            <form role="form" class="form container-fluid" action="" method="POST" name="add_day">
                <fieldset class="well">
                    <div class="form-group">
                    <label for="name">Selectionnez un jour</label>
                        <select class="form-control" style="width:120px;margin-left:36%" name="days_add" required>
                    <?php   for($i = 0; $i< count($days_available);$i++){
                                echo '<option value ="'.$days_available[$i].'">'.$days_available[$i].'</option>';
                            }?>
                        </select>
                    </div>
                    <div class="input-group space-bottom">
                    <span class="input-group-addon">De :</span>
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
                        <input type="submit" class="btn btn-primary" style="margin-left:25px" name="add_day" value="Ajouter" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="col-xs-6" style="color:#decba4;position:absolute;max-height:500px;right:0;width:150px;margin-top:-250px">
    <div class="btn-group-vertical">
            <form role="form" action="" method="POST" name="edit">
                <button class="btn btn-primary"  name="add" title="Ajouter un jour de travail" value="Ajouter">Ajouter</button>
                <button class="btn btn-primary"  name="edit" title="Modifier une amplitude horaire">Modifier</button>
                <button class="btn btn-primary"  name="delete" title="Supprimer un jour de travail">Supprimer</button>
            </form>
        </div>
    </div>

</body>
</html>