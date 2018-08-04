<div id="txtHint" style="margin:auto;margin-top:100px;display:inline-block;white-space:pre-wrap"></div>
<div class ="row">
<div class="col-xs-12" style="margin:auto;margin-top:50px;display:inline-block">
<select class="form-control space-bottom" onchange="getHistory()" id="animal" style="width:auto;display:block;margin-auto;margin-top:5px;margin-left:180px"name="target" required>
<?php 
         foreach($patients_rows as $key0 => $value0){
            unset($value0['history']);
            $name = implode(' ',$value0);
            foreach($value0 as $key =>$value){
                if($key == 'pet_name'){
                        if($_SESSION['role'] == 'client'){
                            echo '<option " value="'.$name.'">'.$value.'</option>';
                        } else {
                            echo '<option " value="'.$name.'">'.$name.'</option>';
                        }
                    }
            }
        }
?>
</select><div class ="container">
<center style="color:#decba4">
    Ajouter/modifier un historique :<br> <pre><textarea rows="8" cols="60" style="font-size:14px;white-space:pre-wrap"id="history" name="history" 
    value=""/><?php if(!empty($patients_rows)){ printf("\n".$patients_rows[0]['history']);} ?></textarea></pre><br>
    <input type="hidden" id="owner" name="owner" value="<?php echo $_SESSION['ID'];?>"/>
    <input class = "button " style="margin-left:3%;background:#333333;color:#decba4;border:none" type="button" 
    onclick ='updateHistory(this.value)'name="msg_send" value="Envoyer"></center>
</div>
</div>
</div>

</body>
</html>