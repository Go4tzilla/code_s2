<?php
$flag = false;

if(!empty($_POST['a']) && !empty($_POST['b']) && !empty($_POST['c']) && !empty($_POST['d']) && !empty($_POST['e']) && !empty($_POST['f']) && !empty($_POST['x']) && !empty($_POST['y']) ){
    $flag = true;
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    $x = $_POST['x'];
    $y = $_POST['y'];

if($y === '2' && $x === '2')
    $c = $c*1.5;

if($y === '2' && $x === '3')
    $c = $c*0.5;

if($y === '1' && $x === '2')
    $c = $c*0.5;

if($y === '1' && $x === '3')
    $c = $c*1.5;

$g = floor((2*$a)/5)+2;
$g = $g*$b*$c;
$g = floor($g/$d);
$g = floor($g/50)+2;
$g = floor($g*$e);
$g = floor($g*$f);

$h = $g*217;
$h = floor($h/255);

$p = round(($g+$h)/2);

$i = floor((4*$a)/5)+2;
$i = $i*$b*$c;
$i = floor($i/$d);
$i = floor($i/50)+2;
$i = floor($i*$e);
$i = floor($i*$f);

$j = $i*217;
$j = floor($j/255);
+
$q = round(($i+$j)/2);

    $toto = array($h, $p, $g, $j, $q, $i);

} else  {
    $string = "veuillez remplir tous les champs";
    alert($string);
}

include './v/simulateur.php';
?>
