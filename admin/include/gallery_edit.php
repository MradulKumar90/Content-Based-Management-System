<?php
	include('include/admin_database.php');
	if(isset($_REQUEST['id']))
   {
	$id=$_REQUEST['id'];
	
	$sql = mysql_query("SELECT * from gallery_manager WHERE `id`='$id'");
	$r=  mysql_num_rows($sql);
	
	$row = mysql_fetch_array($sql);
	
	extract($row);
	
	
   }
  else
   {
	header("Location: gallery_manager.php?error=please select id first");
   }
 if($_SERVER['REQUEST_METHOD']=="POST")
 {
	 	$id=$_REQUEST['id'];
		$n=$_REQUEST['galleryname'];
		if($_FILES['galleryimg']['name'])
		{
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
		}
		else
		{ 
			$i= $_REQUEST['img'];
		}
		mysql_query("UPDATE `gallery_manager` SET `name`='$n',`image`='$i' WHERE `id`='$id'");
		?><script>alert ("Photo updated successfully");
          window.location.assign("gallery_manager.php?value=1");
          </script><?php
 }
 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>gallery_edit</title>

</head>

<body>
<form  method="post" enctype="multipart/form-data" action="#">
<table width="426" height="193" align="center">
  <tr>
    <td width="136" height="45">Name</td>
    <td width="299"><input value="<?php echo $name;?>" type="text" name="galleryname" required /></td>
  </tr>
  <tr>
    <td height="40">Image</td>
    <td><input type="file" name="galleryimg" value="<?php echo $image; ?>" />
    <?php if($image)
			{
				?>
                <img src="<?php echo $image;?>" height="100" width="100" />
                <input type="hidden" name="img" value="<?php echo $image;?>" />
              <?php  
			}
	?>
    </td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="Update gallery" /></td>
  </tr>
</table>
</form>
</body>
</html>