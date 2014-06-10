<?php
  include('include/admin_database.php'); 
  $ser = $_REQUEST['search'];
  if($_SERVER['REQUEST_METHOD']=="POST")
{
 if($_REQUEST['search'])
 {	
  $ser = $_REQUEST['search'];
  header("Location: search_content.php?search=$ser");
 }
 if($_REQUEST['fn'])
 {  
    if (ctype_alpha($_REQUEST['fn'])) {
			$fn=$_REQUEST['fn'];
			}
			else{ 
			?><script>
            alert ("pls enter latter only in first Name");
			window.location.assign("client_reg_page.php");
            </script><?php
			die();
			}
	if (ctype_alpha($_REQUEST['ln'])) {
			$ln=$_REQUEST['ln'];
			}
			else{ 
			?><script>
            alert ("pls enter latter only in last Name");
			window.location.assign("client_reg_page.php");
            </script><?php
			die();
			}
    $n = join(" ", array($fn, $ln));
	$e = $_REQUEST['e_mail'];
	if(is_numeric($_REQUEST['phone'])){
			$p = $_REQUEST['phone'];}
			else{ 
			?><script>
            alert ("pls enter number only in phone number");
			window.location.assign("client_reg_page.php");
            </script><?php
			die();
			}
	$q = $_REQUEST['query'];
	$sqlq = mysql_query("INSERT INTO `query_pannel`(`name`, `e_mail`, `phone`, `description`) VALUES('$n','$e','$p','$q')");
	?>
	<script>
    alert ("query send successfully");
	 window.location.assign("client_reg_page.php");
    </script>
    	<?php
 }
}
  
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style  type="text/css">
body{margin:0px; padding:0px; background-image:url(images/bg3.gif); onload='document.form1.text1.focus()'}
#menu ul{ list-style-type:none; padding:0px; margin:2px 15px; }
#menu ul li{ float:left; padding:0px 27px; margin:5px; background-image:url(images/menu1.jpg); background-repeat:no-repeat; background-position:right; }
#menu ul li a{ text-decoration:none; color:#FFF; font-size:13px; font-family:vardana; font-style:bold; margin-bottom:10px; font-weight:bold;}
#submenu ul{ list-style-type:none; margin:0px 0px 0px 10px; padding:0px}
#submenu ul li{ padding-left:0px ;padding-top:14px; margin-left:12px; padding-bottom:5px; border-bottom:dotted 1px #999999;}
#submenu ul li a{ text-decoration:none; color:#FFF; font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif; text-shadow:#666;}

#footer_menu ul{ list-style:none; margin:0px 40px;}
#footer_menu ul li{ float:left; padding:3px 15px 3px 2px; border-left:solid 1px #CCC;}
#footer_menu ul li a{ text-decoration:none; color:#74726E; font-family:verdana; font-size:10px;}
</style>
<link rel="stylesheet" type="text/css" href="css/style-main.css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>

<script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="scripts/jquery.DDSlider.min.js"></script>

<script type="text/javascript">

$(document).ready(function()
	{
		$('#yourSliderId').DDSlider(
			{
				nextSlide: '.slider_arrow_right',
				prevSlide: '.slider_arrow_left',
				selector: '.slider_selector'
			});
	});
</script>
</head>

<body>
<div id="conatiner" style="width:775px; height:1000px; background-image:url(images/bg.gif); background-color:#FFF; background-repeat:repeat-x; margin :auto;">
	<?php include('include/header.php');?>
     <div id"notification_block" style=" width:187px; height:600px; margin-left:29px; float:left ">
<?php include("include/leftblock.php")?>
    
  </div>
 <div id="main_content" style=" float:left; width:528px; margin:0px;">
  		<div style="width:518px; float:left; padding:0px;">
        <div style="color:#74726E;font-size:20px; width:510px; font-weight:bold; margin-top:20px; margin-left:15px; text-align:center;">Client Query Box</div>
        
        <form  enctype="multipart/form-data" method="post" action="">
        <table width="443" height="394" border="0" align="center" cellpadding="5" cellspacing="5" style="color:#74726E;">
        <tr>
        <td>First Name : </td>
        <td><input type="text" name="fn" maxlength="10" required /></td>
        </tr>
        <tr>
        <td>Last Name : </td>
        <td><input type="text" name="ln"  maxlength="10" required /></td>
        </tr>
          <tr>
        <td>E-mail :</td>
        <td><input type="email" name="e_mail" maxlength="28" required /></td>
        </tr>
          <tr>
        <td>Phone No:</td>
        <td><input type="number" maxlength="10" name="phone" title="length 10" required  /></td>
        </tr>
          <tr>
        <td>Any Query :</td>
        <td><span style="color:#F00">maximum length 150 words</span>
        <textarea name="query" maxlength="150"  cols="30" rows="3" required/></textarea></td>
        </tr><td colspan="2"><input type="submit" name="submit" value="SUBMIT QUERY" /></td>
        
        </table>
    	</form>
       
    </div>

  </div>
<?php include("include/footer.php"); ?>
</div>
  
</body>
</html>
