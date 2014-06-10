<?php 
if($_SERVER['REQUEST_METHOD']=="POST")
{
	  $n=$_REQUEST['galleryname']; 
	  $filecheck = basename($_FILES['galleryimg']['name']);
      $ext = substr($filecheck, strrpos($filecheck, '.') + 1);
      if (($ext == "jpg" || $ext == "gif" || $ext == "png") && ($_FILES["galleryimg"]["type"] == "image/jpeg" || $_FILES["galleryimg"]["type"] == "image/gif" || $_FILES["galleryimg"]["type"] == "image/png"))
	  {
		$i='upload/'.$_FILES['galleryimg']['name'];
		$t = $_FILES['galleryimg']['tmp_name'];
		copy($t,$i);
	  }
	  else
	  {
		  ?><script>alert ("unsuppported formate !! pls, upload jpg, gif, png formate only");
          window.location.assign("gallery_manager.php?value=1");
          </script><?php 
		  die();
	  }
		$st = mysql_query("INSERT INTO  `gallery_manager`(`name`, `image`) VALUES ('$n','$i')");
	echo mysql_error();
	if($st)
	{
		?><script>alert ("Photo added successfully");
          window.location.assign("gallery_manager.php?value=1");
          </script><?php
	}

}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>gallery_add</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>?value=1">
<table width="612" height="193" align="center" >
 <tr>
    <td width="126" height="45">Name</td>
    <td width="474"><input type="text" name="galleryname" required /></td>
  </tr>
   <tr>
    <td height="40">Image</td>
    <td><input type="file" name="galleryimg" required /></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="Add gallery Image" /></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>

<table width="734" border="1" cellspacing="3" cellpadding="3" align="center" bgcolor="#FFFFFF">
  <tr>
    <th width="40" scope="col">Sn.</th>
    <th width="291" scope="col">Name</th>
    <th width="68" scope="col">Edit</th>
    <th width="74" scope="col">Delete</th>
  </tr>
  <?php
  $sql1 = mysql_query("Select * from gallery_manager WHERE 1");
  $i=1;
  while($row = mysql_fetch_array($sql1))
  {
	  extract($row);
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $name;?></td>
    <td><a href="<?php echo $_SERVER['PHP_SELF'];?>?value=2&id=<?php echo $id;?>">Edit</a></td>
    <td><a href="include/gallery_delete.php?delete=<?php echo $id;?>">Delete</a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>