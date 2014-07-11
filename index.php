<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_name("oa");
session_start();
include 'db_connect.php';
if(isset($_SESSION['username']) == false) 
	header("Location: page_login.php");
else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'");

?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0.2
Version: 1.5.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<title>سیستم اتوماسیون اداری | Admin Dashboard </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="MobileOptimized" content="320">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->          
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
	<link href="assets/plugins/gritter/css/jquery.gritter-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL PLUGIN STYLES -->
	<!-- BEGIN THEME STYLES --> 
	<link href="assets/css/style-metronic-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style-responsive-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/plugins-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/pages/tasks-rtl.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/themes/default-rtl.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="assets/css/custom-rtl.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed" onload="notifer()">
	<!-- BEGIN HEADER -->   
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="header-inner">
			<!-- BEGIN LOGO -->  
			<a class="navbar-brand" href="index.php">
			<img src="assets/img/logo.png" alt="logo" class="img-responsive" />
			</a>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER --> 
			<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="assets/img/menu-toggler.png" alt="" />
			</a> 
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<ul class="nav navbar-nav pull-right">
				
				<!-- BEGIN INBOX DROPDOWN -->
				<li class="dropdown" id="header_inbox_bar" onclick="notifer()">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" 	data-close-others="true"  >
					<i class="fa fa-envelope"></i>
					<span class="badge" id="notifNum">0</span>
					</a>
					<ul class="dropdown-menu extended inbox" id="notifList" >
						
						
					</ul>
				</li>
				<!-- END INBOX DROPDOWN -->
				
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" width="30px" height="30px" src="<?php echo $_SESSION['img']; ?>"/>
					<span class="username">
					<?php 
					echo $_SESSION['fname']." ".$_SESSION['sname'];
					?>
					</span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="userEdit.php"><i class="fa fa-user"></i>مشخصات کاربری</a></li>
						<li><a href="inbox.php"><i class="fa fa-envelope"></i>کارتابل</a></li>
						<li class="divider"></li>
						<li><a href="page_login.php"><i class="fa fa-key"></i>خروج</a></li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<div class="clearfix"></div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        
			<ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON --> 
				</li>
				<li>
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove"></a>
								<input type="text" placeholder="جست و جو"/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start active">
					<a href="index.php">
					<i class="fa fa-home"></i> 
					<span class="title">داشبورد</span>
					<span class="selected"></span>
					</a>
				</li>
				<li>
					<a href="compose.php">
					<i class="fa fa-cogs"></i> 
					<span class="title">ایجاد نامه</span>
					</a>
				</li>
				<li>
					<a href="createGroup.php">
					<i class="fa fa-cogs"></i> 
					<span class="title">ایجاد گروه</span>
					</a>
				</li>
				<li>
					<a href="inbox.php">
					<i class="fa fa-cogs"></i> 
					<span class="title">کارتابل</span>
					</a>
				</li>
				<li class="last open">
					<a href="evaluation.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">ارزشیابی</span>
					</a>
					<ul class="sub-menu">
						<li>
						<a href="evaluation_form.php"><span class="title">اطلاعات پایه</span></a>
						</li>
						<li>
						<a href="evaluation_charts.php"><span class="title">گزارش ها</span></a>
						<ul class="sub-menu">
							<li>
								<a href=""><span class="title">ارزیابی از طریق سیستم</span></a>
							</li>
							<li>
								<a href=""><span class="title">کارنامه ارزشیابی</span></a>
							</li>
						</ul>
						</li>
					</ul>
				</li>
				<?php
					 if($_SESSION['type']!= "admin")
					{	
						echo "<!--" ;
					}
				?>
				<li class="last ">
					<a href="createUser.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">ایجاد کاربر</span>
					</a>
				</li>
				<li class="last ">
					<a href="createOccupation.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">ایجاد سمت</span>
					</a>
				</li>
				<li class="last ">
					<a href="showUsers.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">نمایش کاربران</span>
					</a>
				</li>
				<li class="last ">
					<a href="showDepartments.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">نمایش بخش ها</span>
					</a>
				</li>
				<li class="last ">
					<a href="showOccupation.php">
					<i class="fa fa-bar-chart-o"></i> 
					<span class="title">نمایش سمت ها</span>
					</a>
				</li>
				<?php
					 if($_SESSION['type']!= "admin")
					{	
						echo "-->" ;
					}
				?>
				<li class="tooltips" data-placement="left" data-original-title="Frontend&nbsp;Theme For&nbsp;Metronic&nbsp;Admin">
					<a href="userEdit.php">
					<i class="fa fa-gift"></i> 
					<span class="title">مشخصات کاربری</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->               
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm">
				<div class="toggler"></div>
				<div class="toggler-close"></div>
				<div class="theme-options">
					<div class="theme-option theme-colors clearfix">
						<span>THEME COLOR</span>
						<ul>
							<li class="color-black current color-default" data-style="default-rtl"></li>
							<li class="color-blue" data-style="blue-rtl"></li>
							<li class="color-brown" data-style="brown-rtl"></li>
							<li class="color-purple" data-style="purple-rtl"></li>
							<li class="color-grey" data-style="grey-rtl"></li>
							<li class="color-white color-light" data-style="light-rtl"></li>
						</ul>
					</div>
					<div class="theme-option">
						<span>Layout</span>
						<select class="layout-option form-control input-small">
							<option value="fluid" selected="selected">Fluid</option>
							<option value="boxed">Boxed</option>
						</select>
					</div>
					<div class="theme-option">
						<span>Header</span>
						<select class="header-option form-control input-small">
							<option value="fixed" selected="selected">Fixed</option>
							<option value="default">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>Sidebar</span>
						<select class="sidebar-option form-control input-small">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>Footer</span>
						<select class="footer-option form-control input-small">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
				</div>
			</div>
			<!-- END BEGIN STYLE CUSTOMIZER -->  
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					
					<h3 class="page-title">						
						اتوماسیون اداری
						<small>دانشگاه علم و فرهنگ</small>
					</h3>
					
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.php">خانه</a> 
							<i class="fa fa-angle-left"></i>
						</li>
						<li><a href="#">داشبورد</a></li>
						<li class="pull-right">
							<div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
								<i class="fa fa-calendar"></i>
								<span></span>
								<i class="fa fa-angle-down"></i>
							</div>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
		
			<!-- BEGIN DASHBOARD STATS -->
			<?php
			include 'db_connect.php';
			$q1=mysql_query("SELECT count(*) FROM letters WHERE recieverID='".$_SESSION['username']."' AND priority = '1'");
			$aadi=mysql_fetch_array($q1);
			$q2=mysql_query("SELECT count(*) FROM letters WHERE recieverID='".$_SESSION['username']."' AND priority = '2'");
			$fori=mysql_fetch_array($q2);
			$q3=mysql_query("SELECT count(*) FROM letters WHERE recieverID='".$_SESSION['username']."' AND priority = '3'");
			$aani=mysql_fetch_array($q3);
			?>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number"><?php echo $aadi[0]; ?></div>
							<div class="desc"> نامه های عادی </div>
						</div>
						<a class="more" href="inbox.php?priority=1">
						مشاهده نامه های عادی<i class="m-icon-swapright m-icon-white"></i>
						</a>                 
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number"><?php echo $fori[0]; ?></div>
							<div class="desc"> نامه های فوری </div>
						</div>
						<a class="more" href="inbox.php?priority=2">
						مشاهده نامه های فوری<i class="m-icon-swapright m-icon-white"></i>
						</a>                 
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number"><?php echo $aani[0]; ?></div>
							<div class="desc">نامه های آنی</div>
						</div>
						<a class="more" href="inbox.php?priority=3">
						مشاهده نامه های آنی<i class="m-icon-swapright m-icon-white"></i>
						</a>                 
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number"></div>
							<div class="desc">کارنامه ارزشیابی من</div>
						</div>
						<a class="more" href="evaluation.php">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>                 
					</div>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix"></div>
			<div class="row"><!-- اولین ردیف-->
				<div class="col-md-6 col-sm-6"> <!-- feeds -->
					<!-- BEGIN PORTLET-->
					<div class="portlet paddingless">
						<div class="portlet-body">
							<!--BEGIN TABS-->
							<div class="tabbable tabbable-custom">
								<ul class="nav nav-tabs">
							<!--END TABS-->
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
				<div class="col-md-6 col-sm-6"> <!-- site visits -->	
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row ">
				<div class="col-md-6 col-sm-6" style="display: block; position: relative; top:55%; left:-25%">
					<div class="portlet box green tasks-widget">
						<div class="portlet-title">
							<div class="caption"><i class="fa fa-check"></i>آخرین نامه ها</div>
							<div class="tools">
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
								<a href="" class="reload"></a>
							</div>
							<div class="actions">
								<div class="btn-group">
									<a class="btn default btn-xs" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									More
									<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li><a href="#"><i class="i"></i> All Project</a></li>
										<li class="divider"></li>
										<li><a href="#">AirAsia</a></li>
										<li><a href="#">Cruise</a></li>
										<li><a href="#">HSBC</a></li>
										<li class="divider"></li>
										<li><a href="#">Pending <span class="badge badge-important">4</span></a></li>
										<li><a href="#">Completed <span class="badge badge-success">12</span></a></li>
										<li><a href="#">Overdue <span class="badge badge-warning">9</span></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="task-content">
								<div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="1">
									<!-- START TASK LIST -->
									<ul class="task-list">
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value="" style="" />                                       
											</div>
											<div class="task-title">
												<span class="task-title-sp">Present 2013 Year IPO Statistics at Board Meeting</span>
												<span class="label label-sm label-success">Company</span>
												<span class="task-bell"><i class="fa fa-bell-o"></i></span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
													<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
														<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
														<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value="" style="" />                                       
											</div>
											<div class="task-title">
												<span class="task-title-sp">Hold An Interview for Marketing Manager Position</span>
												<span class="label label-sm label-danger">Marketing</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
													<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
														<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
														<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value="" style="" />                                       
											</div>
											<div class="task-title">
												<span class="task-title-sp">AirAsia Intranet System Project Internal Meeting</span>
												<span class="label label-sm label-success">AirAsia</span>
												<span class="task-bell"><i class="fa fa-bell-o"></i></span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
													<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
														<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
														<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value="" style="" />                                       
											</div>
											<div class="task-title">
												<span class="task-title-sp">Technical Management Meeting</span>
												<span class="label label-sm label-warning">Company</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
														<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
														<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value="" style="" />                                       
											</div>
											<div class="task-title">
												<span class="task-title-sp">Kick-off Company CRM Mobile App Development</span>
												<span class="label label-sm label-info">Internal Products</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
														<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
														<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value="" style="" />                                       
											</div>
											<div class="task-title">
												<span class="task-title-sp">
												Prepare Commercial Offer For SmartVision Website Rewamp 
												</span>
												<span class="label label-sm label-danger">SmartVision</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
														<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
														<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value="" style="" />                                       
											</div>
											<div class="task-title">
												<span class="task-title-sp">Sign-Off The Comercial Agreement With AutoSmart</span>
												<span class="label label-sm label-default">AutoSmart</span>
												<span class="task-bell"><i class="fa fa-bell-o"></i></span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
														<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
														<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li>
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value="" style="" />                                       
											</div>
											<div class="task-title">
												<span class="task-title-sp">Company Staff Meeting</span>
												<span class="label label-sm label-success">Cruise</span>
												<span class="task-bell"><i class="fa fa-bell-o"></i></span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
														<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
														<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
													</ul>
												</div>
											</div>
										</li>
										<li class="last-line">
											<div class="task-checkbox">
												<input type="checkbox" class="liChild" value="" style="" />                                       
											</div>
											<div class="task-title">
												<span class="task-title-sp">KeenThemes Investment Discussion</span>
												<span class="label label-sm label-warning">KeenThemes</span>
											</div>
											<div class="task-config">
												<div class="task-config-btn btn-group">
													<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><i class="fa fa-cog"></i><i class="fa fa-angle-down"></i></a>
													<ul class="dropdown-menu pull-right">
														<li><a href="#"><i class="fa fa-check"></i> Complete</a></li>
														<li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
														<li><a href="#"><i class="fa fa-trash-o"></i> Cancel</a></li>
													</ul>
												</div>
											</div>
										</li>
									</ul>
									<!-- END START TASK LIST -->
								</div>
							</div>
							<div class="task-footer">
								<span class="pull-right">
								<a href="#">See All Tasks <i class="m-icon-swapright m-icon-gray"></i></a> &nbsp;
								</span>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<div class="clearfix"></div>			
			<div class="clearfix"></div>
			<div class="clearfix"></div>
		</div>
		<!-- END PAGE -->
	</div>
	
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			2013 &copy; Metronic by keenthemes.
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="fa fa-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   
	<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script> 
	<![endif]-->   
	<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>   
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>   
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>  
	<script src="assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
	<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>     
	<script src="assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
	<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
	<script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
	<script src="assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>  
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="assets/scripts/app.js" type="text/javascript"></script>
	<script src="assets/scripts/index.js" type="text/javascript"></script>
	<script src="assets/scripts/tasks.js" type="text/javascript"></script> 
	<script src="assets/scripts/myplugins.js" type="text/javascript"></script>	
	<!-- END PAGE LEVEL SCRIPTS -->  
	<script>
		jQuery(document).ready(function() {    
		   App.init(); // initlayout and core plugins
		   Index.init();
		   Index.initJQVMAP(); // init index page's custom scripts
		   Index.initCalendar(); // init index page's custom scripts
		   Index.initCharts(); // init index page's custom scripts
		   Index.initChat();
		   Index.initMiniCharts();
		   Index.initDashboardDaterange();
		   Index.initIntro();
		   Tasks.initDashboardWidget();
		});

		function compose()
		{
			document.getElementById("demo").innerHTML = Date();
		}
	</script>

	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>