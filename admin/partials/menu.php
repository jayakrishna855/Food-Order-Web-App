<?php
include("../config/constants.php");
if(!isset($_SESSION['user'])){
    $_SESSION['no-login']="<div class='error text-center'>Please Login .</div>";
    header('location:'.SITEURL.'admin/login.php');
}
?>


<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Food Order Website -Home Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!--Menu Section -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin Panel</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php">Food</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="login-out.php">Log-out</a></li>


            </ul>

        </div>

    </div>