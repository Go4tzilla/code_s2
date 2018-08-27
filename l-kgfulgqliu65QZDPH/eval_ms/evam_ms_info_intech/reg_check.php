<?php 
        /** Vérification disponibilité du pseudonyme **/
    function reg_check($POST){
        $rec= $_POST['category'];
        $nom= (".csv");
        $va= $_POST['category'].$nom;
        $file = fopen($va,"a+");
        $i=0;
        $j=5;
        $l=0;
        $check=true;
        $tab = array();
        $tableau = array(array($_POST['nick']));
            while(!feof($file)){
                $tab[$i] = fgetcsv($file);
                    if($tab[$i][$j]===$tableau[$l][$l]){
                        $check=false;
                    } 
                $i++;
            }
            fclose($file);
    
            return $check;
        }
?>
