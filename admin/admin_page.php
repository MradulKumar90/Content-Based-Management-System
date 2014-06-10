<?php
session_start();
include('include/admin_database.php');
$name = $_SESSION['admin'];
$sql3 = mysql_query("SELECT * FROM `users_regisration` WHERE `E-mail`='$name'");
$row3 = mysql_fetch_array($sql3);
if(!$_SESSION['admin'])
{
	header("Location:index.php?error=Session Expired!");
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
<div id="admin page body" style="float:left; font-size:20px; margin-left:30px;" >
	<h2>Welcome to the admin page..</h2>
    <br>
    <p>Choose your desire admin menu for modifing your web page content.</p>
   
</div>

<?php include('include/footer.php');?>

</div>
</body>
</html>
