<?php
session_start();

require('db.php');

require('functions.php');

require('guard.php');

// $customerId = $_GET['id'];

// $customer = getCustomer($pdo, $customerId);
   
require('header.html');
    
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Customers</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <!-- <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button> -->
            </div>
          </div>
          <!-- <h2>All Customers</h2> -->
         
                <div class="card border-secondary rounded-0">
                    <div class="card-header text-center border-secondary bg-secondary rounded-0 text-white text-bold">
                        Change My Password
                    </div>
          <div class="card-body rounded-0">
                    <form action="process-change-password.php" method="POST">
                        <div class="form-group row">
                            <label for="current_password" class="col-sm-4 col-form-label">Current Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name ="current_password" id="current_password">
                            </div>
                            
                            

                        </div>
                        <div class="form-group row">
                            <label for="new_password" class="col-sm-4 col-form-label">New Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name ="new_password" id="new_password">
                            </div>
                            
                            

                        </div>
                        <div class="form-group row">
                            <label for="confirm_password" class="col-sm-4 col-form-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name ="confirm_password" id="confirm_password">
                            </div>
                            
                            

                        </div>
                        
                        
                        
                        <div class="d-flex">
                        <a href="index.php" class="btn btn-outline-secondary mb-2 text-black rounded-0 w-50 mr-2" style="display: block;">cancel</a>
                          <button type="submit" class="btn btn-outline-info mb-2 text-black rounded-0 w-50">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </main>
<?php

require('footer.html');

?>