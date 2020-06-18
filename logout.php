<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>
<?php
//clear the logged username from the session info file
//and redirect to the index.php landing page

$filename = "session_info.txt";
$session_info = fopen($filename, "w"); // write mode

fwrite($session_info, "");
header("Location: index.php");
?>
