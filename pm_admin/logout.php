<?php
session_start();
session_unset();
session_destroy();
if(isset($_COOKIE['rem'])) // If the cookie 'rem is set, do the following;
{
$time = time();
setcookie("rem[username]", $time - 3600);
setcookie("rem[password]", $time - 3600);
}
header('Location:login.php');

exit();
?>