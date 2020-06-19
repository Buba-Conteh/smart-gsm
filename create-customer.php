<?php
session_start();

require('db.php');

require('functions.php');

$statement = createCustomer($pdo, $_POST);

if($statement) {
    
    $_SESSION['insert_result'] = 'success';
    header('location: create.view.php');
    die;
}
echo "Customer was not updated successfully";



