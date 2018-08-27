<div class="row">
    <div class="col-xs-6" style="max-height:400px;margin:auto;display:block;margin-top:70px;background:background:#333333;font-size:15px" id="txtHint">
        <table class="table-scroll table-striped" style="margin-left:15px;margin-top:35px">
        <label for="name" style="color:#decba4;margin-left:110px">Choisissez un Rendez-vous à annuler, il sera automatiquement supprimer après le click</label>
            <thead>
                <tr class="tr-scroll">
                    <th>Heure</th>
                    <th>Jour</th>
                    <th>Animal</th>
                    <th>Espèce</th>
                    <th>Nom Propriétaire</th>
                    <th>Prénom propriétaire</th>
                    <th>Type</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody class="tbody-scroll">                
            <?php
                if($app_rows){
                    for($i=0 ; $i<count($app_rows); $i++){
                        unset($app_rows[$i]['ID']);
                        foreach($app_rows[$i] as $key => $value){
                            if($key == "start"){
                                echo "<tr class='tr-scroll'><td>{$value}</td>";
                            } else if($key == "canceled"){
                                echo '<td><input type="radio" name="optradio" onclick="cancel_app(this.value)" id="cancel_app" title="Supprimer le rdv de '.$app_rows[$i]["start"].'/'.$app_rows[$i]["app_day"].'"value="'.$app_rows[$i]["start"].'/'.$app_rows[$i]["app_day"].'/'.$app_rows[$i]["pet_name"].'"required/>Annuler</td></tr>';
                            } else if($key == "app_day"){
                                $value = explode("-",$value);
                                $value = "{$value[2]}-{$value[1]}-{$value[0]}";
                                echo "<td>{$value}</td>";
                            } else{
                                echo "<td>{$value}</td>";
                            }
                        }
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
    <div class="col-xs-6 msg" style="position:fixed;max-height:500px;right:25px;width:130px;top:70px">
        <div class="btn-group-vertical">
            <form role="form" action="" method="POST" name="edit">
                <button class="btn btn-primary" name="manage_app" 
                title="Gérer la consultation, ici vous pouvez éditer l'historique ou gérer la fiche relative à la consultation du patient." 
                value="Ajouter">Consultations</button>
                <button class="btn btn-primary" name="search_app" 
                title="Rechercher un RdV par date." 
                value="seek">Recherche</button>
            </form>
            <input type="hidden" id="ID" value="<?php if(isset($_SESSION['ID'])){
                echo $_SESSION['ID'];
            }?>"/>
        </div>
    </div>
</div>
</body>
<script>
search();
body_load();
datepicker();
startTime();
initMap();
 </script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8SryylEF5v_C1_pTMszfi0wofkCpxbrE&callback=initMap">
</script>
<script type="text/javascript" src="../Player/Controllers/Functions/JS/img_preview.js"></script>
<script type="text/javascript" src="../Player/Controllers/Functions/JS/search.js"></script>
</html>
