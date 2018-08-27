<div class="row">
<div class="col-xs-6" id ="txtHint" style="margin-left:15px;color:#decba4;margin-top:70px;height:110;margin-bottom:50px">
<?php
    echo'
    <caption><center>Liste de vos animaux, cliquez sur les flèches pour trier (tri inactif en cas de recherche) :</center></caption>
    <table class="table-scroll table-striped" style=""><thead><tr style="height:90px;min-height:90px">
    <th>
    Nom
    </th>
    <th>
    Date consultation
    </th>
    <th>
    Nom propriétaire
    </th>
    <th>
    Prénom propriétaire
    </th>
    <th>
    Date de la consultation
    </th>
    <th>
    Raisons
    </th>
    <th>
    Diagnostic
    </th>
    <th style="z-index:3;width:350px">
    Poids
    </th>
    <th>
    Traitement
    </th>
    
    <th>
    Notes
    </th></tr></thead>
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