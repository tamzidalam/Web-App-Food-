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
		Report
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



	<table height="250" width="100%" align="center">
     	<tr>
     		<td>
     			<img height="250" width="100%" src="reportdemo.png">
     		</td>
     	</tr>
     	<tr>
     		<td>
     			<hr></hr>
     		</td>
     	</tr>
     	
     </table>

     <table width="100%"> 
     	<tr>
     		<td align="center">
     			<font size="15"><b>RECENT REPORT</b></font>
     		</td>
     	</tr>
     	<tr>
     		<td colspan="2">
     			<hr></hr>
     		</td>
     	</tr>
     </table>

	

	
 
     <table height="" width="400"border="0" align="center" bgcolor="#e6e6ff">
     	<tr>
     		<th>Name</th>
     		<th>Phone</th>
     		<th>Date</th>
     	</tr>
          <?php
          for ($i=0; $i < 10 ; $i++) { 
               echo '
               <tr>
               <td align="center"><a href="../users.php?id=thanos">Thanos</a></td>
               <td align="center">01897345234</td>
               <td align="center">12/06/2019</td>
               </tr>
               ';
          }
          ?>
     </table>
     

</body>
</html>