<?php
session_start();

require('db.php');
require('functions.php');

// $statement = updateCustomers($pdo);


// $statement->execute($_POST);
$name = $_POST['name'];
$type = $_POST['type'];
$cost = $_POST['cost'];
$id = $_POST['id'];



$statement = $pdo->prepare("UPDATE products set name = '$name', type = '$type', cost = '$cost' WHERE id='$id'");

$statement=$statement->execute($_GET);
// dd($statement);
if($statement) {
    // echo "customer updated successful";
    // echo "<a href='index.php'>Go to home</a>";
    // header("Location: edit-customer.php?id=$customerId");
    $_SESSION['update_result'] = 'success';
    header('location: products.view.php');
    die;
}
echo "Customer was not updated successfully";



