<div id="txtHint" style="margin:auto;display:block;margin-top:70px;"></div>
<select class="form-control space-bottom" id="send_to" style="margin:auto;display:block;margin-top:70px;width:275px"name="target" required>
<?php 
    foreach($contacts_rows as $key0 => $value0){
        $name = implode(' ',$value0);
        foreach($value0 as $key =>$value){
            if($key == 'email'){
                echo '<option " value="'.$value.'">'.$name.'</option>';
            }
        }
    }
?>
</select><div class ="container">
<center style="color:#decba4">
    Saisissez le message à envoyer :<br> <textarea rows="8" cols="50" id="msg" name="content" value =""></textarea><br>
    <input type="hidden" id="exp" name="sender" value="<?php echo $_SESSION['ID'];?>"/>
    <input class = "button " style="margin-left:3%;background:#333333;color:#decba4;border:none" type="button" onclick = 'insertMessage()'name="msg_send" value="Envoyer"></center>
</div>

</body>
</html>