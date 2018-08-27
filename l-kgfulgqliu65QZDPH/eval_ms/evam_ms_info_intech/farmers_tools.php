<?php 
            /** Authentification compte client  */
    function log_check($POST){
                $nom= "".$_POST['category']."_".$_POST['nick'].".csv";
                $tmp = fopen($nom,"a+");
                $file = fopen($va,"a+");
                $i=0;
                $j=5;
                $k=6;
                $n=0;
                $p=1;
                $check=false;
                $tab = array();
                $tableau = array(array($_POST['nick'],$_POST['pwd']));
                if(!empty($file)){}
                    while(!feof($file)){
                        $tab[$i] = fgetcsv($file);
                        if($tab[$i][$j]===$tableau[$n][$n]&&$tab[$i][$k]===$tableau[$n][$p]){
                            $check=true;
                            $i2=$i;
                        }
                        $i++;
                    }
                }
                fclose($tmp);
            return $check;
    }
?>
