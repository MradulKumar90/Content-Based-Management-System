<table width="652" border="1" cellspacing="3" cellpadding="3" align="center">
  <thead><th colspan="4"><span style="font-size:30px; color:#00F; font-weight:bolder;">Client Query Data</span></th></thead>
  <tr>
    <th width="44" scope="col">Sn.</th>
    <th width="297" scope="col">Name</th>
    <th width="107" scope="col">View Details</th>
    <th width="155" scope="col">Delete data</th>
  </tr>
  <?php
  $sql1 = mysql_query("Select * from query_pannel WHERE 1");
  $i=1;
  while($row = mysql_fetch_array($sql1))
  {
	  extract($row);
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $name;?></td>
    
    <td><a href="<?php echo $_SERVER['PHP_SELF'];?>?value=2&id=<?php echo $id;?>">show Details</a></td>
    <td><a href="include/query_delete.php?delete=<?php echo $id;?>">Delete data</a></td>
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