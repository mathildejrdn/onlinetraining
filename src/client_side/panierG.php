<?php
session_start();
require_once("../connect.php");

if((isset($_POST['add_to_cart']))){
    $product_id= $_POST["product_id"];
    $product_name=$_POST["product_name"];
}