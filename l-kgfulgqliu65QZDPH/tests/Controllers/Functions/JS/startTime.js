/* Affichage de l'heure MAMENE */
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    h = checkTime(h);
    m = checkTime(m);
    document.getElementById('txt').innerHTML =
    h + ":" + m;
    var t = setTimeout(startTime, 500);
}
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10 because I'm fancy
        return i;
    }