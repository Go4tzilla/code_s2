<?php
    function recursive_decypher($string,$step){
        if(is_string($string)){
            $string= str_split($string);
        }
        while(count($string)>0){
            echo count($string).'<br>';
            $ascii = ord($string[0]);
            $string = array_splice($string,0,1);

            if($ascii <= 122 && $ascii >= 97){
                $cal = $ascii-97;
                
                if($cal>=$step){
                    $ascii = $ascii - $step;
                    $ascii = chr($ascii);
                    $trad[] = $ascii;
                    $string = recursive_decypher($string,$step);
                    $string= implode("",$string);
                
                }else {
                    $new_step=$step-$cal;
                    $ascii = 122-($new_step-1);
                    $ascii = chr($ascii);
                    $trad[] = $ascii;
                    $string = recursive_decypher($string,$step);
                    $string= implode("",$string);
                }
            
                
            }else if($ascii>=65 && $ascii<=90){
                $cal = $ascii-65;
                
                if($cal>=$step){
                    $ascii = $ascii - $step;
                    $ascii = chr($ascii);
                    $trad[] = $ascii;
                    $string = recursive_decypher($string,$step);
                    $string= implode("",$string);
                
                }else {
                    $new_step=$step-$cal;
                    $ascii = 122-($new_step-1);
                    $ascii = chr($ascii);
                    $trad[] = $ascii;
                    $string = recursive_decypher($string);
                    $string= implode("",$string);
                }
            }else {
                $ascii = chr($ascii);
                $trad[] = $ascii;
                $string = recursive_decypher($string);
                $string= implode("",$string);
            
            }
        }
            return $trad;
    }