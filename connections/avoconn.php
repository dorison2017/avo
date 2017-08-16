<?php
$hostname_AVO = "localhost";
$database_AVO = "avo";
$username_AVO = "avo";
$password_AVO = "avopassword";
$AVODB = new mysqli($hostname_AVO, $username_AVO, $password_AVO, $database_AVO)  or die(mysql_error());
?>