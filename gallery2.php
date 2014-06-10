<?php
include('include/admin_database.php');
$id = $_REQUEST['id'];	
$sqla = mysql_query("Select * from menu_manager WHERE ID = '$id'");
$rowa = mysql_fetch_array($sqla);
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

</style>
<link rel="stylesheet" type="text/css" href="css/style-main.css" />
<script type="text/javascript" src="highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />


<script type="text/javascript">
hs.graphicsDir = 'highslide/graphics/';
hs.align = 'center';
hs.transitions = ['expand', 'crossfade'];
hs.outlineType = 'rounded-white';
hs.fadeInOut = true;
hs.numberPosition = 'caption';
hs.dimmingOpacity = 0.75;

// Add the controlbar
if (hs.addSlideshow) hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 5000,
	repeat: false,
	useControls: true,
	fixedControls: 'fit',
	overlayOptions: {
		opacity: .75,
		position: 'bottom center',
		hideOnMouseOut: true
	}
});
</script>
</head>

<body>
<div id="conatiner" style="width:775px; height:930px; background-image:url(images/bg.gif); background-color:#FFF; background-repeat:repeat-x; margin :auto;">
	<?php include('include/header.php');?>
     <div id"notification_block" style=" width:187px;     height:515px; margin-left:29px; float:left ">
   <?php include("include/leftblock.php")?>
    
  </div>
  <div id="main_content" style=" float:left; width:528px; margin:0px;">
  		<div style="width:518px; float:left; padding:0px;">
        <table width="517" height="149" border="0" style="margin:0px; padding:0px;">
        <tr>
        <td width="34" height="34" colspan="1"><img src="images/index_32.gif" width="26" height="25" alt=""></td>
        <td width="473" colspan="3" style="font-size:17px; color:#74726E; font-weight:bold;">Gallery</td>
        </tr>
        <tr><td height="21" colspan="4" style="color:#BDBDBD; font-size:11px;">&nbsp;</td></tr>
        <tr>
          <td colspan="4" style="color:#74726E;font-size:11px;"><p align="justify"><?php echo $rowa['DESCRIPTION']?></p>
            <table align="center" width="98%" border="0" cellspacing="3" cellpadding="3">
             <?php 
		$sqlm = mysql_query("SELECT * FROM `gallery_manager`");
		$i=1;
		$x = mysql_num_rows($sqlm);
		while($rm = mysql_fetch_array($sqlm))
		{
			
			if($i==1)
			{
		   ?>
		  	<tr>
            <?php
			}
			?>
		 
				 <td scope="col"><a id="thumb" href="admin/<?php echo $rm['image']; ?>"  class="highslide" onclick="return hs.expand(this, { slideshowGroup: 1 } )">
	<img src="admin/<?php echo $rm['image']; ?>" alt="Highslide JS" title="Click to enlarge" height="120" width="120" /></a></td>
			<?php
            
			
			if($i==3)
			{
			?>
			</tr>
			<?php
			$i=0;
			}
			else if($x==$i)
			{
			?>
            </tr>
            	
			<?php	
			}
			
			$i++;
		}
		?>
        </table></td></tr>
        <tr><td colspan="4">
       
         </td></tr>
        </table>
    </div>
    
  </div>
   <?php include("include/footer.php"); ?>
        	

</div>
</body>
</html>
