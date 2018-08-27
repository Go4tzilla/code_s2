<div class="row">
    <div class="col-xs-12" style="display:block;margin:auto;margin-top:100px;color:#decba4">
        <form role="form" class="form container-fluid" action="" style="margin-left:80px;width:500px" method="POST" name="select_animal">
            <fieldset class="well">
                <h4 class="text-center"> Selectionnez votre animal</h4>
                <div class="row">
                        <select class="form-control space-bottom" name="my_animal" required>';
                    <?php    
                        for($i = 0; $i < count($animal_rows); $i++){
                                echo '<option value="'.$animal_rows[$i]['patient_ID'].'/'.$animal_rows[$i]['pet_name'].'">'
                                .$animal_rows[$i]['pet_name'].' '.$animal_rows[$i]['breed'].' né le '
                                .$animal_rows[$i]["date_of_birth"].' de couleur '
                                .strtolower($animal_rows[$i]['colour']).'</option>';
                        }
                        ?>
                        </select>
                            <input type="submit" style='width:90px;margin-left:40%' class="btn btn-block btn-primary" name="select_animal" value="Choisir" />
                </div>
            </fieldset>
        </form>
    </div>
</div>