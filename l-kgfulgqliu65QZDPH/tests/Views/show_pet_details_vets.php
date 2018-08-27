<div class="row">
<div class="col-xs-6" id ="txtHint" style="margin-left:15px;color:#decba4;margin-top:70px;height:110;margin-bottom:50px">
<?php
    echo'
    <caption><center><strong>';
    if(!empty($patients_rows[0]["pet_name"])){ 
        echo 'Historique des consultations de '.$patients_rows[0]['pet_name']. ' :';
    }else{
        echo "Le patient n'a pas encore consulté";
    }
    
    echo'</center></caption>
    <table class="table-scroll table-striped" style=""><thead><tr style="height:90px;min-height:90px">
    <th>
    Nom
    </th>
    <th>
    Date de la consultation
    </th>
    <th>
    Raison
    </th>
    <th style="z-index:3;width:350px">
    Examen(s)
    </th>
    <th>
    Diagnostic
    </th>
    <th>
    Traitement
    </th>
    <th>
    Poids
    </th>
    <th>
    Notes
    </th>
    </tr></thead>
    <tbody>';
        for($i = 0; $i < count ($patients_rows); $i++){
            foreach($patients_rows[$i] as $key => $value){
                if($key == "pet_name"){
                    echo "<tr><td>{$value}</td>";
                } else if($key === "notes"){
                    echo "<td>{$value}</td></tr>";
                }   else {
                    echo "<td style='width:60px;max-width:60px'>{$value}</td>";
                }
            }
        }
    echo '</tbody></table>';
?>
</div>