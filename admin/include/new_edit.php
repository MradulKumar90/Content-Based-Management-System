<?php
	include('include/admin_database.php');
	if(isset($_REQUEST['id']))
   {
	$id=$_REQUEST['id'];
	
	$sql = mysql_query("SELECT * from news_manager WHERE `id`='$id'");
	$r=  mysql_num_rows($sql);
	
	$row = mysql_fetch_array($sql);
	
	extract($row);
	
	
   }
  else
   {
	header("Location: news_manager.php?error=please select id first");
   }
 if($_SERVER['REQUEST_METHOD']=="POST")
 {
	 	
			$n=$_REQUEST['headline'];
		if($_FILES['new_img']['name'])
		{
			$filecheck = basename($_FILES['new_img']['name']);
      $ext = substr($filecheck, strrpos($filecheck, '.') + 1);
      if (($ext == "jpg" || $ext == "gif" || $ext == "png") && ($_FILES["new_img"]["type"] == "image/jpeg" || $_FILES["new_img"]["type"] == "image/gif" || $_FILES["new_img"]["type"] == "image/png"))
	  {
		$i='upload/'.$_FILES['new_img']['name'];
		$t = $_FILES['new_img']['tmp_name'];
		copy($t,$i);
	  }
	  else
	  {
		  ?><script>alert ("unsuppported formate !! pls, upload jpg, gif, png formate only");
          window.location.assign("news_manager.php?value=1");
          </script><?php 
		  die();
	  }
		}
		else
		{
			$i = $_REQUEST['img'];
		}
		$d=$_REQUEST['description'];
		
		mysql_query("UPDATE `news_manager` SET `name`='$n',`image`='$i',`description`='$d' WHERE `id`='$id'");
		 ?><script>alert ("New updated successfully");
          window.location.assign("news_manager.php?value=1");
          </script><?php
 }
 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>new_edit</title>

</head>

<body>
<form  method="post" enctype="multipart/form-data" action="#">
<table width="426" height="193" align="center">
  <tr>
    <td width="136" height="45">Headline</td>
    <td width="299"><input value="<?php echo $name; ?>" type="text" name="headline" required /></td>
  </tr>
  <tr>
    <td height="40">Image</td>
    <td><input type="file" name="new_img" />
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
    <td>Description</td>
    <td><textarea name="description" rows="8" cols="80" required><?php echo $description;?></textarea></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="Update News" /></td>
  </tr>
</table>
</form>
</body>
</html>