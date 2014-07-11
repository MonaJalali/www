<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$conn = mysql_connect("localhost","root","");
	mysql_select_db("officeautomation",$conn);
	mysql_set_charset("utf8");
?>