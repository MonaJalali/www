<?php
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'");
?>
<div class="inbox-view-info">
	<div class="row">
			<div class="btn-group">			
				<a href="#" class="btn blue">ارجاع <i class="fa fa-reply"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn red">هامش <i class="fa fa-edit"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn green">اقدام <i class="fa fa-hand-o-right"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn yellow">بایگانی <i class="fa fa-archive"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn purple">حذف <i class="fa fa-delete"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn dark">گردش نامه <i class="fa fa-edit"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn blue">بازگشت <i class="fa-arrow-left"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn default">چاپ <i class="fa fa-file-o"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn green">جستجو <i class="fa fa-search"></i></a>
			</div>
			<div class="btn-group">
				<a href="#" class="btn blue">button <i class=""></i></a>
			</div>
		</div>		
	</div>
	<div class ="row">	
		<div class="col-md-7">
			<p align = "right">از:</p>
			<p align = "right">به:</p>
			<p align = "right">موضوع:</p>
		</div>
		<div class="col-md-5">
			<p align = "right">شماره:</p>
			<p align = "right">تاریخ:</p>
			<p align = "right">پیوست:</p>
		</div>
	</div>
</div>
<div class="inbox-view">
<?php
	include 'db_connect.php';
	$q=mysql_query("SELECT * from drafts where id='".$_GET['letter']."'");
	if(mysql_num_rows($q) > 0)
	{
		$letter = mysql_fetch_array($q);
		echo (' <td class="view-message ">'.$letter['context'].'</td> ');
		//$quer = mysql_query("UPDATE");
	}
?>
<!--<p><strong>Lorem ipsum</strong>dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et <a href="#">iusto odio dignissim</a> qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>
<p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</p>
<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
</div> -->
<hr>
<div class="inbox-attached">
<div class="margin-bottom-15">
<span>3 attachments —</span> 
<a href="#">Download all attachments</a>   
<a href="#">View all images</a>   
</div>
<div class="margin-bottom-25">
<img src="assets/img/gallery/image4.jpg">
<div>
<strong>image4.jpg</strong>
<span>173K</span>
<a href="#">View</a>
<a href="#">Download</a>
</div>
</div>
<div class="margin-bottom-25">
<img src="assets/img/photo2.jpg">
<div>
<strong>IMAG0705.jpg</strong>
<span>14K</span>
<a href="#">View</a>
<a href="#">Download</a>
</div>
</div>
<div class="margin-bottom-25">
<img src="assets/img/gallery/image5.jpg">
<div>
<strong>test.jpg</strong>
<span>132K</span>
<a href="#">View</a>
<a href="#">Download</a>
</div>
</div>
</div>