<?php
session_name("oa");
session_start();
 if(isset($_SESSION['username']) == false)
	header("Location: page_login.php charset=utf-8");
else
	$bye=mysql_query("UPDATE login SET logout='".date("Y-m-d H:i:s")."' WHERE userID='".$_SESSION['username']."' AND login='".$_SESSION['loginTime']."'");
?>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
						<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
					</ul>
				</div>
			</th>
			<th class="pagination-control" colspan="3">
				<?php
					$username = $_SESSION['username'];
					include 'db_connect.php';
					$letter=mysql_query("SELECT * FROM letters WHERE (recieverID='".$username."' OR senderID='".$username."' ) AND trash='1'");
					$mnr=mysql_num_rows($letter);
				?>
				<span class="pagination-info"
				><?php echo "1-5"." از ".$mnr; ?>   </span>
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
					'<tr ');
					//echo (($data['recievedDate']==NULL)?('class="unread"'):(''));
					echo('>
						<td class="inbox-small-cells">
							<input type="checkbox" class="mail-checkbox">
						</td>
						<td class="inbox-small-cells"><i class="fa fa-star"></i></td>
						<td class="view-message  hidden-xs">'.$recieverName['name'].' '.$recieverName['familyName'].'</td>
						<td class="view-message" onclick="viewMe('.$data['id'].',0)">'.$data['subject'].'</td>
						<td class="view-message sib">'); echo (($data['private'] == '0') ? ('غیرمحرمانه') : ('محرمانه')); echo('</td>
						<td class="view-message">'.$data['actionType'].'</td>
						<td class="view-message  inbox-small-cells"><i class="fa fa-paper-clip"></i></td>
						<td class="view-message  text-right">'.$data['sentDate'].'</td>
					</tr>'
				);
			}
		?>
	</tbody>
</table>