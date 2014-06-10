<?php 
if($_SERVER['REQUEST_METHOD']=="POST")
{
  $s = mysql_query("SELECT * FROM `presentation_file_manager` WHERE 1");
  $r = mysql_num_rows($s);
  if( $r <1)
   {
	   if (ctype_alpha($_REQUEST['file_name'])) {
			$n= $_REQUEST['file_name'];
			}
			else{ 
			?><script>
            alert ("pls enter latter only in File Name");
			window.location.assign("presentation_file_manager.php");
            </script><?php
			die();
			}
	  
	  $allowedExts = array("pdf", "ppt", "doc","pdf"); 
      $extension = end(explode(".", $_FILES["file"]["name"]));
     if (in_array($extension, $allowedExts))
	  {
	    $f='upload/'.$_FILES['file']['name'];
		$t = $_FILES['file']['tmp_name'];
        copy($t, $f); 
	   }
	   else
	   {
		   ?><script>
           alert ("ERROR!! pls, upload correct '.ppt' or '.pdf' file");
           window.location.assign("presentation_file_manager.php");
		   </script> <?php
		   die();
	   }
		$st = mysql_query("INSERT INTO  `presentation_file_manager`(`file_name`,`file`) VALUES ('$n','$f')");
	echo mysql_error();
	if($st)
	{
		?>
	<script>
    alert ("File uploded sucessfully");
	 window.location.assign("presentation_file_manager.php");
    </script>
    	<?php
	}
   }
   else
   {
	   ?><script>
        alert ("pls, first delete the existing file than upload new file ");
        </script><?php
		
   }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table width="612" height="193" align="center">
  <tr>
    <td width="156" height="45">File Name</td>
    <td width="444"><input type="text" name="file_name" required /></td>
  </tr>
  <tr>
    <td height="40">Upload Presentaion file</td>
    <td><input type="file" name="file" /></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="upload presentation file" /></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>

<table width="734" border="1" cellspacing="3" cellpadding="3" align="center" bgcolor="#FFFFFF">
  <tr>
    <th width="40" scope="col">Sn.</th>
    <th width="291" scope="col">File Name</th>
    <th width="74" scope="col">Delete</th>
  </tr>
  <?php
  $sql1 = mysql_query("Select * from presentation_file_manager WHERE 1");
  $i=1;
  while($row = mysql_fetch_array($sql1))
  {
	  extract($row);
  ?>
  <tr>
    <td ><?php echo $i;?></td>
    <td><?php echo $file_name;?></td>
    <td><a href="include/pra_file_delete.php?delete=<?php echo $id;?>">Delete</a></td>
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