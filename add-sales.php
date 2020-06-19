<?php
session_start();

require('db.php');

require('functions.php');
$pid=$_POST['product'];

$statement =   $statement = $pdo->prepare("INSERT INTO sales (`amount`, `c_id`, `p_id`, `u_id`) values ( :amount,:customer,:product, :user)");




// dd($_POST);
$statement= $statement->execute($_POST);

// dd($statement);
if($statement) {
    $statement1 =   $statement = $pdo->prepare("UPDATE products Set status='sold' WHERE id='$pid'");
    $statement1= $statement1->execute();


    if ($statement1) {
        $_SESSION['insert_result'] = 'success';
        header('location: sales.view.php');
        die;
    }
   
}

echo "Sales was not created successfully";



