<div class="row">

    <div class="col-xs-12" style="margin:auto;margin-top:50px;display:inline-block">
        <?php if (isset($successmsg)) { success($successmsg); } ?>
        <?php if (isset($errormsg)) { alert($errormsg); } ?>
        
    </div>
</div>
<div class="row">
    <div class="col-xs-6" style="margin:auto;margin-top:20px;display:inline-block">
        <table class="table-scroll table-striped" style="margin-left:15px">
            <thead>
                <tr class="tr-scroll">
                    <th>Jour(s)</th>
                    <th>Heure de début</th>
                    <th>Heure de fin</th>
                </tr>
            </thead>
            <tbody class="tbody-scroll">
                <?php
                if($work_rows){
                    foreach($work_rows as $key0 => $value0){
                        foreach($value0 as $key => $value){
                            if($key == "working_day"){
                                echo "<tr class='tr-scroll'><td>{$value}</td>";
                            } else if($key == "to_time"){
                                echo "<td>{$value}</td></tr>";
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
    <div class="col-xs-6 msg" style="position:sticky;max-height:500px;right:0;width:150px;top:margin-top:40px">
        <div class="btn-group-vertical">
            <form role="form" action="" method="POST" name="edit">
                <button class="btn btn-primary" name="add" title="Ajouter un jour de travail" value="Ajouter">Ajouter</button>
                <button class="btn btn-primary" name="edit" title="Modifier une amplitude horaire">Modifier</button>
                <button class="btn btn-primary" name="delete" title="Supprimer un jour de travail">Supprimer</button>
            </form>
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

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8SryylEF5v_C1_pTMszfi0wofkCpxbrE&callback=initMap">
</script>
<script type="text/javascript" src="../Player/Controllers/Functions/JS/img_preview.js"></script>
<script type="text/javascript" src="../Player/Controllers/Functions/JS/search.js"></script>
</html>
