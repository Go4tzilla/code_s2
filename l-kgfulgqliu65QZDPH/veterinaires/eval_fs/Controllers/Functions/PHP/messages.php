<?php
    function alert($string) {
        echo "<div class='alert alert-danger alert-dismissible fade in'>
            <a href='#' class='close' data-dismiss='alert' width ='650px'aria-label='close'>&times;</a>".$string."</div>";
    }
    function success($string) {
        echo "<div class='alert alert-success alert-dismissible fade in'>
        <a href='#' class='close' data-dismiss='alert'width ='650px'     aria-label='close'>&times;</a>".$string."</div>";
    }
?>