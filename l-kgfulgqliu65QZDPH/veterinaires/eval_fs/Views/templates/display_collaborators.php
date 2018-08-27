<style>
table {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 12px;
    line-height: 24px;
    width: auto;
    margin-top:2%;
    margin-left:2%;
    margin-right:3%;
	text-align: left;
    float:bottom;
    position:relative;
    border:none;
    border-radius:10px;
}	
tbody{
    width:650px;
}

th {
	background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
	border-left: 1px solid #555;
	border-right: 1px solid #777;
	border-top: 1px solid #555;
	border-bottom: 1px solid #333;
	box-shadow: inset 0 1px 0 #999;
	color: #fff;
    font-weight: bold;
	padding: 10px 15px;
	position: relative;
	text-shadow: 0 1px 0 #000;	
}

th:after {
	background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
	content: '';
	display: block;
	height: 25%;
	left: 0;
	margin: 1px 0 0 0;
	position: absolute;
	top: 25%;
	width: 100%;
}

th:first-child {
	border-left: 1px solid #777;	
	box-shadow: inset 1px 1px 0 #999;
}

th:last-child {
	box-shadow: inset -1px 1px 0 #999;
}

td {
	border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;
	padding: 10px 15px;
	position: relative;
	transition: all 300ms;
}

td:first-child {
	box-shadow: inset 1px 0 0 #fff;
}	

td:last-child {
	border-right: 1px solid #e8e8e8;
	box-shadow: inset -1px 0 0 #fff;
}	

tr {
    background: url(https://jackrugile.com/images/misc/noise-diagonal.png);	
    width:850px;
    
}

tr:nth-child(odd) td {
	background: #f1f1f1 url(https://jackrugile.com/images/misc/noise-diagonal.png);	
    width: 150px;
}

tr:last-of-type td {
	box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
	box-shadow: inset 1px -1px 0 #fff;
}	

tr:last-of-type td:last-child {
	box-shadow: inset -1px -1px 0 #fff;
}	

tbody:hover td {
	color: transparent;
	text-shadow: 0 0 3px #aaa;
}

tbody:hover tr:hover td {
	color: #444;
	text-shadow: 0 1px 0 #fff;
}
</style>
<center><p>Ici vous pouvez consulter la liste des praticiens et leurs emplois du temps</p></center>
<?php if (isset($successmsg)) { success($successmsg); } ?>
<?php if (isset($errormsg)) { alert($errormsg); } ?>
<div class="container-fluid" style="position: sticky; margin-top: -15px; float: right; width: 10%; margin-right:6%; height: 15%;"><form action="index.php?page=Add_collab" class ="button" name="collab" method="POST">
       <ul style="margin: 0 0 3px 0; padding:5px;"><li><div class="msg"><input class = "button " type="submit" name="add" value="add_collab "></div></li>
        </ul>
</form>
</div>
<?php
echo'
<caption> Collaborateurs :</caption>
<table><thead><tr><th>Mail : </th><th>Nom :</th><th>Prénom : </th><th> Initiales :</th></tr></thead>
<tbody>';
        foreach($colls_rows as $key0 => $value0){
            foreach($value0 as $key => $value){
                if($key == "email"){
                    echo "<tr><td>{$value}</td>";
                } else if($key =="vet_init"){
                    echo "<td>{$value}</td></tr>";
                } else{
                    echo "<td>{$value}</td>";
                }
            }
        }
echo '</tbody></table>';
?>