<div id="header" >
        <?php
			$sql = mysql_query("SELECT * FROM `logo_manager` ");
			$i=1;
			$c = mysql_num_rows($sql);
			$row = mysql_fetch_array($sql);
			?>
    	<div id="logo" style="float:left"><img src="admin/<?php echo $row['image']; ?>" width="230" height="62" alt=""></div>
        
   <div id="search_img"  ><img src="images/index_02.gif" width="27" height="62" alt=""></div><form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" >
   <div id="serchbox" style="float:left; margin:22px 0px 0px 0px; width:211px;"><span style="font-size:11px; font-family:vardana; color:#666666;">Search the site </span><input  type="text" name="search" style=" height:15px; width:130px; border-style:none; border: solid 1px #E9E9E9; font-size:10px;"/></div>
       <div id="go_img" style="float:left;margin:22px 0px 0px 0px;"><input type="submit" name="go" value="GO" style="width:20px; margin:0px; padding:0px; height:15px; font-size:7px" /></div></form>
 </div>
 	<div id="menu">
    	<ul>
        <li ><a href="index.php">HOME PAGE</a></li>
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
        <li style="background-image:none;"><a href="content.php?id=<?php echo $row['ID']; ?>"><?php echo $row['NAME']; ?></a></li>
        <?php
		}
		elseif($i == $j)
		{?>
		<li style="background-image:url(images/menu1.jpg); background-position:left; background-repeat:no-repeat;"><a href="contact_content.php?id=<?php echo $row['ID']; ?>"><?php echo $row['NAME']; ?></a></li>	
		<?php }
		else
		{
		?>
        <li style="background-image:url(images/menu1.jpg); background-position:right; background-repeat:no-repeat;"><a href="content.php?id=<?php echo $row['ID']; ?>"><?php echo $row['NAME']; ?></a></li>
        <?php
		}
		
		$i++;
		}
		?>
        
        </ul>
    </div>
    <div id="below_top" >
    	<div id="date_image" style="float:left;"><img src="images/index_12.gif" width="26" height="30" alt=""></div>
        <div id="date" ><?php echo date("M d, Y");?></div>
       
        <div style="float:left;"><img src="images/index_17.gif" width="25" height="30" alt=""></div>
        <div id="supportinfo"><a href="gallery2.php" style="text-decoration:none; color:#666666;">Gallery</a></div>
        <div style="float:left;"><img src="images/index_19.gif" width="23" height="30" alt=""></div>
        <div id="clintlogin"><a href="client_reg_page.php" style="text-decoration:none; color:#666666" >client query</a></div>
    </div>