<?php
	include('include/admin_database.php');
	if(isset($_REQUEST['id']))
   {
	$id=$_REQUEST['id'];
	
	$sql = mysql_query("SELECT * from sub_menu_manager WHERE `ID`='$id'");
	$r=  mysql_num_rows($sql);
	
	$row = mysql_fetch_array($sql);
	
	extract($row);
	
	
   }
  else
   {
	header("Location: sub_menu_manager.php?error=please select id first");
   }
 if($_SERVER['REQUEST_METHOD']=="POST")
 {
	 	    $id=$_REQUEST['id'];
			$n=$_REQUEST['menuname'];
			if($_FILES['menuimg']['name'])
		{
			$filecheck = basename($_FILES['menuimg']['name']);
      $ext = substr($filecheck, strrpos($filecheck, '.') + 1);
      if (($ext == "jpg" || $ext == "gif" || $ext == "png") && ($_FILES["menuimg"]["type"] == "image/jpeg" || $_FILES["menuimg"]["type"] == "image/gif" || $_FILES["menuimg"]["type"] == "image/png"))
	  {
		$i='upload/'.$_FILES['menuimg']['name'];
		$t = $_FILES['menuimg']['tmp_name'];
		copy($t,$i);
	  }
	  else
	  {
		  ?><script>alert ("unsuppported formate !! pls, upload jpg, gif, png formate only");
          window.location.assign("sub_menu_manager.php?value=1")
          </script><?php 
		  die();
	  }
		}
		else
		{
			$i = $_REQUEST['img'];
		}
		$d=$_REQUEST['description'];
		$s=$_REQUEST['status']; 
		mysql_query("UPDATE `sub_menu_manager` SET `name`='$n',`image`='$i',`description`='$d',`status`='$s' WHERE `id`='$id'");
			?>
	<script>
    alert ("Data update sucessfully");
	 window.location.assign("sub_menu_manager.php?value=1");
    </script>
	<?php
 }
 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>sub_menu_edit</title>

</head>

<body>
<form  method="post" enctype="multipart/form-data" action="#">
<table width="615" height="193" align="center">
  <tr>
    <td width="136" height="45">Menu Name</td>
    <td width="299"><input value="<?php echo $name; ?>" type="text" name="menuname" required /></td>
  </tr>
  <tr>
    <td height="40">Image</td>
    <td><input type="file" name="menuimg" />
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
    <td><textarea name="description" rows="8" cols="75"><?php echo $description;?></textarea></td>
  </tr>
  <tr>
    <td>Status</td>
    <td>
    <select name="status">
    <?php if($status)
			{
	?>
    <option selected value="1">Active</option>
    <?php
			}
			else
			{
	?>
    <option selected value="0">Pending</option>
    <?php
			}
	?>
    	<option value="Y">Active</option>
        <option value="N">Pending</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="Update sub Menu" /></td>
  </tr>
</table>
</form>
</body>
</html>