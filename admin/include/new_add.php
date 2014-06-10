<?php 
if($_SERVER['REQUEST_METHOD']=="POST")
{
  $s = mysql_query("SELECT * FROM `news_manager` WHERE 1");
  $r = mysql_num_rows($s);
  if( $r < 6)
   {
	   
			$n=$_REQUEST['headline'];
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
		
		
		$d=$_REQUEST['description'];
		$st = mysql_query("INSERT INTO `news_manager` (`name`, `image`, `description`) VALUES ('$n','$i','$d')");
	echo mysql_error();
	if($st)
	{
		 ?><script>alert ("New added successfully");
          window.location.assign("news_manager.php?value=1");
          </script><?php
	}
   }
   else
   {
	   ?><script>
        alert ("oops!! You can only insert five latest news");
		window.location.assign("news_manager.php?value=1");
        </script><?php
		
		
   }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>new_add</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>?value=1">
<table width="612" height="193" align="center" >
  <tr>
    <td width="126" height="45">Headline</td>
    <td width="474"><input type="text" name="headline" required /></td>
  </tr>
  <tr>
    <td height="40">Image</td>
    <td><input type="file" name="new_img" /></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="description" rows="8" cols="80" required></textarea></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="Add Headline" /></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>


<table width="617" border="1" cellspacing="3" cellpadding="3" align="center" bgcolor="#FFFFFF">
  <tr>
    <th width="40" scope="col">Sn.</th>
    <th width="291" scope="col">Headline</th>
    <th width="68" scope="col">Edit</th>
    <th width="74" scope="col">Delete</th>
  </tr>
  <?php
  $sql1 = mysql_query("Select * from news_manager WHERE 1");
  $i=1;
  while($row = mysql_fetch_array($sql1))
  {
	  extract($row);
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $name;?></td>
    
    <td><a href="<?php echo $_SERVER['PHP_SELF'];?>?value=2&id=<?php echo $id;?>">Edit</a></td>
    <td><a href="include/new_delete.php?delete=<?php echo $id;?>">Delete</a></td>
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