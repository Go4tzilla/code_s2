<select class="form-control space-bottom" onclick="getHistory(this.value)" id="animal" style="width:40%;display:block;margin-auto;margin-top:70px;margin-left:300px"name="target" required>
<?php
         foreach($patients_rows as $key0 => $value0){
             $name = implode(' ',$value0);
             unset($value0['history'],$value0['ID']);
             $aj = implode(' ', $value0);
             foreach($value0 as $key =>$value){
                 if($key == 'pet_name'){
                     echo '<option " value="'.$aj.'">'.$aj.'</option>';
                    }
                }
            }
            ?>
</select>
<center style="color:#decba4">
    Ajouter/modifier un historique :<br> <pre><textarea rows="8" cols="50" id="history" name="history"/><?php if(!empty($patients_rows)){ printf($patients_rows[0]['history']);} ?></textarea></pre><br>
    <input type="hidden" id="owner" name="owner" value="<?php echo $_SESSION['ID'];?>"/>
    <input class = "button " style="margin-left:3%;background:#333333;color:#decba4;border:none" type="button" 
    onclick ='updateHistory(this.value)'name="msg_send" value="Envoyer"></center>
</div>

</body>
</html>