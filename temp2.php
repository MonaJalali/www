<?php
	if($_GET['action'] == "act") 
	{
		print_r($_POST);
		echo (isset($_POST['name']));
		if($_POST['name'] == "")
			echo("name is null");
	}
?>