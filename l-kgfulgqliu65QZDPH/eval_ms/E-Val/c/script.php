<script>

function see_rdv(){
	alert(<?php
		$array = get_doc_rdv($_SESSION['user_id'], $timestamp);
		echo "<pre>";
		print_r($res);
		echo "<pre>";
		?>);

}
</script>
