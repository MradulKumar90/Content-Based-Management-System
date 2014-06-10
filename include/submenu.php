<div id="submenu">
    	<ul>
        <?php
        $sql = mysql_query("SELECT * FROM sub_menu_manager LIMIT 5");
		$i=1;
		$c = mysql_num_rows($sql);
		while($row = mysql_fetch_array($sql))
		{
		if($i<=$c)
		{
		?>
        <li style="background-image:none;"><img src="images/sub_menu_img.gif" alt="" /><a href="content2.php?idc=<?php echo $row['id']; ?>"><span style="padding-left:10px"><?php echo $row['name']; ?></span></a></li>
        <?php
		}
		$i++;
		}
		?>
	</ul>
 </div>