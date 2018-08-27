<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form role="form" class="form container-fluid border border-dark rounded" action="" method="POST" name="new_appointment">
            <fieldset class="well">
                <div class="form-group">
            <label for="name">Selectionnez un type de consultation</label>
            </div>
            <select class="form-control space-bottom" name="type" required>
                <option value="consult">Consultation généraliste</option>
                <option value="surgery">Opération</option>
                <option value="consult_spe">Consultation spécialisée</option>
            </select>
            <div class="form-group">
                <label>Choisissez une date</label>
                <div class="form-group">
                    <div class="input-group date" id="datetimepicker2">
                    <input type="text" class="form-control" placeholder="JJ/MM/AAAA" name="appointment_date"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <input type="submit" class="btn btn-block btn-primary" name="new_appointment" value="Choisir" />
                </div>
            </div>
            </fieldset>
        </form>
    </div>
</div>  