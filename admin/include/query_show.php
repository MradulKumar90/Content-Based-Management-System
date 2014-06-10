<?php
	include('include/admin_database.php');
	if(isset($_REQUEST['id']))
   {
	$id=$_REQUEST['id'];
	
	$sql = mysql_query("SELECT * from query_pannel WHERE `id`='$id'");
	$r=  mysql_num_rows($sql);
	
	$row = mysql_fetch_array($sql);
	
	extract($row);
	
	
   }
  else
   {
	header("Location: client_query_pannel.php?error=please select id first");
   }
 
 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>show query_edit</title>

</head>

<body>
<form  method="post" enctype="multipart/form-data" action="#">
<table width="426" height="193" align="center">
  <tr>
    <td width="136" height="45">Name</td>
    <td width="299"><input value="<?php echo $name; ?>" type="text" name="menuname" required /></td>
  </tr>
  <tr>
    <td height="40">E-mail</td>
    <td width="299"><input value="<?php echo $e_mail; ?>" type="text"  /></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="description" rows="8" cols="80"><?php echo $description;?></textarea></td>
  </tr>
  <tr>
    <td width="136" height="45">Phone :</td>
    <td width="299"><input value="<?php echo $phone; ?>" type="text"  /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a  href="client_query_pannel.php?value=1">BACK</a></td>
  </tr>
</table>
</form>
</body>
</html>