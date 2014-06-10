<?php
include('include/admin_database.php');
$id = $_REQUEST['id'];	
if($_SERVER['REQUEST_METHOD']=="POST")
{
  $ser = $_REQUEST['search'];
  header("Location: search_content.php?search=$ser");
}
if($id)
{
$sqlp = mysql_query("Select * from news_manager WHERE `id` = '$id'");
$rowp = mysql_fetch_array($sqlp);
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style  type="text/css">
body{margin:0px; padding:0px; background-image:url(images/bg3.gif);}
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
<div id="conatiner" style="width:775px; height:930px; background-image:url(images/bg.gif); background-color:#FFF; background-repeat:repeat-x; margin :auto;">
	<?php include('include/header.php');?>
     <div id"notification_block" style=" width:187px; height:600px; margin-left:29px; float:left ">
<?php include("include/leftblock.php")?>
    
  </div>
   <div id="main_content" style=" float:left; width:528px; margin:0px;">
  		<div style="width:518px; float:left; padding:0px;">
        <table width="515" style="margin-left:10px; border-bottom:dotted 1px #CCCCCC;">
    	<tr style="height:52px;"><td height="24" colspan="3" style="color:#74726E;padding:5px 0px 0px 20px;font-size:14px; font-weight:bold;">ALL NEWS</td></tr>
       <?php 
       $sqln = mysql_query("SELECT * FROM `news_manager` order by `id` desc");
        $i=1;
		$c = mysql_num_rows($sqln);
       while($rown = mysql_fetch_array($sqln))
       {
           if($i<$c)
               {?>
               <tr>
        <td width="35" height="26" colspan="1"  style="padding:0px;"><img src="images/index_32.gif" width="26" height="25" alt=""></td>
      <td colspan="2"  style="color:#00AEDB; font-size:12px"><?php echo $rown['name'];?></td></tr>
        <tr><td height="34" colspan="3" style="width:170px; height:32px; color:#74726E; font-size:12px;"><?php  echo substr($rown['description'],0,250);?></td></tr>
       <tr style="border:dotted 1px #666666;"><td height="21" colspan="2" align="left">
       <td width="65" colspan="1" style="color:#00AEDB; font-size:12px; padding-bottom:2px"><a href="news_content.php?id=<?php echo $rown['id']; ?>"  style="text-decoration:none;  color:#00AEDB; text-align:center">read more</a></span></td>
       </tr>
               <?php }
       }
       ?>
        
   </table>
    </div>

  </div>
<?php include("include/footer.php"); ?>
        	

</div>
</body>
</html>
