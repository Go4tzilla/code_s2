<?php
    $texte = "aoeoaoeoaeoaeóñí";
    $pattern_fr = "#[çèàéùçôêâ]#";
    $pattern_esp = "#[óñí]#";

            if(preg_match($pattern_fr,$texte)){
                echo "Un caractère spécial appartenant au français a été détecté.";
                die();
            } else if(preg_match($pattern_esp,$texte)){
                echo "Un caractère spécial correspondant à l'espagnol, au portugais ou à l'italien a été détecté";
                die();
            }
            switch($tab):
                case(isset($tab['H'])):
                    switch($tab['H']['%']):
                        case(number_format($tab['H']['%'],0) > 2):
                            echo 'lol';
                            break;
                case(isset($tab['W'])):
                    switch($tab['W']['%']):
                        case(number_format($tab['W']['%'],0) > 2):
                            break;
                case(!isset($tab['L'])):
                    switch($tab['L']):
                        case(isset($tab['E'])):
                            switch($tab['E']):
                                case(number_format($tab['E']['%'],0) < number_format($tab['A']['%'],0)):
                                    break;
        
        ?>