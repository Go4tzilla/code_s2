function readURL(input) {
    /* Là on regarde si il y a un fichier dans un input type file */
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            /* On récupère la preview une fois que c'est préupload mamène */
            $('#blah')
                .attr('src', e.target.result);
        };
        /* Le petit outil qui permet de lire l'image sans reload */
        reader.readAsDataURL(input.files[0]);
    }
}