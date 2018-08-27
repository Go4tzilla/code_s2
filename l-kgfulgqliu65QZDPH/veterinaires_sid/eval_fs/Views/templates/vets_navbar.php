<div class="topnav" id="myTopnav">
  <a href="./index.php?page=Members_lobby" class="active">Home</a>
  <a href="./index.php?page=Rest">Mes dispos</a>
  <a href="./index.php?page=Appointments">Mes rendez-vous</a>
  <a href="./index.php?page=Tracking">Suivi</a>
  <a href="./index.php?page=Messages">Messagerie</a>
  <a href="./index.php?page=Add_collab">Collaborateurs</a>
  <a href="./index.php?page=Settings"><img src='./Views/images/settings.svg' style="width: 35px; height:25px"></a>
  <a href="./index.php?page=Logout"><img src='./Views/images/logout.png' style="width: 35px; height:25px"></a>
</div>
<div class="container-fluid" style="width: 150px; height:50px"><?php if (isset($successmsg)) { success($successmsg); } ?>
<?php if (isset($errormsg)) { alert($errormsg); } ?>
</div>