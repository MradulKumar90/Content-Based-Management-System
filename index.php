<?php 
include('include/admin_database.php');
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
<title>homepage</title>
<style  type="text/css">
body{margin:0px; padding:0px; background-image:url(images/bg3.gif);}

#submenu{width:187px; height:220px; margin-left:29px; background-image:url(images/submenu.gif); float: left; border-bottom-left-radius:5px;border-top-left-radius:5px;}
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
<div id="main_conatiner" style="width:775px; height:1000px; background-image:url(images/bg.gif); background-color:#FFF; background-repeat:repeat-x; margin :auto;">

<?php include('include/header.php'); ?>

<?php include('include/submenu.php'); ?>
 
 <div id="center_img" >
   <div style="width:100%; height:220px;">
     <ul id="yourSliderId">
        <?php
			$sql = mysql_query("SELECT * FROM `banner_manager` lIMIT 5");
			$i=1;
			$c = mysql_num_rows($sql);
			while($row = mysql_fetch_array($sql))
			{
			if($i<=$c)
			{
			?>
	    <li><img border="0" src="admin/<?php echo $row['image']; ?>" width="527" height="220" alt="img" style="border-bottom-right-radius:3px; border-top-right-radius:3px;" /></li>
        	<?php
			}
			$i++;
			}
		?>
     </ul>
          <div id="container">
            <div class="slider_arrow_left"></div>
            <div class="slider_arrow_right"></div>
            <ul class="slider_selector">
            </ul>
            
          </div>
   </div>
      
</div>   
     <div id="notification_block">
<?php include("include/leftblock.php")?>
    
  </div>
  <div id="main_content" style=" float:left; width:528px; margin:0px;">
  		<div style="width:518px; margin:10px 0px 0px 10px; float:left; padding:0px;">
        <?php 
			$sqlp1 = mysql_query("SELECT * FROM `page_manager` WHERE `id`=1");
			$rowp1 = mysql_fetch_array($sqlp1);
		?>
        <table width="517" height="149" border="0" style="margin:0px; padding:0px;">
        <tr>
        <td width="34" height="34" colspan="1"><img src="images/index_32.gif" width="26" height="25" alt=""></td>
        <td width="473" colspan="3" style="font-size:17px; color:#74726E; font-weight:bold;"><?php echo $rowp1['name']?></td>
        </tr>
        <tr><td height="21" colspan="4" style="color:#BDBDBD; font-size:11px;"><?PHP echo substr($rowp1['description'],0,20);?> </td></tr>
        <tr>
          <td colspan="4" style="color:#74726E;font-size:12px; text-align:justify;"><p><span style="color:#00AEDB;"><?PHP echo substr($rowp1['description'],0,40);?> </span> <?PHP echo substr($rowp1['description'],40,400);?></p></td></tr>
        <tr><td colspan="4">
        <table style="margin:0px; padding:0px;">
        <tr>
        <td colspan="2"><a href="page_content.php?id=<?php echo $rowp1['id']; ?>"><img src="images/index_43.gif" width="90" height="24" alt=""></a></td>
        <td width="24" colspan="1"><img src="images/index_44.gif" width="20" height="24" alt=""></td>
        <td width="380" colspan="1" style="color:#00AEDB; font-size:12px;"><?php 
		$s = mysql_query("SELECT * FROM `presentation_file_manager` WHERE 1");
		$s1 = mysql_fetch_array($s);
		?>
        
        <a href="admin/<?php echo $s1['file'];?>" style="text-decoration:none; color:#00AEDB">Download company presentation</a></td>
         </tr>
         </table>
         </td></tr>
        </table>
    </div>
    <div style="width:254px; margin-left:10px;      float:left; padding:0px;">
    	<table height="183" sty>
        <?php 
			$sqlp2 = mysql_query("SELECT * FROM `page_manager` WHERE `id`=2");
			$rowp2 = mysql_fetch_array($sqlp2);
		?>
         <tr>
          <td width="35" colspan="1"><img src="images/index_52.gif" width="26" height="20" alt=""></td>
          <td width="211" colspan="2" style="font-size:17px; color:#74726E; font-weight:bold;" ><?php echo $rowp2['name']?></td>
          </tr>
          <tr><td colspan="3" style="font-size:11px; color:#BDBDBD; font-variant:small-caps"><?php  echo substr($rowp2['description'],0,25);?></td></tr>
          <tr><td height="98" colspan="3">
          <table width="250" height="90" ><tr>
          <td width="79" ><img src="admin/<?php echo $rowp2['image'];?>" width="79" height="75" alt=""></td>
          <td  style="color:#74726E;font-size:12px;"><span style="color:#00AEDB; text-align:justify;"><?php  echo substr($rowp2['description'],0,25);?></span><br><?php  echo substr($rowp2['description'],25,75);?></td></tr></table>
          </td></tr>
          <tr>
            <td colspan="3"  style="color:#74726E;font-size:12px;"><span style="color:#333; text-decoration:underline"><?php  echo substr($rowp2['description'],75,100);?></span><?php  echo substr($rowp2['description'],100,100);?> <a href="page_content.php?id=<?php echo $rowp2['id']; ?>"><img src="images/index_43.gif" width="90" height="24" alt=""></a></td></tr></table>
          </td></tr>
        </table>
    </div>
    <div style="width:254px; margin-left:10px;       float:left; padding:0px;">
    		<table>
             <?php 
			$sqlp3 = mysql_query("SELECT * FROM `page_manager` WHERE `id`=3");
			$rowp3 = mysql_fetch_array($sqlp3);
		?>
         <tr>
          <td width="33" colspan="1"><img src="images/index_52.gif" width="26" height="20" alt=""></td>
          <td width="213" colspan="2" style="font-size:17px; color:#74726E; font-weight:bold;" ><?php echo $rowp3['name']?></td>
          </tr>
          <tr><td colspan="3" style="font-size:11px; color:#BDBDBD; font-variant:small-caps;"><?php  echo substr($rowp3['description'],0,25);?></td></tr>
          <tr><td colspan="3">
          <table width="250" height="90" ><tr>
          <td width="79" ><img src="admin/<?php echo $rowp3['image'];?>" width="78" height="75" alt=""></td>
          <td  style="color:#74726E;font-size:12px;"><span style="color:#00AEDB; text-align:justify;"><?php  echo substr($rowp3['description'],0,25);?></span><br><?php  echo substr($rowp3['description'],35,80);?></td></tr></table>
          </td></tr>
          <tr>
            <td colspan="3">
           <table width="249" style="margin:0px; padding:0px;">
           <tr><td width="11" ><img src="images/liststyle.gif" alt=""></td>
           <td width="183" ><a href="page_content.php?id=<?php echo $rowp3['id']; ?>" style="color:#24A6BC; font-size:12px;"><?php  echo substr($rowp3['description'],80,81);?></a></td>
  </tr>
  <tr>
  <td ><img src="images/liststyle.gif" alt=""></td>
  <td><a href="page_content.php?id=<?php echo $rowp3['id']; ?>" style="color:#24A6BC; font-size:12px;"><?php  echo substr($rowp3['description'],89,90);?></a></td>
  </tr>
  
  
 </table>
          </td></tr>
        </table>
    </div>
    <div style="width:518px; height:150px; margin-left:10px;      float:left; padding:0px;">
	  <table>
      <?php 
			$sqlp4 = mysql_query("SELECT * FROM `page_manager` WHERE `id`=4");
			$rowp4 = mysql_fetch_array($sqlp4);
		?>
         <tr>
          <td width="37" colspan="1"><img src="images/index_52.gif" width="26" height="20" alt=""></td>
          <td width="471" colspan="2" style="font-size:17px; color:#74726E; font-weight:bold;" ><?php echo $rowp4['name']?></td>
        </tr>
          <tr><td colspan="3" style="font-size:11px; color:#BDBDBD;font-variant:small-caps"><?php  echo substr($rowp4['description'],0,25);?></td></tr>
          <tr><td height="92" colspan="3">
          <table width="512" height="90" ><tr>
          <td width="79" ><img src="admin/<?php echo $rowp4['image'];?>" width="100" height="75" alt=""></td>
          <td width="389"  style="color:#74726E;font-size:12px;"><span style="color:#00AEDB; text-align:justify;"><?php  echo substr($rowp4['description'],0,25);?></span><?php  echo substr($rowp4['description'],25,200);?></td><td valign="bottom">  <a href="page_content.php?id=<?php echo $rowp4['id']; ?>"><img src="images/index_43.gif" width="90" height="24" alt=""></a></td></tr></table>
        </td></tr>
      </table>
    </div>
  
  </div>
<?php include("include/footer.php"); ?>


</div>
</body>
</html>
