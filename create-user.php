<?php
session_start();

require('db.php');

require('functions.php');

if($_POST['first_name'] == ''){
    $_SESSION['validation_error'] = 'First Name is required';
    $_SESSION['old_data'] = $_POST;
    header('location: create-user.view.php');

    die;
}
if($_POST['last_name'] == ''){
    $_SESSION['validation_error'] = 'Last Name is required';
    $_SESSION['old_data'] = $_POST;
    header('location: create-user.view.php');

    die;
}
$email=$_POST['email'];
// dd($email);
$statement=$pdo->query("SELECT * FROM users WHERE `email` = '$email'");
$email = $statement->fetch();
// dd($email);
if($email){
    $_SESSION['validation_error'] = 'this email has already been taken';
    $_SESSION['old_data'] = $_POST;
    header('location: create-user.view.php');


   echo 'This email has already been taken ';
   die;
}

// //  $password = 'user';
// $user['password'] = md5($password); // adding password key with the value password in our $user array;

// $statement = $pdo->prepare("INSERT INTO users (`first_name`, `middle_name`, `last_name`, `email`, `phone`) values (:first_name, :middle_name, :last_name, :email, :phone)");

// $statement = $statement->execute();


$statement=createUser($pdo, $user);

if($statement) {
    
    $_SESSION['insert_result'] = 'success';
    header('location: create-user.view.php');
    die;
}
echo "User was not created successfully";



