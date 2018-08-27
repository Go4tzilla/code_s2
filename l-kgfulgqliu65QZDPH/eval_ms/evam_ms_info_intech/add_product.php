<?php 
            /** Authentification compte client  */
    function add_product($POST){
        $rec= $_SESSION['category'];
        $va = "".$_SESSION['category']."_".$_SESSION['nick'].".csv";
        $file = fopen($va,"a+");
        $tableau = array(array($_POST['fruit'],$_POST['producer'],$_POST['price'],$_POST['amount']));
            foreach($tableau as $line){
                fputcsv($file,$line);
            }
            fclose($file);
       
    }
?>
