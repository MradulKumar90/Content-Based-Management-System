<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php 
      include('include/admin_database.php');
       $sqlm = mysql_query("SELECT * FROM `gallery_manager` WHERE 1");
		$rm = mysql_num_rows($sqlm);
        echo "no fo rows ".$rm;
		while($rowm = mysql_fetch_array($sqlm))
        {?>
         <img src="admin/<?php echo $rowm['image']; ?>" />
        <?php }
        
 ?>
</body>
</html>
