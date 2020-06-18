<?php
session_start();

?>
<?php
include 'LoginCheck.php';
if(!loggedin()){
    header("location: login.php");
}
$username=$_SESSION["name"];

$myfile = fopen("data/user_".trim($_SESSION["name"]).".txt","r");

$name = fgets($myfile);
$pass = fgets($myfile);
$phn = fgets($myfile);
$email = fgets($myfile);
$area = fgets($myfile);

$rename = "";
$repass = "";
$rephn = "";
$remail = "";
$rearea = "";

$errname=$errpass=$errphn=$errmail="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
     $rename=$_POST['Username'];

     if (empty($rename)) {
	 $name = $name;

	}
	elseif (ctype_alpha($rename)) 
	{

		$name=validation($rename);
	}
	else
	{
		$name = $name;
		
	}


	$repass = $_POST['passw'];

	if (empty($repass)) {
	 $pass = $pass;
	 $errpass= "<font size='2' color='red'>Password can not be empty</font>";
     }
     elseif(strlen($repass)< 8)
     {
     	$pass = $pass;
		$errpass ="<font size='2'  color='red'>Password must be 8 character and contains letter and number</font> ";
     }
     elseif (ctype_alnum($repass)) {
       
   	    $pass = validation($repass);
     }
     else
     {
     	$pass = $pass;
     }


     $rephn = $_POST["mobile"];
     if(empty($rephn))
     {
     	$phn = $phn;
     }
     elseif (ctype_alpha($rephn)) {
     	$phn = $phn;
     }
     elseif (strlen($rephn)<11) {
     	$phn = $phn;
     }
     elseif (strlen($rephn)>11) {
     	$phn = $phn;
     }
     elseif (ctype_digit($rephn)) {
     	$phn = validation($rephn);
     }
     else
     {
     	$phn = $phn;
     }

	 $remail = $_POST["mail"];
     if (empty($remail)) {
     	$email = $email;
     }
     elseif (strpos($remail, "@") && strpos($remail,".com")) {
     	
     	$email = validation($remail);
     }
     else
     {
     	$email = $email;

     }
	 
	 $rearea = $_POST["area51"];
     if (empty($rearea)) {
     	$area = $area;
     }
     elseif ($rearea) {
     	$area = $rearea;
     }
}



 if (isset($_POST['submit'])) {
     	if ($name=="" || $pass==""  || $phn=="" ||  $email=="" || $area=="") {
     		$name = $name;
     		$pass = $pass;
     		$phn = $phn;
     		$email = $email;
			$area = $area;
     	}
     	else
     	{
     		$write = "$name";
     		$write1 = "$pass";
     		$write2 = "$phn";
            $write3 = "$email";
            $write4 = "$area";
			
			$_SESSION["name"] = $write;
			$_SESSION["password"] = $write1;
			$_SESSION["phone"] = $write2;
			$_SESSION["email"] = $write3;
			$_SESSION["area"] = $write4;
     		//$myfile = fopen("test.txt", "w");
            $myfile = fopen("data/user_".$name.".txt", "w");
     		fwrite($myfile, $write."\r\n".$write1."\r\n".$write2."\r\n".$write3."\r\n".$write4);
     	}
     }



         function validation($data)
       {
	      $data = trim($data);
          $data = stripcslashes($data);
          $data = htmlspecialchars($data);
          return $data;
       }
?>

<!DOCTYPE html>
<html>
	<head>
	
		<title>Profile </title>	
	
		<style>
		
			a 
			{
				text-decoration: none;
				color : white ;
			}
			a:hover
			{
				text-decoration: none;
				color : white ;
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
			
			.logInBtn
			{
				background-color: white;
				color: #CB0648;
				padding: 4px;
				border: none;
				cursor: pointer;
				width: 15%;								
			}
			
			.registerbtn:hover 
			{
				opacity: 1;
			}
			.homeLabel:hover
			{
				cursor: pointer;
			}
		</style>
		
	</head>	
	
<body>
<table style="width:100% " cellspacing="0">
		<tr style="background-color:#CB0648;" height="120" >
			<td  style="font-size:300%" width ="65%">
				<b>&#160;&#160;&#160; <font color="white"><a href="HomePage.php">Food Village&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</font></b>
			</td>
			<td style="font-size:140%;" align ="right">
				
				<a href='profile.php'><img src='image/profile.png' height='30' title="<?php echo $_SESSION["name"];?>"></a>
				<label ><font color="antiquewhite">&#160;&#160; &#160;&#160; &#160;&#160;</font></label>
				<a href='logout.php'><img src='image/logout.png' width='30' title='Log out'></a>
				<label ><font color="antiquewhite">&#160;&#160; &#160;&#160; &#160;&#160;</font></label>

			</td>
		</tr>
</table>
<br><br><br>
<p style="font-size:250%" align="center" > <font color="#CB0648" ;face="Courier New";><b>Profile Settings</b></font> </p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  	<font color="#CB0648" ; size ="5" ; face="Courier New";>
	<table align="center" bgcolor="" width="60%" height="300" border="0">
		<tr>
			<td align="right" width="25%">Name:</td>
			<td align="center"><input id="rcorners" style="height:40px;font-size:14pt;" type="text" name="Username" size="35" placeholder="Write your name"value="<?php echo "$name";?>" ></td>
		</tr>

		<tr>
			<td align="right">Password:</td>
			<td align="center"><input id="rcorners" style="height:40px;font-size:14pt;" type="password" name="passw" size="35" value="<?php echo "$pass";?>"></td>
		</tr>

		<tr>
			<td align="right">Phone:</td>
			<td align="center"><input id="rcorners" style="height:40px;font-size:14pt;" type="tel" name="mobile" size="35"  placeholder="01000000000" value="<?php echo "$phn";?>"></td>
		</tr>

		<tr>
			<td align="right">Email:</td>
			<td align="center"><input id="rcorners" style="height:40px;font-size:14pt;" type="email" name="mail" size="35" placeholder="someone@example.com" value="<?php echo "$email";?>"></td>
		</tr>
		
		
		<tr>
			<td align="right">Address:</td>
			<td align="center"><input id="rcorners" style="height:40px;font-size:14pt;" type="text" name="area51" size="35" placeholder="" value="<?php echo "$area";?>"></td>
		</tr>
		
		<tr>
			<td colspan="2" align="center"><input id="rcorners" type="submit" class="registerbtn" name="submit" value="submit"></td>
		</tr>
	</table>
	</font>
  </form>
  
  </body>
</html>
