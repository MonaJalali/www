<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include 'db_connect.php';
$q=mysql_query("select * from departments");
$mnr=mysql_num_rows($q);
$mnf=mysql_num_fields($q);
for($i=0;$i<$mnr;$i++)
{
	for($j=0;$j<$mnf;$j++)
		$R[$j][$i] = mysql_result($q,$i,$j);
}
?>