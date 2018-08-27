Update Personal info
<form method='post'>
		
	<input type='hidden' name='perso' value=1>

<input type='password' name='pass1'>
<input type='password' name='pass2'>Password: Please type it twice<br>
<input type='text' name='mail'>Email<br>
	<input type='submit' value='Submit Changes'>
	
</form>
<br><br>
Add a pet
<form method='post'>

	<input type='hidden' name='pet' value=1'>

<input type='text' name='petname'required>Name<br>
<?php echo get_race(); ?>Race<br>
<?php echo get_sex(); ?>Sex<br>
<input type='date' name='birth' required>Birth Date<br>
<input type='text' name='immat' required>Immatriculation number<br>
<input type='submit' value='Save'><br>
</form>
