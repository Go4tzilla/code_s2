<div class="row">
    <div class="col-xs-6" id="txtHint" style="margin-left:15px;color:#decba4;margin-top:80px;height:110;margin-bottom:50px">
    <?php

    echo'
    <caption><center>Liste de vos patients ayant déjà consulter, cliquez sur les flèches pour trier :</center></caption>
    <table class="table-scroll table-striped"><thead><tr>
    <th>
    Nom
    </th>
    <th>
    Espèce
    </th>
    <th>
    Date de naissance
    </th>
    <th>
    Couleur
    </th>
    <th>
    Nom du propriétaire
    </th>
    <th>
    Prénom du propriétaire
    </th>
    <th>
    @
    </th>
    <th>
    Téléphone
    </th>
    </tr></thead>
    <tbody>';
            for($i = 0; $i < count ($patients_rows); $i++){
                $id = $patients_rows[$i]['ID'];
                unset($patients_rows[$i]['ID']);
                foreach($patients_rows[$i] as $key => $value){
                    if($key ===  "pet_name"){
                        echo "<tr><td>
                        <form action ='./index.php?page=Search' method='post'>
                        <button class='btn btn-primary' onclick='pet_infos(this.value)' style='margin-top:10px' name='select_patient_infos' title='Ajouter ou modifier un historique'value='{$id}'>$value</button>
                        </form>
                        </td>"; 
                    } else if($key ===  "breed"){
                        echo "<td style='white-space:pre-wrap;width:80px;min-width:80px'>{$value}</td>";
                    } else if($key === "colour"){
                        echo "<td style='white-space:pre-wrap;width:120px;min-width:120px'>{$value}</td>";
                    } else if($key === "sex"){
                        echo "<td style='white-space:pre-wrap;width:40px;min-width:40px'>{$value}</td>";
                    } else if($key === "date_of_birth"){
                        $value = explode("-",$value);
                        $value = "{$value[2]}-{$value[1]}-{$value[0]}";
                        echo "<td style='white-space:pre-wrap;width:100px;min-width:100px'>{$value}</td>";
                    } else if($key === "phone_number"){
                        echo "<td style='white-space:pre-wrap;'>{$value}</td></tr>";
                    } else{
                        echo "<td>{$value}</td>";
                    }
                }
            }
    echo '</tbody></table>';
    ?>
    </div>