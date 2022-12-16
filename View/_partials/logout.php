<?php
$_SESSION = array();

// 3. Destroy the session cookie
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time() - 42000, '/');
}
// 
session_unset();
// 4. Destroy the session
session_destroy();

header("Location:home.php");

 //for one.com  
//$urlLogout ="http://exatic.store/logout/../home.php";
 // echo ("<script>
   //    location.href='$urlLogout'
 //      </script>");