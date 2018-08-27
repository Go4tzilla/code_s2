<?php
/* On met la date au format mysql. Enfoiré d'anglophones. LE SYSTEME METRIQUE ET NOS NORMES VAINCRONS */
    function date_to_mysql($album_date){
        $album_date = explode("-",$album_date);
        $date = $album_date[0].'-'.$album_date[1].'-'.$album_date[2];
        unset($album_date);
        return $date;
    }
?>