<div class="row">
	<div class="col-xs-6" style="margin:auto;display:block;margin-top:80px;color:#decba4">
<center><p>Ici vous pouvez consulter la liste des praticiens</p></center>
<?php if (isset($successmsg)) { success($successmsg); } ?>
<?php if (isset($errormsg)) { alert($errormsg); } ?>
<?php
echo'
<table><thead><tr><th>Mail : </th><th>Nom :</th><th>Prénom : </th><th> Initiales :</th></tr></thead>
<tbody>';
        foreach($colls_rows as $key0 => $value0){
            foreach($value0 as $key => $value){
                if($key == "email"){
                    echo "<tr><td>{$value}</td>";
                } else if($key =="vet_init"){
                    echo "<td>{$value}</td></tr>";
                } else{
                    echo "<td>{$value}</td>";
                }
            }
        }
echo '</tbody></table>';
?>
</div>
<div class ="col-xs-6 msg" style="position:fixed;right:0;margin-top:60px;">
<div class="btn-group-vertical" style="top:90">
            <form role="form" action="" method="POST" name="add" style="width:210px">
                <button class="btn btn-primary" name="add" value="convos">Ajouter un collaborateur</button>
            </form>
        </div>
</div>
</div>