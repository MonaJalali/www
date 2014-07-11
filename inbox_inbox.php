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
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<style>
		.golabi{
			cursor:pointer;
		}
		.sib{
			cursor:default;
		}
	</style>
</head>
<table class="table table-striped table-advance table-hover">
	<thead>
		<tr style="width:100%;">
			<th colspan="6">
				<input type="checkbox" class="mail-checkbox mail-group-checkbox">
				<div class="btn-group">
					<a class="btn btn-sm blue" href="#" data-toggle="dropdown"> More
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
						<li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
						<li class="divider"></li>
						<li><a href="deleteLetter.php"><i class="fa fa-trash-o"></i> Delete</a></li>
					</ul>
				</div>
			</th>
			<th class="pagination-control" colspan="3">
				<?php
					$username = $_SESSION['username'];
					include 'db_connect.php';
					$myq="SELECT * FROM letters WHERE recieverID='".$username."' AND trash='0' ";
					if(isset($_GET['por']))
						if($_GET['por']>0)
							$myq = $myq." AND priority='".$_GET['por']."'";
					$letter=mysql_query($myq);
					$mnr=mysql_num_rows($letter);
				?>
				<span class="pagination-info"><?php echo "1-5"." از ".$mnr; ?></span>
				<a class="btn btn-sm blue"><i class="fa fa-angle-left"></i></a>
				<a class="btn btn-sm blue"><i class="fa fa-angle-right"></i></a>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			
			for($i = 0; $i < $mnr; $i++)
			{
				$data = mysql_fetch_array($letter);
				$sender=mysql_query("SELECT name, familyName FROM users WHERE id='".$data['senderID']."'");
				$recieverName = mysql_fetch_array($sender);
				echo
				(
					'<tr ');//onclick="viewMe('.$data['id'].',0)" dar tr bud!
					echo (($data['recievedDate']==NULL)?('class="unread"'):(''));
					echo('>
						<td class="inbox-small-cells">
							<input type="checkbox" id="khar" value="'.$data['id'].'" class="mail-checkbox">
						</td>
						<td class="inbox-small-cells">
							<button id="let'.$data['id'].'" class="btn default" name="demo_3" type="button" onclick="del(this.id)">Delete</button>
						</td>
						<td class="inbox-small-cells"><i class="fa fa-star"></i></td>
						<td class="view-message sib hidden-xs">'.$recieverName['name'].' '.$recieverName['familyName'].'</td>
						<td class="view-message  golabi" name="letS'.$data['id'].'" onclick="viewMe('.$data['id'].',0)">'.$data['subject'].'</td>
						<td class="view-message sib">'); echo (($data['private'] == '0') ? ('غیرمحرمانه') : ('محرمانه')); echo('</td>
						<td class="view-message sib">'.$data['actionType'].'</td>
						<td class="view-message sib inbox-small-cells"><i class="fa fa-paper-clip"></i></td>
						<td class="view-message sib text-right">'.$data['sentDate'].'</td>
					</tr>'
				);
			}
		?>
	</tbody>
</table>
<script type="text/javascript" src="assets/plugins/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery.blockui.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery.cookie.min.js"></script>
<script type="text/javascript" src="assets/plugins/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootbox/bootbox.min.js"></script>
<script src="assets/scripts/app.js"></script>
<script src="assets/scripts/ui-bootbox.js"></script>
<script>
jQuery(document).ready(function() {
// initiate layout and plugins
App.init();
UIBootbox.init();
});
</script>