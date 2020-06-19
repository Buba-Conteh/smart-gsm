<?php
session_start();

require('db.php');

require('functions.php');

// dd($_POST);

if($_POST['first_name'] == ''){
    
    $_SESSION['validation_error'] = 'First Name is required';
    
    // $_SESSION['old_data'] = $_POST;
    
    // redirect('create-user.view.php');
}
if($_POST['last_name'] == ''){

    $_SESSION['validation_error'] = 'Last Name is required';
    
    // $_SESSION['old_data'] = $_POST;
    
    
    // redirect('create-user.view.php');
}
if($_POST['phone'] == ''){

    $_SESSION['validation_error'] = 'Phone Number is required';
    
    // $_SESSION['old_data'] = $_POST;

    // redirect('create-user.view.php');
}
if($_POST['email'] == ''){

    $_SESSION['validation_error'] = 'Email Address is required';
    
    // $_SESSION['old_data'] = $_POST;

    // redirect('create-user.view.php');
}
$statement = createUser($pdo, $_POST);

if($statement) {
    
    $_SESSION['insert_result'] = 'success';
    redirect('create-user.view.php');
}
echo "User was not created successfully";



