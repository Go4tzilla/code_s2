<?php
    $_POST['lol'] = 'lol';
    $_POST = null;
    var_dump($_POST);
    if(isset($_POST)){
        $lol= 'zizi';
    }
    $word = 'Bonjour Sid. Tu veux yasmine:::?';
    $word = strtr($word,array(". "=>".\n","- "=>"\t- ",":"=>":\n"));
    echo "<div style='white-space:pre-line'>$word\n$lol</div>";
?>