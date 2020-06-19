<?php

session_start();

require('db.php');

require('functions.php');

require('guard.php');

// dd($_POST);


$userId = $_SESSION['user'];

// grab form data;

$currentPassword = $_POST['current_password'];

$newPassword = $_POST['new_password'];

$confirmPassword = $_POST['confirm_password'];

// compare the new password with the confirm password;

if($newPassword !== $confirmPassword){
    dd('new-password does not match confirm-password');
}
// check if current password submitted by user is the same as authenticated user's password in the Database

$statement = $pdo->query("SELECT id, email, password FROM users WHERE id = '$userId' ");

$authenticatedUser = $statement->fetch();

if($authenticatedUser){

    // if true then update authenticated user's password with new password
    if($authenticatedUser['password'] === md5($currentPassword)){
        
       
        $statement = $pdo->prepare('UPDATE users set password = :password WHERE id = :user_id');

        $resetPasswordData = [
            'password' => md5($newPassword),
            'user_id' => $userId
        ];

        $updatePassword = $statement->execute($resetPasswordData);
        
        if($updatePassword){
            echo "update was successful";
            redirect('logout.php');
        }
       
        

    
    }else{
        dd('the current user password you entered those not match the authenticated user\'s password');
    }
}
/* 
grab the form data;
compare the new password with the confirm password;
    if is not false
        check if current password submitted by user is the same as authenticated user's password in the Database;
            if true;
                then update authenticated user's password with new password; */