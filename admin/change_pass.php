<?php
session_start();
include('include/admin_database.php');
$name = $_SESSION['admin'];
$sql3 = mysql_query("SELECT * FROM `users_regisration` WHERE `E-mail`='$name'");
$row3 = mysql_fetch_array($sql3);

if(!$_SESSION['admin'])
{
	header("Location:index.PHP?error=Session Expired!");
}
if($_SERVER['REQUEST_METHOD']=="POST")
{
	if(isset($_REQUEST['submit']))
	{   
		$o=$_REQUEST['old'];
		$n1=$_REQUEST['new1'];
		$n2=$_REQUEST['new2'];
		if( $n1 == $n2)
		{   $sql1 = mysql_query("SELECT `Name`, `Password`, `E-mail`, `Phone no`, `photo` FROM `users_regisration` WHERE `Password`='$o'");
		 $row = mysql_num_rows($sql1);
		 
		   if($row>0)
			   {
			  $sql2 = mysql_query("UPDATE `users_regisration` SET `Password`='$n2' WHERE `Password`='$o'");
			 ?><script> 
			 alert ("password change successfully");
			 window.location.assign("change_pass.php");</script><?php
				
			   }
			else
			   {
				   ?><script> 
			 alert ("Old Password is wrong");
			 window.location.assign("change_pass.php");</script><?php
				
			   }
		}
		else
		{
		    ?><script> 
			 alert ("Missmatch of New Password");
			 window.location.assign("change_pass.php");</script><?php
		  
		}
		
		mysql_error();
	}
}
if(isset($_GET['logout']))
	{
		unset($_SESSION['admin']);
		if(!$_SESSION['admin'])
		{
			header("Location:index.php?error=Logout Successfully");
		}
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="style/menu.css" rel="stylesheet" type="text/css" />
<link href="style/sql_menu.css" rel="stylesheet" type="text/css" />
<title>Untitled Document</title>

</head>
<body style="background-image:url(upload/Admin_bg.jpg); background-repeat:repeat">
<div id="container" style="width:1100px; height:800px; margin:0px;">

<div id="top" style="width:1010px; margin:0px 5px; height:50px; text-align:right; float:left; padding:30px 40px 10px 40px;">
Welcome : <?php echo $_SESSION['admin'];?> <img src="<?php echo $row3['photo'];?>" alt"" style="width:50px; height:50px;" /></div>

<?php include('include/admin_menu.php');?>

<div id="query_area" style="float:left; margin:5px; width:829px; height:530px;">
 <form method="post" >
<table width="612" height="193" align="center" cellpadding="10" cellspacing="20">
   <tr><td style="color:#F00; font:verdana; font-size:14px;"><?PHP echo $msg; ?></td></tr>
  <tr>
    <td width="126" height="45">ENTER OLD PASSWORD :</td>
    <td width="474"><input type="password" name="old" /></td>
  </tr>
  <tr>
    <td height="40">ENTER NEW PASSWORD :</td>
    <td><input type="password" name="new1"/></td>
  </tr>
  <tr>
    <td>Re-ENTER NEW PASSWORD :</td>
    <td><input type="password" name="new2"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="submit" name="submit"/></td>
  </tr>
</table>
</form>
</div>

<?php include('include/footer2.php');?>

</div>
</body>
</html>
