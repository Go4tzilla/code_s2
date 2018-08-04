<div class="row">
            <div class="col-md-4 col-md-offset-4" style="display:block;margin:auto;top:80px;color:#decba4">
                <form role="form" class="form container-fluid"  action="" method="POST" name="new_animal">
                    <fieldset class="well">
                        <h4 class="text-center">Est-ce une première prise de rendez-vous avec inscription ?</h4>
                            <div class="row space-bottom">
                                <div class="col-md-4 col-md-offset-4" style="margin:auto">
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio" value="yes" required>Oui
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio" value="no" required>Non
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4" style="margin:auto">
                                    <input type="submit" class="btn btn-block btn-primary" style="width:90px"name="new_animal" value="Choisir" />
                                </div>
                            </div>
                    </fieldset>
                </form>
            </div>
        </div>
</body>
<script>
datepicker();
</script>