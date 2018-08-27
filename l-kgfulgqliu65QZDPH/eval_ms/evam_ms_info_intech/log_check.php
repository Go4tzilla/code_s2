<?php 
            /** Authentification compte client  */
    function log_check($POST){
                $rec= $_POST['category'];
                $nom= (".csv");
                $va= $_POST['category'].$nom;
                $file = fopen($va,"a+");
                $i=0;
                $j=5;
                $k=6;
                $n=0;
                $p=1;
                $check=false;
                $tab = array();
                $tableau = array(array('mimi',$_POST['pwd']));
                    while(!feof($file)){
                        $tab[] = fgetcsv($file);
                        var_dump($tab);
                        if($tab[0][0] === $tab[0][1]){
                            $check=true;
                            $i2=$i;
                        }
                        $i++;
                    }
                
                $_SESSION['addr']="".$tab[$i2][2]."</br>".$tab[$i2][3]."</br>".$tab[$i2][4]."</br>";
                fclose($file);
            return $check;
    }
?>
