<?php
session_start();
session_unset();
setcookie('nameORid', '', time()-3600);
setcookie('username', '', time()-3600);
header("location:login.php");
?>