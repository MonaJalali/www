<?php

include 'db_connect.php';
$users = mysql_query("select * from users");
$countUser = mysql_num_rows($users);
$totalWorkDone=array();//$countUser :tedad khunehaye array
for($i=0; $i<$countUser; $i++)
{	
	$user = mysql_fetch_array($users);
	//tedad forward
	$countForward = mysql_num_rows(mysql_query("select * from letters where senderID='".$user['id']."' AND parent <> 'NULL' "));
	//tedad hamesh
	$countHamesh = mysql_num_rows(mysql_query("select * from hamesh where senderID='".$user['id']."'"));
	//tedad error ha
	$countError = $user['errorNum'];
	//tedad kole nameha
	$countLetter =  mysql_num_rows(mysql_query("select * from letters where senderID='".$user['id']."'"));
	$totalWorkDone[$i]=$countHamesh+$countForward;
	$totalWork=$countLetter;
	//محاسبه عملکرد واقعی
	if($totalWork == 0)
		echo "نامه ای برای پاسخگویی وجود ندارد";
	else
	{
		$RP = $totalWorkDone[$i]/$totalWork;
		echo 'RP:'.$RP.'</br>';
	}
/*
echo 'Count hamesh:'.$countHamesh;
echo '</br>';
echo 'count forward:'.$countForward;
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