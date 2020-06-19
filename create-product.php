<?php
session_start();

require('db.php');

require('functions.php');

$statement =   $statement = $pdo->prepare("INSERT INTO products (`name`, `type`, `cost`, `u_id`) values ( :name,:type,:cost, :user)");


// dd($_POST);
$statement= $statement->execute($_POST);

// dd($statement);
if($statement) {
    
    $_SESSION['insert_result'] = 'success';
    header('location: create-product.view.php');
    die;
}

echo "Product was not created successfully";



