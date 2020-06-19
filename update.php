<?php
session_start();

require('db.php');
require('functions.php');

$statement = updateCustomers($pdo);


// $statement->execute($_POST);

if($statement) {
    // echo "customer updated successful";
    // echo "<a href='index.php'>Go to home</a>";
    // header("Location: edit-customer.php?id=$customerId");
    $_SESSION['update_result'] = 'success';
    header('location: index.php');
    die;
}
echo "Customer was not updated successfully";



