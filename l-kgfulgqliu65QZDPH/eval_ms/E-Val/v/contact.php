<form method='post'>
	Select recipient :<br>
	<?php echo recipient() ?><br>
	<input type='text' name='subject' placeholder='Subject'><br>
	<textarea name='message' rows=10 cols =80 placeholder='Email text...'></textarea><br>
	<input type='submit' value='Send'>
	</form>
