<?php
/* Petits messages d'alerte */
    function alert($string) {
        echo "<div class='alert alert-danger alert-dismissible fade show'
        style='background:#f83600;z_index:3;text-align:center;
        margin-left:auto;margin-bottom:10px;margin-top:20px;display:inline-block;
        height:auto;font-size:13px;width:auto;color:#FFFFFF;border:0.5px solid #decba4;
        max-width:150px'>
        ".$string."<button type='button' class='close' style='margin-top:-10px'data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button></div>";
    }
    function success($string) {
        echo "<div class='alert alert-success alert-dismissible fade show' 
        style='position:absolute;z-index:3;margin:auto;margin-top:20px;width:auto;max-width:150px;display:inline-block;
        height:auto;color:#333333'>".$string."
        <button type='button' class='close' style='margin-top:-10px' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button></div>";
    }
?>