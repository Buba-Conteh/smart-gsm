<?php
session_start();
require('functions.php');
require('header.html');

$oldData = [];
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php
            if(isset($_SESSION['insert_result'])){

                unset($_SESSION['old_data']);
                
                echo "<div class=\"alert alert-success mt-2\">You have successfully added a new user
                
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                
                </div>";

                unset($_SESSION['insert_result']);
              }
            if(isset($_SESSION['validation_error'])){

                $oldData = $_SESSION['old_data'];
                // dd($oldData);
                $errorMessage = $_SESSION['validation_error'];
                
                echo "<div class=\"alert alert-danger mt-2\"><strong>whoops! </strong> $errorMessage
                
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>

                </div>";

                unset($_SESSION['validation_error']);
              }
         ?>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users Module</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
             
            </div>
          </div>
          <!-- <h2>All Customers</h2> -->
         
                <div class="card border-secondary rounded-0">
                    <div class="card-header text-center border-secondary bg-secondary rounded-0 text-white text-bold">
                        ADD NEW User
                    </div>
          <div class="card-body rounded-0">
                    <form action="create-user.php" method="POST">
                        <div class="form-group row">
                            
                            <label for="" class="col-sm-4 col-form-label">First Name <span class="text-danger">*</span></label>

            <div class="col-sm-8">
            <input type="text" class="form-control" name ="first_name"  value="<?= isset($oldData['first_name']) ? $oldData['first_name'] : ""; ?>">
            </div>
        </div>
    <div class="form-group row">
        
        <label for="" class="col-sm-4 col-form-label">Middle Name</label>

        <div class="col-sm-8">
            <input type="text" class="form-control" name ="middle_name" value="<?= isset($oldData['middle_name']) ? $oldData['middle_name'] : ""; ?>">
        </div>
    </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Last Name <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control"  name ="last_name" value="<?= isset($oldData['last_name']) ? $oldData['last_name'] : ""; ?>">
                            </div>
                            

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Phone Number <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  name ="phone" value="<?= isset($oldData['phone']) ? $oldData['phone'] : ""; ?>">
                            </div>
                            

                        </div>
    <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label">Email Address <span class="text-danger">*</span></label>
        <div class="col-sm-8">
            <input type="text" class="form-control"  name ="email" value="<?= isset($oldData['email']) ? $oldData['email'] : ""; ?>">
        </div>
        

    </div>
                        
                        
                        <div class="d-flex">
                        <a href="index.php" class="btn btn-outline-secondary mb-2 text-black rounded-0 w-50 mr-2" style="display: block;">cancel</a>
                          <button type="submit" class="btn btn-outline-primary mb-2 text-black rounded-0 w-50">Save</button>

                        </div>
                    </form>
                </div>
            </div>
        </main>
<?php

require('footer.html');

?>