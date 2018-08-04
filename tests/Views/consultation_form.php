<div id="txtHint"></div>
<div class="row">
    <div class = "col-xs-12" style="width:40%;display:inline-block;margin:auto;margin-top:70px">
<select class="form-control space-bottom" onclick="getHistory()" id="animal"name="target" required>
<?php 
         foreach($app_rows as $key0 => $value0){
            unset($value0['history'],$value0['canceled']);
            $name = implode(' ',$value0);
            foreach($value0 as $key =>$value){
                    if($key == 'pet_name'){
                        echo '<option value="'.$name.'">'.$name.'</option>';
                    }
            }
        }
?>
</select><br><div class ="container">
<form action="#">
<center style="font-size:15px;color:#decba4">
    Ajouter/modifier un historique :<br><br> <pre><textarea rows="8" cols="50" id="history" minlength="5" required name="history"/><?php if(!empty($patients_rows)){ printf($patients_rows[0]['history']);} ?></textarea></pre><br><br>
    Raisons de la consultation :<br><br> <pre><textarea type="text" rows="3" minlength="5" cols="50" id="reason" required name="reason"/></textarea></pre>
    Examens :<br><br> <pre><textarea rows="8" cols="50" id="exams" required minlength="5" name="exams"/></textarea></pre>
    Diagnostic :<br><br> <pre><textarea rows="2" cols="50" id="diagnosis" minlength="5" required name="diagnosis"/></textarea></pre>
    Traitement :<br><br> <pre><textarea rows="2" cols="50" id="treatment" minlength="5" required name="treatment"/></textarea></pre>
    Notes :<br><br> <pre><textarea rows="2" cols="50" id="notes" required minlength="5" name="notes"/></textarea></pre>
    Poids : <br><br> <pre><input type="number" id="weight" style="width:65px;height:40px" required name ="weight" min="0" max="500" step="0.1"/></textarea></pre>
    Salle de consultation numéro : <br><br> <pre><input type="number" required id="room" style="width:65px;height:40px" name ="room" min="1" max="6" step="1"/></textarea></pre></center>
    <input type="hidden" id="owner" name="owner" value="<?php echo $_SESSION['ID'];?>"/>
    <input class = "button" style="width:40%;display:inline-block;margin:auto;margin-left:130px;margin-bottom:10px;background:#333333;color:#decba4;border:none" type="submit" 
    onclick ='insertConsultation(this.value)'name="msg_send" value="Envoyer">
    </form>
</div>


</body>
</html>