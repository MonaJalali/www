<?php
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'");
	
include 'db_connect.php';
$users = mysql_query("select * from users");
$countUser = mysql_num_rows($users);
$totalWorkDone=array();//$countUser :tedad khunehaye array
for($i=0; $i<$countUser; $i++)
{	
	$user = mysql_fetch_array($users);
	//tedad forward
	$countForward = mysql_query("select count(*) from letters where senderID=".$user["id"]." AND parent<>NULL");
	print_r($countForward);
	//tedad hamesh
	$countHamesh = mysql_query("select count(*) from hamesh where senderID='".$user["id"]."'");

	//tedad error ha
	$countError = $user['errorNum'];
	//tedad kole nameha
	$countLetter =  mysql_query("select count(*) from letters where senderID='".$user["id"]."'");
	$totalWorkDone=$countHamesh+$countForward;
	$totalWork=$countLetter;
	

	//محاسبه عملکرد واقعی
	if($totalWork == 0)
		echo "نامه ای برای پاسخگویی وجود ندارد";
	else
	{
		$RP = $totalWorkDone/$totalWork;
		echo 'RP:'.$RP.'</br>';
	}
	/*
	echo 'count forward:'.$countForward;
//	echo '</br>';
	//echo 'Count hamesh:'.$countHamesh;
	//echo '</br>';
//	echo 'total work done: '.$totalWorkDone;
//	echo '</br>';
//	echo 'total work: '.$totalWork;
//	echo '</br>';
//	echo '</br>';echo '</br>';
	//echo '</br>';
	//echo $countError;
	echo '</br>';
	echo 'total work done: '.$totalWorkDone;
	echo '</br>';
	echo 'total work: '.$totalWork;
	echo '</br>';
	echo '</br>';echo '</br>';
	*/
}

?>