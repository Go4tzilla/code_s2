<?php
    $h = intval("10");
    $min = "00";
    if($min === "30"){
        $check_mins = "00";
        $check_time = $h.":".$check_mins.":00"; 
    } else {
        $check_hour = $h-1;
        if($check_hour < 10){
            $check_hour = "0".$check_hour;
        }
        $check_mins =  "30";
        $check_time = $check_hour.':'.$check_mins.':00';
    }
    echo $check_time;
?>