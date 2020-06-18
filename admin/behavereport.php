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


<html>
<head>
	<title>Behaviour Report</title>
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



	<table width="100%" border="0">
		<tr>
			<td align="center" bgcolor="#3499dd">
				<img height="350" src="reportcustomer.png">
			</td>
		</tr>
		<tr>
			<td align="center">
				<font size="12"><b>Report and Support</b></font>
			</td>
		</tr>
		<tr>
			<td colspan="2"> 
				<hr></hr>
			</td>
		</tr>
			
		</tr>
		
	</table>

<br><br><br><br>

	<table height="" width="50%" align="center" bgcolor="f0f5f5" border="0">
		<tr>
			<td rowspan="9" width="64"> &nbsp; </td>
			<td colspan="2"> 
				<hr></hr>
			</td>
			<td rowspan="9" width="64"> &nbsp; </td>
		</tr>
		<tr>
			<td height="200" width="250">Report against customer</td>
			
		    <td><a href="demoreport.php"><img height="200" width="250" src="notification.png"></a></td>
		</tr>
		<tr>
			<td colspan="2"> 
				<hr></hr>
			</td>
		</tr>

        <tr>
			<td height="200" width="250">Report against a rider</td>
			<td><a href="demoreport.php"><img height="200" width="250" src="notification.png"></a></td>
		</tr>
		<tr>
			<td colspan="2"> 
				<hr></hr>
			</td>
		</tr>

		 <tr>
			<td height="200" width="250"> Report against a seller</td>
			<td><a href="demoreport.php"><img height="200" width="250" src="notification.png"></a></td>
		</tr>
		<tr>
			<td colspan="2"> 
				<hr></hr>
			</td>
		</tr>
	</table>
 </table>



 <br><br><br><br><br><br>

	<table bgcolor="#374046" width="100%">
		<tr>
			<td> <br><br> <br><br><br> </td>
		</tr>
	</table>

	
</body>
</html>