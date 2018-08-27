    <div class="row">
    <div class="col-xs-6" id="txtHint" style="margin-left:15px;color:#decba4;margin-top:80px;height:110;margin-bottom:50px">
    <?php

    echo'
    <caption><center>Liste de vos patients ayant déjà consulter, cliquez sur les flèches pour trier :</center></caption>
    <table class="table-scroll table-striped"><thead><tr>
    <th>
    <div style="position:relative">
    Nom
    <button type="submit" name="breed_asc" value="asc-name" title="Trier les noms de A à Z" onclick="order_by(this.value)" 
    style="padding:2px;z-index:3;min-width:10px;min-height:10x;position:absolute;bottom:18px;right:-6px;background:transparent;border:none")"/>
    <img src="./Views/icons/ascending.png"/>
    </button>
    <button type="submit" name="breed_desc" title="Trier les noms de Z à A"  value="desc-name" onclick="order_by(this.value)" 
    style="width:20px;padding:2px;height:20px;position:absolute;bottom:-12px;right:2px;background:transparent;border:none" value="">
    <img src="./Views/icons/descending.png"/>
    </button>
    </div>
    </th>
    <th>
    <div style="position:relative">
    Espèce
    <button type="submit" name="breed_asc" value="asc-breed" title="Trier par nom de race croissant "onclick="order_by(this.value)" 
    style="padding:2px;z-index:3;min-width:10px;min-height:10x;position:absolute;bottom:18px;right:-6px;background:transparent;border:none")"/>
    <img src="./Views/icons/ascending.png"/>
    </button>
    <button type="submit" name="breed_desc" value="desc-breed" title="Trier par nom de race décroissant" onclick="order_by(this.value)" 
    style="width:20px;padding:2px;height:20px;position:absolute;bottom:-12px;right:2px;background:transparent;border:none" value="">
    <img src="./Views/icons/descending.png"/>
    </button>
    </div>
    </th>
    <th>
    <div style="position:relative;width:55px">
    Sexe
    <button type="submit" name="breed_asc" value="asc-sex" title="Trier par sexe (ordre alphabétique croissant)" onclick="order_by(this.value)" 
    style="padding:2px;z-index:3;min-width:10px;min-height:10x;position:absolute;bottom:18px;right:-20px;padding:2px;background:transparent;border:none")/>
    <img src="./Views/icons/ascending.png"/>
    </button>
    <button type="submit" name="breed_desc" value="desc-sex" title="Trier par sexe (ordre alphabétique décroissant)" onclick="order_by(this.value)" 
    style="width:20px;padding:2px;height:20px;position:absolute;bottom:-12px;right:-12px;background:transparent;border:none" value="">
    <img src="./Views/icons/descending.png"/>
    </button>
    </div>
    </div>
    </th>
    <th>
    <div style="position:relative">
    Date de naissance
    <button type="submit" name="breed_asc" value="asc-date" title="Trier par date de naissance, du plus ancien au plus jeune" onclick="order_by(this.value)" 
    style="padding:2px;z-index:3;min-width:10px;min-height:10x;position:absolute;top:-10px;right:-5px;background:transparent;border:none")"/>
    <img src="./Views/icons/ascending.png"/>
    </button>
    <button type="submit" name="breed_desc" value="desc-date" title="Trier par date de naissance, du plus jeune au plus vieux" onclick="order_by(this.value)" 
    style="width:20px;padding:2px;height:20px;position:absolute;bottom:0px;right:2px;background:transparent;border:none" value="">
    <img src="./Views/icons/descending.png"/>
    </button>
    </div>
    </th>
    <th>
    <div style="position:relative">
    Poids
    <button type="submit" name="breed_asc" value="asc-weight" title="Trier par poids croissants" onclick="order_by(this.value)" 
    style="padding:2px;z-index:3;min-width:10px;min-height:10x;position:absolute;bottom:16px;right:-5px;background:transparent;border:none")"/>
    <img src="./Views/icons/ascending.png"/>
    </button>
    <button type="submit" name="breed_desc" value="desc-weight" title="Trier par poids décroissants" onclick="order_by(this.value)" 
    style="width:20px;padding:2px;height:20px;position:absolute;bottom:-12px;right:2px;background:transparent;border:none" value="">
    <img src="./Views/icons/descending.png"/>
    </button>
    </div>
    </th>
    <th>
    <div style="position:relative">
    Puce
    <button type="submit" name="breed_asc" value="asc-chip" title="Trier par numéro de puce ascendant" onclick="order_by(this.value)" 
    style="padding:2px;z-index:3;width:15px;height:15px;position:absolute;bottom:26px;right:-7px;background:transparent;border:none")"/>
    <img src="./Views/icons/ascending.png"/>
    </button>
    <button type="submit" name="breed_desc" value="desc-chip" title="Trier par numéro de puce descendant" onclick="order_by(this.value)" 
    style="width:20px;padding:2px;height:20px;position:absolute;bottom:-12px;right:-12px;background:transparent;border:none" value="">
    <img src="./Views/icons/descending.png"/>
    </button>
    </div></th>
    <th style="width:350px;z-index:0">
    <div style="position:relative">
    Historique
    <button type="submit" name="breed_asc" value="asc-hist" title="Ordonner par historique, tri alphanumérique croissant" onclick="order_by(this.value)" 
    style="padding:2px;z-index:3;min-width:10px;min-height:10x;position:absolute;bottom:18px;right:-5px;background:transparent;border:none")"/>
    <img style:hover="transform: translateX(-50%)"src="./Views/icons/ascending.png"/>
    </button>
    <button type="submit" name="breed_desc" value="desc-hist" title="Ordonner par historique, tri alphanumérique décroissant" onclick="order_by(this.value)" 
    style="width:20px;padding:2px;height:20px;position:absolute;bottom:-12px;right:2px;background:transparent;border:none" value="">
    <img src="./Views/icons/descending.png"/>
    </button>
    </div>
    </th></tr></thead>
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
                    } else if($key === "microchip_tatoo"){
                        echo "<td style='white-space:pre-wrap;width:150px;min-width:150px;max-height:80px;overflow-y:scroll;overflow-x:hidden'>{$value}</td></tr>";
                    } else if($key === "history"){
                        echo "<td style='white-space:pre-wrap;'>{$value}</td></tr>";
                    } else{
                        echo "<td>{$value}</td>";
                    }
                }
            }
    echo '</tbody></table>';
    ?>
    </div>