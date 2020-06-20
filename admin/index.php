<?php

session_start();
#redirect if user or guest
$filename = "session_info.txt";
$session_info = fopen($filename, "r");
$username = fgets($session_info);
$userType = trim(fgets($session_info));
fclose($session_info);



if($userType!="admin")
	header("location: ../login.php")
?>


<?php


$username=$_SESSION["name"];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	
	$restId=$_POST['restId'];
	$restName=$_POST['restName'];
	$image=$_POST['image'];
	$area=$_POST['area'];
	
	
	$conn = new mysqli("localhost", "root", "", "webtech");
    if($conn-> connect_error)
    {
        die("Connection Failed!!!".$conn->connect_error);
    }
	else
	{
		$_SESSION["restId"]=$restId;
		$stmt = $conn->prepare("INSERT INTO `restaurants`(`restId`, `restName`, `restIcon`, `restAddress`) VALUES ('".$restId."','".$restName."','".$image."','".$area."')");
		$stmt->execute();
		$conn->close();
		echo '<script>window.alert("Restaurant Added !")</script>';
		header("location: food.php");

	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Admin Portal
	</title>
	<style>
	
		a 
			{
				text-decoration: none;
				color :white ;
			}
			
			#rcorners 
			{
				border-radius: 5px;
			}
			
			.registerbtn
			{
				background-color: #CB0648;
				color: white;
				padding: 16px 20px;
				margin: 10px 90px;
				border: none;
				cursor: pointer;
				width: 40%;
				opacity: 0.9;
				align-content: center;
			}
			
	</style>
</head>
<body>
	<table style="width:100% " cellspacing="0">
		<tr style="background-color:#CB0648;" height="120" >
			<td  style="font-size:300%" width ="65%">
				<b>&#160;&#160;&#160; <font color="white"><a href="index.php">Food Village&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</font></b>
			</td>
			<td style="font-size:140%;" align ="right">
				
				<a href='../logout.php'><img src='../image/logout.png' width='30' title='Log out'></a>
				<label ><font color="antiquewhite">&#160;&#160; &#160;&#160; &#160;&#160;</font></label>

			</td>
		</tr>
		</table>

  	<br><br>


	<p style="font-size:250%" align="center" > <font color="#CB0648" ;face="Courier New";><b>Add Restaurant</b></font> </p>



	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  	<font color="#CB0648" ; size ="5" ; face="Courier New";>
	<table align="center" bgcolor="" width="60%" height="300" border="0">
		<tr>
			<td align="right" width="25%">Restaurant ID:</td>
			<td align="center"><input id="rcorners" style="height:40px;font-size:14pt;" type="text" name="restId" size="35" placeholder="" value="" ></td>
		</tr>

		<tr>
			<td align="right">Restaurant Name:</td>
			<td align="center"><input id="rcorners" style="height:40px;font-size:14pt;" type="text" name="restName" size="35" value=""></td>
		</tr>

		<tr>
			<td align="right">Image:</td>
			<td align="center"><input id="rcorners" style="height:40px;font-size:14pt;" type="text" name="image" size="35"  placeholder="" value=""></td>
		</tr>

		<tr>
			<td align="right">Restaurant Address:</td>
			<td align="center"><input id="rcorners" style="height:40px;font-size:14pt;" type="text" name="area" size="35" placeholder="" value=""></td>
		</tr>
		
		
		
		
		<tr>
			<td colspan="2" align="center"><input id="rcorners" type="submit" class="registerbtn" name="submit" value="Add"></td>
		</tr>
	</table>
	</font>
  </form>


	<br><br><br><br>

	



	<br><br><br><br><br><br>

	<table bgcolor="#374046" width="100%">
		<tr>
			<td> <br><br> <br><br><br> </td>
		</tr>
	</table>



</body>
</html>