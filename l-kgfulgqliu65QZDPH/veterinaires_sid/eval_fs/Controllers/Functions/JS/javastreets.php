<script>
var carte;
function initialize(){
    // On rentre les coordonnées(latitude, longitude) de notre choix dans une variable
    var maLatlng = new google.maps.LatLng(48.816382, 2.375956);

    // On établit les options de notre choix :
    // la profondeur du zoom, les coordonnées sur lesquelles la carte sera centrée, le type de vue (satellite, plan...)
    var mesOptions = {
       zoom: 15,
       center: maLatlng,
       mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    // On crée notre carte en lui passant toutes nos options en paramètre
    carte = new google.maps.Map(document.getElementById("map_canvas"), mesOptions);

    // On place un listener sur la carte qui contrôle une action qui sera déclenchée lors de l'événement 'zoom_changed'
    // Quand le zoom sera modifié la carte sera recentrée sur les coordonnées de The Coding Machine
    google.maps.event.addListener(carte,'zoom_changed', function() {
       setTimeout(allerChezTCM,3000);
    });

    // On crée un marqueur que l'on positionne grâce au paramètre "position"
    var marker = new google.maps.Marker ({
       position: maLatlng,
       map: carte,
       title: "Hello world :) !"
    });

    // On place un listener sur le marqueur qui contrôle une action qui sera déclenchée lors de l'évènement 'click'
    // Quand on clique sur le marqueur, le zoom de la carte passera à 8
    google.maps.event.addListener(marker, 'click', function(){
       carte.setZoom(12);
    });
}
function allerChezTCM() {
   var tcm = new google.maps.Latlng(48.816382, 2.375956);
   map.setCenter(tcm);
}

$(function () {
    var current_date = var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today = dd + '/' + mm + '/' + yyyy;
document.write(today);;
    $('#datetimepicker1').datetimepicker({
        endDate: current_date,
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
        viewMode: 'years',
        language: 'fr',
        format: "dd/mm/yyyy",
        autoclose: true
    });
    $('#datetimepicker2').datetimepicker({
        startDate: current_date,
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
        viewMode: 'years',
        language: 'fr',
        format: "dd/mm/yyyy",
        autoclose: true
    });
});
