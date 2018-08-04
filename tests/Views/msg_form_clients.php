<div class ="row">


    <div id ="txtHint"style="position:absolute;display:block;margin:auto;margin-top:80px">
        <p style="font-size:10px;width:100px">
        <?php if (isset($successmsg)) { success($successmsg); } ?>
        <?php if (isset($errormsg)) { alert($errormsg); } ?></p>
        
    </div>

<div class = "col-xs-6" style = "display:block;margin:auto;margin-top:70px">
<select class="form-control space-bottom" id="send_to" style="width:90%;margin-top:90px; position:center; margin:auto;margin-top:90px;display:block"name="target" required>
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
</select><br><br><div class ="container">
<center style="color:#decba4">
    Saisissez le message à envoyer :<br><br> <textarea rows="8" cols="50" id="msg" name="content" value =""></textarea><br><br>
    <input type="hidden" id="exp" name="sender" value="<?php echo $_SESSION['ID'];?>"/>
    <input class = "button " style="margin-left:3%;background:#333333;color:#decba4;border:none" type="button" onclick ='insertMessage(this.value)'name="msg_send" value="Envoyer"></center>
</div>
<div class ="col-xs-6 msg" style="position:fixed;right:0;margin-top:-310px;">
<div class="btn-group-vertical" style="top:90">
            <form role="form" action="" method="POST" name="edit" style="width:150px">
                <button class="btn btn-primary" name="msg" value="convos">Conversations</button>
                <button class="btn btn-primary" name="msg" value="outbox">Envoyés</button>
                <button class="btn btn-primary" name="msg" value="write">Ecrire</button>
            </form>
        </div>
</div>
</div>
</body>
</html>