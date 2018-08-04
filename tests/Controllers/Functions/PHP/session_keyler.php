<?php
    /* Je tue la session. Genre là elle décède de fou */
    foreach($_SESSION as $key => $value){
        unset($_SESSION[$key]);
    }
?>