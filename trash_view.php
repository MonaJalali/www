<?php
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'"); 
if(isset($_GET['letter']) == false)
{
	header("Location: inbox.php");
}
		include 'db_connect.php';
		$q=mysql_query("SELECT * from letters where id='".$_GET['letter']."' AND trash='1'");
		if(mysql_num_rows($q) == 0)
			die('نامه ای یافت نشد.');
		$trash = mysql_fetch_array($q);
		$data=mysql_query("SELECT name, familyName FROM users WHERE id='".$letter['senderID']."'");
		$senderName = mysql_fetch_array($data);
		$data=mysql_query("SELECT name, familyName FROM users WHERE id='".$letter['recieverID']."'");
		$recieverName = mysql_fetch_array($data);
	echo('<div class ="row">	
		<div class="col-md-7">
			<p align = "right">از:'.$senderName['name'].' '.$senderName['familyName'].'</p>
			<p align = "right">به:'.$recieverName['name'].' '.$recieverName['familyName'].'</p>
			<p align = "right">موضوع:'.$letter['subject'].'</p>
		</div>
		<div class="col-md-5">
			<p align = "right">شماره:'.$letter['id'].'</p>
		</div>
	</div>
</div>
<div class="inbox-view">');
		echo (' <td class="view-message ">'.$letter['context'].'</td> ');
?>
<div class="inbox-view-info">
	<div class="row">
	<!--		<div class="btn-group">			
				<a href="forward.php?letter=<?php echo $letter['id']; ?>" class="btn blue">ارجاع<i class="fa fa-mail-forward"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn red" data-target="#full-width" data-toggle="modal">هامش<i class="fa fa-edit"></i></a>
			</div> -->
			<div class="btn-group">
				<a href="#" class="btn purple" onclick="del('<?php echo $letter['id']; ?>');">حذف <i class="fa fa-trash-o"></i></a>
			</div>
			<div class="btn-group">
				<a href="printLetter.php?letter=<?php echo $letter['id']; ?>" target="_blank" class="btn default">چاپ<i class="fa fa-file-o"></i></a>
			</div>
		</div>		
	</div>
</div>	
<script>
		function del(id)
		{
		  if (confirm('آیا می خواهید این نامه پاک شود؟'))
				window.location.href="deleteLetter.php?letDel="+id;
		}
</script>