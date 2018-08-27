<?php
     /* Affichage tableau */

     echo "<caption> Tableau récapitulatif des lettres trouvées :</caption>";    
     echo '<center><table><thead><tr><td style="width:30%;">Lettre</td><td style="width:30%;">Pourcentage (%) : </td><td style="width:30%;">Occurence(s) : </td></tr></thead>';
     echo '<tbody>';
     
     foreach($tab as $i=>$val){
         
         if($i=='Total'){
             
             echo '<tr><td>'.$i.'</td>';

         } else {
         
             echo '<tr><td>'.$i.'</td>';

         }
         
         foreach($val as $key=>$value){
             
             if($key=='%'){
            
             echo '<td>';
             echo number_format($value,2,",","'");
             echo '</td>';
             
             }else if($key == 'Occurence(s)'){
                 
                 echo '<td>';
                 echo number_format($value,0,"","'");
                 echo '</td></tr>';

             }else if($key=='Effectif : '){
                 
                 echo '<td>'.$key;
                 echo number_format($value,0,"","'");
                 echo '</td>';

             }else if($key == 'Nombre de lettres : '){
                 
                 echo '<td>'.$key;
                 echo number_format($value,0,"","'");
                 echo '</td></tr></tbody></table></center>';

             }
         }
     }
?>