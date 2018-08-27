<?php
    $string = "Erqmrxu ohv lwlv Frulqqh yrxv sursrvh gh ghfkliiuhu fh shwlw whawh, hq idlvdqw xq surjudpph hq SKS, shuphwwdqw gh wurxyhu fh txh mh yrxv udfrqwh ;-) Mh wurxyh fhod wuhv ixq gh yrxv idluh frpsuhqguh frpphqw irqfwlrqqh fh frgh Fhvdu. O'xq ghv soxv ylhxa frgh halvwdqw hw o'xq ghv 1huv d frpsuhqguh. Oh suhplhu g'hqwuh yrxv txl frpsuhqg fh txh mh glw d jdjqhu xq fdih !!!!";
    $c = number_format((strlen($string)/2),0);
    $reste = strlen($string)-$c;
    $step = 3;
    
    require_once('recursive_decypher.php');
    
    $res1 = recursive_decypher($string,$step);
    $res1=implode("",$res1);
    var_dump($res1);
?>