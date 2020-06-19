<?php

require('db.php');
 session_start();
require('functions.php');
//require('guard.php');


$users = getAllUsers($pdo);

// dd($users);

require('header.html');



?>



        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
        
            
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <!-- <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div> -->
              <a class="btn btn-sm btn-outline-secondary" href="create-user.view.php">
                New User
              </a>
            </div>
          </div>
          <!-- <h2>All Customers</h2> -->
          <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Phone Number</th>
                  <th>Email Address</th>
                  <th>Type</th>
                  <th>Created At</th>
                  <!-- <th>Actions</th> -->
                </tr>
              </thead>
              <tbody>
              <?php 
                  $index = 1;
                  foreach($users as $user) {
                      
                      $userId = $user['id'];
                      $firstName = $user['first_name'];
                      $middleName = $user['middle_name'];
                      $lastName = $user['last_name'];
                      $phone = $user['phone'];
                      $email = $user['email'];
                      $type = $user['status'];
                      $createdAt = $user['created_at'];
                      
                      
                      echo "<tr>
                                <td>$index</td>
                                <td>$firstName</td>
                                <td>$middleName</td>
                                <td>$lastName</td>
                                <td>$phone</td>
                                <td>$email</td>
                                <td>$type</td>
                                <td>$createdAt</td>
                                
                
                </tr>";
                        $index++;

                  }
                  ?>
                
              </tbody>
            </table>
            
           
          </div>
        </main>
    
    <?php
    require('footer.html');
    ?>