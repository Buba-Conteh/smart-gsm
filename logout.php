<?php
session_start();

require('functions.php');

unset($_SESSION['user']);

session_destroy();

redirect('login.php');
