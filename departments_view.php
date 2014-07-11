<?php
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false) 
	header("Location: page_login.php charset=utf-8");
//else
	//$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'");
?>
<div class="inbox-view-info">
	<div class="row">
		
	</div>		
</div>
<?php
	include 'db_connect.php';
	$q = mysql_query("SELECT * from departments where id='".$_GET['department']."'");
	if(mysql_num_rows($q) == 0)
		die('بخشی یافت نشد');
	$dep = mysql_fetch_array($q);
	echo('
	<div >
	<form enctype="multipart/form-data" id="formUpdateUser" method="post" action="updateUser.php?action=update&user='.$user['id'].'" class="form-horizontal">
		<div class="form-body">
			<h3 class="form-section">ویرایش بخش</h3>
			<div class="row">
				<div class="col-md-6">
					<div id="divUser" class="form-group">
						<label class="control-label col-md-3">شناسه بخش</label>
						<div class="col-md-9">
							<input id="username" name="username" type="text" readonly="" class="form-control" value="'.$user['id'].'" onchange=chUser()>
							<span id="spanUser" class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<label class="control-label col-md-9" style="text-align:right">شناسه بخش قابل تغییر نمی باشد.</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">نام بخش</label>
						<div class="col-md-9">
							<input id="firstName" name="firstName" type="text" class="form-control">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['name'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-actions fluid">
			<div class="row">
				<div class="col-md-6">
					<div class="col-md-offset-3 col-md-9">
						<button type="submit" class="btn green" onclick=checkForm()>اعمال تغییرات</button>
						<button type="button" class="btn default" onclick="window.location.href=\'/showDepartments.php\'">لغو</button>
					</div>
				</div>
				<div class="col-md-6"></div>
			</div>
		</div>
	</form>
	</div>
	');?>
	

	<script>
		var user = document.getElementById('username');
		function chUser()
		{
			if(isNaN(user.value))
			{
				document.getElementById('divUser').setAttribute('class', 'form-group has-error');
				document.getElementById('spanUser').innerHTML = "نام کاربری نمیتواند شامل حرف باشد";
			}
			else if( user.value == "" )
			{
				document.getElementById('divUser').setAttribute('class', 'form-group has-error');
				document.getElementById('spanUser').innerHTML = "نام کاربری نمیتواند خالی باشد";
			}
			else
			{
				document.getElementById('divUser').setAttribute('class', 'form-group');
				document.getElementById('spanUser').innerHTML = "";
			}
		}
		function checkForm()
		{
			if(user.value == "")
				alert("نام کاربری نمیتواند خالی باشد");
			else
				document.getElementById('formUpdateUser').submit();
		}
	</script>