<?php
session_start();


$customerId = $_GET['id'];
$firstName = $_GET['first_name'];
$lastName = $_GET['last_name'];

$_SESSION['confirm_delete'] = '1';
$_SESSION['customer_id'] = $customerId;
$_SESSION['first_name'] = $firstName;
$_SESSION['last_name'] = $lastName;

    // $_SESSION['first_name'];
header('location: index.php');


