<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<div id="left_menu" style=" float:left; margin:76px 5px 5px 5px; width:250px; height:530px;">
	  	<ul>
            <li><a href="admin_page.php"><span style="padding-left:10px; font-weight:bolder; color:#03F; text-decoration:none;">Choose Manager</span></a></li>
            <li><a href="menu_manager.php?value=1"><span style="padding-left:10px">Menu Manager</span></a></li>
            <li><a href="sub_menu_manager.php?value=1"><span style="padding-left:10px">Sub Menu Manager</span></a></li>
            <li><a href="page_manager.php?value=1"><span style="padding-left:10px">Pages Manager</span></a></li>
            <li><a href="gallery_manager.php?value=1"><span style="padding-left:10px">Gallery Manager</span></a></li>
            <li><a href="banner_manager.php?value=1"><span style="padding-left:10px">Banner Manager</span></a></li>
            <li><a href="news_manager.php?value=1"><span style="padding-left:10px">News Manager</span></a></li>
            <li><a href="logo_manager.php"><span style="padding-left:10px">Logo Manager</span></a></li>
            <li><a href="copyright_manager.php"><span style="padding-left:10px">Change copyright</span></a></li>
            <li><a href="presentation_file_manager.php"><span style="padding-left:10px">Prasentation file manager</span></a></li>
            <li><a href="client_query_pannel.php?value=1"><span style="padding-left:10px">Client Query Data</span></a></li>
            <li><a href="change_pass.php"><span style="padding-left:10px">Change Password</span></a></li>
            <li><a href="<?php echo $_SERVER['PHP_SELF'].'?logout=Yes'?>"><span style="padding-left:10px; color:#F00;">Logout</span></a></li>
        </ul>
</div>
</body>
</html>
