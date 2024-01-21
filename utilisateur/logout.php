<?php
session_start();
$_SESSION = array();
header("Location: /ag/index.php");
exit();
?>