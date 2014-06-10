<?php 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>menu_add</title>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="617" border="1" cellspacing="3" cellpadding="3" align="center" bgcolor="#FFFFFF">
  <tr>
    <th width="40" scope="col">Sn.</th>
    <th width="291" scope="col">Name</th>
    <th width="84" scope="col">Status</th>
    <th width="68" scope="col">Edit</th>
  </tr>
  <?php
  $sql1 = mysql_query("Select * from menu_manager WHERE 1");
  $i=1;
  while($row = mysql_fetch_array($sql1))
  {
	  extract($row);
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $NAME;?></td>
    <td><?php 
	if($status)
	{
		echo 'Active';	
	}
	else
	{
		echo 'Deactive';
	}
	?></td>
    <td><a href="<?php echo $_SERVER['PHP_SELF'];?>?value=2&id=<?php echo $ID;?>">Edit</a></td>
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