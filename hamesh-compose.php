<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
include 'db_connect.php';
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
if(isset($_POST['letter_id']))
{
	$payload = "&letter=".$_POST['letter_id'];
}
else
{
	$payload="";
}
$content = $_POST['hamesh'];
//$letterContent = $_POST['letter_content'];
//$letterContent=$letterContent.$content;;
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
		{
			echo("هامش با موفقیت ارجاع شد");
			//$que = mysql_query("update letters SET context="$letterContent" where id="$_POST['letter_id']" ");
		}
		else
			echo("هامش با موفقیت ارجاع نشد");
	}
}
?>
