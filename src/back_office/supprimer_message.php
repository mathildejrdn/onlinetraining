<?php
session_start();
include("../connect.php");
if(!$_SESSION['email']){
header("Location: connexion.php");
}
?>