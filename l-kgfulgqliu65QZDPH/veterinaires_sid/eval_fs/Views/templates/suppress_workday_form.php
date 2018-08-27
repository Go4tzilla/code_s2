<div class="container-fluid">
    <h3 class="text-center">Supprimer un jour de travail</h3>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form role="form" style="margin-top: -75px"class="form container-fluid border border-dark rounded" action="" method="POST" name="delete_day">
                <fieldset class="well">
                    <div class="form-group">
                    <label for="name">Choisisez un repos à supprimer</label>
                    </div>
                    <div class="form-group">
                    <?php
    if($work_days){
        for($i=0; $i<count($work_days); $i++){
            echo '<div class="radio"><label><input type="radio" name="optradio" value="'.$work_days[$i]['working_day'].'" required>'.$work_days[$i]['working_day'].'</label></div>';
        }
    }
    ?>  </div>
                    <div class="form-group">
                        <br>   <input type="submit" class="btn btn-block btn-primary space-bottom" style="width:250px; margin-left: 50px;float:center"name="delete_day" value="Supprimer" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>