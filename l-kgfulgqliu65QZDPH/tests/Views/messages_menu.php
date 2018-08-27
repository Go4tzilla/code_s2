<center><p>Ici vous pouvez contacter un praticien ou consulter un éventuel message laissé par votre médecin</p></center>
<div class="container" style="width: 150px; height:50px"><?php if (isset($successmsg)) { success($successmsg); } ?>
<?php if (isset($errormsg)) { alert($errormsg); } ?>
</div>
<div class="container-fluid" style="position: sticky; margin-top: -15px; float: right; width: 10%; margin-right:6%; height: 15%;"><form action="index.php?page=Messages" class ="button"name="messages" method="POST">
       <ul style="margin: 0 0 3px 0; padding:5px;"><li><div class="msg"><input class = "button " type="submit" name="msg" value="Convos"></div></li>
        <li><div class="msg"><input class = "button " type="submit" name="msg" value="Outbox"></div></li>
        <li><div class="msg"><input class = "button " type="submit" name="msg" value="Write"></div></li>
        </ul>
</form>
</div>