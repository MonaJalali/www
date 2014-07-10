<?php
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'");
if(isset($_POST['letter_id']))
{
	$payload = "&letter=".$_POST['letter_id'];
}
else
{
	$payload="";
}
$content = $_POST['hamesh'];
include 'db_connect.php';
if($_GET['act'] == "cHamesh") 
{
	$query="insert into hamesh (content,senderID)
			values('".$content."','".$_SESSION['username']."')";		
	$q = mysql_query($query);
	if( mysql_affected_rows() == 1)
		echo("هامش با موفقیت ثبت شد");
	else
	{
		echo("هامش با موفقیت ثبت نشد");
	}
}
else if($_GET['act'] == "forward")
{
	if(isset($_POST['letter_id'])==false)
	{
		echo "نامه ای برای ارجاع مشخص نشده است";
		die();
	}
	else
	{
		$query="insert into hamesh (content,senderID)
			values('".$content."','".$_SESSION['username']."')";		
		$q = mysql_query($query);
		if( mysql_affected_rows() == 0)
		{
			echo("هامش با موفقیت ثبت نشد");
			die(); 
		}
		$hameshID = mysql_insert_id();
		$quer =mysql_query("insert into letterhamesh (letterID,hameshID) values ('".$_POST['letter_id']."','".$hameshID."')");
		if( mysql_affected_rows() == 1)
			echo("هامش با موفقیت ارجاع شد");
		else
			echo("هامش با موفقیت ارجاع نشد");
	}
}
?>
