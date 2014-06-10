<?php
include('include/admin_database.php');
$id = $_REQUEST['id'];	
$sqla = mysql_query("Select * from menu_manager WHERE ID = '$id'");
$rowa = mysql_fetch_array($sqla);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/style-main.css" />
<script type="text/javascript" src="highslide/highslide-with-gallery.js"></script>
<script type="text/javascript" src="../highslide/highslide-full.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<script type="text/javascript"> 
//<![CDATA[
hs.graphicsDir = '../highslide/graphics/';
hs.transitions = ['expand', 'crossfade'];
hs.restoreCursor = null;
hs.lang.restoreTitle = 'Click for next image';
 
// Add the slideshow providing the controlbar and the thumbstrip
hs.addSlideshow({
	//slideshowGroup: 'group1',
	interval: 5000,
	repeat: true,
	useControls: true,
	overlayOptions: {
		position: 'bottom right',
		offsetY: 50
	},
	thumbstrip: {
		position: 'above',
		mode: 'horizontal',
		relativeTo: 'expander'
	}
});
 
// Options for the in-page items
var inPageOptions = {
	//slideshowGroup: 'group1',
	outlineType: null,
	allowSizeReduction: false,
	wrapperClassName: 'in-page controls-in-heading',
	thumbnailId: 'gallery-area',
	useBox: true,
	width: 600,
	height: 400,
	targetX: 'gallery-area 10px',
	targetY: 'gallery-area 10px',
	captionEval: 'this.a.title',
	numberPosition: 'caption'
}
 
// Open the first thumb on page load
hs.addEventListener(window, 'load', function() {
	document.getElementById('thumb1').onclick();
});
 
// Cancel the default action for image click and do next instead
hs.Expander.prototype.onImageClick = function() {
	if (/in-page/.test(this.wrapper.className))	return hs.next();
}
 
// Under no circumstances should the static popup be closed
hs.Expander.prototype.onBeforeClose = function() {
	if (/in-page/.test(this.wrapper.className))	return false;
}
// ... nor dragged
hs.Expander.prototype.onDrag = function() {
	if (/in-page/.test(this.wrapper.className))	return false;
}
 
// Keep the position after window resize
hs.addEventListener(window, 'resize', function() {
	var i, exp;
	hs.getPageSize();
 
	for (i = 0; i < hs.expanders.length; i++) {
		exp = hs.expanders[i];
		if (exp) {
			var x = exp.x,
				y = exp.y;
 
			// get new thumb positions
			exp.tpos = hs.getPosition(exp.el);
			x.calcThumb();
			y.calcThumb();
 
			// calculate new popup position
		 	x.pos = x.tpos - x.cb + x.tb;
			x.scroll = hs.page.scrollLeft;
			x.clientSize = hs.page.width;
			y.pos = y.tpos - y.cb + y.tb;
			y.scroll = hs.page.scrollTop;
			y.clientSize = hs.page.height;
			exp.justify(x, true);
			exp.justify(y, true);
 
			// set new left and top to wrapper and outline
			exp.moveTo(x.pos, y.pos);
		}
	}
});
//]]>
</script> 

<style  type="text/css">
body{margin:0px; padding:0px; background-image:url(images/bg3.gif);}
.highslide-image {
		border: 1px solid black;
	}
	.highslide-controls {
		width: 90px !important;
	}
	.highslide-controls .highslide-close {
		display: none;
	}
	.highslide-caption {
		padding: .5em 0;
	}
</style>


<!--
	2) Optionally override the settings defined at the top
	of the highslide.js file. The parameter hs.graphicsDir is important!
-->


 
<!--
	3) Modify some of the styles
--> 

</head>

<body>
<div id="conatiner" style="width:775px; height:930px; background-image:url(images/bg.gif); background-color:#FFF; background-repeat:repeat-x; margin :auto;">
	<?php include('include/header.php');?>
     <div id"notification_block" style=" width:187px;     height:515px; margin-left:29px; float:left ">
    <table style="margin-left:15px; border-bottom:dotted 1px #CCCCCC; width:160px; height:100px">
    	<tr style="height:52px;"><td height="24" colspan="3" style="color:#74726E;padding:5px 0px 0px 20px;font-size:14px; font-weight:bold;">LATEST NEWS</td></tr>
        <tr>
        <td height="26" colspan="2"  style="padding:0px;"><img src="images/index_36.gif" width="27" height="26" alt=""></td>
      <td colspan="1" width="128"  style="color:#00AEDB; font-size:12px">Mrach 21, 2014</td></tr>
        <tr><td height="34" colspan="3" style="width:170px; height:32px; color:#74726E; font-size:11px;">MOrbi volutpat in ligula. Integer vel megna, Quisque ut menge at nisi</td></tr>
       <tr><td width="24" height="26" colspan="1"><img src="images/index_40.gif" width="23" height="20" alt="">
       <td colspan="2" style="color:#00AEDB; font-size:11px; padding-bottom:2px"><a href="#"  style="text-decoration:none;  color:#00AEDB;">read more</a></span></td>
       </tr>
    </table>
    <table height="96" style="margin-left:15px; border-bottom:dotted 1px #CCCCCC; width:160px; height:80px">
    	<tr>
        <td height="26" colspan="2"  style="padding:0px;"><img src="images/index_36.gif" width="27" height="26" alt=""></td>
        <td colspan="1" width="128"  style="color:#00AEDB; font-size:12px">Mrach 21, 2014</td></tr>
        <tr><td height="34" colspan="3" style="width:170px;color:#74726E; height:32px; font-size:11px;">MOrbi volutpat in ligula. Integer vel megna, Quisque ut menge at nisi</td></tr>
       <tr><td width="24" height="26" colspan="1"><img src="images/index_40.gif" width="23" height="20" alt="">
       <td colspan="2" style="color:#00AEDB; font-size:11px; padding-bottom:2px"><a href="#" style="text-decoration:none;  color:#00AEDB;">read more</a></span></td>
       </tr>
    </table>
  <table width="174" height="220" style="margin-left:15px;width:166px;">
  <tr><td colspan="2" height="23"><a href="#"><img src="images/index_65.gif" width="88" height="21" alt=""></a></td></tr>
  <tr><td colspan="2" height="29" style="color:#74726E; font-weight:bolder; font-size:14px">CAREERS</td></tr>
  <tr><td colspan="2" height="22" style="color:#00AEDB; font-family:verdana; font-size:9px; font-weight:bolder;">Fusce interdum. Maecenas eu</td></tr>
  <tr><td height="66" colspan="2"><img src="images/index_71.gif" width="160" height="64" alt=""></td></tr>
  <tr>
  <td width="21" height="14"><img src="images/liststyle.gif" alt=""></td>
  <td width="146"><a href="#" style="color:#24A6BC; font-size:11px;">MOrbi volutpat in ligu</a></td>
  </tr>
  <tr>
  <td height="14"><img src="images/liststyle.gif" alt=""></td>
  <td><a href="#" style="color:#24A6BC; font-size:11px;">ula. Integer vel</a></td>
  </tr>
  <tr>
  <td height="14"><img src="images/liststyle.gif" alt=""></td>
  <td><a href="#" style="color:#24A6BC; font-size:11px;">vel megna, Quisqu</a></td>
  </tr>
  <tr>
  <td height="14"><img src="images/liststyle.gif" alt=""></td>
  <td><a href="#" style="color:#24A6BC; font-size:11px;">menge at nisi</a></td>
  </tr>
 </table>
    
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
             <td colspan="4" style="color:#74726E;font-size:11px;"><p align="justify"><?php echo $rowa['DESCRIPTION']?></p>   </td></tr>
        <tr><td colspan="4">
       
         </td></tr> 
        </table>
            <div id="gallery-area" style="width: 620px; height: 520px; margin: 0 auto; border: 1px solid silver"> 
		  <div class="hidden-container" id=" gallery" style=" width:98%; float:left">
           <?php 
		$sqlm = mysql_query("SELECT * FROM `gallery_manager`");
		$rm = mysql_num_rows($sqlm);
		echo mysql_error();
		while($rowm = mysql_fetch_array($sqlm))
		{ ?>
		  <a id="thumb1" class='highslide' href='admin/<?php echo $rowm['image']; ?>' 
			onclick="return hs.expand(this, inPageOptions)" title="Two cabins"> 
		<img width="500" src='admin/<?php echo $rowm['image']; ?>' alt=''/></a> 
		<?php  	
		}
		?>
        </div>
    </div>
            
         
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
    <div id="footer" style="width:775px; height:55px; float:left; background-image:url(images/footer.gif); background-repeat:     repeat-x;">
  		<div id="footer_menu" style="width:715px; height:30px; margin:5px 29px;">
       		<ul>
            <li style="border:none;"><a href="#">HOME</a></li>
            <li><a href="#">ABOUT US</a></li>
            <li><a href="#">SERVICES</a></li>
            <li><a href="#">CASE STUDIES</a></li>
            <li><a href="#">CAREERS</a></li>
            <li><a href="#">NEWS</a></li>
            <li><a href="#">CONTACTS</a></li>
            </ul>
         </div>
       <div style="width:715px; height:15px; color:#74726E; font-size:12px; margin:0px; padding-left:250px; font-weight:lighter" >copyright @ rajpoot and sons </div>
        
 </div>
        	

</div>
</body>
</html>
