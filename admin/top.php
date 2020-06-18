<?php
#redirect if user or guest
$filename = "../session_info.txt";
$session_info = fopen($filename, "r");
$username = fgets($session_info);
$userType = trim(fgets($session_info));
fclose($session_info);



if($userType!="admin")
	header("location: ../login.php")
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		top person
	</title>
</head>
<body>
	<table width='100%' cellspacing='0' cellpadding='15' bgcolor='#122432'>
    <tr>
      <td>
        <a href='..'><img src='../image/logo2_outline.png' width='128'></a>
      </td>
      <td align="right">
      	<font color='white'>Admin &nbsp; &nbsp;</font>
      	<a href='../logout.php'><img src='../image/logout.png' width='20' title='Log out'></a> &nbsp;&nbsp;
      </td>
    </tr>
  </table>

  	<br><br>



  	
	<table>
		<td  height="100" align="center" width="1200" bgcolor="#e68a47">
			<img height="100" wisdth="100" src="top.png">
			<font size="20"><b>TOP LIST</b></font>
			<img height="100" wisdth="100" src="top.png">
		</td>
		<tr>
			<td>
				<hr></hr>
			</td>
		</tr>
	</table>
	<table align="center" >
		<tr >
			<td height="200" width="150"><img src="topcustomer.jpg"></td>
			<td bgcolor="#d1b875">Top Seller:Sheikh Abdullah</td>
			<td bgcolor="#c2c27a">Quantity:200</td>		
		</tr>
		<tr>
			<td colspan="3"> 
				<hr></hr>
			</td>
		</tr>
		<tr>
            <td height="200" width="150"><img src="topbuyer.jpg"></td>
			<td bgcolor="#d1b875">Top Buyer:Sheikh Abdullah</td>
			<td bgcolor="#c2c27a">Quantity:20</td>			
		</tr>
		<tr>
			<td colspan="3"> 
				<hr></hr>
			</td>
		</tr>
		<tr>
            <td height="200" width="150"><img src="toprider.jpg"></td>
			<td bgcolor="#d1b875">Top riderer:Sheikh Abdullah</td>
			<td bgcolor="#c2c27a">Ride:32</td>			
		</tr>
		<tr>
			<td colspan="3"> 
				<hr></hr>
			</td>
		</tr>
		
		
	</table>

</body>
</html>