<?php
session_start();

?>
<?php

include 'loginCheck.php';
if(loggedIn()){
  header("Location: HomePage.php");
}

$error = "";
$name = $pass = "";

if (isset($_POST['submit'])) {
	if ($_POST['name'] == "" || $_POST['password']=="") {
		//echo "trying to login without username or password";
		$error = "<font size='2' color='red'>please enter username and password</font>";
	}
	elseif ($_POST['name'] == "admin" && $_POST['password']=="admin") {
		$filename1 = "session_info.txt";
		$file1 = fopen($filename1, "w");
		fwrite($file1, "admin\r\nadmin");
		header("location: admin/index.php");
	}
	else
	{
		#username login provided
		$name = $_POST['name'];
		$pass = $_POST['password'];
		
		#checking for correct username pass
		$userFile = "data/user_".$name.".txt";
		if(file_exists($userFile)){ #name correct
			#check pass
			if( $pass== trim(file($userFile)[1]) ){
				#successful user login
				$_SESSION["name"]= trim($name);
				//echo $_SESSION["name"];
				$filename = "session_info.txt";
				$file = fopen($filename, "w");
				fwrite($file, $_POST['name']);
				header("location: HomePage.php");
			}
			else 
				$error = "<font size='2'  color='red'>invalid password</font>";
		}
		else{
			$error = "<font  size='2' color='red'>wrong username</font>";
		}
	}



		
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
		<table style="width:100% " border="0" cellspacing="0">
		<tr style="background-color:#CB0648;" height="120" >
			<td  style="font-size:300%" width ="65%">
				<b>&#160;&#160;&#160; <font color="white"><a id="button" href="index.php" >Food Village</a>&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;</font></b>
			</td>
			<td width="35%">
			</td>
		</tr>
		</table>
		<table style="width:100% " border="0">
		<tr style="background-color:white;" height="670" >
			<td valign="top" width="70%">
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
			
				<font color="#CB0648" ; size ="7" ; face="Questa";>
				<b><i><p align="center">Log In</p></i></b> 
				</font>
				
				<form  method="post" name="submit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<font color="#CB0648" ; size ="5" ; face="Courier New";>
						<b>User Name</b><br>
						<input id="rcorners" style="height:40px;font-size:14pt;" type="text" name="name" size="35" placeholder="Enter your user name " > <br><br>
						<b>Password</b> <br>
						<input id="rcorners" style="height:40px;font-size:14pt;" type="password" name="password" size="35" placeholder="Enter your password"> <br>
						<?php  echo $error; ?><br>
						
						
					</font>					
						<br><input id="rcorners" type="submit" class="registerbtn" name="submit" value=" Log In ">						
				</form>
				<font color="#CB0648" ; size ="4" ; face="Questa";>
				<b><i><p align="center">New on this site ? <a href="registration.php"> <font color="#CB0648" ; size ="4" ; face="Questa";><u>Register here!</u></font></a></p></i></b> 
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