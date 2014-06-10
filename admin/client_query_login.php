<?php
	include('include/admin_database.php');
	session_start();
	$error="";
	if($_REQUEST['error'])
	{
		$error=$_REQUEST['error'];
	}
	$n1="";
	$p1="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
	$n1=$_REQUEST['username'];
	$p1=$_REQUEST['pswd'];
 	$sql = mysql_query("SELECT * FROM `users_regisration` WHERE `E-mail` = '$n1' and `Password`='$p1'");
	
	if(mysql_num_rows($sql) > 0)
		{
		 	
			$_SESSION['admin'] = $_REQUEST['username'];
			header("location:client_query_pannel.php?value=1");
		}
		else
		{ 
			$error='Username/Password Mismatch'; 
		}
	}	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login_page</title>
</head>
<body style="background-image:url(upload/Admin_bg.jpg); background-repeat:repeat">

<form method="post">
<table width="876" height="420" style="" cellpadding="3" cellspacing="3" align="center">
  <tr>
    <th height="78" colspan="2" scope="col">Query login</th>
  </tr>
  <tr>
    <td height="78" colspan="2"><blockquote>
      <blockquote>
        <blockquote>
        <blockquote>
        <blockquote>
          <span style="color:#F00; font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-weight:lighter;"><?PHP echo $error; ?></span></p>
        </blockquote>
      </blockquote>
      </blockquote>
      </blockquote>
    </blockquote></td>
  </tr>
  <tr>
    <td height="106" colspan="2"><blockquote>
      <blockquote>
        <blockquote>
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username:
            <input type="text" name="username" id="username" required />&nbsp;&nbsp; 
            Password:
            <input type="password" name="pswd" id="pswd" required />&nbsp;&nbsp;
            <input type="submit" name="Login" id="submit" value="Login">
          </p>
        </blockquote>
      </blockquote>
    </blockquote></td>
  </tr>
  
  </tr>
</table>
</form>
</body>
</html>
