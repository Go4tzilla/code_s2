<div class="row">
    <div class="col-xs-12">
        <form role="form" class="form container-fluid border border-dark rounded" action="" method="POST" name="select_animal">
            <fieldset class="well">
                <h4 class="text-center">* Selectionnez votre animal</h4>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <select class="form-control space-bottom" name="my_animal" required>';
                    <?php    $i=0;
                        while($i < count($animal_rows)){
                            foreach($animal_rows[$i] as $key =>$value){
                                echo '<option        value="'.$value.'">'.$value.'</option>';
                            }
                            $i++;
                        }?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <input type="submit" class="btn btn-block btn-primary" name="select_animal" value="Choisir" />
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>