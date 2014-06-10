<?php
  include('include/admin_database.php'); 
  $ser = $_REQUEST['search'];
  if($_SERVER['REQUEST_METHOD']=="POST")
{
  $ser = $_REQUEST['search'];
  header("Location: search_content.php?search=$ser");
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
<div id="conatiner" style="width:775px; height:1000px; background-image:url(images/bg.gif); background-color:#FFF; background-repeat:repeat-x; margin :auto;">
	<?php include('include/header.php');?>
     <div id"notification_block" style=" width:187px; height:600px; margin-left:29px; float:left ">
<?php include("include/leftblock.php")?>
    
  </div>
 <div id="main_content" style=" float:left; width:528px; margin:0px;">
  		<div style="width:518px; float:left; padding:0px;">
        <div style="color:#74726E;font-size:14px; width:510px; font-weight:bold; margin-left:15px;">search results :</div>
        
    	
       <?php 
	   $count = 0;
       $sql1 = mysql_query("SELECT * FROM `menu_manager` WHERE `DESCRIPTION` LIKE '%$ser%'");
	   mysql_error();
	   $c1 = mysql_num_rows($sql1) ;
        $i=1;
	if($c1>0){
		$count++;
		echo '<table width="515" style="margin-left:10px; border-bottom:dotted 1px #CCCCCC;">';
       while($row1 = mysql_fetch_array($sql1))
       {
           //if($i<$c1)
             //  {?>
               <tr>
        <td width="40" height="25" colspan="1"  style="padding:0px;"><img src="images/index_32.gif" width="26" height="25" alt=""></td>
      <td colspan="2"  style="color:#00AEDB; font-size:12px"><?php echo $row1['NAME'];?></td></tr>
        <tr><td height="34" colspan="3" style="width:170px; height:32px; color:#74726E; font-size:12px;"><?php  echo substr($row1['DESCRIPTION'],0,250);?></td></tr>
       <tr style="border:dotted 1px #666666;"><td height="21" colspan="2" align="left">
       <td width="106" colspan="1" style="color:#00AEDB; font-size:12px; padding-bottom:2px"><a href="content.php?id=<?php echo $row1['ID']; ?>"  style="text-decoration:none;  color:#00AEDB; text-align:center">read more</a></span></td>
       </tr>
               <?php //}
       }
	   echo '</table>';
	}?>
        
   
 
    	
       <?php 
       $sql2 = mysql_query("SELECT * FROM `news_manager` WHERE `description` LIKE '%$ser%'");
	  $c2 = mysql_num_rows($sql2) ;
      $i=1;
	  if($c2>0){
		  $count++;
		  echo '<table width="515" style="margin-left:10px; border-bottom:dotted 1px #CCCCCC;">';
       while($row2 = mysql_fetch_array($sql2))
       {
           //if($i<$c2)
              // {?>
               <tr>
        <td width="40" height="25" colspan="1"  style="padding:0px;"><img src="images/index_32.gif" width="26" height="25" alt=""></td>
      <td colspan="2"  style="color:#00AEDB; font-size:12px"><?php echo $row2['name'];?></td></tr>
        <tr><td height="34" colspan="3" style="width:170px; height:32px; color:#74726E; font-size:12px;"><?php  echo substr($row2['description'],0,250);?></td></tr>
       <tr style="border:dotted 1px #666666;"><td height="21" colspan="2" align="left">
       <td width="106" colspan="1" style="color:#00AEDB; font-size:12px; padding-bottom:2px"><a href="news_content.php?id=<?php echo $row2['id']; ?>"  style="text-decoration:none;  color:#00AEDB; text-align:center">read more</a></span></td>
       </tr>
               <?php //}
       }
	   echo '</table>';
	  }?>
        
   </table>
   
   
    	
       <?php 
      $sql3 = mysql_query("SELECT * FROM `page_manager` WHERE `description` LIKE '%$ser%'");
	 $c3 = mysql_num_rows($sql3) ;
        $i=1;
       if($c3>0){
		   $count++;
		   echo '<table width="515" style="margin-left:10px; border-bottom:dotted 1px #CCCCCC;">';
	   while($row3 = mysql_fetch_array($sql3))
       {
           //if($i<$c3)
               //{?>
               <tr>
        <td width="40" height="25" colspan="1"  style="padding:0px;"><img src="images/index_32.gif" width="26" height="25" alt=""></td>
      <td colspan="2"  style="color:#00AEDB; font-size:12px"><?php echo $row3['name'];?></td></tr>
        <tr><td height="34" colspan="3" style="width:170px; height:32px; color:#74726E; font-size:12px;"><?php  echo substr($row3['description'],0,250);?></td></tr>
       <tr style="border:dotted 1px #666666;"><td height="21" colspan="2" align="left">
       <td width="106" colspan="1" style="color:#00AEDB; font-size:12px; padding-bottom:2px"><a href="page_content.php?id=<?php echo $row3['id']; ?>"  style="text-decoration:none;  color:#00AEDB; text-align:center">read more</a></span></td>
       </tr>
               <?php //}
       }
	   echo '</table>';
	   }?>
        
   
   
   
    	
       <?php 
       $sql4 = mysql_query("SELECT * FROM `sub_menu_manager` WHERE `description` LIKE '%$ser%'");
	   $c4 = mysql_num_rows($sql4) ;
        $i=1;
       if($c4>0){
		   $count++;
		   echo '<table width="515" style="margin-left:10px; border-bottom:dotted 1px #CCCCCC;">';
	   while($row4 = mysql_fetch_array($sql4))
       {
           //if($i<$c4)
              // {?>
               <tr>
        <td width="40" height="25" colspan="1"  style="padding:0px;"><img src="images/index_32.gif" width="26" height="25" alt=""></td>
      <td colspan="2"  style="color:#00AEDB; font-size:12px"><?php echo $row4['name'];?></td></tr>
        <tr><td height="34" colspan="3" style="width:170px; height:32px; color:#74726E; font-size:12px;"><?php  echo substr($row4['description'],0,250);?></td></tr>
       <tr style="border:dotted 1px #666666;"><td height="21" colspan="2" align="left">
       <td width="106" colspan="1" style="color:#00AEDB; font-size:12px; padding-bottom:2px"><a href="content2.php?idc=<?php echo $row4['id']; ?>"  style="text-decoration:none;  color:#00AEDB; text-align:center">read more</a></span></td>
       </tr>
               <?php //}
       }
	   echo '</table>';
	   }
	   if($count == 0)
	   {?><span style="color:#F00; margin-left:30px; font-size:14px;"> <?php echo 'No data found'; ?></span> <?php }
	   ?>
        
   
    </div>

  </div>
<?php include("include/footer.php"); ?>
</div>
  
</body>
</html>
