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
$sqlp = mysql_query("Select * from page_manager WHERE `id` = '$id'");
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
    <div id"notification_block" style=" width:187px;     height:600px; margin-left:29px; float:left ">
<?php include("include/leftblock.php")?>
    
  </div>
  <div id="main_content" style=" float:left; width:528px; margin:0px;">
  		<div style="width:518px; float:left; padding:0px;">
        <table width="517" height="149" border="0" style="margin:0px; padding:0px;">
        <tr>
        <td width="34" height="34" colspan="1"><img src="images/index_32.gif" width="26" height="25" alt=""></td>
        <td width="473" colspan="3" style="font-size:17px; color:#74726E; font-weight:bold;"><?php echo $rowp['name']?></td>
        </tr>
        <tr><td height="21" colspan="4" style="color:#BDBDBD; font-size:11px;">&nbsp;</td></tr>
        <tr><td colspan="4" align="left">
         <img src="admin/<?php echo $rowp['image'];?>" width="353" height="150" /></td></tr>
        <tr>
          <td colspan="4" style="color:#74726E;font-size:12px; text-align:justify"><p ><?php echo $rowp['description']?></p></td></tr>
        
        </table>
    </div>
    <!--
    <div style="width:254px; margin-left:10px;      float:left; padding:0px;">
    	<table height="190">
         <tr>
          <td width="35" colspan="1"><img src="images/index_52.gif" width="26" height="20" alt=""></td>
          <td width="211" colspan="2" style="font-size:17px; color:#74726E; font-weight:bold;" >Main Services</td>
          </tr>
          <tr><td colspan="3" style="font-size:11px; color:#BDBDBD;">FUSCU URNA DUI, SOLLLICTIN</td></tr>
          <tr><td colspan="3">
          <table width="250" height="90" ><tr>
          <td width="79" ><img src="images/index_60.gif" width="79" height="75" alt=""></td>
          <td  style="color:#74726E;font-size:11px;"><span style="color:#00AEDB;">Fascus Intercum Meaneas</span><br>iuhdviuhkkjdh oivhwoi o ewoiv owi<br>aiohv oairkjgfnkls lsibj soitjb oit vj oo  </td></tr></table>
          </td></tr>
          <tr><td colspan="3"  style="color:#74726E;font-size:10px;"><span style="color:#333; text-decoration:underline">Fascus Intercum Meaneas Intercum Meaneas Intercum Meaneas</span>iuhdviuhkkjdh oivhwoi o ewoiv owi<br>aiohv oairkjgfnkls lsibj soitjb oit vj oo  ugrvuwiv </td></tr></table>
          </td></tr>
        </table>
    </div>
   
    <div style="width:254px; margin-left:10px;       float:left; padding:0px;">
    		<table>
         <tr>
          <td width="33" colspan="1"><img src="images/index_52.gif" width="26" height="20" alt=""></td>
          <td width="213" colspan="2" style="font-size:17px; color:#74726E; font-weight:bold;" >Business Plans</td>
          </tr>
          <tr><td colspan="3" style="font-size:11px; color:#BDBDBD;">FUSCU URNA DUI, SOLLLICTIN</td></tr>
          <tr><td colspan="3">
          <table width="250" height="90" ><tr>
          <td width="79" ><img src="images/index_62.gif" width="78" height="75" alt=""></td>
          <td  style="color:#74726E;font-size:11px;"><span style="color:#00AEDB;">Fascus Intercum Meaneas</span><br>iuhdviuhkkjdh oivhwoi o ewoiv owi<br>aiohv oairkjgfnkls lsibj soitjb oit vj oo  </td></tr></table>
          </td></tr>
          <tr>
            <td colspan="3">
           <table width="249" style="margin:0px; padding:0px;">
           <tr><td width="11" ><img src="images/liststyle.gif" alt=""></td>
           <td width="183" ><a href="#" style="color:#24A6BC; font-size:11px;">MOrbi volutpat in ligurtigjoi oij4oi 4opggjp4o </a></td>
  </tr>
  <tr>
  <td ><img src="images/liststyle.gif" alt=""></td>
  <td><a href="#" style="color:#24A6BC; font-size:10px;">ula. Integer vel irovi o3irjvw r3o9ufj 4o9f </a></td>
  </tr>
  
  
 </table>
          </td></tr>
        </table>
    </div>
    
    <div style="width:518px; height:150px; margin-left:10px;      float:left; padding:0px;">
	  <table>
         <tr>
          <td width="37" colspan="1"><img src="images/index_52.gif" width="26" height="20" alt=""></td>
          <td width="471" colspan="2" style="font-size:17px; color:#74726E; font-weight:bold;" >Case Studies</td>
          </tr>
          <tr><td colspan="3" style="font-size:11px; color:#BDBDBD;">FUSCU URNA DUI, SOLLLICTIN</td></tr>
          <tr><td height="92" colspan="3">
          <table width="512" height="90" ><tr>
          <td width="79" ><img src="images/index_60.gif" width="79" height="75" alt=""></td>
          <td width="389"  style="color:#74726E;font-size:11px;"><span style="color:#00AEDB;">Fascus Intercum Meaneas</span><br>
            iuhdviuhkkjdh oivhwoi o ewoiv ow orijb rtoijb rpwotbjw ptor tpojsi<br>
            aiohv oairkjgfnkls lsibj soitjb oit vj oo wiutb howi botrihjtrowi boirbt w trpoiu.........</td></tr></table>
        </td></tr>
         </table>
    </div>
   -->
  </div>
   <?php include("include/footer.php"); ?>
        	

</div>
</body>
</html>
