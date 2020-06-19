<?php
session_start();

require('db.php');

require('functions.php');

$customerId = $_GET['id'];
$firstName = $_GET['first_name'];
$lastName = $_GET['last_name'];

// dd(deleteCustomer($pdo, $customerId));

// $statement = deleteCustomer($pdo, $customerId);


if(deleteCustomer($pdo, $customerId)) {
   
    $_SESSION['delete_result'] = 'success';
    $_SESSION['first_name'] = $firstName;
    $_SESSION['last_name'] = $lastName;


    header('location: index.php');
    
}
echo "Customer was not deleted successfully";



