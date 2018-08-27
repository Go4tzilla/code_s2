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


