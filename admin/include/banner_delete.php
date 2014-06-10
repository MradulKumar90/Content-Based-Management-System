<?php
    $db = mysql_connect('localhost','root','');
	$database = mysql_select_db('admin');
	if(isset($_REQUEST['delete']))
	{
		$id=$_REQUEST['delete'];
		mysql_query("DELETE FROM `banner_manager` WHERE `id` = '$id'");
		echo mysql_error();	
	    header("Location: ../banner_manager.php?value=1");
	}
?>
