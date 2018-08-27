<div class="row">
    <div class="col-xs-6" style="max-height:400px;margin:auto;display:block;margin-top:70px;background:background:#333333;font-size:15px">
        <form method="POST" style="width:290px;max-width:290px">
                <label style="text-align:center"> Ici vous pouvez rechercher des rendez-vous </label> 
                <label>Choisissez une date</label>
                    <input type="date" class="form-control" id="datepicker_app" onclick="datepicker_app()" 
                    placeholder="JJ/MM/AAAA" name="appointment_dates" required/><br>
                <label>Choisissez une option</label><br>
                    <select  onchange="show_hours(this.value)" name="apps_select" required>
                    <option  value="all_day"> Rendez-vous de la journée</option>
                    <option  value="hour">Recherche depuis une heure</option>
                    </select><br>
        <div class="form-group" id="choose_time" style="display:none">
                <div class="input-group space-bottom">
                        <label>Heure de début : </label>
                        <input type="number" style="width:60px;max-width:60px" class="form-control" min="08" max="19" step="1" value="08"name="hour"/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;"> h </span>
                        <input type="number" style="width:60px;max-width:60px" class="form-control" min="0" max="30" step="30" value="00" name="min"/>
                        <span class="input-group-addon" style="border-left: 0; border-right: 0;position:relative"> min</span>

                    </div>
                    <div class="form-control" style="background:#333333;color:#decba4">
                    <input type= "radio" name="shour" value="<"> Heure antérieure
                    <input type= "radio" name="shour" value="="> Heure exacte
                    <input type= "radio" name="shour" value=">"> Heure postérieure<br>
                    </div>
        </div>
        <input type="submit" name="search" value="Rechercher un ou des rendez-vous" style="height:40px;background:#FFFFFF;border-radius:3px;border:0.5px solid #333333width:290px;display:block;margin:auto">
    </form>
    </div>
    <br><br><br>
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
            <div id="txtHint">
            </div>
</body>
<script>
search();
body_load();
</script>
<script>
function show_hours(str){
    if(str == "hour"){
        document.getElementById('choose_time').style.display = "inline";
    } else if (str == "all_day"){
        document.getElementById('choose_time').style.display = "none";
    }
    document.getElementById('txtHint').textContent = "Nique le s2";
}
</script>
<script>
datepicker_app();
initMap();
 </script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8SryylEF5v_C1_pTMszfi0wofkCpxbrE&callback=initMap">
</script>
<script type="text/javascript" src="../Player/Controllers/Functions/JS/img_preview.js"></script>
<script type="text/javascript" src="../Player/Controllers/Functions/JS/search.js"></script>
</html>
