<?php 
if($_SERVER['REQUEST_METHOD']=="POST")
{
  $s = mysql_query("SELECT * FROM `copyright_manager` WHERE 1");
  $r = mysql_num_rows($s);
  if( $r < 1)
   {
	    $c=$_REQUEST['copyrit'];
		$st = mysql_query("INSERT INTO `copyright_manager`(`copyright_text`) VALUES ('$c')");
	echo mysql_error();
	if($st)
	{
		?><script>alert ("copyright added successfully");
          window.location.assign("copyright_manager.php");
          </script><?php
	}
   }
   else
   {
	   ?><script>
        alert ("pls, first delete the existing copyright text than add new ");
		window.location.assign("copyright_manager.php");
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
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table width="612" height="193" align="center" >
  <tr>
    <td width="126" height="45">Copyright </td>
    <td width="474"><input type="text" name="copyrit"  style="width:280px;"required /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="add copright text" /></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>

<table width="734" border="1" cellspacing="3" cellpadding="3" align="center">
  <tr>
    <th width="40" scope="col">Sn.</th>
    <th width="291" scope="col">Copyright </th>
    <th width="74" scope="col">Delete</th>
  </tr>
  <?php
  $sql1 = mysql_query("Select * from copyright_manager WHERE 1");
  $i=1;
  while($row = mysql_fetch_array($sql1))
  {
	  extract($row);
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $copyright_text ;?></td>
    <td><a href="include/copyright_delete.php?delete=<?php echo $id;?>">Delete</a></td>
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