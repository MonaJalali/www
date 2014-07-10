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
	$q = mysql_query("SELECT * from users where id='".$_GET['user']."'");
	if(mysql_num_rows($q) == 0)
		die('کاربری یافت نشد.');
	$user = mysql_fetch_array($q);
	$qu = mysql_query("SELECT * FROM occupation WHERE id='".$user['occupationID']."'");
	$occu = mysql_fetch_array($qu);
	$quer = mysql_query("SELECT * FROM departments WHERE id='".$user['departmentID']."'");
	$dep = mysql_fetch_array($quer);
	echo('
	<div >
	<form enctype="multipart/form-data" id="formUpdateUser" method="post" action="updateUser.php?action=update&user='.$user['id'].'" class="form-horizontal">
		<div class="form-body">
			<h3 class="form-section">مشخصات فردی</h3>
			<div class="row">
				<div class="col-md-6">
					<div id="divUser" class="form-group">
						<label class="control-label col-md-3">نام کاربری</label>
						<div class="col-md-9">
							<input id="username" name="username" type="text" readonly="" class="form-control" value="'.$user['id'].'" onchange=chUser()>
							<span id="spanUser" class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<label class="control-label col-md-9" style="text-align:right">نام کاربری قابل تغییر نمی باشد.</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div id="divPass" class="form-group">
						<label class="control-label col-md-3">گذرواژه</label>
						<div class="col-md-9">
							<input id="password" name="password" type="password" class="form-control" onchange=chPass()>
							<span id="spanPass" class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<label class="control-label col-md-9" style="text-align:right">در صورت تمایل می توانید گذرواژه جدید وارد کنید.</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">نام</label>
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
			<div class="row">				
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">نام خانوادگی</label>
						<div class="col-md-9">
							<input id="familyName" name="familyName" type="text" class="form-control">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['familyName'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">نام پدر</label>
						<div class="col-md-9">
							<input id="fatherName" name="fatherName" type="text" class="form-control">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['fatherName'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div id="divNationalC" class="form-group">
						<label class="control-label col-md-3">شماره شناسنامه</label>
						<div class="col-md-9">
							<input id="nationalCode" name="nationalCode" maxlength="10" type="text" class="form-control" onchange=chNationalC()>
							<span id="spanNationalC" class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div id="divNationalC" class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['nationalCode'].'">
							<span id="" class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">محل تولد</label>
						<div class="col-md-9">
							<select id="pob" name="pob" class="form-control">
								<option value="">محل تولد را انتخاب کنید</option>
								<option value="تهران">تهران</option>
								<option value="شیراز">شیراز</option>
								<option value="اصفهان">اصفهان</option>
								<option value="مشهد">مشهد</option>
								<option value="تبریز">تبریز</option>
								<option value="کرج">کرج</option>
								<option value="اهواز">اهواز</option>
								<option value="قم">قم</option>
								<option value="کرمانشاه">کرمانشاه</option>
								<option value="رشت">رشت</option>
								<option value="ارومیه">ارومیه</option>
								<option value="زاهدان">زاهدان</option>
								<option value="اراک">اراک</option>
								<option value="همدان">همدان</option>
								<option value="سایر">سایر</option>
							</select>
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['pob'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div id="divMelliC" class="form-group">
						<label class="control-label col-md-3">کد ملی</label>
						<div class="col-md-9">
							<input id="melliCode" name="melliCode" maxlength="10" type="text" class="form-control" onchange=chMelliC()>
							<span id="spanMelliC" class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div id="divMelliC" class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['melliCode'].'">
							<span id="" class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">جنسیت</label>
						<div class="col-md-9">
							<select id="gender" name="gender" class="form-control">
								<option value="">جنسیت را انتخاب کنید</option>
								<option value="male">مرد</option>
								<option value="female">زن</option>
							</select>
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['gender'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">تاریخ تولد</label>
						<div class="col-md-9">
							<input id="dob" name="dob" type="text" maxlength="10" class="form-control" placeholder="YYYY-MM-DD">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['dob'].'">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">وضعیت تأهل</label>
						<div class="col-md-9">
							<select id="maritalStatus" name="maritalStatus" class="form-control">
								<option value="">وضعیت تأهل را انتخاب کنید</option>
								<option value="1">متأهل</option>
								<option value="0">مجرد</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.($user['maritalStatus']=="1" ? "متاهل" : "مجرد").'">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">تعداد فرزندان</label>
						<div class="col-md-9">
							<input id="children" name="children" maxlength="2" type="text" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['children'].'">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">تاریخ استخدام</label>
						<div class="col-md-9">
							<input id="doe" name="doe" type="text" maxlength="10" class="form-control" placeholder="YYYY-MM-DD">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['doe'].'">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">بخش</label>
						<div class="col-md-9">
							<select id="departmentID" name="departmentID" class="form-control">
								<option value="">بخش را انتخاب کنید</option>');
								for($i = 0; $i < mysql_num_rows($quer); $i++)
								{
									echo ('<option value="'.$dep['id'].'">'.$dep['name'].'</option>');
								}
							echo('</select>
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$dep['name'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">سمت</label>
						<div class="col-md-9">
							<select id="occupation" name="occupation" class="form-control">
							<option value="">سمت را انتخاب کنید</option>');
								for($i = 0; $i < mysql_num_rows($qu); $i++)
								{
									echo ('<option value="'.$occu['id'].'">'.$occu['name'].'</option>');
								}
							echo('</select>
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input name="" id="" type="text" readonly="" class="form-control" value="'.$occu['name'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">سطح دسترسی</label>
						<div class="col-md-9">
							<div class="radio-list">                                                
								<label class="radio-inline">
								<div class="radio"><span><input type="radio" name="userLevel" id="baygani" value="baygani"></span></div>
								بایگانی
								</label>
								<label class="radio-inline">
								<div class="radio"><span class="checked"><input type="radio" name="userLevel" id="normal" value="normal" checked=""></span></div>
								نرمال
								</label>  
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input name="" id="" type="text" readonly="" class="form-control" value="'.$user['userLevel'].'">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">آدرس</label>
						<div class="col-md-9">
							<input id="address" name="address" type="text" class="form-control">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['address'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">شماره تماس</label>
						<div class="col-md-9">
							<input id="phone" name="phone" maxlength="11" type="text" class="form-control" placeholder="02144444444">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<input id="" name="" type="text" readonly="" class="form-control" value="'.$user['phone'].'">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-3">عکس</label>
						<div class="col-md-9">
							<input id="image" name="image" type="file" placeholder="عکس پرسنلی">
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-md-9">
							<img id="" name="" width="64px" height="64px" type="file" src="'.$user['image'].'">
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
						<button type="button" class="btn default" onclick="window.location.href=\'/showUsers.php\'">لغو</button>
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
		var pass = document.getElementById('password');
		var firstN = document.getElementById('firstName');
		var lastN = document.getElementById('familyName');
		var fatherN = document.getElementById('fatherName');
		var nationalC = document.getElementById('nationalCode');
		var pob = document.getElementById('pob');
		var melliC = document.getElementById('melliCode');
		var dob = document.getElementById('dob');
		var children = document.getElementById('children');
		var doe = document.getElementById('fatherName');
		var address = document.getElementById('address');///any other fields?
		var phone = document.getElementById('phone');
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
		function chNationalC()
		{
			if(isNaN(nationalC.value))
			{
				document.getElementById('divNationalC').setAttribute('class', 'form-group has-error');
				document.getElementById('spanNationalC').innerHTML = "شماره شناسنامه نمیتواند شامل حرف باشد";
			}
			else if(nationalC.value == "" )
			{
				document.getElementById('divNationalC').setAttribute('class', 'form-group has-error');
				document.getElementById('spanNationalC').innerHTML = "شماره شناسنامه نمیتواند خالی باشد";
			}
			else
			{
				document.getElementById('divNationalC').setAttribute('class', 'form-group');
				document.getElementById('spanNationalC').innerHTML = "";
			}
		}
		function chMelliC()
		{
			if(isNaN(melliC.value))
			{
				document.getElementById('divMelliC').setAttribute('class', 'form-group has-error');
				document.getElementById('spanMelliC').innerHTML = "کد ملی نمیتواند شامل حرف باشد";
			}
			else if(melliC.value == "")
			{
				document.getElementById('divMelliC').setAttribute('class', 'form-group has-error');
				document.getElementById('spanMelliC').innerHTML = "کد ملی نمیتواند خالی باشد";
			}
			else
			{
				document.getElementById('divNationalC').setAttribute('class', 'form-group');
				document.getElementById('spanNationalC').innerHTML = "";
			}
		}
		function checkForm()
		{
			if(user.value == "")
				alert("نام کاربری نمیتواند خالی باشد");
			else if(pass.value == "")
				alert("گذرواژه نمیتواند خالی باشد");
			else if(firstN.value == "")
				alert("نام نمیتواند خالی باشد");
			else if(lastN.value == "")
				alert("نام خانوادگی نمیتواند خالی باشد");
			else if(fatherN.value == "")
				alert("نام پدر نمیتواند خالی باشد");
			else if(nationalC.value == "")
				alert("شماره شناسنامه نمیتواند خالی باشد");
			else if(pob.value == "")
				alert("محل تولد نمیتواند خالی باشد");
			else if(melliC.value == "")
				alert("کد ملی نمیتواند خالی باشد");
			else if(dob.value == "")
				alert("تاریخ تولد نمیتواند خالی باشد");
			else if(doe.value == "")
				alert("تاریخ استخدام نمیتواند خالی باشد");
			else if(address.value == "")
				alert("آدرس نمیتواند خالی باشد");
			else if(phone.value == "")
				alert("شماره تماس نمیتواند خالی باشد");
			else if(!isNaN(user))
				alert("نام کاربری باید شماره پرسنلی کاربر باشد");
			else if(!isNaN(nationalC))
				alert("شماره شناسنامه درست وارد نشده است");
			else if(!isNaN(melliC) || melliC.length < 10)
				alert("کد ملی درست وارد نشده است");
			else
				document.getElementById('formUpdateUser').submit();
		}
	</script>