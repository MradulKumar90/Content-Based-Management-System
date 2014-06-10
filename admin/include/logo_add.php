<?php 
if($_SERVER['REQUEST_METHOD']=="POST")
{
  $s = mysql_query("SELECT * FROM `logo_manager` WHERE 1");
  $r = mysql_num_rows($s);
  if( $r < 1)
   {
	  
			$n=$_REQUEST['logoname'];
			
		$filecheck = basename($_FILES['logoimg']['name']);
      $ext = substr($filecheck, strrpos($filecheck, '.') + 1);
      if (($ext == "jpg" || $ext == "gif" || $ext == "png") && ($_FILES["logoimg"]["type"] == "image/jpeg" || $_FILES["logoimg"]["type"] == "image/gif" || $_FILES["logoimg"]["type"] == "image/png"))
	  {
		$i='upload/'.$_FILES['logoimg']['name'];
		$t = $_FILES['logoimg']['tmp_name'];
		copy($t,$i);
	  }
	  else
	  {
		  ?><script>alert ("unsuppported formate !! pls, upload jpg, gif, png formate only");
          window.location.assign("logo_manager.php");
          </script><?php 
		  die();
	  }
		
		
		$st = mysql_query("INSERT INTO  `logo_manager`(`name`,`image`) VALUES ('$n','$i')");
	echo mysql_error();
	if($st)
	{
		?><script>
        alert ("logo added");
		window.location.assign("logo_manager.php");
        </script><?php
	}
   }
   else
   {
	   ?><script>
        alert ("pls, first delete the existing logo than upload new logo image");
		window.location.assign("logo_manager.php");
        </script><?php
		
   }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>logo_add</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>?value=1">
<table width="612" height="193" align="center" >
  <tr>
    <td width="126" height="45">Logo Name</td>
    <td width="474"><input type="text" name="logoname" required /></td>
  </tr>
  <tr>
    <td height="40">Logo Image</td>
    <td><input type="file" name="logoimg" /></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="upload logo Image" /></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>

<table width="734" border="1" cellspacing="3" cellpadding="3" align="center" bgcolor="#FFFFFF">
  <tr>
    <th width="40" scope="col">Sn.</th>
    <th width="291" scope="col">Name</th>
    <th width="74" scope="col">Delete</th>
  </tr>
  <?php
  $sql1 = mysql_query("Select * from logo_manager WHERE 1");
  $i=1;
  while($row = mysql_fetch_array($sql1))
  {
	  extract($row);
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $name;?></td>
    <td><a href="include/logo_delete.php?delete=<?php echo $id;?>">Delete</a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   </tr>
</table>
</body>
</html>