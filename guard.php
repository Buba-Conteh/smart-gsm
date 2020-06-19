<?php

// if(!isset($_SESSION['user'])){
//   redirect('login.php');
// 

!isset($_SESSION['user']) ? redirect('login.php') : '';