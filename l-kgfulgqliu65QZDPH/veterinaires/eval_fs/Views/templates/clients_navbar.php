<div class="topnav" id="myTopnav">
  <a href="./index.php?page=Members_lobby" class="active">Home</a>
  <a href="./index.php?page=New_appointment">Prendre RDV</a>
  <a href="./index.php?page=Appointments">Gestion RDV </a>
  <a href="./index.php?page=Tracking">Suivi</a>
  <a href="./index.php?page=Messages">Messagerie</a>
  <a href="./index.php?page=Settings"><img src='./Views/images/settings.svg' style="width: 15px; height:25px"></a>
  <a href="./index.php?page=Logout"><img src='./Views/images/logout.png' style="width: 15px; height:25px"></a>
</div>

<div class="container" style="width: 150px; height:50px"><?php if (isset($successmsg)) { success($successmsg); } ?>
<?php if (isset($errormsg)) { alert($errormsg); } ?>
</div>