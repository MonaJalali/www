<?php
session_name("oa");
session_start();
if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'");
function generate()
{
	$str = date("Y-m-d H:i:s");
	$temp = str_replace(" ", "", $str);
	$temp2 = str_replace("-", "", $temp);
	$var = str_replace(":", "", $temp2);
	$q=mysql_query("SELECT id FROM letters WHERE id LIKE ('".$var."%')");
	return $var.(mysql_num_rows($q)+1);
}
if($_GET['action'] == "bargasht") 
{
	$s="SELECT * FROM letters WHERE id='".$_GET['id']."'";
	echo $s;
	$bringletter= mysql_query($s);
	if(mysql_num_rows($q) >= 1)
	{
		$data=mysql_fetch_array($q);
		$str = "INSERT INTO letters (id,senderID,recieverID,sentDate,recievedDate,subject,context,private,priority,actionType,attachment)
				VALUES('".generate()."','".$_SESSION['username']."','".$data['senderID']."','".date("Y-m-d H:i:s")."',NULL, 'برگشت', 'نقص مدرک' ,'".$data['private']."', '"$data['priority']."', 'جهت بررسی و اقدام لازم', '".$data['attachment']."')";
		echo $str;
		$quer=mysql_query($str);
		if(mysql_affected_rows() == 1)
			header("Location: inbox.php?result=bargashtSuccess");
		else
			header("Location: compose.php?result=bargashtFailed");
	}
}
?>