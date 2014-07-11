<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
	include 'db_connect.php';
	$_GET['letDel'];
	$q = "UPDATE letters SET trash=1 where id='".$_GET['letDel']."'";
	$delete = mysql_query($q);
	if(mysql_affected_rows() == 1) 
	{
		header("Location: inbox.php?result=success");
	}
	else
	{
		header("Location: inbox.php?result=fail");
	}
?>