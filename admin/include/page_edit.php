<?php
	include('include/admin_database.php');
	if(isset($_REQUEST['id']))
   {
	$id=$_REQUEST['id'];
	
	$sql = mysql_query("SELECT * from page_manager WHERE `ID`='$id'");
	$r=  mysql_num_rows($sql);
	
	$row = mysql_fetch_array($sql);
	
	extract($row);
	
	
   }
  else
   {
	header("Location: page_manager.php?error=please select id first");
   }
 if($_SERVER['REQUEST_METHOD']=="POST")
 {
	 	$id=$_REQUEST['id'];
			$n=$_REQUEST['pagename'];
			if($_FILES['pageimg']['name'])
		{
			$filecheck = basename($_FILES['pageimg']['name']);
      $ext = substr($filecheck, strrpos($filecheck, '.') + 1);
      if (($ext == "jpg" || $ext == "gif" || $ext == "png") && ($_FILES["pageimg"]["type"] == "image/jpeg" || $_FILES["pageimg"]["type"] == "image/gif" || $_FILES["pageimg"]["type"] == "image/png"))
	  {
		$i='upload/'.$_FILES['pageimg']['name'];
		$t = $_FILES['pageimg']['tmp_name'];
		copy($t,$i);
	  }
	  else
	  {
		  ?><script>alert ("unsuppported formate !! pls, upload jpg, gif, png formate only");
           window.location.assign("page_manager.php?value=1");
          </script><?php 
		  die();
	  }
		}
		else
		{	
			$i = $_REQUEST['img'];
		}
		$d=$_REQUEST['description']; 
		mysql_query("UPDATE `page_manager` SET `name`='$n',`image`='$i',`description`='$d' WHERE `id`='$id'");
		
		?><script>alert ("Update Successfull");
           window.location.assign("page_manager.php?value=1");
          </script><?php 
		
 }
 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>page_edit</title>

</head>

<body>
<form  method="post" enctype="multipart/form-data" action="#">
<table width="426" height="193" align="center">
  <tr>
    <td width="136" height="45">Page Title</td>
    <td width="299"><input value="<?php echo $name; ?>" type="text" name="pagename" required /></td>
  </tr>
  <tr>
    <td height="40">Image</td>
    <td><input type="file" name="pageimg" />
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
    <td><input type="submit" value="Update page" /></td>
  </tr>
</table>
</form>
</body>
</html>