<div class="row">
    <div class="col-xs-12" style="display:inline-block;margin:auto;margin-top:80px;color:#decba4">
        <form role="form" class="form container-fluid" action="" method="POST" name="new_appointment">
            <fieldset class="well">
                <div class="form-group">
            <label for="name">Selectionnez un type de consultation</label>
            </div>
            <select class="form-control space-bottom" name="type" required>
                <option value="consult">Consultation généraliste</option>
                <option value="surgery">Opération</option>
                <option value="consult_spe">Consultation spécialisée</option>
            </select><br>
            <div class="form-group">
                <label>Choisissez une date</label>
                <div class="form-group">
                    <div class="input-group date" id="datetimepicker2">
                    <input type="date" class="form-control" id="datepicker_app" onclick="datepicker_app()"placeholder="JJ/MM/AAAA" name="appointment_date"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <input type="hidden" name="my_animal" value="<?php if(isset($_POST['my_animal'])){ echo($_POST['my_animal']);}?>"/>
                    <input type="submit" class="btn btn-block btn-primary" style="width:100px;margin-left:40px" name="new_appointment" value="Choisir" />
                </div>
            </div>
            </fieldset>
        </form>
    </div>
</div> 
<script>
datepicker_app();
</script>