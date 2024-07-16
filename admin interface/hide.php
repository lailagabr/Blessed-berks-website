<?php
include "connection.php";

$select="SELECT * FROM `product` WHERE `hidden` = 1 ";
$runSelect=mysqli_query($connect, $select);

if(isset($_GET['hide'])) { 
$id = $_GET['hide']; 
$update= "UPDATE `product` SET `hidden` = 2 WHERE `product_id` = $id";
$runq=mysqli_query($connect, $update); 
header('location:aproduct.php');
}
?>
