<?php
session_start();
include('include/admin_database.php');
$name = $_SESSION['admin'];
$sql3 = mysql_query("SELECT * FROM `users_regisration` WHERE `E-mail`='$name'");
$row3 = mysql_fetch_array($sql3);
if($_SERVER['REQUEST_METHOD']=="POST")
{

	
	if(!$_SESSION['admin'])
	{
		header("Location:index.php?error=Session Expired!");
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
<title>sub_menu_manager</title>
<link href="style/menu.css" rel="stylesheet" type="text/css" />
<link href="style/sql_menu.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-image:url(upload/Admin_bg.jpg); background-repeat:repeat">
<div id="container" style="width:1100px; height:800px; margin:0px;">

<div id="top" style="width:1010px; margin:0px 5px; height:50px; text-align:right; float:left; padding:30px 40px 10px 40px;">
Welcome : <?php echo $_SESSION['admin'];?> <img src="<?php echo $row3['photo'];?>" alt"" style="width:50px; height:50px;" /></div>

<?php include('include/admin_menu.php');?>

<div id="query_area" style="float:left; margin:100px 5px 5px 5px; width:829px;">
	<?php
             $val = $_REQUEST['value'];
        switch($val)
        {
            case '1' :
            include('include/query_data.php');
            break;
            
            case '2' :
            include('include/query_show.php');
            break;
          
        }
    ?>
</div>

<?php include('include/footer.php');?>
</body>
</html>