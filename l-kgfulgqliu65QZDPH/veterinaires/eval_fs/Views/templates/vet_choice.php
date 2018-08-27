
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form role="form" class="form container-fluid border border-dark rounded" action="" method="POST" name="vet_choice">
                <fieldset class="well">
                    <div class="form-group">
                <label for="name">Selectionnez un vétérinaire</label>
                </div>
                <select class="form-control space-bottom" name="vet" required>';
                <?php>for($i=0; $i<count($availability_rows); $i++){
                    echo '<option value='.$availability_rows[$i]['last_name'].'>'.$availability_rows[$i]['first_name'].' '.$availability_rows[$i]['last_name'].'</option>';
                }
                ?>
                </select>
                    <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <input type="submit" class="btn btn-block btn-primary" name="vet_choice" value="Choisir" />
                    </div>
                </div>
                </fieldset>
            </form>
        </div>
</div>