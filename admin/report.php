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
	<title>Report Dashboard</title>
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

	<table border="0" width="100%" bgcolor="#a6b7cb">
		<tr>
			<td height="200" align="center"><img height="200" src="report.jpg"></td>
		</tr>
		
	</table>
  <table>

  	<br><br><br><br><br><br>

	 <table width="80%" bgcolor="" align="center" border="0" cellpadding="20">
		<tr>
			<td width="20%">
				<img height="200" width="200" src="totalcustomer.jpg">
			</td>
			<td>
				Total Customer : 24000
			</td>
			<td rowspan="3" align="center">
				<img height="300" width="450" src="graph.png">
			</td>
		</tr>
		<tr>
			<td>
				<img height="200" width="200" src="buyer.jpg">
			</td>
			<td>
				Buyer : 22500
			</td>
		</tr>
		<tr>
			<td>
				<img height="200" width="200" src="totalseller.jpg">
			</td>
			<td>
				Seller : 1500
			</td>
		</tr>
		
	 </table>

	<br><br><br><br><br><br>

	<table bgcolor="#374046" width="100%">
		<tr>
			<td> <br><br> <br><br><br> </td>
		</tr>
	</table>
	
</table>

</body>
</html>