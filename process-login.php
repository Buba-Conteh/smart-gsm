<?php
session_start();

require('db.php');

require('functions.php');




$email = $_POST['email'];

$password = $_POST['password'];

$password = md5($password);
// dd($password);
// dd($password);
$statement = $pdo->query("SELECT * FROM users WHERE `email` = '$email' AND `password` = '$password' ");
// dd($statement);
$user = $statement->fetch(PDO::FETCH_ASSOC);

// dd($user);
if ($user) {
    $_SESSION['user-type'] = $user['status'] ;
$_SESSION['user-name'] = $user['first_name'].' '. $user['last_name'];

    $_SESSION['user'] = $user['id'];

    echo "This is a valid email";
    redirect('index.php');
}
$_SESSION['failed'] ='wrong credentials entered';
redirect('login.php');
echo "Username and Password is not valid";
