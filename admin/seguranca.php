<?php
session_start();
if( !isset( $_SESSION["apps_20032019"] ) ){
	header("Location: login.php");
}
?>