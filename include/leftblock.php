    <table id="left_table">
    	<tr style="height:52px;"><td height="24" colspan="3" style="color:#74726E;padding:5px 0px 0px 20px;font-size:14px; font-weight:bold;">LATEST NEWS</td></tr>
       <?php 
       $sqln = mysql_query("SELECT * FROM `news_manager` order by `id` desc limit 2");
        $i=1;
		$c = mysql_num_rows($sqln);
       while($rown = mysql_fetch_array($sqln))
       {
           if($i<$c)
               {?>
               <tr>
        <td height="26" colspan="2"  style="padding:0px;"><img src="images/index_36.gif" width="27" height="26" alt=""></td>
      <td colspan="1" width="128"  style="color:#00AEDB; font-size:12px"><?php echo date("M d, Y");?></td></tr>
        <tr><td height="34" colspan="3" style="width:170px; height:32px; color:#74726E; font-size:12px;"><?php  echo substr($rown['description'],0,70);?></td></tr>
       <tr style="border:dotted 1px #666666;"><td width="24" height="26" colspan="1"><img src="images/index_40.gif" width="23" height="20" alt="">
       <td colspan="2" style="color:#00AEDB; font-size:12px; padding-bottom:2px"><a href="news_content.php?id=<?php echo $rown['id']; ?>"  style="text-decoration:none;  color:#00AEDB;">read more</a></span></td>
       </tr>
               <?php }
       }
       ?>
        
   </table>
       <?php 
			$sqlp5 = mysql_query("SELECT * FROM `page_manager` WHERE `id`=5");
			$rowp5 = mysql_fetch_array($sqlp5);
		?>
  <table width="179" height="220" style="margin-left:15px;width:166px;">
  <tr><td colspan="2" height="23"><a href="allnews_content.php"><img src="images/index_65.gif" width="88" height="21" alt=""></a></td></tr>
  <tr><td colspan="2" height="29" style="color:#74726E; font-weight:bolder; font-size:14px"><?php echo $rowp5['name']?></td></tr>
  <tr><td colspan="2" height="22" style="color:#00AEDB; font-family:verdana; font-size:12px; font-weight:bolder;"><?php  echo substr($rowp5['description'],0,30);?></td></tr>
  <tr><td height="66" colspan="2"><img src="admin/<?php echo $rowp5['image'];?>" width="160" height="64" alt=""></td></tr>
  <tr>
  <td width="21" height="14"><img src="images/liststyle.gif" alt=""></td>
  <td width="146"><a href="page_content.php?id=<?php echo $rowp5['id']; ?>" style="color:#24A6BC; font-size:12px;"><?php  echo substr($rowp5['description'],30,38);?></a></td>
  </tr>
  <tr>
  <td height="14"><img src="images/liststyle.gif" alt=""></td>
  <td><a href="page_content.php?id=<?php echo $rowp5['id']; ?>" style="color:#24A6BC; font-size:12px;"><?php  echo substr($rowp5['description'],38,45);?></a></td>
  </tr>
  <tr>
  <td height="14"><img src="images/liststyle.gif" alt=""></td>
  <td><a href="page_content.php?id=<?php echo $rowp5['id']; ?>" style="color:#24A6BC; font-size:12px;"><?php  echo substr($rowp5['description'],46,50);?></a></td>
  
 </table>