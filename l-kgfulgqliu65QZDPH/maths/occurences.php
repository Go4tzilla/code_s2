<?php
    include('./maths_views/html_top.html');
    include('./maths_views/navbar.php');

    /* Affichage formulaire */
    
    if(!isset($_POST['texte'])){
            
        include('./maths_views/text_area_form.php');

    }

    /* Récupération du texte à traiter */

    if(!empty($_POST['texte'])){
    
        echo "<br>{$_POST['texte']}<br>";
        $phrase = $_POST['texte'];           


        /* Vérification spécifités linguistiques */

        $pattern_fr = "#[çèàéùôêâïû]#";

        if(preg_match($pattern_fr,$phrase)){
            echo "<br>Un caractère spécial appartenant au français a été détecté.<br>";
            include('./maths_views/return_form.php');
            die();
        }

        /* Calcul Occurence(s) + insert tableau */

        $c = strlen($phrase);
        $eff = 0;
        foreach(count_chars($phrase=strtr(strtoupper($phrase),array(" "=>"",","=>"","'"=>"",";"=>"","."=>"","-"=>"",":"=>"")),1) as $j=>$val){ 
            
            $cal = ($val/$c)*100;
            $tab[chr($j)]['%']=$cal;
            $tab[chr($j)]['Occurence(s)']=$val;
            $eff++;

        }
        
        $tab['Total']['Effectif : '] = $eff;
        $tab['Total']['Nombre de lettres : '] = $c;
            
        /* Affichage tableau */

        include('./maths_views/occurences_table.php');
        
        /* Vérification si textes écrit en Anglais, Portugais, ou Français */



        if(isset($tab['H'])){
            
            if(number_format($tab['H']['%'],0) > 1){
                
                echo '<br><h1><bold>Ce texte est très probablement en anglais.</bold></h1>';
                    include('./maths_views/return_form.php');

            }else if (isset($tab['W'])){
                
                if(number_format($tab['W']['%'],0) > 2){
                    
                    echo '<br><h1><bold>Ce texte est très probablement en anglais.</bold></h1>';
                            include('./maths_views/return_form.php');

                } else if(!isset($tab['L'])){

                        if (isset($tab['E'])){
        
                            if(number_format($tab['A']['%'],0) >= number_format($tab['E']['%'],0)){
                        
                                echo '<br><h1><bold>Ce texte est très probablement en portugais.</bold></h1>';
                                        include('./maths_views/return_form.php');
                            } else {
            
                                echo '<br><h1><bold>Ce texte est très probablement en Français.</bold></h1>';
                                include('./maths_views/return_form.php');
                            }
                        } else {
                        
                        echo '<br><h1><bold>Ce texte est très probablement en Portugais.</bold></h1>';
                                include('./maths_views/return_form.php');
                        }
                } else {
                
                    echo '<br><h1><bold>Ce texte est très probablement en Français.</bold></h1>';
                        include('./maths_views/return_form.php');
    
                }
        
            } else if(!isset($tab['L'])) {

                    if (isset($tab['E'])){
    
                        if(number_format($tab['A']['%'],0) >= number_format($tab['E']['%'],0)){
                    
                            echo '<br><h1><bold>Ce texte est très probablement en portugais.</bold></h1>';
                                    include('./maths_views/return_form.php');
                        } else {
        
                            echo '<br><h1><bold>Ce texte est très probablement en Français.</bold></h1>';
                                    include('./maths_views/return_form.php');
                        }
                    } else {
                    
                    echo '<br><h1><bold>Ce texte est très probablement en Portugais.</bold></h1>';
                            include('./maths_views/return_form.php');
                    }
            } else {
            
                echo '<br><h1><bold>Ce texte est très probablement en Français.</bold></h1>';
                    include('./maths_views/return_form.php');

            }
        
        } else if (isset($tab['W'])){
            
            if(number_format($tab['W']['%'],0) > 2){
                
                echo '<br><h1><bold>Ce texte est très probablement en anglais.</bold></h1>';
                    include('./maths_views/return_form.php');
            
            } else if(!isset($tab['L'])){

                if (isset($tab['E'])){

                    if(number_format($tab['A']['%'],0) >= number_format($tab['E']['%'],0)){
                
                        echo '<br><h1><bold>Ce texte est très probablement en portugais.</bold></h1>';
                                include('./maths_views/return_form.php');
                    } else {
    
                        echo '<br><h1><bold>Ce texte est très probablement en Français.</bold></h1>';
                        include('./maths_views/return_form.php');
                    }
                } else {
                
                     echo '<br><h1><bold>Ce texte est très probablement en Portugais.</bold></h1>';
                        include('./maths_views/return_form.php');
                }
            } else {
            
                echo '<br><h1><bold>Ce texte est très probablement en Français.</bold></h1>';
                    include('./maths_views/return_form.php');

            }
    
        } else if(!isset($tab['L'])){

            if (isset($tab['E'])){

                if(number_format($tab['A']['%'],0) >= number_format($tab['E']['%'],0)){
            
                    echo '<br><h1><bold>Ce texte est très probablement en portugais.</bold></h1>';
                            include('./maths_views/return_form.php');
                } else {

                    echo '<br><h1><bold>Ce texte est très probablement en Français.</bold></h1>';
                            include('./maths_views/return_form.php');
                }
            } else {
            
            echo '<br><h1><bold>Ce texte est très probablement en Portugais.</bold></h1>';
                    include('./maths_views/return_form.php');
            }
        } else {

            echo '<br><h1><bold>Ce texte est très probablement en Français.</bold></h1>';
                    include('./maths_views/return_form.php');

        }   
        
    } else if(isset($_POST['texte']) && empty($_POST['texte'])){
            
            echo "C'est vide mamène, saisis un texte stp";
                    include('./maths_views/text_area_form.php');

    }


    
    include('./maths_views/html_bottom.html');

?>