<form method="post">
	Please fill the form to complete consultation reservation<br>
<?php get_animal($_SESSION['user_id']);?>
	
	<select name='lenght'><br>
		<option value=1 default>1 hour</option>
		<option value=2>2 hour</option>
	</select>
	<select name='ope'><br>
		<option value='consultation' default>Consultation</option>
		<option value='operation'>Operation</option>
	</select>
	
	<input type='hidden' name='time' value="<?php echo $_POST['time'];?>">
	<input type='hidden' name='medid' value='<?php echo $_POST['medid'];?>'>
		<input type='submit' value='Validate'>
</form>
