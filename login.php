<?php
session_name("oa");
session_start();
if($_GET['action'] == "login") 
{
	$name = $_POST['user'];
	include 'db_connect.php';
	$user=mysql_query("SELECT * FROM users WHERE id='".$name."'");
	if(mysql_num_rows($user) >= 1) 
	{
		$data = mysql_fetch_array($user);
		if(md5($_POST['pass'])== $data['password'])
		{
			$_SESSION['username']=$name;
			$_SESSION['fname'] = $data['name'];
			$_SESSION['sname']=$data['familyName'];
			$_SESSION['type']=$data['userLevel'];
			$_SESSION['img']=$data['image'];
			$_SESSION['loginTime']= date("Y-m-d H:i:s");
			$q=mysql_query("INSERT INTO login (userID,login) values('".$_SESSION['username']."','".$_SESSION['loginTime']."')");
			header("Location: index.php");
		}
		else
		{
			header("Location: page_login.php?login=failed&cause=".urlencode('گذرواژه نادرست'));
		}
	}
	else
	{
		header("Location: page_login.php?login=failed&cause=".urlencode('نام کاربری نادرست'));
	}
}
else
{
	if(isset($_SESSION['username']) == false) {
		header("Location: page_login.php?login=failed&cause=error");
	}
}
?>

