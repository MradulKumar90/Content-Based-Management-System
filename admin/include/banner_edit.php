<?php
	include('include/admin_database.php');
	if(isset($_REQUEST['id']))
   {
	$id=$_REQUEST['id'];
	
	$sql = mysql_query("SELECT * from banner_manager WHERE `id`='$id'");
	$r=  mysql_num_rows($sql);
	
	$row = mysql_fetch_array($sql);
	
	extract($row);
	
	
   }
  else
   {
	header("Location: banner_manager.php?error=please select id first");
   }
 if($_SERVER['REQUEST_METHOD']=="POST")
 {
	 	$id=$_REQUEST['id'];
		if($_FILES['bannerimg']['name'])
		{$filecheck = basename($_FILES['bannerimg']['name']);
      $ext = substr($filecheck, strrpos($filecheck, '.') + 1);
      if (($ext == "jpg" || $ext == "gif" || $ext == "png") && ($_FILES["bannerimg"]["type"] == "image/jpeg" || $_FILES["bannerimg"]["type"] == "image/gif" || $_FILES["bannerimg"]["type"] == "image/png"))
	  {
		$i='upload/'.$_FILES['bannerimg']['name'];
		$t = $_FILES['bannerimg']['tmp_name'];
		copy($t,$i);
	  }
	  else
	  {
		  ?><script>alert ("unsuppported formate !! pls, upload jpg, gif, png formate only");
          window.location.assign("banner_manager.php?value=1");
          </script><?php 
		  die();
	  }
		}
		else
		{
			$i = $_REQUEST['img'];
		}
		$n=$_REQUEST['bannername'];
		mysql_query("UPDATE `banner_manager` SET `name`='$n',`image`='$i' WHERE `id`='$id'");
		?><script>alert ("banner image updated successfully");
           window.location.assign("banner_manager.php?value=1");
          </script><?php
 }


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>banner_edit</title>

</head>

<body>
<form  method="post" enctype="multipart/form-data" action="#">
<table width="426" height="193" align="center">
  <tr>
    <td width="136" height="45">Name</td>
    <td width="299"><input value="<?php echo $name;?>" type="text" name="bannername" required /></td>
  </tr>
  <tr>
    <td height="40">Image</td>
    <td><input type="file" name="bannerimg" />
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
    <td><input type="submit" value="Update banner image" onClick="msg();"/></td>
  </tr>
</table>
</form>
</body>
</html>