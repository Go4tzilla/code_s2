<div class="row">

    <div class="col-xs-12"  style="margin:auto;margin-top:60px;display:block">
        <p style="font-size:10px;width:100px">
        <?php if (isset($successmsg)) { success($successmsg); } ?>
        <?php if (isset($errormsg)) { alert($errormsg); } ?></p>
        
    </div>
</div>
<div class ="row" style="margin:auto;margin-top:60px;display:block">
    <div class="col-xs-12">
        <div class="container map" id="search_results" style="width:400px;max-height:450px;height:450px;border:none;
        overflow-y:scroll;overflow-x:hidden;color:#decba4;padding-bottom:10px;">
        <p class="first_sentence">Bienvenue sur le site de Heal mon Bichon</p>
                <p class="first_sentence">Votre clinique vétérinaire de référence à Ivry-sur-Seine</p>

                <p>Le cabinet est ouvert tous les jours de la semaine, de <br> <strong style="color:#FFFFFF">8h à 19h30</strong>. 
                Nocturne le premier dimanche de chaque mois.</p>
                <p>Nous sommes situés au <strong style="color:#FFFFFF">74, avenue Maurice Thorez à Ivry-sur-Seine.</strong></p>
                <p> Vous pouvez facilement accèder à notre clinique via le 
                    
                <strong style="color:#FFFFFF">métro ligne 7 (arrêt Pierre et Marie Curie).
                </strong></p>
                <p>Des correspondances vers le tramway sont disponibles aux stations :</p>
                    <ul>
                        <li> Porte d'Italie</li> 
                        <li> Porte de Choisy</li>
                    </ul> 
                <P><strong style="color:#FFFFFF">Des métros et RER (ligne 1/6/8/14 RER A/B/C/D) 
                    sont accessibles sur l'ensemble de la ligne 7.
               </strong></p>
            <div id="map" class="map"  name="map_canvas">
            </div>
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