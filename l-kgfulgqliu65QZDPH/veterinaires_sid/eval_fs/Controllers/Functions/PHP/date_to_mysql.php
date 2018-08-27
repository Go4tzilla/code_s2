<?php
    function date_to_mysql($date){
        $tab_date = explode('/' , $date);
        $date  = $tab_date[2].'-'.$tab_date[1].'-'.$tab_date[0];
        $date = date( 'Y-m-d', strtotime($date) );
        return $date;
    }
?>