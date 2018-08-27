<?php
echo '<div class="row">
                        <div class="col-md-4 col-md-offset-4" style="display:block;margin:auto;margin-top:100px;color:#decba4">
                            <form role="form" class="form container-fluid " action="" method="POST" name="register_animal">
                                <fieldset class="well">
                                    <h4 class="text-center">Inscrivez votre animal, les formulaires marqués par un * sont obligatoires</h4>
                                    <div class="form-group">
                                        <label for="name">* Entrez son nom</label>
                                        <input type="text" class="form-control space-bottom" name="pet_name" placeholder="Nom" maxlength="20" required value="'; if($error_reg_animal) echo $pet_name; echo '" />';
                                        if (isset($pet_name_error)) alert($pet_name_error);
                                        echo '
                                    </div>
                                    <div class="form-group">
                                        <label for="name">* Entrez sa race/espèce</label>
                                        <input type="text" class="form-control space-bottom" name="breed" placeholder="Espèce" maxlength="25" required value="'; if($error_reg_animal) echo $breed; echo '" />';
                                        if (isset($breed_error)) alert($breed_error);
                                        echo '
                                    </div>
                                    <div class="form-group">
                                        <label for="name">* Entrez sa couleur</label>
                                        <input type="text" class="form-control space-bottom" name="colour" placeholder="Couleur" maxlength="20" required value="'; if($error_reg_animal) echo $colour; echo '" />';
                                        if (isset($colour_error)) alert($name_error);
                                        echo '
                                    </div>
                                    <div class="form-group">
                                        <label>* Choisissez son sexe</label>
                                        <div class="form-group">
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio2" value="female" required>Femelle
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio2" value="male" required>Mâle
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio2" value="unknown" required>Inconnu
                                        </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Choisissez sa date de naisssance</label>
                                        <div class="form-group">
                                            <div class="input-group date"  >
                                            <input type="date" class="form-control" placeholder="JJ/MM/AAAA" id="datepicker" onclick="datepicker()" required name="date_of_birth"/>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Numéro de puce ou tatouage</label>
                                        <input type="text" class="form-control" maxlength="15" pattern="^[a-zA-Z0-9]+$" title="Entrez un code au bon format" name="microship_tatoo" placeholder="N°" />
                                    </div>';
                                        if (isset($microship_tatoo_error)) alert($microship_tatoo_error);
                                        echo '
                                    <div class="form-group">
                                        <label>Commentaire (animal trouvé, caractère, régime...)</label>
                                        <textarea class="form-control" placeholder="Votre commentaire" name="comment" maxlength="500"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-md-offset-4">
                                            <input type="submit" class="btn btn-block btn-primary" name="register_animal" value="Inscrire" />';
                                            if ($flag_name_taken) { alert($name_taken); }
                                        echo '
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>';
?>
<script>
datepicker();
</script>