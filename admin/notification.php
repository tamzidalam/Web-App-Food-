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
	<title>notification</title>
</head>
<body>
	<table height="200" width="1200">
		<tr>
			<td>
				<img height="200" width="1200" src="banner1.jpg">
			</td>
		</tr>
	</table>
		
	</table>
	<table>
		<table width="600" height="800"bgcolor=" #ead2cf" align="left">
			<tr>
				<td colspan="2" align="center">SELLER</td>
			</tr>
			<tr>
				<td>
					<img height="150" width="150" src="iron.jpg">
				</td>
				<td>
					Roy wants to be seller
				</td>
			</tr>

		</table>

		<table width="600" height="800" bgcolor=" #ead2cf" align="center">
			<tr>
				<td colspan="2" align="center">RIDER</td>
			</tr>
			<tr>
				<td>
					<img height="150" width="150" src="spider.jpg">
				</td>
				<td>
					Roy wants to be rider
				</td>
			</tr>

		</table>
	</table>

</body>
</html>