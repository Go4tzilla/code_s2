    <div class="row">
        <div class="col-xs-6" id="txtHint" style="color:#decba4;display:block;margin:auto;margin-top:60px;font-size:15px;">
        <h3 class="text-center" style="text-align:center">Supprimer un jour de travail</h3>
            <form role="form" style="text-align:center;display:inline-block"  class="form container-fluid" method="POST" name="delete_day" >
            <input type="hidden" id="ID" name="vet" value="<?php echo $_SESSION['ID'];?>"/>
                <fieldset class="well">
                    <div class="form-group">
                    <label for="name">Choisissez un jour à libérer, il sera automatiquement supprimer après le click</label>
                    </div>
                    <div class="form-group">
                    <?php
    if($work_days){
        for($i=0; $i<count($work_days); $i++){
            echo '<div class="radio"><label><p title="Supprimer le '.$work_days[$i]['working_day'].'"><input type="radio" name="optradio" onclick="suppressDay(this.value)" title ="Supprimer le '.$work_days[$i]['working_day'].'"value="'.$work_days[$i]['working_day'].'" required>'.$work_days[$i]['working_day'].'</p></label></div>';
        }
    }
    ?>  </div>
                </fieldset>
            </form>
        </div>
        <div class="col-xs-6" style="position:absolute;max-height:500px;right:0;margin-top:60px;width:145px;color:#decba4">
    <div class="btn-group-vertical">
            <form role="form" action="" method="POST" name="edit">
                <button class="btn btn-primary" style="background:#333333" title="Ajouter un jour de travail" name="add" value="Ajouter">Ajouter</button>
                <button class="btn btn-primary" style="background:#333333" title="Modifier une amplitude horaire" name="edit">Modifier</button>
                <button class="btn btn-primary" style="background:#333333" title="Supprimer un jour de travail" name="delete">Supprimer</button>
            </form>
        </div>
        </div>
    
</body>
</html>