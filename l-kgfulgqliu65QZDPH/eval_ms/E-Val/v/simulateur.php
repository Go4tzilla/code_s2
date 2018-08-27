<form name="formx"  method="POST" action="">

<table width=30%>

<tr>
<td><b>Level</b></td>
<td><input type="number" size=4 maxlength=3 name="a"></td>
</tr>

<tr>
<td><b>Attack (or Special)</b></td>
<td><input type="number" size=4 maxlength=3 name="b"></td>
</tr>

<tr>
<td><b>ATTACK TYPE</b></td>
<td><select name="y" size=1>
<option value="1">Fire</option>
<option value="2">Water</option>
<option value="3">Normal</option>
<option value="4">Fight</option>
<option value="5">Flying</option>
<option value="6">Poison</option>
<option value="7">Ground</option>
<option value="8">Rock</option>
<option value="9">Bug</option>
<option value="10">Ghost</option>
<option value="11">Steel</option>
<option value="12">Grass</option>
<option value="13">Electr</option>
<option value="14">Psychic</option>
<option value="15">Ice</option>
<option value="16">Dragon</option>
<option value="17">Dark</option>
</select></td>
</tr>

<tr>
<td><b>Power</b></td>
<td><input type="number" size=4 maxlength=3 name="c"></td>
</tr>

<tr>
<td><b>Defense (or Special)</b></td>
<td><input type="number" size=4 maxlength=3 name="d"></td>
</tr>

<tr>
<td><b>STAB?</b></td>
<td><select name="e" size=1>
<option value="1">no</option>
<option value="1.5">yes</option>
</select></td>
</tr>

<tr>
<td><b>Type Modifiers</b></td>
<td><select name="f" size=1 width=20>
<option value="0.25">0.25</option>
<option value="0.5">0.5</option>
<option value="1" selected>1</option>
<option value="2">2</option>
<option value="4">4</option>
</select>
</td>
</tr>

<tr>
<td><b>WEATHER</b></td>
<td><select name="x" size=1>
<option value="1">no</option>
<option value="2">rain</option>
<option value="3">sun</option>
<option value="4">sand</option>
</select></td>
</tr>
</table>

<br>



<input type="submit" value="find damage" name='formx'/><!--onClick="calcdam(formx)"-->
</form>
<table width=40%>
<tr>
<td></td>
<td><b>Max</b></td>
<td><b>Avg</b></td>
<td><b>Min</b></td>
</tr>

<tr>
<td><b>Non-Critical Hit</b></td>
<td><input type "number" value="<?php if($flag) echo $toto[0];?>" name="max" size=4></td>
<td><input type "number" value="<?php if($flag) echo $toto[1];?>" name="avg" size=4></td>
<td><input type "number" value="<?php if($flag) echo $toto[2];?>" name="min" size=4></td>
</tr>

<tr>
<td><b>Critical Hit</b></td>
<td><input type "number" value="<?php if($flag) echo $toto[3];?>" name="chmax" size=4></td>
<td><input type "number" value="<?php if($flag) echo $toto[4];?>" name="chavg" size=4></td>
<td><input type "number" value="<?php if($flag) echo $toto[5];?>" name="chmin" size=4></td>
</tr>

</table>
