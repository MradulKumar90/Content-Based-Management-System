    <div id="footer" style="width:775px; height:55px; float:left; background-image:url(images/footer.gif); background-repeat:     repeat-x; color:#666666;">
    <?php
			$sqlf = mysql_query("SELECT * FROM `copyright_manager` WHERE 1");
			$rowf = mysql_fetch_array($sqlf);
			?>
        <div id="copyrit" style="margin-left:40px; margin-top:10px; text-transform:capitalize;"  ><?php echo $rowf['copyright_text'];?></div>
  		<div id="footer_menu" style="width:600px; height:30px; margin:5px 130px;">
         
       		<ul>
            <li style="border:none;"><a href="index.php">HOME</a></li>
             <?php
             $sql = mysql_query("SELECT * FROM menu_manager LIMIT 4");
		$i=1;
		$c = mysql_num_rows($sql);
		$j= $c;
		while($row = mysql_fetch_array($sql))
		{
		if($i==($c-1))
		{
		?>
        <li ><a href="content.php?id=<?php echo $row['ID']; ?>"><?php echo $row['NAME']; ?></a></li>
        <?php
		}
		elseif($i == $j)
		{?>
		<li ><a href="contact_content.php?id=<?php echo $row['ID']; ?>"><?php echo $row['NAME']; ?></a></li>	
		<?php }
		else
		{
		?>
        <li ><a href="content.php?id=<?php echo $row['ID']; ?>"><?php echo $row['NAME']; ?></a></li>
        <?php
		}
		
		$i++;
		}
		?>
        
            </ul>
         </div>
          
       
        
 </div>