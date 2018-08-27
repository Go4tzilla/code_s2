<div class="row">

    <div class="col-xs-12" style="margin-top:60px">
        <p style="font-size:10px;width:100px"><?php if (isset($successmsg)) { success($successmsg); } ?>
        <?php if (isset($errormsg)) { alert($errormsg); } ?></p>
        
    </div>
</div>
<div class="row">
<div class="col-xs-6" style="margin-left:15px;color:#decba4">
<?php
echo'
<caption><center> Messages envoyés:</center></caption>
<table class="table-scroll table-striped" style="margin-bottom:30px"><thead><tr><th>Envoyé à : </th><th>Envoyé par :</th><th>Date : </th><th> Contenu :</th></tr></thead>
<tbody>';
        foreach($msg_rows as $key0 => $value0){
            foreach($value0 as $key => $value){
                if($key == "sent_to"){
                    echo "<tr><td>{$value}</td>";
                } else if($key =="content"){
                    echo "<td>{$value}</td></tr>";
                } else if($key === "dates"){
                    $swap = explode(" ",$value);
                    $get_date = explode("-",$swap[0]);
                    $get_date = "{$get_date[2]}-{$get_date[1]}-{$get_date[0]}";
                    $value = "{$get_date} {$swap[1]}";
                    echo "<td>{$value}</td>";
                } else{
                    echo "<td>{$value}</td>";
                }
            }
            unset($get_date,$swap);
        }
echo '</tbody></table>';
?>
</div>
<div class ="col-xs-6 msg" style="position:fixed;right:10px;margin-top:20px;">
<div class="btn-group-vertical" style="top:90">
            <form role="form" action="" method="POST" name="edit" style="width:150px">
                <button class="btn btn-primary" name="msg" value="convos">Conversations</button>
                <button class="btn btn-primary" name="msg" value="outbox">Envoyés</button>
                <button class="btn btn-primary" name="msg" value="write">Ecrire</button>
            </form>
        </div>
</div>
</div>