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
		$error = "<font color='white'>please enter username and password</font>";
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
				$filename = "session_info.txt";
				$file = fopen($filename, "w");
				fwrite($file, $_POST['name']);
				header("location: HomePage.php");
			}
			else 
				$error = "<font color='white'>invalid password</font>";
		}
		else{
			$error = "<font color='white'>wrong username</font>";
		}
	}



		
	}

?>