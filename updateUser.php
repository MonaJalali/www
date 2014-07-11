<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
	if($_GET['action'] == "update") 
	{
		include 'db_connect.php';
		if ($_FILES['image']['error'] == UPLOAD_ERR_OK){
			if (!preg_match('/gif|png|x-png|jpeg|jpg/', $_FILES['image']['type']) )
			   die('Only browser compatible images allowed');
			else if ($_FILES['image']['size'] >  200000)//max = 16384
			   die('Sorry file too large');
			$ext = substr($_FILES['image']['type'], 6);
			$path = "images/".$_POST['username'].".".$ext;
			if(!move_uploaded_file($_FILES['image']['tmp_name'], $path)) 
				header("Location: users_view.php?result=imgfail");
			$path = "'".$path."'";
		}
		else if($_FILES['image']['error'] ==  UPLOAD_ERR_NO_FILE){
				$path = "NULL";
		}
		$str = "UPDATE users SET".
			(($_POST['password'] != "")?(" `password`='".md5($_POST['password'])."',"):("")).
			(($_POST['firstName'] != "")?(" `name`='".$_POST['firstName']."',"):("")).
			(($_POST['familyName'] != "")?(" `familyName`='".$_POST['familyName']."',"):("")).
			(($_POST['fatherName'] != "")?(" `fatherName`='".$_POST['fatherName']."',"):("")).
			(($_POST['nationalCode'] != "")?(" `nationalCode`='".$_POST['nationalCode']."',"):("")).
			(($_POST['pob'] != "")?(" `pob`='".$_POST['pob']."',"):("")).
			(($_POST['gender'] != "")?(" `gender`='".$_POST['gender']."',"):("")).
			(($_POST['dob'] != "")?(" `dob`='".$_POST['pob']."',"):("")).
			(($_POST['maritalStatus'] != "")?(" `maritalStatus`='".$_POST['maritalStatus']."',"):("")).
			(($_POST['children'] != "")?(" `children`='".$_POST['children']."',"):("")).
			(($_POST['doe'] != "")?(" `doe`='".$_POST['doe']."',"):("")).
			(($_POST['departmentID'] != "")?(" `departmentID`='".$_POST['departmentID']."',"):("")).
			(($_POST['occupation'] != "")?(" `occupationID`='".$_POST['occupation']."',"):("")).
			(($_POST['userLevel'] != "")?(" `userLevel`='".$_POST['userLevel']."',"):("")).
			(($_POST['address'] != "")?(" `address`='".$_POST['address']."',"):("")).
			(($_POST['phone'] != "")?(" `phone`='".$_POST['phone']."',"):("")).
			(($_FILES['image']['error'] == UPLOAD_ERR_OK)?(" `image`=".$path):("")).
			"WHERE `id`='".$_GET['user']."'";
		$str = str_replace(",WHERE", " WHERE", $str);
		$quer = mysql_query($str);
		//echo "str: ".$str."</br>";
		if(mysql_affected_rows() == 1)
			header("Location: showUsers.php?result=success");
		else
			header("Location: showUsers.php?result=fail");
	}
?>