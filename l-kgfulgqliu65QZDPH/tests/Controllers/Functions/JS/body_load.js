function body_load() {
    $(window).ready(function () {
        /* Evite un affichage dégueulasse quand la page se charge */
        $("body").fadeIn(100);
        $("body").CSS("background-color","hsla(199, 19%, 29%, 0.815)");
        $("div").fadeIn(100);
        $("input").fadeIn(100);
        $("span").fadeIn(100);
        $("#txt").fadeIn(100);
    });
}