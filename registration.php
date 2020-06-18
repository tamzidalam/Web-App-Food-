
<?php
include 'loginCheck.php';
if(loggedIn()){
  header("Location: HomePage.php");
}
?>
<?php

$email=$name=$password=$phone=$area="";
$errname=$errpass=$errphn=$errmail=$erraddress="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{  
  $name=$_POST['Username'];
	if (empty($name)) {
		$errname="<font size='2' color='red'>name can not be empty</font>";

	}
	/*elseif ($name[0]>='a' && $name <='z') {
		$name = "";
		$errname = "<font color='red'>Name must start with capital letter</font>";
	}	*/
	elseif (ctype_alpha($name)) 
	{
		$name=validation($name);
	}
	else
	{
		$name = "";
		$errname = "<font size='2' color='red'>wrong name</font>";
	}

     

    $password=$_POST['Password'];
    if (empty($_POST['Password'])) {
	 $errpass= "<font size='2' color='red'>Password can not be empty</font>";
     }
     elseif(strlen($password)< 8)
     {
     	$password="";
     	$errpass ="<font size='2'  color='red'>Password must be 8 character and contains letter and number</font> ";
     }
     elseif (ctype_alnum($password)) {
       
   	    $password=validation($_POST['Password']);
     }
      


     $phone = $_POST['Phone'];
     if (empty($phone)) {
     	$errphn = "<font size='2'  color='red'>Phone number needeed</font>";
     }
     elseif (ctype_alpha($phone)) {
     	$errphn = "<font size='2'  color='red'>Wrong number</font>";
     }
     elseif(strlen($phone) < 11)
     {
     	$errphn = "<font size='2'  color='red'>Wrong number</font>";
     }
    elseif(strlen($phone) > 11)
     {
      $errphn = "<font size='2'  color='red'>Wrong number</font>";
     }     
     elseif (ctype_digit($phone)) {
     	$phone = validation($phone);
     }
     else
     {
     	$errphn = "<font size='2'  color='red'>Wrong number</font>";
     }



     
     


     $email = $_POST['Email'];

     if (empty($email)) {
     	$email = "";
     }
     elseif (strpos($email, "@") && strpos($email,".com")) {
     	
     	$email =validation($email);
     }
     else
     {
     	$errmail = " <font size='2'  color='red'>Wrong mail address</font>";
     }

	  $area = $_POST['area'];
     if (empty($area)) {
       $erraddress = "<font size='2' color='red'>Please select your area</font>";
     }
     else
      {
       $area;
      }



     if (isset($_POST['submit'])) {
     	if ($name=="" || $password=="" || $phone=="" || $area=="") {
     		//echo "warning!!!trying to register without validation";
     	}
     	else
     	{
         //$myfile = fopen("session_info.txt", "w");
         $myfile = fopen("data/user_".$name.".txt", "w");
         $txt = $name;
         $txt1 = $password;
         $txt2= $phone;   
         $txt4= $email;
         $txt5= $area;

         fwrite($myfile,$txt."\r\n".$txt1."\r\n".$txt2."\r\n".$txt4."\r\n".$_POST['area']);
         fclose($myfile);

         $sessionInfo = fopen("session_info.txt", "w");
         fwrite($sessionInfo, $name);
         fclose($sessionInfo);

     		header("location: HomePage.php");
     	}
     }

     /*//$myfile = fopen("session_info.txt", "w");
     $myfile = fopen("data/user_".$name.".txt", "w");
     $txt = $name;
     $txt1 = $password;
     $txt2= $phone;   
     $txt4= $email;

     fwrite($myfile,$txt."\r\n".$txt1."\r\n".$txt2."\r\n".$txt4."\r\n".$_POST['Area']);
     fclose($myfile);

     $sessionInfo = fopen("session_info.txt", "w");
     fwrite($sessionInfo, $name);
     fclose($sessionInfo);*/

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
	
		<title>Welcome to Food Village </title>	
	
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
	
	<body  padding="0px" ;spacing="0">
		<table style="width:100% " cellspacing="0">
		<tr style="background-color:#CB0648;" height="120" >
			<td  style="font-size:300%" width ="65%">
				<b>&#160;&#160;&#160; <font color="white"><a id="button" href="index.php" >Food Village</a>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</font></b>
			</td>
			<td style="font-size:120%;" >
				
			</td>
		</tr>
		</table>
		<table width="100% "border="0">
		<tr style="background-color:white;" height="670" >
			<td  valign="top" width="70%">
				<p align="center"><font size="6"; face="Courier New";>It's the food you love,delivered . . <br> <br></font><br>
				<img  id="image" src="index_image/login_page_photo.jpg" alt="Food Village " height="420" width="420" align="middle"></p>
				<script>

					var imageSources = ["index_image/mixed.jpg","index_image/Burger.png","index_image/sandwitch.jpg","index_image/login_page_photo.jpg"]

					var index = 0;
					setInterval (function(){
						if (index === imageSources.length) {
						index = 0;
						}
						document.getElementById("image").src = imageSources[index];
						index++;
					} , 4000);

				</script>
			</td>
				
			<td valign="top" width="30%">
			<br>
				<font color="#CB0648" ; size ="7" ; face="Questa";>
				<b><i>New? Register here !</i></b> <br><br>
				</font>
				
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<font color="#CB0648" ; size ="5" ; face="Courier New";>
						<b>User Name</b><br>
						<input id="rcorners" style="height:40px;font-size:14pt;" type="text" name="Username" size="35" placeholder="Write your name" value="<?php echo $name;?>"> *<br><?php echo $errname ?><br><br>
						<b>Password</b> <br>
						<input id="rcorners" style="height:40px;font-size:14pt;" type="password" name="Password" size="35" placeholder="Enter your password" value="<?php echo $password;?>"> *<br><?php echo $errpass ?><br><br>
						<b>Mobile No</b> <br>
						<input id="rcorners" style="height:40px;font-size:14pt;" type="tel" name="Phone" size="35"  placeholder="01000000000" value="<?php echo $phone;?>"> * <br><?php echo $errphn ?><br><br>
						<b>Email</b> <br>
						<input id="rcorners" style="height:40px;font-size:14pt;" type="email" name="Email" size="35" placeholder="someone@example.com" value="<?php echo $email;?>"><br><?php echo $errmail ?><br><br>
						<b>Address</b> <br>
						<input id="rcorners" style="height:40px;font-size:14pt;" type="test" name="area" size="35" placeholder="Enter your address" value="<?php echo $area;?>"><br><?php echo $erraddress ?><br><br>
						
					</font>					
						<input id="rcorners" type="submit" class="registerbtn" name="submit" value=" Register ">						
				</form>
				<font color="#CB0648" ; size ="4" ; face="Questa";>
				<b><i><p align="center">Already have an ID ? <a href="index.php"> <font color="#CB0648" ; size ="4" ; face="Questa";><u>Log In here</u></font></a></p></i></b> 
				</font>
			</td>
		</tr>
		</table>

	</body>
	<script>
		home()
		{
			window.open("index.php");
		}
	</script>


</html>